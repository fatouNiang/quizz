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
<div id="cadre">
    <h1>S'INSCRIRE</h1>
    <p>Pour tester votre niveau de culture generale</p>
    <div class="form">
    <?= $erreur ?>
        <form action="" method="POST" enctype="multipart/form-data" id="inscription">
            <label for="">Nom</label><br>
            <input type="text" name="nom" placeholder="Aaaa" class="input"><br>
            <label for="">Prenom</label><br>
            <input type="text" name="prenom" placeholder="Bbbb" class="input"><br>
            <label for="">Login</label><br>
            <input type="text" name="login" placeholder="AaaaBBB" class="input"><br>
            <div class="error-form" id="error-1"></div>
            <label for="">Password</label><br>
            <input type="password" name="pwd" placeholder="******" class="input"><br>
             <label for="">Confirmer Password</label><br>
            <input type="password" name="pwdConfirm" placeholder="******" id="" class="input"><br>
            <label for="">Avatar</label>
            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="12345" /> -->
            <div class="btn-fichier"><input type="file" accept="image/*" name="avatar" value="choisir un fichier" class="bouton"></div>
            <div class="btn-creerCompt"><input type="submit" name="creer_compte" value="Creer Compte" class="bouton"></div>
        </form>
    </div>
    <div class="partiAvatar">
        <div class="avatar"></div>
                <!-- <img src="../public/Images/img5.jpg" class="avatar" alt=""> -->
    </div>
        <div class="nom">Avatar du joueur</div>
</div>
<script src="../public/js/app.js"></script>