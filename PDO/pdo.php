<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>PHP DATA OBJECT</title>
    <style>
        h2 {
            background: #7952B3;
            padding: 20px;
            color: white;
        }

        .conteneur {
            max-width: 1200px;
            padding: 20px;
            border: 1px solid #dedede;
            margin: 0 auto;
        }

        table,
        td {
            border: 1px solid #333;
        }

        thead,
        tfoot {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="conteneur">
        <?php

            // echo '<pre>';
            // print_r(get_declared_classes());
            // echo '</pre>';

            echo '<h2>Connexion à une BDD</h2>';

            // le serveur (localhost) et le nom de la BDD (entreprise)
            $host = 'mysql:host=localhost;dbname=entreprise;';
            // le login de connexion à MySQL
            $login = 'root';
            // le mdp de connexion à MySQL (sur xampp et wamp, pas de mdp, sur mamp mdp = root)
            $password = '';
            // PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING : gestion des erreurs en mode warning (sinon les erreurs sont cachées)
            // PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' : gestion de l'utf-8 pour forcer l'utf-8 sur la BDD en cas de souci d'encodage des caractères
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ];

            // PDO : PHP DATA OBJECT 
            // création de l'objet : 
            $pdo = new PDO($host, $login, $password, $options);

            // pour voir que l'objet PDO est crée (vide car aucune propriété dans pdo)
            // echo '<pre>';
            // print_r($pdo);
            // echo '</pre>';

            echo '<pre>';
            print_r(get_class_methods($pdo));
            echo '</pre>';









        ?>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>


</body>

</html>