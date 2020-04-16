
<?php
is_connect();
// echo $_SESSION['user']['nom'];
// echo $_SESSION['user']['prenom'];
// echo $_SESSION['user']['login'];
// echo $_SESSION['user']['profil'];
// echo $_SESSION['user']['photo'];


?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="./public/css/admin.css">
    </head>
    <body>
        <div class="cadre">
            <div class="header_cadre">
                <div class="Pgauche">CREEZ ET PARAMETTREZ VOS QUIZZ</div>
                <div class="Pdroite"><button class="btn_decon"><a href="index.php?statut=logout"> DECONNEXION</a></button></div>
            </div>
            <div class="gauche">
                <div class="entete">
                    <div class="avatar"><img src="<?=$_SESSION['user']['photo']?>" class="photo"alt="avatar"></div>
                    <div class="id"><?= $_SESSION['user']['prenom'].'<br>'.$_SESSION['user']['nom']; ?></div>
                </div>
                <div class="liste">

                    <div class="li"><div class="icone1"></div><a href="#" class="li_1">Liste des Questions</a></div>
                    <div class="li"><div class="icone2"></div><a href="page/creerAdmin.php" class="li_1">Creer Admin</a><img src="" alt=""></div>
                    <div class="li"><div class="icone3"></div><a href="index.php?lien=accueil" class="li_1">Liste Joueur</a><img src="" alt=""></div>
                    <div class="li"><div class="icone4"></div><a href="#"class="li_1">Creer Questions</a><img src="" alt=""></div>
                </div>
            </div>
             <div class="droite">
                <div class="title">LISTE DES JOUEURS PAR SCORE</div>
                <div class="Listjoueur">
                    <table>
                        <thead>
                            <tr>
                                <td>nom</td>
                                <td>prenom</td>
                                <td>score</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>FATOU</td><td>NIANG</td><td>1122pts</td></tr>
                            <tr><td>COURA SARR</td><td>gueye</td><td>922pts</td></tr> 
                            <tr><td>FEDIOR</td><td>MOUHAMADOU</td><td>662pts</td></tr>
                            <tr><td>RACHID</td><td>BADJI</td><td>422pts</td></tr>
                            <tr><td>SECK</td><td>NAZIROU</td><td>223pts</td></tr>
                            <tr><td>Thiam</td><td>MOR</td><td>522pts</td></tr>
                            <tr><td>Elhadji</td><td>Ngom</td><td>272pts</td></tr>
                            <tr><td>Maty</td><td>diop</td><td>228pts</td></tr>
                            <tr><td>MOUhamadou habib</td><td>Diop</td><td>220pts</td></tr>
                            <tr><td>papa maguette</td><td>thioune</td><td>822pts</td></tr>
                        </tbody>
                    </table>
                </div>
            <div class="btnSuiv"> <button>suivant</button> </div>
        </div>
    </body>
</html>
