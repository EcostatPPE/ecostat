<?php
ob_start();
?>

<form action="/Ecostat/controleur/contact/controlformclick.php" method="POST">
    Objet : <br><br>
    <input name="objet" placeholder="Objet" value="Contacter Ecostat"><br><br>
    Message :<br><br>
    <textarea name="message"rows="10" cols="60" placeholder="Entrer votre message ici"></textarea><br><br>
    <input type="submit" name="envoi" value="Envoyer">
</form>

<?php
$contenu = ob_get_clean();
