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
                        'profil'=>'admin'
                    ];
                    if(!empty($tabUser) && empty($erreur)){
                        $data[]=$tabUser;
                        $data= json_encode($data);
                        file_put_contents('./data/users.json',$data);  
                        header('location: index.php?lien=accueil');
                    }
                }
            }
        }
    }
}
?>
            <h1>S'INSCRIRE</h1>
            <p>Pour proposer des quizz</p>
            <div class="form">
                <?= $erreur?>
                <form action="" method="POST" enctype="multipart/form-data" id="inscription">
                    <label for="">Nom</label><br>
                    <input type="text" name="nom" placeholder="Joo" id="nom" class="input"><br>
                    <label for="">Prenom</label><br>
                    <input type="text" name="prenom" placeholder="Wwww" id="prenom"class="input"><br>
                    <label for="">Login</label><br>
                    <input type="text" name="login" placeholder="AaaaBBB" id="login"class="input"><br>
                    <label for="">Password</label><br>
                    <input type="password" name="pwd" placeholder="******" id="pwd" class="input"><br>
                    <label for="">Confirmer Password</label><br>
                    <input type="password" name="pwdConfirm" placeholder="******" id="pwdConfirm" class="input"><br>
                    <label for="">Avatar</label>
                    <div class="btn-fichier"><input type="file" name="avatar" value="choisir un fichier" id="image" class="bouton" onchange="loadFile(event)"><img id="images" class="tof"/></div></div>
                    <div class="btn-creerCompt"><input type="submit" name="creer_compte" value="Creer Compte" class="bouton"></div>
                </form>
            </div>
            <div class="partiAvatarAdmin">
                <div class="avatar"></div>
                <!-- <img src="" class="avatar" alt=""> -->
                <div class="nom">Avatar du joueur</div>
            </div>
<script>
var loadFile = function(event) {
var output = document.getElementById('images');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
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
   
});
</script>