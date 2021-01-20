<?php require_once("../common/commonfiles.php"); ?>
<?php
$obj['redirect'] = isset($_POST["redirect"]) ? $_POST["redirect"] : 0;
$query = db::prepUpdateQuery($obj, "data", "id", $_POST["id"]);
$result = db::updateRecord($query);
?>