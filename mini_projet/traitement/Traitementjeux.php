<?php
session_start();
if (isset($_POST['submit'])) {
    // Je creer une autre question qui garde les index des question choisis pour ne pas qu'une meme question revienne
    $_SESSION['question_id'][]=$_POST['cle'];
    if ($_POST['type_reponse']=="simple") {
        // Pour chaquequestion je lui cree une session
        // sur cette session je lui donne un tableau avec comme valeur la clé de la question generé et les reponse fournis
       if(!isset($_POST['radio'])){
           $val='-1';
       }else{
           $val=$_POST['radio'];
       }
        $_SESSION['tabindex'][$_POST['page']]=array($_POST['cle'],$val);
    }elseif ($_POST['type_reponse']=="multiple") {
        if(!isset($_POST['check'])){
            $val[]="-1";
        }else{
            $val=$_POST['check'];
        }
        $_SESSION['tabindex'][$_POST['page']]=array($_POST['cle'],$val);
    }else {
        $_SESSION['tabindex'][$_POST['page']]=array($_POST['cle'],$_POST['texte']);
    }{

    }

    $i=(int)$_POST['page'];
    $i++;
    if (isset( $_SESSION['tabindex'][$_POST['page']])) {
        header("location:../index.php?lien=jeux&page=$i");
    }
    
}

if (isset($_POST['precedent'])) {
    $i=(int)$_POST['page'];
    $i--;
    header("location:../index.php?lien=jeux&page=$i");
}

?>