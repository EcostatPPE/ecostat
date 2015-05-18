<?php ob_start(); ?>
            <section>
                <article>
                    <h1>Sondage</h1>

                <?php if (isset($_POST['selectionner'])){?>
    <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/Ecostat/controleur/sondage/controlesondage.php" method="POST">

        <fieldset>
        <legend><?= $idsond ?></legend>
            <?php $c=0;
                foreach ($questionsond as $questionsondage) { ?>
            <?= $questionsondage['libelleQuestion'] ?><br>
            <?php  $reponse = $tabrep[$c];?>
            <?php foreach ($reponse as $reponsesondage){ ?>
            <input name="reponse" type="radio" value="<?= $reponsesondage['libelle']?>" />
            <?= $reponsesondage['libelle']; ?><br>
            <?php }
                $c= $c+1;
             }
         ?>
        <br />
    <p>
        <input type="submit" name="go" value="Voter" />
        </fieldset>
    </p>
</form>
<?php } ?>
<center>

    <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/Ecostat/vue/sondage/" method="POST">
        <select name="id">
        <?php foreach ($theme as $sondages) { ?>
        <option value="<?= $sondages['libelleSondage'] ?>"><?= $sondages['libelleSondage']?></option>
        <?php } ?>
        </select>
        <input type="hidden" name="selectionner_sondage" value="1">
        <input type="submit" name="selectionner" value="Selectionner" /></center><br /><br />
    </form>
</article>
</section>

<?php $contenu = ob_get_clean(); ?>
