<?php require_once("../common/commonfiles.php"); ?>
<?php

$id = '1';
$obj['value'] = '0';
$query = db::prepUpdateQuery($obj, "sound", "id", $id); //(Associative array, table name, record id
$result = db::updateRecord($query);


$id1 = '1';
$obj1['value'] = '0';
$query1 = db::prepUpdateQuery($obj1, "sound1", "id", $id1); //(Associative array, table name, record id
$result1 = db::updateRecord($query1);

$id2 = '1';
$obj2['value'] = '0';
$query2 = db::prepUpdateQuery($obj2, "sound0", "id", $id2); //(Associative array, table name, record id
$result2 = db::updateRecord($query2);
return $result2;



/* ----------------------------------- Adverts ----------------------------------------------- */
?>