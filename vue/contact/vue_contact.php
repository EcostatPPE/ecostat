<?php
ob_start();
?>

<form action="/Ecostat/controleur/contact/controlclick.php" method="POST">
    Objet : <br><br>
    <input name="objet" placeholder="Objet" value=""><br><br>
    Message :<br><br>
    <textarea rows="10" cols="60" placeholder="Entrer votre message ici"></textarea><br><br>
    <input type="submit" name="envoi" value="Envoyer">
</form>


<?php
$contenu = ob_get_clean();
