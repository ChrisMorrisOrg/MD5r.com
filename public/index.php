<?php
    ini_set('error_reporting', E_ALL);
    require("../config.php");

    $_req = "home";
    if(isset($_GET["page"]))
        $_req = $_GET["page"];
    $pages = array("about", "crack", "hash", "home");

    $requrl = $_SERVER['DOCUMENT_ROOT'] . "/pages/" . $_req . ".php";
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>MD5r.com - MD5 Hashing and Cracking</title>
        <meta name="description" content="A simple, open-source PHP MD5 hashing and cracking tool.">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="/css/normalize.min.css">
        <link rel="stylesheet" href="/css/main.css">

        <script src="/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="header-container">
            <header class="wrapper clearfix">
                <a href="/"><h1 class="title">MD5r.com</h1></a>
                <nav>
                    <ul>
                        <li><a href="/hash/">Hash</a></li>
                        <li><a href="/crack/">Crack</a></li>
                        <li><a href="/about/">About</a></li>
                    </ul>
                </nav>
            </header>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">
                <?php
                    if(in_array($_req, $pages) && file_exists($requrl))
                        include($requrl);
                    else
                        include($_SERVER['DOCUMENT_ROOT'] . "/pages/404.php");
                ?>

                <aside>
                    <h3>Statistics</h3>
                    <p>As of <?=date("F jS, Y @ g:i:s a");?>:</p>
                    <p>
                        <ul>
                            <li>Hashes: <?=$info_totalhashes;?></li>
                            <li>Cracks: <?=$info_totalcracks;?></li>
                            <li>Dictionary: <?=$info_totalrelations;?> relations</li>
                            <li>UNIX Timestamp: <?=time();?></li>
                        </ul>
                    </p>
                </aside>

            </div> <!-- #main -->
        </div> <!-- #main-container -->

        <div class="footer-container">
            <footer class="wrapper">
                <h3>Created by <a href="http://chrismorris.org">Chris Morris</a>.</h3>
            </footer>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.9.0.min.js"><\/script>')</script>

        <script src="/js/main.js" type="text/javascript">alert("embed loaded.");</script>

    </body>
</html>
<?php
$dbc->close();
?>
