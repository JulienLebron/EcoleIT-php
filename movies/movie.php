<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="container-fluid d-flex justify-content-center bg-dark ">
    <h2 class="text-light<QQ">Movies DB</h2>
</div>

<?php
    // Connexion BDD
            $host = 'mysql:host=localhost;dbname=movies;';
            $login = 'root';
            $password = '';
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ];
            $pdo = new PDO($host, $login, $password, $options);

            // Requête de sélection des films
            $resultat = $pdo->query("SELECT * FROM movies");
            // Fetch du résultat de la reqiête pour rendre le résultat exp^loitable
            $movies = $resultat->fetchAll(PDO::FETCH_ASSOC);

            // echo '<pre>';
            // print_r($movies);
            // echo '</pre>';
?>

<div class="movies-container container d-flex justify-content-around flex-wrap">
    <?php
    // Affichage des films
    // On boucle sur $movies (un tableau de tableau) qui contient tous les films et à chaque tour de boucle on isole un film (qui est un tableau)
    foreach($movies as $movie) {
        $id= $movie['id'];
        $cover= $movie['cover'];
        $title= $movie['title'];
        $releasedate= $movie['releasedate'];
        // echo '<pre>';
        // print_r($movie);
        // echo '</pre>';
        echo "
        <div class='card mb-2' style='width: 18rem;'>
        <img src='$cover' class='card-img-top' alt='...'>
        <div class='card-body'>
        <h5 class='card-title'>$title</h5>
        <p class='card-text'>$releasedate</p>
        </div>
        </div>
        ";
        }
    ?>
</div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>