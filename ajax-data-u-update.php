<?php
require_once("../common/commonfiles.php");
$id = $_GET['id'];
$data = db::getRecord("SELECT * FROM `user` WHERE id='" . $id . "'");
include_once 'header.php';
?>
<form id="eLearningForm" method="post" class="form-horizontal" action="update_user.php?id=<?php echo $id; ?>">
    <table class="table">
        <tbody>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="username">Username&nbsp;<span class="required">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" value="<?php echo @$data['username']; ?>" class="form-control alpha" id="username" name="username" placeholder="username" required="required"  autofocus/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="password">Password&nbsp;</label>
                                <div class="col-sm-5">
                                    <input type="password"  value="" class="form-control alpha" id="username" name="password" placeholder="password"/>
                                    Enter if you want to change, or leave blank.
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="role">Role&nbsp;<span class="required">*</span></label>
                                <div class="col-sm-5">
                                    <select name="role" id="role" required="required" class="form-control">
                                        <option value="">Select Role</option>
                                        <option <?php echo @$data['role'] == "admin" ? "selected='selected'" : ""; ?> value="admin">admin</option>
                                        <option <?php echo @$data['role'] == "moderator" ? "selected='selected'" : ""; ?> value="moderator">moderator</option>
                                    </select>
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
