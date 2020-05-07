<?php
require_once("const.php");
$erreur='';
if (isset($_POST['creer_compte'])){
    $nom=htmlspecialchars(trim($_POST['nom']));
    $prenom=htmlspecialchars(trim($_POST['prenom']));
    $login=htmlspecialchars(trim($_POST['login']));
    $pwd=htmlspecialchars(trim($_POST['pwd']));
    $pwdConfirm=htmlspecialchars(trim($_POST['pwdConfirm']));
    if(empty($nom) || empty($prenom) || empty($login) || empty($pwd) || empty($pwdConfirm)){
       $erreur= 'tous les champs sont obligatoires'; 
    }else{
        $data=getData();
        foreach ($data as $key => $value) {
            if ($_POST['login'] != $value['login']) {
                if($pwd==$pwdConfirm){
                    $photo=$_FILES['avatar']['name'];
                    $fileTmp=$_FILES['avatar']['tmp_name'];
                    $fileType=$_FILES['avatar']['type'];
                    $fileSize=$_FILES['avatar']['size'];
                    $fileError=$_FILES['avatar']['error'];
                    if (isset($photo)) {
                        if ($fileError===0) {
                            if ($fileSize < 1000000) {
                                $destination="C:/xampp/htdocs/sonatelAcademyPhp/mini_projet/public/Images/".$photo;
                                    move_uploaded_file($fileTmp, $destination);
                            }else {
                                $erreur='votre image est trop grande';
                            }
                        }else{
                            $erreur='erreur de telechargement';
                        }
                    }


                    $tabUser=[
                        'nom'=>$nom,
                        'prenom'=>$prenom,
                        'login'=>$login,
                        'pwd'=>$pwd,
                        'pwdConfirm'=>$pwdConfirm,
                        'avatar'=> $photo,
                        'score'=> 13,
                        'profil'=>'joueur'
                    ];
                    if(!empty($tabUser) && empty($erreur)){
                        $data[]=$tabUser;
                        $data= json_encode($data);
                        file_put_contents('./data/users.json',$data);  
                        header('location: index.php');
                    }
                }else{
                    $erreur='les mots de passe doivent etre  identique';
                }
            }else{
                $erreur='ce login existe deja';
            }
        }
    }
}
 
?>
<div id="cadre">
    <h1>S'INSCRIRE</h1>
    <p>Pour tester votre niveau de culture generale</p>
    <div class="form">
    <div class="error-form" id="erreur"><?= $erreur ?></div>
        <form action="" method="POST" enctype="multipart/form-data" id="inscription" >
            <label for="">Nom</label><br>
            <input type="text" name="nom" placeholder="Aaaa" class="input" id="nom" error="error-1"><br>
            <div class="error-form" id="error-1"></div>
            <label for="">Prenom</label><br>
            <input type="text" name="prenom" placeholder="Bbbb" class="input" id="prenom" error="error-2"><br>
            <div class="error-form" id="error-2"></div>
            <label for="">Login</label><br>
            <input type="text" name="login" placeholder="AaaaBBB" class="input" id="login" error="error-3"><br>
            <div class="error-form" id="error-3"><?= $erreur ?></div>
            <label for="">Password</label><br>
            <input type="password" name="pwd" placeholder="******" class="input" id="pwd" error="error-4"><br>
            <div class="error-form" id="error-4"></div>
             <label for="">Confirmer Password</label><br>
            <input type="password" name="pwdConfirm" placeholder="******" id="pwdConfirm" class="input" ><br>
            <div class="error-form" id="error-5"><?= $erreur ?></div>
            <label for="">Avatar</label>
            <div class="btn-fichier">
                <input type="file" accept="image/png, image/jpeg" name="avatar" value="choisir un fichier"
                class="" error="error-5" id="image" onchange="loadFile(event)" ></div>
            <div class="error-form" id="error-6"></div>
            <div class="btn-creerCompt"><input type="submit" name="creer_compte" value="Creer Compte" class="bouton"></div>
            
        </form>
    </div>
    <div class="partiAvatar">
        <div class="avatarInscriptionJoueur"><img id="images"style="width:160px; height:160px; border-radius:100px;"/></div>
        <div class="nomJoueur">Avatar du joueur</div>
    </div>
</div>
<script>
var loadFile = function(event) {
var output = document.getElementById('images');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  </script>
<script src="./public/js/app.js"></script>
