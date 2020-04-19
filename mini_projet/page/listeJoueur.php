 <!-- <div class="droite"> -->
    <div class="titre">LISTE DES JOUEURS PAR SCORE</div>
                <div class="Listjoueur">
                    <table>
                        <thead>
                            <tr><td>nom</td><td>prenom</td><td>score</td></tr>
                        </thead>
                        <tbody>
                        <?php 
                        $js= file_get_contents('./data/users.json');
                        $js=json_decode($js, true);
                        foreach ($js as $key => $data) {?>
                            <tr><td><?= $data['nom'] ?></td><td><?= $data['prenom'] ?></td><td>1122pts</td></tr>
                        </tbody>
                   <?php }
                        ?>
                    </table>
                </div>
            <div class="btnSuiv"> <button>suivant</button></div>
</div>