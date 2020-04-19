<?php
$erreur='';
if (isset($_POST['creer_compte'])){
    if(empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['login']) && empty($_POST['pwd']) 
    && empty($_POST['pwdConfirm'])){
        $erreur='* Tous les champs sont obligatoires *';
    }else{
        ADD_User($_POST['login']);
    }
}
?>
            <h1>S'INSCRIRE</h1>
            <p>Pour proposer des quizz</p>
            <div class="form">
                <?= $erreur?>
                <form action="" method="POST">
                    <label for="">Nom</label><br>
                    <input type="text" name="nom" placeholder="Joo" class="input"><br>
                    <label for="">Prenom</label><br>
                    <input type="text" name="prenom" placeholder="Wwww" class="input"><br>
                    <label for="">Login</label><br>
                    <input type="text" name="login" placeholder="AaaaBBB" class="input"><br>
                    <label for="">Password</label><br>
                    <input type="password" name="pwd" placeholder="******" class="input"><br>
                    <label for="">Confirmer Password</label><br>
                    <input type="password" name="pwdConfirm" placeholder="******" id="" class="input"><br>
                    <label for="">Avatar</label>
                    <!-- <div class="btn-fichier"><input type="file" name="avatar" value="choisir un fichier" class="bouton"></div> -->
                    <div class="btn-creerCompt"><input type="submit" name="creer_compte" value="Creer Compte" class="bouton"></div>
                </form>
            </div>
            <div class="partiAvatarAdmin">
                <div class="avatar"></div>
                <!-- <img src="../public/Images/img5.jpg" class="avatar" alt=""> -->
            </div>
            <div class="nom">Avatar du joueur</div>
