<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <div class="conatiner">
        <h1>Entrainement PHP</h1>

        
        <?php
        // La ligne ci-dessus est la balise ouvrante PHP

        echo '<h2>01 - Instruction d\'affichage</h2>';
        // echo est une instruction permettant de déclencher un affichage
        // chaque instruction doit se terminer par un point virgule ';'

        echo 'Bonjour '; // il est possible d'afficher du texte
        echo '<br>'; // il est également possible d'afficher du html
        echo 'à tous <br>';
        
        print 'Nous sommes jeudi ! <br>';
        // print est une autre instruction d'affichage quasiment similaire à echo 
        // nous utiliserons toujours echo
        ?>

        <?=  'Cette balise php contient un echo et ne sert que lorsque l\'on souhaite déclencher un affichage' ?>

        <?php 
        echo '<h2>02 - Variables : type / déclaration / affectation</h2>';
        // définition: une variable est un espace nommé permettant de conserver une valeur 
        // une variable en php est déclaré avec le signe $
        // PHP est sensible à la casse, la variable $A n'est pas la même que la variable $a
        // ⚠️ Attention ! Une variable ne peut pas commencer par un chiffre

        $a = 123; // déclaration de variable nommée 'a' et affectation d ela value rnumérique 123
        echo gettype($a); // integer
        // gettype() est une fonction prédéfinie permettant de connaitre l etype d'une valeur
        echo '<br>';

        $a = 1.5; // chiffre décimal
        echo gettype($a); // double (float)
        echo '<br>';

        $a = 'un chaine'; // chaine de caractère
        echo gettype($a); // string
        echo '<br>';

        $a = true; // TRUE ou FALSE
        echo gettype($a); // boolean
        echo '<br>';

         echo '<h2>03 - Concaténation</h2>';
         // La concaténation permet d'assembler des chaines de caractères les unes avec les autres

         $x = 'Bonjour';
         $y = 'tout le monde !';

         // sans la concaténation
         echo $x;
         echo ' ';
         echo $y;
         echo '<br>';

         // avec la concaténation 
         echo $x . ' ' . $y . '<br>';

        // la concaténation se fait avec le point "." que le peut traduire par suivie de 
        // il est possible de faire la concaténation avec la virgule "," mais à éviter car ne fonctionne pas si on utilise print !
        // pour se protéger autant utiliser toujours le point "."
        // concaténation lors de l'affection
        $prenom = 'Louis';
        $prenom = 'Georges';
        echo $prenom . '<br>';

        $prenom2 = 'Julien';
        $prenom2 .= ' Lebron';
        echo $prenom2 . '<br>';

        $prenom2 .= ' est votre formateur pour le module PHP.';
        echo $prenom2 . '<br>';

            $contenu = '';
            $contenu .= '<h2>Ceci Titre</h2>';
            $contenu .= '<div class="container"><div class="header-container"><p>Ceci est un paragraphe</p></div></div>';

            echo $contenu;

            echo '<h2>04 - Guillemets et apostrophes</h2>';
            // dans des apastrophes, une variable est considérée comme du texte
            // dans des guillemets, une variable est reconnue et donc interprétée

            $pseudo = 'LeCodeurFou2023';
            $temps = 'soleil';
            
            echo 'Bonjour $pseudo <br>';
            echo 'Bonjour ' . $pseudo . '<br>';
            echo "Bonjour $pseudo <br>";
            echo "Aujourd'hui il y a du $temps<br>";

            echo '<h2>05 - Constantes & constantes magiques</h2>';
            // une constante est comme une variable sauf que comme son nom l'indique, on ne pourra pas changer la valeur pendant l'exécution du code.
            // très pratique pour isoler une information et l'appeler dans notre code partout ou cela est nécessaire

            // par convention, une constante s'écrit toujours en majusule
            // define(son_nom, sa_valeur);

            define('CAPITALE', 'Bruxelles');
            define('CHEMIN_SITE', '/projet/index');

            echo CAPITALE . '<br>';
            echo CHEMIN_SITE . '<br>';

            // Constantes magiques : (déjà inscrites dans le langage)

            echo __DIR__ . '<br>'; // chemin jusqu'au dossier qui contient le fichier sur lequel je me trouve
            echo __FILE__ . '<br>'; // le chemin du fichier actuel
            echo __LINE__ . '<br>'; // le numéro de la ligne

            echo '<h3>Exercice variables</h3>';
            // Créer 3 variables, stocker les couleurs et le nom d'un pays et afficher les couleurs de 3 drapeaux différent sous fome : 
            //    couleur1 - couleur2 - couleur3 sont les couleurs du drapeaux $nom_pays

            $couleur1 = 'bleu';
            $couleur2 = 'rouge';
            $couleur3 = 'blanc';

            $france = 'France';

            echo "Les couleurs du drapeau de la $france sont : $couleur1, $couleur3, $couleur2 <br>";

            echo '<h3>Opérateurs arithmétique</h3>';

            $valeur = 10;
            $valeur2 = 2;

            echo $valeur + $valeur2 . '<br>'; // Addition
            echo $valeur - $valeur2 . '<br>'; // Soustraction
            echo $valeur / $valeur2 . '<br>'; // Division
            echo $valeur * $valeur2 . '<br>'; // Multiplication
            echo $valeur % $valeur2 . '<br>'; // Modulo // le restant de la division en terme d'entier
            echo $valeur ** $valeur2 . '<br>'; // Puissance

            // opération / affectation
            $valeur += $valeur2; // équivaut à écrire : $valeur = $valeur + $valeur2;
            $valeur -= $valeur2; // équivaut à écrire : $valeur = $valeur - $valeur2;
            $valeur /= $valeur2; // équivaut à écrire : $valeur = $valeur / $valeur2;
            $valeur *= $valeur2; // équivaut à écrire : $valeur = $valeur * $valeur2;
            $valeur %= $valeur2; // équivaut à écrire : $valeur = $valeur % $valeur2;
            $valeur **= $valeur2; // équivaut à écrire : $valeur = $valeur ** $valeur2;

            separateur();

            echo '<h2>06 - Conditions & opérateurs de comparaison</h2>';
            // isset() / empty()
            // isset() permet de savoir si une information existe (est définie)
            // empty() permet de savoir si une information n'existe pas ou si elle existe mais vide

            
            // isset()
            // $utilisateur = "Julien Lebron";
            echo $utilisateur . '<br>'; //⚠ erreur car la variable $utilisateur est non définie 

            if(isset($utilisateur)) {
                echo $utilisateur . '<br>';
            } else {
                echo "Cette variable n'existe pas. <br>";
            }


            
            // empty()
            // valeurs vides : une chaine vide '', 0, tableau vide, la chaine '0' et false
            $membre = 'Océane';
            if(empty($membre)){
                echo "Bienvenue sur notre site ! <br>";
            } else {
                echo "Bonjour $membre, bienvenue sur notre site ! <br>";
            }

            $a = 10;
            $b = 5;
            $c = 22;

            // Plusieurs conditions : AND => &&
            if($a > $b && $b > $c && $a > $c) {
                echo "Toutes les conditions sont vrai ! <br>";
            } else {
                echo "Une ou plusieurs des conditions sont fausses <br>";
            }

            // Plusieurs conditions : OR => ||
            if($a > $b || $c > $b || $c > $a) {
                echo "Au moins une condition est vrai ! <br>";
            } else {
                echo "Toutes les conditions sont fausses <br>";
            }

            // if / elseif /else
            if($a == 8) {
                echo 'Réponse 1<br>';
            } elseif($a != 10) {
                echo 'Réponse 2<br>';
            } elseif($c > 12) {
                echo 'Réponse 3<br>';
            } else {
                echo 'Réponse 4<br>';
            }

            /*
            Opérateur de comparaison
            ------------------------

            =   ⚠ Attention (ce n'est pas un opérateur de comparaison ! )
            ==  est égal en terme de valeur uniquement
            ===  est strictement égal à (on compare en terme de valeur et en terme de type)
            !=   est différent de (en terme de valeur uniquement)
            !==  est différent de (en terme de valeur et en terme de type)
            >    est strictement supérieur
            <    est strictement inférieur
            >=   supérieur ou égal
            <=   inférieur ou égal

            */

            $a = 1;
            $a2 = "1";

            // écriture ternaire 
            echo ($a === $a2) ? 'Ok, les deux variables contiennent la même valeur du même type.<br>' : 'NOK, les valeurs et/ou les types sont différents.<br>';
            $couleur = 'vert';
            switch($couleur)
            {
                case 'bleu' :
                    echo 'Vous aimez le bleu<br>';
                break;
                case 'rouge' :
                    echo 'Vous aimez le rouge<br>';
                break;
                case 'violet' :
                    echo 'Vous aimez le violet<br>';
                break;
                case 'vert' :
                    echo 'Vous aimez le vert<br>';
                break;
                default : 
                    echo "Vous n'aimez ni le bleu, ni le rouge, ni le violet, ni le vert<br>";
                break;
            }

            echo '<h2>07 - Fonctions prédéfinies</h2>';
            // déjà inscrites dans le langage, le développeur ne fait que l'exécuter.
            // fonction date()
            echo 'Nous sommes le : ' . date('d/m/Y à H:i:s') . '<hr>';
            echo time() . '<br>';

            // htlmentities
            echo '&copy; ' . date('Y') . '<br>';

            // fonction de traitement de chaine de caractère
            // strpos(ou_on_cherche, ce_que_lon_cherche, a_partir_de_ou_on_cherche)

            $email = '@julien.lebron@gmail.com';
            echo strpos($email, '@', 1) . '<br>';
            // affiche 14 . La premier caractère à la position 0
            // ici on précise un offset donc la recherche commence à partir de la position 1

            // strlen()
            // strlen() permet de compter le nombre de caractère dans un chaine
            // strlen() compte en terme d'octets

            echo 'Avec strlen() <br>';
            $pseudo = 'Admin771223';
            echo 'Taille de la chaine contenu dans la variable $pseudo = ' . strlen($pseudo) . '<br>';
            $pseudo = 'été';
            echo 'Taille de la chaine contenu dans la variable $pseudo = ' . strlen($pseudo) . '<br><hr>';
            
            // iconv_strlen()
            // iconv_strlen() compte réellement le nombre de caractère
            
            echo 'Avec iconv_strlen() <br>';
            $pseudo = 'Admin771223';
            echo 'Taille de la chaine contenu dans la variable $pseudo = ' . iconv_strlen($pseudo) . '<br>';
            $pseudo = 'été';
            echo 'Taille de la chaine contenu dans la variable $pseudo = ' . iconv_strlen($pseudo) . '<br>';

            // substr()
            // permet de découper une chaîne
            // substr(chaine, position_depart, nb_de_caractère)

            $texte = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';

            $premiere_virgule = strpos($texte, ',');
            strpos($texte, ',', $premiere_virgule);

            echo iconv_substr($texte, $position_depart , 200) . ' ... <a href="">Lire la suite</a><br>';


            echo '<h2>08 - Fonctions utilisateur</h2>';
            // déclarée et exécutée par le développeur
            // il est possible d'exécuter une fonction avant sa déclaration (ce qui n'est pas possible avec une variable)
            // c'est possible car l'interpréteur php va faire 2 lectures du code
            // une première lecture pour isoler toutes les fonctions et les pré-charger
            // une deuxième lecture pour exécuter tout le code

            // déclaration
            // fonction simple sans argument
            function separateur()
            {
                echo '<hr><hr><hr>';
            }

            // fonction avec argument
            function direBonjour($nimporte_quoi) {
                return 'Bonjour ' . $nimporte_quoi . ', bienvenue sur notre site !<br>';
            }

            echo direBonjour('Julien');
            // avec un return, nous devons mettre un echo si on souhaite un affichage
            // si un argument est attendu, il est obligatoire de le fournir sinon erreur

            // fonction pour calculer la tva sur une valeur
            function calcul_tva($valeur)
            {
                return $valeur * 1.2; 
            }
            
            echo "1000 € avec une tva de 20 % = " . calcul_tva(1000) . ' €<br>';
            
            // Pour améliorer cette fonction
            function calcul_tva2($valeur, $taux)
            {
                return $valeur * $taux; 
            }
            echo "1000 € avec une tva de 20 % = " . calcul_tva2(1000, 1.2) . ' €<br>';
            echo "1000 € avec une tva de 5.5 % = " . calcul_tva2(1000, 1.055) . ' €<br>';
            
            // La même fonction avec $taux facultatif
            function calcul_tva_taux($valeur, $taux = 1.2)
            {
                return $valeur * $taux;
            }
            echo "1000 € avec une tva de 20 % = " . calcul_tva_taux(1000) . ' €<br>';
            echo "1000 € avec une tva de 5.5 % = " . calcul_tva_taux(1000, 1.055) . ' €<br>';

            // Environnement (scope)
            // Global : le script complet
            // Local : à l'intérieur des accolades d'une fonction
            // L'existence des variables va dépendre de l'environnement ou elles sont déclarées

            $animal = 'lapin';

            function foret()
            {
                $animal = 'renard';
                return "J'ai vu un $animal en forêt.<br>"; 
            }

            echo $animal . '<br>';
            echo foret();

            $pays = 'Angleterre';

            function affiche_pays()
            {
                global $pays;
                return "J'habite en $pays.<br>";
            }

            echo affiche_pays();
            separateur();
        ?>

            // Exercice : 
            // 01 - Créer une fonction meteo() avec 2 arguments attendue (saison, temperature)
            // 02 - En fonction de la saison et de la température le résultat en sortie sera différent
            // Exemple : Nous sommes en "saison", et il fait "temperature" degrés
            // Dans le cas ou la saison est printemps et dans le cas ou la temperature est comprise entre -1 et 1 degré
            // Nous sommes au printemps, et il fait 1 degré
            // Bonus : ecriture ternaire des condition
            <br>
            <br>
            <br>
            <?php 
                function meteo($saison, $temperature) {
                    if($saison == 'printemps') {
                        $debut = 'Nous sommes au ' . $saison;
                    } else {
                        $debut = 'Nous sommes en ' . $saison;
                    }

                    if($temperature <= 1 && $temperature >= -1) {
                        $suite = ', et il fait ' . $temperature . ' degré.<hr>';
                    } else {
                        $suite = ', et il fait ' . $temperature . ' degrés.<hr>';
                    }

                    return $debut . $suite;
                }

                echo meteo('été', 35);
                echo meteo('printemps', 0);

            function meteo2($saison, $temperature)
            {
                $article = 'en';
                $s = 's';

                if($saison == 'printemps')
                {
                    $article = 'au';
                }

                if($temperature >= -1 && $temperature <= 1)
                {
                    $s = '';
                }

                return 'Nous sommes ' . $article . ' ' . $saison . ', et il fait ' . $temperature . ' degré' . $s . '.<hr>';
            }

            function meteo3($saison, $temperature)
            {
                $saison = strtolower($saison);
                $debut = ($saison == 'printemps') ? 'Nous sommes au ' . $saison : 'Nous sommes en ' . $saison;
                $suite = ($temperature >= -1 && $temperature <= 1) ? ', et il fait ' . $temperature . ' degré.<hr>' : ', et il fait ' . $temperature . ' degrés.<hr>';
                return $debut . $suite;
            }

            separateur();

            echo '<h2>09 - Structure itérative : boucles</h2>';
            // Une boucle est un outil nous permettant de répéter un ensemble d'instruction
            // pour mettre en place une boucle, nous avons besoin de 3 informations
                // 01 - une valeur de départ (compteur)
                // 02 - une condition d'entrée (question)
                // 03 - une incrémentation ou une décremention pour modifier la valeur du compteur afin de ne pas avoir une boucle infinie


            // boucle while()
            $i = 0;         // compteur
            while($i < 10)  // condition d'entrée
            {
                echo 'Je ne dois pas bavarder en classe.<br>'; // instruction qui sera répété
                $i++; // incrémentation // $i = $i + 1;
            }

            separateur();

            // boucle for()
            for($i = 0; $i < 10; $i++)
            {
                echo 'La valeur du compteur $i est égal à : ' . $i . '.<br>';
            }

            
            // Exercice : 
            // 01 - Faire en sorte de ne pas avoir le dernier "-" après le chiffre 9
            // 0 - 1 - 2 - 3 - 4 - 5 - 6 - 7 - 8 - 9
            // Bonus : Afficher les chiffre de 0 à 9 dans un tableau html

            separateur();

            $i = 0;
            echo "<table><thead><tr><th scope='row' colspan='10'>Compteur</tr></thead><tr><tbody>";
            while($i < 10) {
                echo "<td>$i</td>";
                $i++;
            }
            echo "</tr></tbody></table>";

            function boucleWhile() {
                $i = 0;
                while($i < 9) {
                    echo "$i - ";
                    $i++;
                }
                echo "$i"; 
            }

            boucleWhile();

            echo '<h2>Tableau de données</h2>';
            // toujours contenu dans une variable, il permet de contenir un ensemble de valeur à l'inverse d'une variable simple qui ne peut contenir qu'une seule valeur
            // un tableau ne peut avoir que deux colonnes
            // une colonne avec l'indice et une colonne avec la valeur correspondante à l'indice

            // comment déclarer un tableau
            $tableau = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi'];
            $tableau2 = array('lundi', 'mardi', 'mercredi',);

            // pour voir le contenu du tableau
            // deux instruction d'affichage améliorées :
            // print_r()
            echo '<pre>';
            print_r($tableau);
            echo '</pre>';

            // var_dump()
            echo '<pre>';
            var_dump($tableau);
            echo '</pre>';

            // Afficher la valeur "jeudi" en piochant dans le tableau
            echo "Nous sommes $tableau[3] <br>";

            // on peut rajouter des éléments dans le tableau 
            $tableau[] = 'samedi';
            $tableau[] = 'dimanche';
            echo '<pre>';
            print_r($tableau);
            echo '</pre>';

            $tableau_legumes = ['concombre', 'radis', 'tomate', 'salade', 'courgette'];
            echo '<pre>';
            print_r($tableau_legumes);
            echo '</pre>';

            // il est possible de changer une des valeurs : 
            $tableau_legumes[2] = 'aubergine';
            echo '<pre>';
            print_r($tableau_legumes);
            echo '</pre>';

            // il est possible de choisir nous même les indices du tableau
            $tableau_couleurs= ['b' => 'bleu', 'r' => 'rouge', 'bl' => 'blanc', 'v' => 'violet'];
            echo '<pre>';
            print_r($tableau_couleurs);
            echo '</pre>';

            echo $tableau_couleurs['bl'] . '<br>';

            $user = ['pseudo' => 'LeCodeurFou', 'mdp' => '2xdzadijdaiojd', 'email' => 'exemple@gmail.com', 'adresse' => '30 avenue broustin', 'cp' => 1090, 'ville' => 'Buxelles'];
            echo '<pre>';
            print_r($user);
            echo '</pre>';

            // pour connaitre la taille d'un tableau
            echo 'Taille du tableau $user : ' . sizeof($user) . '<hr>';


            // une boucle foreach() va tourner naturellement autant de fois qu'il y a d'élément dans le tableau
            // dans les parenthèses du foreach(), on commence par nommer le tableau concerné puis le mot clé AS obligatoire
            // avec une seule variable, cette variable contiendra la valeur du tableau en cours à chaque tour de boucle
            // avec deux variables, la première reçoit l'indice en cours, la deuxième reçoit la valeur en cours
            echo '<ul>';
                foreach($user AS $x)
                {
                    echo '<li>' . $x . '</li>';
                }
            echo '</ul>';

            echo '<ul>';
                foreach($user AS $indice => $x)
                {
                    echo '<li><b>' . $indice . '</b> : ' . $x . '</li>';
                }
            echo '</ul>';


            ?>

Exercice 2 : Liste d'articles statique (30 min)

Un tableau PHP contenant 5 titres d'articles fictifs
Une boucle foreach qui affiche chaque titre dans une carte Bootstrap
Un compteur affichant "5 articles publiés"
Indice : Utilisez count($articles) pour obtenir le nombre d'éléments du tableau.

<br>
<br>
<br>

    <?php

    $movies = [
        "Inception",
        "Le Seigneur des Anneaux",
        "Interstellar",
        "Matrix",
        "Gladiator"
    ];

    foreach($movies AS $indice => $movie){
        echo "
        <div class='card' style='width: 18rem;'>
        <img src='...' class='card-img-top' alt='...'>
        <div class='card-body'>
            <h5 class='card-title'>$movie</h5>
        </div>
        </div><br>";
    }


    echo '<h2>10 - Inclusion</h2>';
    echo 'Premier appel avec include : <hr>';
    include 'inc/exemple.php';
    separateur();

    echo 'Deuxième appel avec include_once : <hr>';
    include_once 'inc/exemple.inc.php';
    separateur();

    echo 'Premier appel avec require : <hr>';
    require 'inc/exemple.inc.php';
    separateur();

    echo 'Deuxième appel avec require_once : <hr>';
    require_once 'inc/exemple.inc.php';
    separateur();

    // include et require permettent d'inclure le contenu d'un fichier extérieur dans celui-ci.
    // avec le _once on vérifie si le fichier à déja été appelé dans cette page, si c'est le cas on le rappel pas !
    // différence entre include et require :
    // dans le cas d'une erreur, include va déclencher un warning et la page continu de s'exécuter
    // dans le cas d'une erreur, require va déclencher une erreur fatale et bloque l'exécution du code à la suite


    ?>


    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>