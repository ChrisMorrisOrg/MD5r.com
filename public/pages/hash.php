<?php
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
                <article>
                    <header>
                        <h1>MD5 Hasher</h1>
                        <p>Enter the content below that you want to hash using the MD5 algorithm.</p>
                    </header>
                    <section>
                        <p>
                            <form name="hash" action="<?=$_SERVER['REQUEST_URI'];?>" method="post">
                                <textarea name="string"></textarea>
                                <input type="submit" value="Hash!">
                            </form>
                        </p>
                    </section>
<?php
    if(isset($res_hash)){
?>
                    <footer>
                        <p><strong>Result:</strong> <div id="result"><?=$res_hash?></div></p>
                    </footer>
<?php }else{ ?>
                    <footer>
                        <p><strong>Result:</strong> <div id="result"></div></p>
                    </footer>
<?php } ?>
                </article>
