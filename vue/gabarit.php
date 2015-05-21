<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/Ecostat/style/general.css" />
        <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/Ecostat/style/menu.css" />
        <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/Ecostat/style/body.css" />
        <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/Ecostat/style/footer.css" />
        <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/Ecostat/style/aside.css" />
        <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/Ecostat/style/sondage.css" />

        <link rel="icon" type="image/ico" href="/ecostat/images/favicon.ico"/>
        <script src="/ecostat/javascript/heure.js" language="javascript" type="text/javascript"></script>
        <script src="/ecostat/javascript/rotation.js" language="javascript" type="text/javascript"></script>

        <title><?= $titre ?></title>
    </head>
<body>
    <header>
        <div align="center">
            <a href="/Ecostat/">
                <img src="/ecostat/images/ecostat_logo2.png" id="title"/>
            </a>
        </div>
        <div id="menu">
            <ul id="menu-demo2">
                <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/Ecostat/"/>Accueil</a></li>

                <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/Ecostat/vue/sondage/">Sondage</a></li>

                <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/Ecostat/vue/quizz/">Quizz</a></li>

                <li><a href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/Ecostat/vue/enquete/">Enquête</a></li>

            </ul>

        </div>
    </header>
    <div id="bloc_page">
    <div id="navigation">
                <p>Il est actuellement <span id="heure"></span>.</p>
            </div>



            <div class="corps"><?= $contenu ?></div>

            <footer>
                <div id="navigation">

                    <p id="copy">Copyrights</p>

                </div>

                <div id="bottom">
                    <p>ECOSTAT &copy; 2015<br />
                        Developped by SIOKLM<br />
                </div>
            </footer>


            <?php include($_SERVER['DOCUMENT_ROOT'] . '/Ecostat/vue/top.php'); ?>

    </body>
</html>
