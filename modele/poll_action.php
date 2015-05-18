<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <?php include('include/style_import.php'); ?>

    <link rel="icon" type="image/ico" href="images/favicon.ico" />

    <script src="javascript/heure.js" language="javascript" type="text/javascript"></script>
    <script src="javascript/rotation.js" language="javascript" type="text/javascript"></script>

        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <title>ECOSTAT • Accueil</title>
    </head>

    <!--[if IE 6 ]><body class="ie6 old_ie"><![endif]-->
    <!--[if IE 7 ]><body class="ie7 old_ie"><![endif]-->
    <!--[if IE 8 ]><body class="ie8"><![endif]-->
    <!--[if IE 9 ]><body class="ie9"><![endif]-->
    <!--[if !IE]><!--><body><!--<![endif]-->
    <div id="bloc_page">
        <?php include("include/menu.php"); ?>

        <div id="navigation">

            <p>Il est actuellement <span id="heure"></span>.</p>

        </div>

        <body>
            <section>
                <article>

                    <h1>Merci d'avoir voté !</h1>

                    <?php
                            include 'db/conn_db.php';

    // on teste si formulaire de vote a été validé
                            if (isset($_POST['go']) && $_POST['go']=='Voter') {
                                if (!isset($_POST['reponse'])) {
                                    echo $erreur = 'Aucune réponse n\'a été choisie.';
                                }
                                else {

    // là le visiteur à choisi une réponse

    // on prépare notre requête : on ajoute un vote pour la réponse choisie par le votant

                                    $mysqli -> query('UPDATE tb_sondage SET compteur = compteur + 1 WHERE codeQ_Sondage="'.$_POST['envoi_sond'].'" AND id_reponse="'.$_POST['reponse'].'"') or die($mysqli -> error);
    // on ferme la connexion à la base de donnée

                                    echo '<p>Merci d\'avoir voté :)</p>';
}
}
?>

<br /><br /><br /><br /><br /><br /><br /><br /><br />
                    </article>

                    <?php include("include/aside.php"); ?>

                </section>

                <?php include ("include/footer.php"); ?>

                <?php include("include/top.php"); ?>

            </body>
            </html>
