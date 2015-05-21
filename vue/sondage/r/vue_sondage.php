<?php ob_start(); ?>
<section>
    <article>
        <h1><?= $question['libelleQuestion'] ?></h1>
<?php
    foreach($reponses as $reponse){?>
        <span id="nostyle"><li>Réponse : <?= $reponse['libelle']?> - Nombre de réponses : <?= $reponse['compteur'] ?></li></span>
<?php } ?>
<br>
<a class="lienResultat" id="gros" href="/Ecostat/vue/sondage/">Retour aux sondages</a>
    </article>
</section>

<?php $contenu = ob_get_clean(); ?>
