<?php
is_connect();
$user=$_SESSION['user'];
$dataUser= getData();
$nbrQuestion=parametres();
$data=getQuestion();
//   shuffle($data);

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
                <?php 
                    $nbrParPge=1;
                    $total=count($data);
                    $nbrDePage=$nbrQuestion['nbrQuestion'];
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
                            <div class="question">Question: <?=$pageActuelle.'/'.$nbrQuestion['nbrQuestion'].'<br>'.$data[$i]['question']?>
                            
                            </div>
                            <div class="point"><?=$data[$i]['nbrPoint']?> point</div>
                            <div class="forms">
                                <form action="" method="post">
                                <?php if($data[$i]['TypeReponse']=='simple'){
                                    foreach ($data[$i]['reponse'] as $key => $val){
                                        echo'<br>';
                                        echo'<input type="radio" name="choix" value="">';
                                        echo $val;
                                    }
                                    
                                }elseif($data[$i]['TypeReponse']=='multiple'){
                                    foreach ($data[$i]['reponse'] as $key => $val) {
                                        echo'<br>';
                                        echo'<input type="checkbox" name="choix" value="">';
                                        echo $val;
                                    }
                                }else{
                                    echo'<input type="text" name="repnse" value="">';
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
                    $tab=[
                        'choix'=>$_POST['choix'],
                        'reponse'=>$val,
                        'repSimple'=>$_POST['repnse'],
                    ];
                    var_dump($tab);
                    // foreach ($data as $key => $val) {
                    //     echo $val['question'].'<br>';
                    //     if($val['TypeReponse']=='simple'){
                    //         foreach($val['reponse'] as $key => $value){
                    //             $_SESSION['choix']=$_POST['choix'];
                    //             echo'<span style="color:red;">'.$_SESSION['choix'].'</span>';
                    //             if(in_array($key, $_SESSION['choix'])){
                    //                 echo"<br> ";
                    //                 echo'<input type="radio" checked="checked">';
                    //                 echo $value;
                    //             }else{
                    //                 echo"<br> ";
                    //                 echo" reponse fausse";
                    //                 echo'<input type="radio" >';
                    //                 echo $value;
                    //             }
                    //          }
                            
                    //     }elseif($val['TypeReponse']=='multiple'){
                    //         foreach($val['reponse'] as $key => $value){
                    //             $_SESSION['choix']=$_POST['choix'];
                    //             var_dump('<span style="color:blue;">'.$_SESSION['choix'].'</span>');
                    //             if(in_array($key, $_SESSION['choix'])){
                    //                 echo"<br> ";
                    //                 echo'<input type="checkbox" checked="checked">';
                    //                 echo $value;
                    //             }else{
                    //                 echo"<br> ";
                    //                 echo"mauvaise reponse ";
                    //                 echo'<input type="checkbox">';
                    //                 echo $value;
                    //             }
                    //          }
                            
                    // }else{
            //             $_SESSION['reponse']=$_POST['repnse'];
            //             var_dump('<span style="color:orange;">'.$_SESSION['choix'].'</span>');
            //             foreach($val['reponse'] as $key => $value){
            //                 if($_SESSION['reponse']==$value){
            //                     echo 'reponse vrai';
            //                     echo'<input type="text" >';
            //                 }else{
            //                     echo'inexacte ';
            //                 }
            //         }
            //     }
            // }
                    
                //   $_SESSION['choix']=$_POST['choix'];
                //   $_SESSION['reponse']=$_POST['repnse'];

                //   var_dump($_SESSION['choix']);
                //   var_dump($_SESSION['reponse']);
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