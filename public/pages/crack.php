<?php
    if(isset($_POST['string'])){
        $string = $_POST['string'];
        $hash = md5($string);

        $stmt = $dbc->prepare("SELECT COUNT(*), dict_string, dict_hash, dict_hashes, dict_cracks FROM dictionary WHERE dict_hash = ?");
        $stmt->bind_param("s", $string);
        $stmt->execute();
        $stmt->bind_result($res_count, $res_string, $res_hash, $res_hashes, $res_cracks);
        $stmt->fetch();
        $stmt->close();

        if($res_count != 0){
            if(!$dbc->query("UPDATE dictionary SET dict_cracks = dict_cracks+1 WHERE dict_hash = '" . $res_hash . "';"))
                printf("Error: %s\n", $dbc->error);
        }else{
            $res_string = -1;
        }
    }
?>
                <article>
                    <header>
                        <h1>MD5 Cracker</h1>
                        <p>Enter the MD5 hash below, and we'll try to crack it!</p>
                    </header>
                    <section>
                        <p>
                            <form name="crack" action="<?=$_SERVER['REQUEST_URI'];?>" method="post">
                                <input name="string" type="text">
                                <input type="submit" value="Crack!">
                            </form>
                        </p>
                    </section>
<?php
    if(isset($res_string) && $res_string != -1){

        # Update statistics
        $info_totalcracks++;
?>
                    <footer>
                        <p>Result: <strong><?=$res_string?></strong></p>
                    </footer>
<?php }elseif($res_string == -1){ ?>
                    <footer>
                        <p>Sorry, not found.</p>
                    </footer>
<?php } ?>
                </article>
