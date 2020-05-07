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
            // if ($_SESSION['pageActuelle']<1) {
            //     $_SESSION['pageActuelle']=1;
            // }else if($_SESSION['pageActuelle']>$nbrDePage){
            //     $_SESSION['pageActuelle']=$nbrDePage;
            // }
            // $pageDeDebut=($_SESSION['pageActuelle']-1)*$nbrParpage;
            // $pageFinal=$pageDeDebut+$nbrParpage-1;
            // for($i=$pageDeDebut; $i<=$pageFinal; $i++){
            //     if(isset($data[$i])){?>
                <?php foreach($data as $val) ?>
                    <div class="Titrequestion"><?=$val['question']?></div>
                    <div class="rep"><?php 
                    if($data[$i][''])
                    ?></div> 



                <?php
        //     } 
        // }   
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