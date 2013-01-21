<?php
require("config.php");
$dictionary = "words.txt";
$lines = file($dictionary);

$skipped = array();

foreach($lines as $line_no => $word) {
    $string = $word;

    $hash = md5($string);

    $stmt = $dbc->prepare("SELECT COUNT(*), dict_string, dict_hash FROM dictionary WHERE dict_string = ?");
    $stmt->bind_param("s", $string);
    $stmt->execute();
    $stmt->bind_result($res_count, $res_string, $res_hash);
    $stmt->fetch();
    $stmt->close();

    if($res_count != 0){
        echo("SKIPPED: " . $string);
        array_push($skipped, $string);
    }else{
        $res_string = $string;
        $res_hash = md5($string);

        $stmt = $dbc->prepare("INSERT INTO dictionary VALUES (?, ?, NOW(), 0, 0);");
        $stmt->bind_param("ss", $res_string, $res_hash);
        $stmt->execute();
        $stmt->close();
        echo("INSERTED: " . $string);
    }
}
?>
