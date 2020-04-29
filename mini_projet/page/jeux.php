
<?php
is_connect();
$data= getData();
$user=$_SESSION['user'];
?>
        <div id="frame">
            <div class="headerframe">
                <div class="profil">
                    <div><img src="<?='./public/Images/' .$user['avatar']?>" alt="" class="userProfil"></div>
                   <div class="p"> <?php echo $user['prenom'].' '.$user['nom']; ?></div>
                </div>
                <div class="haut">BIENVENU DANS LA PLATEFORME DE JEU QUIZZ<br>JOUER ET TESTER VOTRE NIVEAU DE CULTURE GENERALE</div>
                <div class="deconnexion">
                    <button class="bdecon"><a href="index.php?statut=logout"> Déconnexion</a></button>
                </div>
            </div>
            <div class="sousCadre">
                <div class="sousCadre1">
                    <div class="question">

                    </div>
                    <div class="point">
                        <h5>point</h5>
                    </div>
                    <div class="forms">
                        <form action="" method="post">
                            <input type="radio" name="" id=""><br>
                            <input type="radio" name="" id=""><br>
                            <input type="radio" name="" id="">
                        </form>
                    </div>
                    <div class="btn">
                        <div class="precedent">
                            <input type="submit" value="Précédent" name="precedent" class="dep">
                        </div>
                        <div class="suivant">
                            <input type="submit" value="Suivant" name="suivant" class="dep">
                        </div>
                    </div>
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