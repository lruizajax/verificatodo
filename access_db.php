<?php
$link =  mysql_connect(DB_MASTER_HOST, DB_MASTER_USER, DB_MASTER_PASS);
if (!$link) {
    die('No pudo conectarse: ' . mysql_error());
}
mysql_select_db(DB_MASTER_DB, $link);
?>
