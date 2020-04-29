<?php

function getData($file="users"){
    $data= file_get_contents("./data/".$file.".json");
    $data= json_decode($data, true);
    return $data;
}
function getQuestion($file="question"){
    $data= file_get_contents("./data/".$file.".json");
    $data= json_decode($data, true);
    return $data;
}
function connexion($login,$pwd){
    $users=getData();
    foreach ($users as $key => $user) {
        if ($user["login"]===$login && $user["pwd"]===$pwd) {
            $_SESSION['user']=$user;
            $_SESSION['statut']='login';
            if ($user['profil']==='admin') {
                return 'accueil';
            }else{
                return 'jeux';
            }
        }  
    }
        return 'error';
}

function is_connect(){
    if(!isset($_SESSION['statut'])){
        header('location:index.php');
    }
}


function deconnexion(){
    unset($_SESSION['user']);
    unset($_SESSION['statut']);
    session_destroy();
}
function avatar(){
    $erreur="";
        $fileName=$_FILES['avatar']['name'];
        $fileTmp=$_FILES['avatar']['tmp_name'];
        $fileType=$_FILES['avatar']['type'];
        $fileSize=$_FILES['avatar']['size'];
        $fileError=$_FILES['avatar']['error'];
        $fileExt= explode(".", $fileName);
        $fileActualExt= strtolower(end($fileExt));
        $allow=array('jpeg','png');
        if (in_array($fileActualExt, $allow)) {
            if ($fileError===0) {
                if ($fileSize < 1000000) {
                    $fileNameNew= uniqid('', true).'.'.$fileActualExt;
                    $destination="C:/xampp/htdocs/sonatelAcademyPhp/mini_projet/public/Images/".$fileNameNew;
                        move_uploaded_file($fileTmp, $destination);
                }else {
                    $erreur='votre image est trop grande';
                }
            }else{
                $erreur='erreur de telechargement';
            }
        }else{
            $erreur='nous ne connaissos pas cette extension';
        }
    }
// }
function validation($login, $pwd, $pwdConfirm){
    $erreur='';
$data=getData();
foreach ($data as $key => $value) {
    if ($login == $value['login']) {
        $erreur='ce login existe deja';
    }else{
        if($pwd!=$pwdConfirm){
            $erreur='les mots de passe doivent etre  identique';
            }
        }
    }
}
// inscrire un admin ou joueur

function ADD_User($login){
    $data= file_get_contents('./data/users.json');
    $data_user= json_decode($data, true);
    $erreur='';
    $sucess='';
    foreach ($data_user as $key => $value) {
        if ($login == $value['login']) {
            $erreur='ce login existe deja';
        break;
        }else{
            if($_POST['pwd']!=$_POST['pwdConfirm']){
                $erreur='les mots de passe doivent etre  identique';
            break;
            }else{
                $avatar=avatar();
                $data=[
                    'nom'=>$_POST['nom'],
                    'prenom'=>$_POST['prenom'],
                    'login'=>$_POST['login'],
                    'pwd'=>$_POST['pwd'],
                    'pwdConfirm'=>$_POST['pwdConfirm'],
                    'avatar'=> $avatar
                ];
            }
        }
    }
    if (!empty($erreur)) {
        echo'<p color="red">'.$erreur.'</p>';
    }
    if(!empty($data) && empty($erreur)){
        $data_user[]=$data;
        $data_user= json_encode($data_user);
        file_put_contents('./data/users.json',$data_user);  
        echo $sucess='<p color="green">enregistrement effectué avec succes</p>'; 
        
        $_POST['nom']= '';
        $_POST['prenom']= '';
        $_POST['login']= '';
        $_POST['pwd']= '';
        $_POST['pwdConfirm']= '';
        $_FILES['avatar'];
    }
}
function recupRep($rep, $checkbox){
    
}