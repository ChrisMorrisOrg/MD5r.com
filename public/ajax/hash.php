<?php
    header('Content-type: application/json');
    require("../../config.php");

    if(isset($_POST['string'])){
        $string = $_POST['string'];
        $hash = md5($string);

        $stmt = $dbc->prepare("SELECT COUNT(*), dict_string, dict_hash FROM dictionary WHERE dict_string = ?");
        $stmt->bind_param("s", $string);
        $stmt->execute();
        $stmt->bind_result($res_count, $res_string, $res_hash);
        $stmt->fetch();
        $stmt->close();

        if($res_count != 0){
            if(!$dbc->query("UPDATE dictionary SET dict_hashes = dict_hashes+1 WHERE dict_string = '" . $res_string . "';"))
                printf("Error: %s\n", $dbc->error);
        }else{
            $res_string = $string;
            $res_hash = $hash;

            $stmt = $dbc->prepare("INSERT INTO dictionary VALUES (?, ?, NOW(), 1, 0);");
            $stmt->bind_param("ss", $res_string, $res_hash);
            $stmt->execute();
            $stmt->close();

            # Update statistics
            $info_totalrelations++;
        }

        # Update statistics
        $info_totalhashes++;
    }
?>
{
    "statistics": "<ul><li>Hashes: <?=$info_totalhashes;?></li><li>Cracks: <?=$info_totalcracks;?></li><li>Dictionary: <?=$info_totalrelations;?> relations</li><li>UNIX Timestamp: <?=time();?></li></ul>",
    "hash": "<?=$res_hash;?>"
}
