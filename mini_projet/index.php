<html>
    <head>
        <title>quizz</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="./public/css/style.css">
    </head>
    <body>
        <div class="header">
            <div class="logo"></div>
            <div class="header-text">le plaisir de jouer</div>
        </div>
        <div class="content">
            <?php 
            session_start();
            require_once("./traitement/fonction.php"); 
                if (isset($_GET['lien'])) {
                    switch ($_GET['lien']) {
                        case 'accueil':
                            require_once("./page/admin.php");
                            break;
                        case 'jeux':
                            require_once("./page/jeux.php");
                        break;
                    }
                }else{
                    if(isset($_GET['statut']) && $_GET['statut']==="logout"){
                        deconnexion();
                    }
                    require_once("./page/connexion.php"); 
                } 
                ?>
        </div>
    </body>
</html>