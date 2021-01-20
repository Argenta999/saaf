<?php
require_once("../common/commonfiles.php");
include_once 'header.php';
?>
<form id="eLearningForm" method="post" class="form-horizontal" action="add_ip.php">
    <table class="table">
        <tbody>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="ip">IP&nbsp;<span class="required">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control alpha" id="ip" name="ip" placeholder="IP" required="required"  autofocus/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="block">BLOCK &nbsp;<span class="required">*</span></label>
                                <div class="col-sm-5">
                                    <select name="block" id="block" required="required" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
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
        $("#pageName").html("IPs");
    })
</script>
