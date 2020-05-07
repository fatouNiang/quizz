<div class="titre">LISTE DES JOUEURS PAR SCORE</div>
    <div class="Listjoueur">
    <?php
    $data= getData();
    $joueur=[];
         foreach ($data as $key => $value) {
                if($value['profil']==='joueur'){
                    $joueur[]=$value;
                }
            }
             $colonne= array_column($joueur, 'score');
             array_multisort($colonne, SORT_DESC, $joueur);
             $valeurTotale= count($data);
             $nbrParPage = 15;
             $nbr_page=ceil($valeurTotale/ $nbrParPage);
             if(isset($_GET['page'])){
                $pageActuel =$_GET['page'];
                if($pageActuel< 1){
                    $pageActuel=1;
                }elseif($pageActuel> $nbr_page){
                    $pageActuel=$nbr_page;
                }
            }else {
                $pageActuel=1;
            }
                $indiceDepart= ($pageActuel -1) * $nbrParPage;
                 $indiceFin= $indiceDepart + $nbrParPage-1;
    ?>

                <table><thead><tr><td>NOM</td><td>PRENOM</td><td>SCORE</td></tr></thead> 

                    <?php 
                    for ($i=$indiceDepart; $i <= $indiceFin; $i++) {
                        if(isset($joueur[$i])){?>
                        <tbody>
                            <tr><td class="tableScore"><?=$joueur[$i]['nom']?></td>
                            <td class="tableScore"><?=$joueur[$i]['prenom']?></td>
                            <td class="tableScore"><?=$joueur[$i]['score']?>pts</td></tr>
                      
                    <?php 
                        }
                    }
                    ?>
                </tbody>
            </table>
</div>
<div>
<?php
    if ($pageActuel<=1){?>
       <button><a href="index.php?lien=accueil&bloc=listeJoueur&page=<?=$pageActuel+1?>"class="btn-btn-primary">suivant</a></button>
<?php 
    }else{?>
        <button><a href="index.php?lien=accueil&bloc=listeJoueur&page=<?=$pageActuel-1?>" class="btn-btn-primary">precedant</a></button>
        <button style="margin-left:70%;"><a href="index.php?lien=accueil&bloc=listeJoueur&page=<?=$pageActuel +1?>" class="btn-btn-primary">suivant</a></button>
    <?php } ?>
</div>
