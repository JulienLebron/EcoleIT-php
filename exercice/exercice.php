<?php

// 01 - récupérer 5 images sur le web de même extension (jpg ou jpeg) et les renommer de cette manière
// image1.jpg / image2.jpg / image3.jpg / image4.jpg / image5.jpg // 
// 02 - Afficher la première image avec un echo et une balise img // 
// 03 - Afficher 5 fois la même image toujours avec un seul echo et une seule balise img // 
// 04 - Afficher les 5 différentes images toujours avec un seul echo et une seule balise img // 
// Bonus : Afficher les 5 différentes images toujours avec un seul echo et une seule balise img sans connaître leur nom
// (constantes magique + fonction scandir() )

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice Images</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .conteneur {
            width: 1000px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #dedede;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        img {
            width: 45%;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="conteneur">
        <?php
            echo '<img src="img/image1.jpg" alt="img">';
        ?>
    </div>
    <div class="conteneur">
        <?php
            $i = 1;
            while($i < 6) {
                echo "<img src='img/image1.jpg'>";
                $i++;
            }
        ?>
    </div>
    <div class="conteneur">
        <?php
            $i = 1;
            while($i < 6) {
                echo "<img src='img/image$i.jpg'>";
                $i++;
            }
        ?>
    </div>
    <div class="conteneur">
        <?php
            $tableauImages = scandir(__DIR__ . '/img');
            // echo '<pre>';
            // print_r($tableauImages);
            // echo '</pre>';

            foreach($tableauImages AS $src) {
                // Ici on force les minuscules sur la chaine de caractère
                $src = strtolower($src);

                if(strpos($src, '.jpg') || strpos($src, '.jpeg') || strpos($src, '.gif')) {
                    echo "<img src='img/$src' alt='une image'>";
                }
            }
        ?>
    </div>
    
</body>
</html>