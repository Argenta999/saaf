<?php require_once("../common/commonfiles.php"); ?>
<?php

$data = db::getCell("SELECT value FROM sound");
echo $data;
/* ----------------------------------- Adverts ----------------------------------------------- */
?>