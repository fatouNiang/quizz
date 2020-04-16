<?php
// is_connect();
// echo $_SESSION['user']['nom'];
// echo $_SESSION['user']['prenom'];
// echo $_SESSION['user']['login'];
// echo $_SESSION['user']['profil'];
// echo $_SESSION['user']['photo'];


?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="../public/css/admin.css">
    </head>
    <body>
        <div class="cadre">
            <div class="header_cadre">
                <div class="Pgauche">CREEZ ET VOS QUIZZ</div>
                <div class="Pdroite"><button class="btn_decon"><a href="index.php?statut=logout"> DECONNEXION</a></button></div>
            </div>
            <div class="gauche">
                <div class="entete">
                    <div class="avatar">
                        <img src="../public/Images/img5.jpg" class="photo" alt="avatar">
                    </div>
                    <div class="id">Aaaa <br>Bbbbb</div>
                </div>
                <div class="liste">

                    <div class="li"><div class="icone1"></div><a href="#" class="li_1">Liste des Questions</a></div>
                    <div class="li"><div class="icone2"></div><a href="#" class="li_1">Creer Admin</a><img src="" alt=""></div>
                    <div class="li"><div class="icone3"></div><a href="#" class="li_1">Liste Joueur</a><img src="" alt=""></div>
                    <div class="li"><div class="icone4"></div><a href="#"class="li_1">Creer Questions</a><img src="" alt=""></div>
                </div>
            </div>
            <div class="Partiedroite">
                <div class="sousPartiegauche">
                    <div class="titre">S'INSCRIRE</div>
                    <div class="sous_title">Pour proposer des quizz</div>
                    <div class="form">
                        <form action="" method="POST">
                            <label for="">Nom</label><br>
                            <input type="text" name="nom" class="input_form" placeholder="Joo"><br>
                            <label for="">Prenom</label><br>
                            <input type="text" name="prenom" class="input_form" placeholder="WWW"><br>
                            <label for="">Login</label><br>
                            <input type="text" name="login" class="input_form" placeholder="Jow"><br>
                            <label for="">Password</label><br>
                            <input type="password" name="password" class="input_form" placeholder="********"><br>
                            <label for="">Confirmer Password</label><br>
                            <input type="password" name="password" class="input_form" id="" placeholder="********"><br>
                            <div>
                                <label for="">Avatar</label>
                                <div class="choise"><input type="submit" name="choisir_fichier" value="choisir un fichier" class="bouton"><br></div>
                                <div class="send"><input type="submit" name="creer_compte" value="Creer Compte" class="bouton"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="sousPartiedroite">
                    <div class="avatar_admin"><img src="../public/Images/img5.jpg" class="photo" alt="avatar"></div>
                    <div>Avatar Admin</div>
                </div>
        </div>
    </body>
</html>
