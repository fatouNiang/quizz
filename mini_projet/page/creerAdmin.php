<?php
$erreur='';
if (isset($_POST['creer_compte'])){
    if(empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['login']) && empty($_POST['pwd']) 
    && empty($_POST['pwdConfirm'])){
        $erreur='* Tous les champs sont obligatoires *';
    }else{
        $data=getData();
        foreach ($data as $key => $value) {
            if ($_POST['login'] != $value['login']) {
                if($_POST['pwd']==$_POST['pwdConfirm']){
                    $photo=$_FILES['avatar']['name'];
                    if(!empty( $photo)){
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
                    }
                    
                    $tabUser=[
                        'nom'=>$_POST['nom'],
                        'prenom'=>$_POST['prenom'],
                        'login'=>$_POST['login'],
                        'pwd'=>$_POST['pwd'],
                        'pwdConfirm'=>$_POST['pwdConfirm'],
                        'avatar'=> $photo,
                        'profil'=>'admin'
                    ];
                    if(!empty($tabUser) && empty($erreur)){
                        $data[]=$tabUser;
                        $data= json_encode($data);
                        file_put_contents('./data/users.json',$data);  
                        header('location: index.php?lien=accueil');
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
            <h1>S'INSCRIRE</h1>
            <p>Pour proposer des quizz</p>
            <div class="form">
                <?= $erreur?>
                <form action="" method="POST" enctype="multipart/form-data" id="inscription">
                    <label for="">Nom</label><br>
                    <input type="text" name="nom" placeholder="Joo" id="nom" error="error-1" class="input"><br>
                    <div class="error-form" id="error-1"></div>
                    <label for="">Prenom</label><br>
                    <input type="text" name="prenom" placeholder="Wwww" id="prenom" error="error-2" class="input"><br>
                    <div class="error-form" id="error-2"></div>
                    <label for="">Login</label><br>
                    <input type="text" name="login" placeholder="AaaaBBB" id="login" error="error-3"class="input"><br>
                    <div class="error-form" id="error-3"><?= $erreur?></div>
                    <label for="">Password</label><br>
                    <input type="password" name="pwd" placeholder="******" id="pwd" error="error-4" class="input"><br>
                    <div class="error-form" id="error-4"><?= $erreur?></div>
                    <label for="">Confirmer Password</label><br>
                    <input type="password" name="pwdConfirm" placeholder="******" id="pwdConfirm"  class="input"><br>
                    <label for="">Avatar</label>
                    <div class="btn-fichier"><input type="file" name="avatar" value="choisir un fichier" error="error-5" id="image" class="bouton" onchange="loadFile(event)">
                    <img id="images"style="max-width:100px; height:100px; "/></div>
                    <div class="error-form" id="error-5"><?= $erreur?></div>
                    <div class="btn-creerCompt"><input type="submit" name="creer_compte" value="Creer Compte" class="bouton"></div>
                </form>
            </div>
            <div class="partiAvatarAdmin">
                <div class="avatarCreationAdmin"></div>
                <!-- <img src="" class="avatar" alt=""> -->
                <div class="nomAdmin">Avatar de l'administrateur</div>
            </div>
            <!-- <script src="./public/js/app.js"></script> -->
 <script>
var loadFile = function(event) {
var output = document.getElementById('images');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  </script>
  <!-- document.getElementById("pwdConfirm").addEventListener("input", function(){
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
</script> -->