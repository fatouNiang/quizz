<?php is_connect();
$user=$_SESSION['user'];?>
<div class="cadre">
   <div class="header_cadre">
        <div class="Pgauche">CREEZ ET PARAMETTREZ VOS QUIZZ</div>
        <div class="Pdroite"><button class="btn_decon"><a href="index.php?statut=logout"> DECONNEXION</a></button></div>           
    </div>
    <div class="gauche">
        <div class="entete">
            <div class="avatar"><img src="./public/Images/<?=$user['avatar']?>" alt="" style="width:100px; height:100px; border-radius:100px;"></div>
            <div><?= $user['prenom'].'<br>'.$user['nom']; ?></div>
        </div>
        <div class="liste">
            <div class="li"><a href="index.php?lien=accueil&bloc=listeQuestion" class="li_1">Liste des Questions</a><div class="icone1"></div></div>
            <div class="li"><a href="index.php?lien=accueil&bloc=creerAdmin" class="li_1">Creer Admin</a><div class="icone2"></div></div>
            <div class="li"><a href="index.php?lien=accueil&bloc=listeJoueur" class="li_1">Liste Joueur</a><div class="icone3"></div></div>
            <div class="li"><a href="index.php?lien=accueil&bloc=creerQuestion"class="li_1">Creer Questions</a><div class="icone4"></div></div>
        </div>
    </div>
    <div class="droite">
       <?php
        if(isset($_GET['bloc'])){
            $url=$_GET['bloc'];
            if ($url=='listeQuestion') {
                include('listeQuestion.php');
            }elseif($url=='creerAdmin'){
                include('creerAdmin.php');
            }elseif($url=='listeJoueur'){
                include('listeJoueur.php');
            }elseif($url=='creerQuestion'){
                include('creerquestion.php');
            }
        }else{
            include('listeJoueur.php');
        }
       ?>
    </div>