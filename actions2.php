<?php require_once("../common/commonfiles.php"); ?>
<?php

$id = '1';
$obj['value'] = '1';

$query = db::prepUpdateQuery($obj, "sound", "id", $id); //(Associative array, table name, record id)
$result = db::updateRecord($query);
return $result;





/* ----------------------------------- Adverts ----------------------------------------------- */
?>