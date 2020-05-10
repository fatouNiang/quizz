<?php
is_connect();
$dataUser= getData();
$user=$_SESSION['user'];
$nbrQuestion=parametres();
$nbrQuestion=$nbrQuestion['nbrQuestion'];
$data=getQuestion();

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
                if (isset($_GET['page'])) {
                    $i=$_GET['page'];
                }else{
                    $i=1;
                    $_SESSION['question_id']=[];
                }

                if ($i<=$nbrQuestion) {
                    
                //    precedent
                    if (isset($_SESSION['tabindex'][$i])) {

                        $cle=(int)$_SESSION['tabindex'][$i][0];
                        echo $cle;
                        ?>

                        <div class="question">Question: <?php echo $data[$cle]['question']; ?>   </div>
                        <div class="point"><?php echo $data[$cle]['nbrPoint']; ?> point</div>
                        <div class="forms">
                            <form action="./traitement/Traitementjeux.php" method="post">
                                <?php
                                    
                                    echo "<input type='hidden' name='type_reponse' value='".$data[$cle]['TypeReponse']."' />";
                                    echo "<input type='hidden' name='cle' value='$cle' />";
                                    echo "<input type='hidden' name='page' value='$i'  />";
                                    if ($data[$cle]['TypeReponse']=="simple") {
                                        foreach ($data[$cle]['reponse'] as $key => $value) {
                                            if ($key==$_SESSION['tabindex'][$i][1]) {
                                                echo "<input type='radio' name='radio' value='$key' checked />";
                                            }else{
                                                echo "<input type='radio' name='radio' value='$key' />";
                                            }
                                            echo $value;
                                            echo "</br>";
                                        }
                                    }elseif ($data[$cle]['TypeReponse']=="multiple") {
                                        
                                        foreach ($data[$cle]['reponse'] as $key => $value) {
                                            if (in_array($key,$_SESSION['tabindex'][$i][1])) {
                                                echo "<input type='checkbox' name='check[]' value='$key' checked />";
                                            }else{
                                                echo "<input type='checkbox' name='check[]' value='$key' />";
                                            }                                            
                                            echo $value;
                                            echo "</br>";
                                        }
                                    }else{
                                    
                                        echo "<input type='text' name='texte' value='".$_SESSION['tabindex'][$i][1]."' />";
                                    }
                                  ?>
                                <div class="precedent">
                                    <input type="submit" class="dep" name="precedent" value="precedent">
                                </div>
                                <div class="suivant">
                                    <input type="submit" class="dep" name="submit" value="Suivant">
                                </div>
                            </form>


                        <?php                
                    // partie suivant
                    }else {       ?>

            
               
                    <?php
                     $cle=array_rand($data); 
                     while (in_array($cle,$_SESSION['question_id'])) {
                        $cle=array_rand($data); 
                     }
                    ?>
                    <div class="question">Question: <br> <?php echo $data[$cle]['question']; ?>   </div>
                    <div class="point"><?php echo $data[$cle]['nbrPoint']; ?> point</div>
                    <div class="forms">
                        <form action="./traitement/Traitementjeux.php" method="post">
                            <?php
                                
                                echo "<input type='hidden' name='type_reponse' value='".$data[$cle]['TypeReponse']."' />";
                                echo "<input type='hidden' name='cle' value='$cle' />";
                                echo "<input type='hidden' name='page' value='$i'  />";
                                if ($data[$cle]['TypeReponse']=="simple") {
                                    foreach ($data[$cle]['reponse'] as $key => $value) {
                                        echo "<input type='radio' name='radio' value='$key' />";
                                        echo $value;
                                        echo "</br>";
                                    }
                                }elseif ($data[$cle]['TypeReponse']=="multiple") {
                                    foreach ($data[$cle]['reponse'] as $key => $value) {
                                        echo "<input type='checkbox' name='check[]' value='$key' />";
                                        echo $value;
                                        echo "</br>";
                                    }
                                }else{
                                    echo "<input type='text' name='texte'/>";
                                }
                              ?>
                              <div class="precedent">
                                <input type="submit" class="dep" name="precedent" value="precedent">
                            </div>
                            <div class="suivant">
                                <input type="submit" class="dep" name="submit" value="Suivant">
                            </div>
                            
                        </form>
                        <?php 
                         } 
                        ?>
                    </div>
                </div>
                <?php
                }else{
                    echo " Le jeu est terminé";
                    echo'<div style="height:100%;overflow-y:scroll;">';
                   
                        for ($i=1; $i <$nbrQuestion ; $i++) {
                            
                            echo "<div style='border:1px dashed black; text-align:center;'>";
                            $index=$_SESSION['tabindex'][$i];
                            echo "<h3>".$data[$index[0]]['question']." </h3>";
                            if($data[$index[0]]['TypeReponse']=='simple'){
                                foreach ($data[$index[0]]['reponse'] as $key => $value) {
                                    $choix=$data[$index[0]]['choix'][0];
                                    if($key==$index[1]){
                                        echo ' <span style="color:red">reponse exacte </span>';
                                        echo ' <input type="radio" name="" checked="checked" disabled>';
                                        echo $value;
                                        echo'<br>';
                                    }else{
                                        // echo '<span style="color:blue";>reponse invalide</span> ';
                                        echo ' <input type="radio" name="" id="" disabled>';
                                        echo $value;
                                        echo'<br>';
                                    }
                                }
                            }
                            elseif($data[$index[0]]['TypeReponse']=='multiple'){
                                echo "Vos Réponses sont : </br> ";
                                foreach ($data[$index[0]]['reponse'] as $key => $value) {
                                    $choix=$data[$index[0]]['choix'];
                                    
                                    if(in_array($key,$index[1])){
                                        echo ' <input type="checkbox" name="" id="" checked disabled>';
                                    }else{
                                        echo ' <input type="checkbox" name="" id="" disabled>';
                                        
                                    }
                                    echo $value;
                                        echo'<br>';
                                }
                                if($data[$index[0]]['choix']==$index[1]){
                                    echo "Bonne reponse";
                                }else{
                                    echo "Faux";
                                }
                            }else{
                                echo "Votre Réponse : ",$index[1];
                                if ($index[1]==$data[$index[0]]['reponse']) {
                                    echo "<span style='color:green'> est correcte</span>";
                                }else{
                                    echo "<span style='color:red'> est incorrecte</span> </br>";
                                    echo "La bonne reponse est : ".$data[$index[0]]['reponse'];
                                }
                            }

                            echo "</div>";
                        }
                    }
                    // foreach ($dataUser as $key => $value) {
                    //    echo $value;
                    // }

                ?>
            </div> 
            
            
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