<?php
$nbr='';
if(isset($_POST['ok'])){
       
    if(!empty($_POST['nbr']) && $_POST['nbr']>=5){
        $nbr=$_POST['nbr'];
        $data=parametres();
         $data=['nbrQuestion'=>$nbr];
         $data=json_encode($data);
         file_put_contents("./data/parametres.json",$data);
    }
}
?>
<div>
    <div class="nbrQuestion">
    <span style="color:red" id="erreur"></span>
        <form action="" method="post" id="form">
        Nombre de question/jeu <input type="number" name="nbr" value="<?=$data['nbrQuestion']?>" id="nbr" class="InputnbrQuestion" onkeyup="valider()">
            <input type="submit" name="ok" value="ok">
        </form>    
    </div>
    <div class="listQuestion">
        <?php
            $data=getQuestion();
            $nbrParpage=5;
            $total=count($data);
            $nbrDePage=ceil($total/$nbrParpage);
            if(isset($_GET['page'])){
                $pageActuelle=$_GET['page'];
            }else{
                $pageActuelle=1;
            }
            if ($pageActuelle<1) {
                $pageActuelle=1;
            }else if($pageActuelle>$nbrDePage){
                $pageActuelle=$nbrDePage;
            }
            $pageDebut=($pageActuelle-1)*$nbrParpage;
            $pageFinal=$pageDebut+$nbrParpage-1;
            for($i=$pageDebut; $i<=$pageFinal; $i++){
                if(isset($data[$i])){?>

                    <div class="Titrequestion"><?=$data[$i]['question']?></div>
                    <div class="rep"><?php
                    if($data[$i]['TypeReponse']=='multiple'){
                       foreach ($data[$i]['reponse'] as $key => $value) {
                        $cle=$key;
                        $val=$value;
                            if(in_array($cle,$data[$i]['choix'])){
                                echo '<input style="color: black" type="checkbox" class="inputChoix" checked="checked">';
                                echo $val;
                                echo "<br>";
                            }else{
                                echo '<input type="checkbox" class="inputChoix">';
                                echo $val;
                                echo "<br>";
                            }
                 
                    }     
                    }elseif($data[$i]['TypeReponse']=='simple'){
                        foreach ($data[$i]['reponse'] as $key => $value) {
                            $cle=$key;
                            $val=$value;
                            if(in_array($cle,$data[$i]['choix'])){
                                echo '<input style="color: black" type="radio" checked="checked">';
                                echo $val;
                                echo "<br>";
                            }else{
                                echo '<input type="radio">';
                                echo $val;
                                echo "<br>";
                            }
                 
                    }     
                    }else{
                         ?>
                         <input type="texte" style="width:200px" value="<?php echo $data[$i]['reponse']; ?>" readonly="readonly">
                         <?php
                    }
                } 
            }  
                    ?></div> 

</div>

            <?php
           
            if ($pageActuelle <= 1){ ?>
                <div class="passer"><button class="btn-btn-primary suivantListQ"><a href="index.php?lien=accueil&bloc=listeQuestion&page=<?=$pageActuelle+1?>">suivant</a></button></div>
            <?php
            }else{ ?>
               <div class="passer"> 
                <button class="btn-btn-primary suivantListQ"><a href="index.php?lien=accueil&bloc=listeQuestion&page=<?= $pageActuelle +1?>">suivant</a></button>
                <button class="btn-btn-primary suivantListQ" style="margin-right:70%;"><a href="index.php?lien=accueil&bloc=listeQuestion&page=<?= $pageActuelle -1?>">precedent</a></button>
            </div>
        <?php            
            }
        ?> 
<script>
function valider(){
    // var erreur;
    // // var nbr= document.getElementById("nbr");
    // if(document.form.nbr.value<5){
    //     erreur="entrer un nombre superieur ou egale a 5"
    // }
    // document.getElementById("nbr").innerText=erreur;
    alert('ok')
}

</script>