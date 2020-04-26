<?php
$erreur="";
if (isset($_POST['btn_submit'])) {
   $login=$_POST['login'];
   $pwd=$_POST['pwd'];
   if(empty($login) && empty($pwd)){
       $erreur='login et mot de passe obligatoire';
   }else{
        $result=connexion($login, $pwd);
        if($result=="error"){
            $erreur= "Login ou mot de passe incorrecte";
        }else{
            header("Location:index.php?lien=".$result);
        }
    }
}
?>
<div class="container">
    <div class="container_header">
        <div class="title">Login Form</div>
    </div>
    <div class="container_body">
        <form action="" method="post" id="form-connexion">
        <div class="error-form" id="error-1"><?= $erreur ?></div>
            <div class="input-form">
               <div class="icon-form icon-form-login"></div>
               <input type="text" class="form-control" name="login" error="error-1" placeholder="login">
               
            </div>
            <div class="input-form">
               <div class="icon-form icon-form-pwd"></div>
               <input type="password" class="form-control" name="pwd" error="error-2" placeholder="password">
               <!-- <div class="error-form" id="error-2"><?= $erreur ?></div> -->
            </div>
            <div class="input-form">
               <button type="submit" class="btn-form" name="btn_submit"> connexion</button>
               <a href="index.php?lien=inscription" class="link-form">S'inscrire pour jouer ?</a>
            </div>
        </form>
    </div>
</div>
<script>
     const inputs= document.getElementsByTagName("input");
        for(input of inputs){
             input.addEventListener("keyup", function(e){
                if(e.target.hasAttribute("error")){
                     var idDivError=e.target.getAttribute("error");
                     document.getElementById(idDivError).innerText=""
             }
        })
     }

 document.getElementById("form-connexion").addEventListener("submit",function(e){
    const inputs= document.getElementsByTagName("input");
     var error=false;
        for(input of inputs){
            if(input.hasAttribute("error")){
                var idDivError=input.getAttribute("error");
                     if(!input.value){
                            document.getElementById(idDivError).innerText=" * Ce champs est obligatoire *"
                            error=true
                    }
            } 
        }
 if(error){
     e.preventDefaut();
     return false;
 }
})
</script>