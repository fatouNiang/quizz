<?php
$erreur='';
if (isset($_POST['creer_compte'])){
    if(empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['login']) && empty($_POST['pwd']) 
    && empty($_POST['pwdConfirm']) && empty($_FILES['avatar'])){
        $erreur='* Tous les champs sont obligatoires *';
    }else{

        $data['nom']=$_POST['nom'];
        $data['prenom']=$_POST['prenom'];
        $data['login']=$_POST['login'];
        $data['pwd']=$_POST['pwd'];
        $data['pwdConfirm']=$_POST['pwdConfirm'];
        $fileName=$_FILES['avatar']['name'];
        $fileType=$_FILES['avatar']['type'];
        $fileSize=$_FILES['avatar']['size'];
        $fileTmp=$_FILES['avatar']['tmp_name'];
        $fileError=$_FILES['avatar']['error'];
        $fileExt= explode(".", $fileName);
        $fileActualExt= strtolower(end($fileExt));
        $allow=array('jpg','jpeg','png');
        if (in_array($fileActualExt, $allow)) {
            if ($fileError===0) {
                if ($fileSize<1000000) {
                    $fileNameNew= uniqid('', true).'.'.$fileActualExt;
                    $destination="C:/xampp/htdocs/sonatelAcademyPhp/mini_projet/public/Image/".$fileNameNew;
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
        // $dossier="C:\xampp\htdocs\sonatelAcademyPhp\mini_projet\public\Image";
        // $_FILES['avatar']['name'];
        // $_FILES['avatar']['tmp_name'];
        // if ($_FILES['avatar']['error']> 0) {
        //     $erreur='erreur lors du transfert';
        // }else{
        //     $tmp_name=$_FILES['avatar']['tmp_name'];
        //     $name= basename($_FILES['avatar']['name']);
        //     $data['avatar']= move_uploaded_file($tmp_name, $dossier/$name);
        // }      
        $js= file_get_contents('./data/listeJoueur.json');
        $js=json_decode($js, true);
        foreach($js as $key =>$joueur){
            if($data['login'] === $joueur['login']){
                $erreur='ce login existe deja';
            }else{
                $js[]=$data;
                $js= json_encode($js);
                file_put_contents('./data/listeJoueur.json', $js);
                header('location:./');
            }
        }
        }
    }
