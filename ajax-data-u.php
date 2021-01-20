<?php
require_once("../common/commonfiles.php");
$data = db::getRecords("SELECT * FROM user ORDER BY id DESC");
$action = isset($_GET['action']) ? $_GET['action'] : "";
$id = isset($_GET['id']) ? $_GET['id'] : "";
include_once 'header.php';
?>
<table class="table">
    <thead>
        <tr>
            <th colspan="4" align="right"><a class="btn btn-info" href="add_user.php">Add User</a></th>
        </tr>
        <tr>
            <th width="5%">#</th>
            <th width="45%">Username</th>
            <th width="45%">Role</th>
            <th width="5%">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $counter = 1;
        foreach ($data as $value) {
            ?>
            <tr>
                <td><?php
                    $dattee = strtotime($value['date'] . ' 00:00:00');
                    echo $counter;
                    ?></td>
                <td><?php echo $value['username']; ?></td>
                <td><?php echo $value['role']; ?></td>
                <td>
                    <span style="color: orange!important;font-size: 20px;float: left;">
                        <a class="btn btn-xs btn-danger" href="actions.php?j=18&id=<?php echo $value['id'] ?>" onclick="return deleteit()" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>
                    </span>
                    <span style="color: blue !important;font-size: 20px;float: left;">
                        <a class="btn btn-xs btn-info" href="update_user.php?id=<?php echo $value['id'] ?>" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
                    </span>
                </td>
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
        $('[data-toggle="popover"]').popover();
        $("#pageName").html("Users");
    })
</script>
