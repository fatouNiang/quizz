<?php
$data= getData();
define("NBRPARPAGE", 5);
$valeurTotale= count($data);

$nbr_page=ceil($valeurTotale / NBRPARPAGE);
if(isset($_GET['page'])){
    $pageActuel=$_GET['page'];
    if($pageActuel> $nbr_page){
        $pageActuel=$nbr_page;
    }
}else{
    $pageActuel=1;
}
$indiceDepart= ($pageActuel -1) * NBRPARPAGE ;
$indiceFin= $indiceDepart + NBRPARPAGE-1;
?>
    <div class="titre">LISTE DES JOUEURS PAR SCORE</div>
                <div class="Listjoueur">
                    <table><thead><tr><td>nom</td><td>prenom</td><td>score</td></tr></thead>
                        <tbody>
                        <?php 
                          $joueur=[];
                          foreach ($data as $key => $value) {
                              if($value['profil']==='joueur'){
                                  $joueur[]=$value;
                              }
                          }
                          $colonne= array_column($joueur, 'score');
                          array_multisort($colonne, SORT_DESC, $joueur);
                          foreach ($joueur as $key => $joueurs) {?>
                                  <td class="tableScore"><?= $joueurs['prenom'] ?></td>
                                  <td class="tableScore"><?= $joueurs['nom'] ?></td>
                                  <td class="tableScore"><?= $joueurs['score']."pts" ?></td></tr>
                        <?php }
                                  ?>
                        </tbody>
                    </table>
                </div>
                <?php 
               
                for ($page=1; $page <=$nbr_page ; $page++) {
                    if($page==$pageActuel){
                        echo "[".$page."]";
                    }else{
                    echo '<a href="index.php?lien=accuiel&bloc=listeJoueur?page='.$page.'" class="b">['.$page.']</a>';
                    }
                }
                ?>
            <div class="btnSuiv"> <button>suivant</button></div>
</div>