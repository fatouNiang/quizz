<?php
$data= getData();
?>
 <div class="topScore">
    <!-- <div class="titreSousCadre2">top scores</div> -->
        <table class="tableScore">
            <thead><tr><td></td></tr></thead>
                <tbody>
                    <tr>
                        <?php 
                        $joueur=[];
                        foreach ($data as $key => $value) {
                            if($value['profil']==='joueur'){
                                $joueur[]=$value;
                            }
                        }
                        $colonne= array_column($joueur, 'score');
                        array_multisort($colonne, SORT_DESC, $joueur);
                        foreach ($joueur as $key => $joueurs) {
                            if($key<5){?>
                                <td class="tableScore"><?= $joueurs['prenom'] ?></td>
                                <td class="tableScore"><?= $joueurs['nom'] ?></td>
                                <td class="tableScore scoreTop"><?= $joueurs['score']."pts" ?></td></tr>
                                <?php 
                                } }
                                ?>
                </tbody>
        </table>
    <!-- </div> -->
