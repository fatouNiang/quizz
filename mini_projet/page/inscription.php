<?php
$erreur='';
if (isset($_POST['creer_compte'])){
    if(empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['login']) && empty($_POST['pwd']) 
    && empty($_POST['pwdConfirm']) && empty($_FILES['avatar']['name'])){
        $erreur='* Tous les champs sont obligatoires *';
    }else{
        $data=getData();
        foreach ($data as $key => $value) {
            if ($_POST['login'] == $value['login']) {
                $erreur='ce login existe deja';
            break;
            }
            else{
                if($_POST['pwd']!=$_POST['pwdConfirm']){
                    $erreur='les mots de passe doivent etre  identique';
                break;
                }else {
                    $fileName=$_FILES['avatar']['name'];
                    $fileTmp=$_FILES['avatar']['tmp_name'];
                    $fileType=$_FILES['avatar']['type'];
                    $fileSize=$_FILES['avatar']['size'];
                    $fileError=$_FILES['avatar']['error'];
                    if (isset($fileName)) {
                        if ($fileError===0) {
                            if ($fileSize < 1000000) {
                                $destination="C:/xampp/htdocs/sonatelAcademyPhp/mini_projet/public/Images/".$fileName;
                                    move_uploaded_file($fileTmp, $destination);
                            }else {
                                $erreur='votre image est trop grande';
                            }
                        }else{
                            $erreur='erreur de telechargement';
                        }
                    }

                    $tabUser=[
                        'nom'=>$_POST['nom'],
                        'prenom'=>$_POST['prenom'],
                        'login'=>$_POST['login'],
                        'pwd'=>$_POST['pwd'],
                        'pwdConfirm'=>$_POST['pwdConfirm'],
                        'avatar'=> $fileName,
                        'score'=> 367,
                        'profil'=>'joueur'
                    ];
                    if(!empty($tabUser) && empty($erreur)){
                        $data[]=$tabUser;
                        $data= json_encode($data);
                        file_put_contents('./data/users.json',$data);  
                        header('location: index.php');
                    }
                }
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
        <form action="" method="POST" enctype="multipart/form-data" id="inscription" required>
            <label for="">Nom</label><br>
            <input type="text" name="nom" placeholder="Aaaa" class="input" id="nom" required><br>
            <div class="error-form" id="erreur"></div>
            <label for="">Prenom</label><br>
            <input type="text" name="prenom" placeholder="Bbbb" class="input" id="prenom" required><br>
            <div class="error-form" id="erreur"></div>
            <label for="">Login</label><br>
            <input type="text" name="login" placeholder="AaaaBBB" class="input" id="login" required><br>
            <div class="error-form" id="error-1"></div>
            <label for="">Password</label><br>
            <input type="password" name="pwd" placeholder="******" class="input" id="pwd" required><br>
            <div class="error-form" id="erreur"></div>
             <label for="">Confirmer Password</label><br>
            <input type="password" name="pwdConfirm" placeholder="******" id="pwdConfirm" class="input" required><br>
            <div class="error-form" id="erreur"><?= $erreur ?></div>
            <label for="">Avatar</label>
            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="12345" /> -->
            <div class="btn-fichier"><input type="file" accept="image/png, image/jpeg" name="avatar" value="choisir un fichier" class="bouton" id="image" onchange="loadFile(event)" required><img id="images" class="tof"/></div>
            <div class="btn-creerCompt"><input type="submit" name="creer_compte" value="Creer Compte" class="bouton"></div>
            <div class="error-form" id="erreur"></div>
        </form>
    </div>
    <div class="partiAvatar">
        <div class="avatar"></div>
                <!-- <img src="" class="avatar" alt=""> -->
    </div>
        <div class="nom">Avatar du joueur</div>
</div>

<script>
    var loadFile = function(event) {
    var output = document.getElementById('images');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) 
    }
  };
    document.getElementById("pwdConfirm").addEventListener("input", function(){
       var erreurSyntax= document.getElementById("erreur");
        if(this.value != document.getElementById("pwd").value){
            erreurSyntax.innerHTML="confirmer votre mot de passe";
        }else{
            erreurSyntax.innerHTML= "";
        }
    });
    document.forms["inscription"].addEventListener("submit", function(e){
    var erreur;
        var inputs = this;
        for(var i=0; i < inputs.length; i++){
            if(!inputs[i].value){
                erreur='veuillez remplire tous les champs';
                break
            }
        }
        if(erreur){
            e.preventDefault();
            document.getElementById("erreur").innerHTML=erreur;
            return false;
        }
        // var nom = document.getElementById("nom");
        // var prenom = document.getElementById("prenom");
        // var login = document.getElementById("login");
        // var pwd = document.getElementById("pwd");
        // var pwdConfirm = document.getElementById("pwdConfirm");
        // if(!nom.value){
        //     erreur ='renseignez le nom';
        // }
        // if(!prenom.value){
        //     erreur ='renseignez le prenom';
        // }
        // if(!login.value){
        //     erreur ='renseignez le login';
        // }
        // if(!pwd.value){
        //     erreur ='renseignez le nom';
        // }
       

    
});
</script>