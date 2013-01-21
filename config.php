<?php
# Database settings

define('DB_NAME', 'DATABASE_NAME');
define('DB_USER', 'USERNAME');
define('DB_PASS', 'PASSWORD');
define('DB_HOST', 'localhost');

$dbc = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$stmt = $dbc->prepare("SELECT COUNT(*), SUM(dict_hashes), SUM(dict_cracks) FROM dictionary");
$stmt->execute();
$stmt->bind_result($info_totalrelations, $info_totalhashes, $info_totalcracks);
$stmt->fetch();
$stmt->close();
?>
