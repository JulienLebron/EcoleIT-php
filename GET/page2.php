<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 1</title>
    <style>
        .conteneur{ width: 1000px; margin: 0 auto; padding: 20px; border: 1px solid;}
        h1 {background-color: steelblue; padding: 20px; color: #fff;}
    </style>
</head>
<body>
    <div class="conteneur">
        <h1>Exercice GET page 2</h1>
        <a href="page1.php">Retour à la page 1</a>

        <hr>
        <?php
            echo '<pre>';
            print_r($_GET);
            echo '</pre>';

            // Afficher proprement la valeur contenu dans $_GET (avec un echo et un print_r)

            if(isset($_GET['categorie']) && isset($_GET['couleur']) && isset($_GET['taille']))
            {
                echo 'Vous avez choisi la catégorie : ' . $_GET['categorie'] . '<hr>';
                echo 'Vous avez choisi la couleur : ' . $_GET['couleur'] . '<hr>';
                echo 'Vous avez choisi la taille : ' . $_GET['taille'] . '<hr>';
            }
            else
            {
                echo 'Veuillez choisir une catégorie depuis la page 1<hr>';
            }

            /* La manipulation de l'url esst un protocole HTTP nommé GET
               GET représente l'url de la page
               L'outil PHP correspondant : $_GET
               $_GET est une superglobale (disponible dans l'environnement global et local naturellement)
               Les superglobales sont des tableaux Array
               
               $_GET est un tableau vide par défaut, en revanche si des informations sont présentes avec la bonne syntaxe dans l'url, on les retrouves naturellement dans le tableau $_GET
              $_GET est lié à un protocole HTTP donc existe toujours mais vide par défaut
            */
            

        ?>
    </div>


    
</body>
</html> 