<html>
    <head>
        <title>inscription</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="../public/css/inscription.css">
    </head>
    <body>
        <div id="cadre">
            <h1>S'INSCRIRE</h1>
            <p>Pour tester votre niveau de culture generale</p>
            <div class="form">
                <form action="" method="POST">
                    <label for="">Nom</label><br>
                    <input type="text" name="nom" placeholder="Aaaa" class="input"><br>
                    <label for="">Prenom</label><br>
                    <input type="text" name="prenom" placeholder="Bbbb" class="input"><br>
                    <label for="">Login</label><br>
                    <input type="text" name="nom" placeholder="AaaaBBB" class="input"><br>
                    <label for="">Password</label><br>
                    <input type="password" name="password" placeholder="******" class="input"><br>
                    <label for="">Confirmer Password</label><br>
                    <input type="password" name="password" placeholder="******" id="" class="input"><br>
                    <label for="">Avatar</label>
                    <div class="btn-fichier"><input type="submit" name="choisir_fichier" value="choisir un fichier" class="bouton"></div>
                    <div class="btn-creerCompt"><input type="submit" name="creer_compte" value="Creer Compte" class="bouton"></div>
                </form>
            </div>
            <div class="droite">
                <div class="avatar"></div>
                <!-- <img src="../public/Images/img5.jpg" class="avatar" alt=""> -->
            </div>
            <div class="nom">Avatar du joueur</div>
        </div>
    </body>
</html>