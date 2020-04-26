
    <div class="titre">LISTE DES JOUEURS PAR SCORE</div>
                <div class="Listjoueur">
                <table><thead><tr><td>nom</td><td>prenom</td><td>score</td></tr></thead>

                    <?php 
                    $data= getData();
                    define("NBRPARPAGE", 3);
                    echo NBRPARPAGE;
                    $valeurTotale= count($data);
                    $nbr_page=ceil($valeurTotale / NBRPARPAGE);
                    if(isset($_GET['page'])){
                        $_pageActuel =$_GET['page'];
                        if($pageActuel> $nbr_page){
                            $pageActuel=$nbr_page;
                        }
                    }else{
                        $pageActuel=1;
                    }
                    $indiceDepart= ($pageActuel -1) * NBRPARPAGE;
                    // echo $indiceDepart;
                    $indiceFin= $indiceDepart + (NBRPARPAGE-1);
                    // echo $indiceFin;
                    // if($indiceFin>$data){
                    //     $indiceFin=$data;
                    // }
                    for ($i=$indiceDepart; $i < $indiceFin; $i++) {?>
                        <tbody>
                        <?php
                               if($i!= NBRPARPAGE){
                                $joueur=[];
                                foreach ($data as $key => $value) {
                                    if($value['profil']==='joueur'){
                                        $joueur[]=$value;
                                    }
                                    $colonne= array_column($joueur, 'score');
                                    array_multisort($colonne, SORT_DESC, $joueur);
                                }foreach ($joueur as $key => $joueurs) {
                                    echo'<tr><td class="tableScore">'.$joueurs['nom'].'</td>';
                                    echo'<td class="tableScore">'.$joueurs['prenom'].'</td>';
                                    echo'<td class="tableScore">'.$joueurs['score'].'pts</td></tr>';
                                }
                             }
                            }
                    ?>
                          
                         </tbody>
                    </table>
                </div> 
                <?php 
                for($i=1; $i<=$nbr_page; $i++){
                    if($i==$pageActuel){
                        echo '['.$i.']';
                    }else{
                        echo ' <a href="index.php?lien=accuiel&bloc=listeJoueur&?page='.$i.'">'.$i.'</a> ';
                    }
                }
              if ($pageActuel > 1){ ?>
                 <button><a href="index.php?lien=accuiel&bloc=listeJoueur&page=<?php echo $pageActuel-1;?>" class="btn-btn-primary" > precedent</a></button> -->
                 <?php
             }
                if ($pageActuel < $nbr_page ){ ?>
                <div class="btnSuiv"> <button><a href="index.php?lien=accuiel&bloc=listeJoueur&page=<?php 
             echo $pageActuel +1;?>" > suivant</a></button></div> 
             <?php            
                 }
                
                ?>
            <!-- <div class="btnSuiv"> <button>suivant</button></div> -->
</div>