<?php require_once("../common/commonfiles.php"); ?>
<?php
$obj['show_text2'] = isset($_POST["show_text2"]) ? $_POST["show_text2"] : 0;
$query = db::prepUpdateQuery($obj, "data", "id", $_POST["id"]);
$result = db::updateRecord($query);
?>