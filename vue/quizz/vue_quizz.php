<?php ob_start(); ?>
<section>
    <article>
        <h1>Quizz</h1>

        <?php if (isset($_POST['selectionner'])){?>
        <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/Ecostat/controleur/quizz/controlclick.php" method="POST">

            <fieldset>
                <legend id="width"><?= $idQuizz ?></legend>
                <?php $c=0;
                foreach ($questionquizz as $questionsondage) { ?>
                <input type="hidden" name="idQuestion" value="<?= $questionsondage['codeQ_quizz'] ?>">
                <input type="hidden" name="repondu" value="yes">
                <?= $questionsondage['libelleQuestion'] ?><br>
                <?php  $reponse = $tabrep[$c];?>
                <select name="reponse">
                <?php foreach ($reponse as $reponsesondage){ ?>
                <option name="reponse[]" value="<?= $reponsesondage['idReponse']?>" />
                <?= $reponsesondage['libelle']; ?><br>
                <?php }?>
                </select><br><?php
                $c= $c+1;
                }
                ?>
                <input type="hidden" name="idSond" value="<?= $_POST['id']?>">
                <br />
                <p>
                    <input type="submit" value="Valider" />
            </fieldset>
            </p>
        </form>
    <?php } ?>
    <center>
        <?php if(isset($_SESSION['reponse'])){
    echo '<p>'.$_SESSION['reponse'].'</p>';
} if(!(isset($_SESSION['reponse']))){?>
        <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/Ecostat/vue/quizz/" method="POST">
            <select name="id">
                <?php foreach ($theme as $sondages) { ?>
                <option value="<?= $sondages['libelleQuizz'] ?>"><?= $sondages['libelleQuizz']?></option>
                <?php } ?>
            </select>
            <input type="hidden" name="selectionner_sondage" value="1">
            <input type="submit" name="selectionner" value="Selectionner" /></center><br /><br />
        </form>
    <?php } ?>
    </article>
</section>

<?php $contenu = ob_get_clean(); ?>
