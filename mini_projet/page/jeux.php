Joueur
<?php
is_connect();
echo $_SESSION['user']['nom'];
echo $_SESSION['user']['prenom'];
echo $_SESSION['user']['login'];
echo $_SESSION['user']['profil'];
echo $_SESSION['user']['photo'];
?>
<a href="index.php?statut=logout">deconnexion</a>