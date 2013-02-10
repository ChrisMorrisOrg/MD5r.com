<?php
# 9f715b74bcec9ddeac5e00752225be81
# Database settings

define('DB_NAME', 'DATABASE_NAME');
define('DB_USER', 'USERNAME');
define('DB_PASS', 'PASSWORD');
define('DB_HOST', 'localhost');

$dbc = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$stmt = $dbc->prepare("SELECT FORMAT(COUNT(*), 0), FORMAT(SUM(dict_hashes), 0), FORMAT(SUM(dict_cracks), 0) FROM dictionary");
$stmt->execute();
$stmt->bind_result($info_totalrelations, $info_totalhashes, $info_totalcracks);
$stmt->fetch();
$stmt->close();
?>
