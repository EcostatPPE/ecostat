<?php ob_start(); ?>
            <section>
                <article>
                    <h1>Sondage</h1>

<?php if (isset($_POST['selectionner'])){?>
    <form action="poll_action.php" method="POST">

        <fieldset>
        <legend>Sondage: <?= $champ ?></legend>
        <?= $list ?>
        <br />
    <p>
        <input type="submit" name="go" value="Voter" />
        </fieldset>
    </p>
</form>
<?php } ?>
<center>
    <form action="<?php $_SERVER['DOCUMENT_ROOT'] ?>/Ecostat/vue/sondage/" method="GET">
        <select name="id">
            <?= $listsondage ?>
        </select>
        <input type="hidden" name="selectionner_sondage" value="1">
        <input type="submit" name="selectionner" value="Selectionner" /></center><br /><br />
    </form>
</article>
</section>

<?php $contenu = ob_get_clean(); ?>
