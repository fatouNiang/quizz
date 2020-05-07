<?php
is_connect();
$user=$_SESSION['user'];
$dataUser= getData();
$nbrQuestion=parametres();
// foreach ($data as $key => $value) {
//     if($key['TypeReponse']=='simple'){
//         echo "amoukh";
//     }
// }


?>
        <div id="frame">
            <div class="headerframe">
                <div class="profil" style="background-image:url(./public/Images/<?=$user['avatar']?>);
                    background-repeat:no-repeat; background-size:cover;">
                    
                   <div class="p"> <?php echo $user['prenom'].' '.$user['nom']; ?></div>
                </div>
                <div class="haut">BIENVENU DANS LA PLATEFORME DE JEU QUIZZ<br>JOUER ET TESTER VOTRE NIVEAU DE CULTURE GENERALE</div>
                <div class="deconnexion">
                    <button class="bdecon"><a href="index.php?statut=logout"> Déconnexion</a></button>
                </div>
            </div>
            <div class="sousCadre">
                <div class="sousCadre1">
                <?php $data=getQuestion();
                    // shuffle($data);
                    $nbrParPge=1;
                    $total=count($data);
                    $nbrDePage=$nbrQuestion;
                    if(isset($_GET['page'])){
                        $pageActuelle=$_GET['page'];
                        if($pageActuelle>$nbrDePage){
                            $pageActuelle=$nbrDePage;
                        }
                    }else{
                        $pageActuelle=1;
                    }
                   $pageDebut=($pageActuelle-1)*$nbrParPge;
                   $pageFinal= $pageDebut+ $nbrParPge-1;
                   for ($i=$pageDebut; $i <=$pageFinal ; $i++) { 
                       if(isset($data[$i])){?>
                            <div class="question">question <?=$pageActuelle.'/'.$nbrQuestion.'<br>'.
                                $data[$i]['question']
                            ?>
                            
                            </div>
                            <div class="point">
                                <h5><?=$data[$i]['nbrPoint']?> point</h5>
                            </div>
                            <div class="forms">
                                <form action="" method="post">
                                <?php if($data[$i]['TypeReponse']=='simple'){
                                    foreach ($data[$i]['reponse'] as $key => $val){
                                        echo'<br>';
                                        echo'<input type="radio" value="" name="rep1[]">';
                                        echo $val;
                                    }
                                    
                                }elseif($data[$i]['TypeReponse']=='multiple'){
                                    foreach ($data[$i]['reponse'] as $key => $val) {
                                        echo'<br>';
                                        echo'<input type="checkbox" name="rep2[]">';
                                        echo $val;
                                    }
                                }else{
                                    echo'<input type="text" name="rep3">';
                                }
                            ?>
                            </div>
                            <?php }
                            } ?>
                   <div class="btn">
                    <?php
                    if($pageActuelle<=1){?>
                        <div class="suivant">
                            <button class="dep">
                            <a href="index.php?lien=jeux&page=<?=$pageActuelle+1?>">Suivant</a>
                            </button>
                        </div>
                    <?php 
                    }elseif($pageActuelle==$nbrDePage){?>
                        <div class="precedent">
                                <button class="dep">
                                <a href="index.php?lien=jeux&page=<?=$pageActuelle-1?>">precedent</a>
                                </button>
                            </div>
                            <div class="suivant">
                            <input class="dep" type="submit" name="terminer" value="terminer">
                                <a href="index.php?lien=jeux&page=<?=$pageActuelle+1?>"></a>
                            <!-- </button> -->
                            </div>
                    <?php 
                     }else{ ?>
                        <div class="precedent">
                            <button class="dep">
                            <a href="index.php?lien=jeux&page=<?=$pageActuelle-1?>">precedent</a>
                            </button>
                        </div>
                        <div class="suivant">
                        <button class="dep">
                            <a href="index.php?lien=jeux&page=<?=$pageActuelle+1?>">Suivant</a>
                        </button>
                        </div>
                        </form>
                    <?php 
                     }
                ?>
                    </div>
                </div>
                <?php 
                if (isset($_POST['terminer'])){
                    var_dump($_POST);
                    $rep1=$_POST['rep1'];
                    $rep2=$_POST['rep2'];
                    $rep3=$_POST['rep3'];
                    $tab=[$rep1,$rep2,$rep3];
                    var_dump($tab);
                }
                ?>
                <div class="sousCadre2">
                    <div class="topEtMeilleurScore"> 
                        <div class="TS"><a href="index.php?lien=jeux&score=topScore" class="a">Top Scores</a></div>
                        <div class="MS"> <a href="index.php?lien=jeux&score=meilleurScore" class="b">Meilleure Score</a></div>
                    </div>
                    <?php
                    if (isset($_GET['score'])) {
                        $url=$_GET['score'];
                        if($url=='topScore'){
                            include('topScore.php');
                        }if ($url=='meilleurScore') {
                            include('meilleurScore.php');
                        }
                    }else{
                        include('topScore.php');
                    }
                    ?>
                </div>
            </div>
        </div>