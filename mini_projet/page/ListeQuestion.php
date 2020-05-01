<div>
    <div class="nbrQuestion">nombre de question/jeu
     <input type="text" name="" value="5" id="">
     <button type="button">ok</button>
    </div>
    <div class="listQuestion">
        <?php
            $data=getQuestion();
            $nbrParpage=5;
            $total=count($data);
            $nbrDePage=ceil($total/$nbrParpage);
            if(isset($_GET['page'])){
                $_SESSION['pageActuelle']=$_GET['page'];
            }else{
                $_SESSION['pageActuelle']=1;
            }
            if ($_SESSION['pageActuelle']<1) {
                $_SESSION['pageActuelle']=1;
            }else if($_SESSION['pageActuelle']>$nbrDePage){
                $_SESSION['pageActuelle']=$nbrDePage;
            }
            $pageDeDebut=($_SESSION['pageActuelle']-1)*$nbrParpage;
            $pageFinal=$pageDeDebut+$nbrParpage-1;
            for($i=$pageDeDebut; $i<=$pageFinal; $i++){
                if(isset($data[$i])){?>

                    <div class="Titrequestion"><?=$data[$i]['question']?></div>
                    <div class="rep"><?php
                    if($data[$i]['TypeReponse']=='multiple'){
                       foreach ($data[$i]['reponse'] as $key => $value) {
                        $cle=$key;
                        $val=$value;
                            if(in_array($cle,$data[$i]['choix'])){
                                echo '<input style="color: black" type="checkbox" class="ch" checked="checked">';
                                echo $val;
                                echo "<br>";
                            }else{
                                echo '<input type="checkbox" class="ch">';
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
                    ?></div> 



                <?php
            } 
        }   
            if ($_SESSION['pageActuelle'] > 1){ ?>
                <div><button><a href="index.php?lien=accuiel&bloc=listeQuestion?page=<?= $pageActuelle-1?>" class="btn-btn-primary" >£laquo; precedent</a></button></div>
                <?php }
                if ($_SESSION['pageActuelle'] < $nbrDePage ){ ?>
               <div class="passer"> <button class="suivantListQ"><a href="index.php?lien=accuiel&bloc=listeQuestion&page=<?= $_SESSION['pageActuelle'] +1?>" > suivant</a></button></div>
            <?php            
                 }
                ?> 
    <!-- </div> -->
    
    <!-- <div class="passer"><button class="suivantListQ">suivant</button></div> -->
</div>   