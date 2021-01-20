<?php
require_once("../common/commonfiles.php");
$id = $_GET['id'];
$data = db::getRecord("SELECT * FROM `def_address` WHERE id=1");
include_once 'header.php';
?>
<form id="eLearningForm" method="post" class="form-horizontal" action="address.php">
    <table>
        <tbody>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="address">Address&nbsp;<span class="required">*</span></label>
                                <div class="col-sm-5">
                                    <textarea cols="200" rows="5" class="form-control" id="address" name="address" placeholder="Address" required="required"  autofocus><?php echo @$data['address']; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class = "form-group">
                            <div class = "col-sm-9 col-sm-offset-4">
                                <button name="saveuser" type = "submit" class = "btn btn-primary" name = "submit" value = "Sumbit">Submit</button>
                            </div>
                        </div>
                    </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</form>
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
