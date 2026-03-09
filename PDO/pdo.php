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

            echo '<h2>Query : pour une requete de type action (INSERT / UPDATE / DELETE)</h2>';
            // La méthode query() permet de déclencher une requête SQL
            // Requête INSERT 
            // $resultat = $pdo->query("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Brandon', 'Lebrun', 'm', 'web', CURDATE(), 300)");

            // Requête UPDATE
            // $resultat = $pdo->query("UPDATE employes SET salaire = 1800 WHERE id_employes = 699");
            // $resultat = $pdo->query("UPDATE employes SET salaire = (salaire+200) WHERE service = 'secretariat'");

            // Requête DELETE
            // $resultat = $pdo->query("DELETE FROM employes WHERE id_employes = 991");
            // $resultat = $pdo->query("DELETE FROM employes WHERE id_employes IN (994,995)");
            // $resultat = $pdo->query("DELETE FROM employes WHERE service = 'Web' AND id_employes != 996");



            // pour connaître le nombre de ligne impactées : rowCount()
            // echo '<div class="alert alert-info text-center">Nombre de ligne impactées par la dernière requête : ' . $resultat->rowCount() . '<br></div>';

            echo '<h2>Query : pour une requete de type Question (SELECT) pour une ligne de résultat</h2>';

            $resultat = $pdo->query("SELECT * FROM employes WHERE id_employes = 701");

            echo '<pre>';
            print_r($resultat);
            echo '</pre>';

            // En l'état, la réponse de la base de données ($résultat) est inexploitable
            // Pour rendre les données exploitable par PHP, il faut transformer la ligne obtenu avec la méthode fetch()

            // FETCH_ASSOC pour obtenir la ligne sql sous forme de tableau associatif (associatif : on associe le nom des colonnes comme étant les indices du tableau array)
            // $donnees = $resultat->fetch(PDO::FETCH_ASSOC); // on traite la ligne obtenu avec un fetch en mode FETCH_ASSOC

            
            // FETCH_NUM pour obtenir la ligne sql sous forme de tableau array avec des indices numériques
            // $donnees = $resultat->fetch(PDO::FETCH_NUM);

            // FETCH_BOTH pour obtenir un mélange de FETCH_ASSOC et FETCH_NUM (cas par défaut si non précisé)
            // $donnees = $resultat->fetch(PDO::FETCH_BOTH);

            
            // FETCH_OBJ pour obtenir les résultats sous forme d'objet
            $donnees = $resultat->fetch(PDO::FETCH_OBJ);


            echo '<pre>';
            echo print_r($donnees);
            echo '</pre>';

            // echo $donnees['prenom'] . " " . $donnees['nom'] . '<br>';
            // echo $donnees[1] . " " . $donnees[2] . '<br>';
            echo $donnees->prenom . ' ' . $donnees->nom . '<br>';

            echo '<h2>Query : pour une requete de type Question (SELECT) pour plusieurs lignes de résultat</h2>';

            $resultat = $pdo->query("SELECT * FROM employes");
            echo '<div class="alert alert-info text-center">Nombre de ligne impactées par la dernière requête : ' . $resultat->rowCount() . '<br></div>';

            // votre requête vous renvoie une seule ligne de résultat : fetch
            // votre requête vous renvoie plusieurs lignes de résultat : une boucle pour appliquer un fetch à chaque tour de boucle

            // pour faire sur un jeu de résultat : while()
            // while() va tourner tant qu'il y a une ligne que l'on traite avec un fetch, puis s'arrêtera naturellement lorsque toutes les lignes sont traitées.

            while($ligne_en_cours = $resultat->fetch(PDO::FETCH_ASSOC))
            {
                echo '<pre>'; print_r($ligne_en_cours); echo '</pre>';
            }

            echo 'Pour un affichage propre : <hr>';
            echo '<div style="display: flex; flex-wrap: wrap; justify-content: space-between;">';
            // Une ligne traitées avec un fetch ne pourra pas être traitée plus d'une fois.
            
            $resultat = $pdo->query("SELECT * FROM employes");

                while($ligne_en_cours = $resultat->fetch(PDO::FETCH_ASSOC))
                {
                    echo '<div style="background-color: steelblue; color: #fff; padding: 10px; box-sizing: border-box; width: 19%; margin-top: 20px;">';
                    // echo 'Id_employes : ' . $ligne_en_cours['id_employes'] . '<br>';
                    // echo 'Prenom : ' . $ligne_en_cours['prenom'] . '<br>';
                    // echo 'Nom : ' . $ligne_en_cours['nom'] . '<br>';
                    // echo 'Service : ' . $ligne_en_cours['service'] . '<br>';
                    // echo 'Sexe : ' . $ligne_en_cours['sexe'] . '<br>';
                    // echo 'Date embauche : ' . $ligne_en_cours['date_embauche'] . '<br>';
                    // echo 'Salaire : ' . $ligne_en_cours['salaire'] . '<br>';
                    foreach($ligne_en_cours AS $indice => $valeur)
                    {
                        echo ucfirst($indice) . ' : ' . $valeur . '<br>';
                    }
                    echo '</div>';
                }

            echo '</div>';

            echo '<h2>Query : pour plusieurs lignes de résultat avec fetchAll</h2>';

            $resultat = $pdo->query("SELECT * FROM employes");
            $tab_multi = $resultat->fetchAll(PDO::FETCH_ASSOC);

            echo '<pre>';
            print_r($tab_multi);
            echo '</pre>';

            echo '<ul>';
                foreach($tab_multi AS $sous_tableau)
                {
                    // echo '<pre>'; print_r($sous_tableau); echo '</pre>';
                    // foreach($sous_tableau AS $indice => $valeur)
                    // {
                    //     echo '<li>' . $valeur[0] . ' ' . $valeur[1] . '</li>';
                    // }
                    // echo '<pre>'; print_r($sous_tableau); echo '</pre>';
                    echo '<li>' . $sous_tableau['prenom'] . ' ' . $sous_tableau['nom'] . '</li>';
                }
            echo '</ul>';

            echo '<h2>Affichage de n\'importe quelle requête sous forme de tableau</h2>';
            
            $resultat = $pdo->query("SELECT * FROM employes");
            
            echo '<table style="width: 100%;">';
            // gestion des colonnes 
            echo '<thead>';
            echo '<tr>';
            for($i = 0; $i < $resultat->columnCount(); $i++)
            {
                $infos_colonne = $resultat->getColumnMeta($i);
                // echo '<pre>'; print_r($infos_colonne); echo '</pre>';
                echo '<th style="padding: 5px 10px;">' . ucfirst($infos_colonne['name']) . '</th>';
            }
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            // gestion des données du tableau
            while($ligne = $resultat->fetch(PDO::FETCH_ASSOC))
            {
                echo '<tr>';
                foreach($ligne AS $val)
                {
                    echo '<td style="padding: 5px 10px;">' . $val . '</td>';
                }
                echo '</tr>';
            }
                echo '</tbody>';
                echo '</table>';

            echo '<h2>Requête préparée avec prepare(), bindParam() et execute() à privilégier pour la sécurité</h2>';
            // Si dans la requête, une information provient d'un utilisateur (par exemple $_GET ou $_POST), il est possible que l'utilisateur fasse une injection SQL.
            // Pour se protéger contre les injections SQL : il faut utiliser prepare()

            $service = 'informatique';

            // avec query
            $resultat = $pdo->query('SELECT * FROM employes WHERE service = "' . $service . '"');

            // avec prepare()
            // on prepare la requete et on représente l'information attendue par un marqueur nominatif
            // prepare va nous protéger contre les attaques SQL /
            // elles représente 95% des problèmes de sécurité sur le web
            $service = 'secretariat';

            $resultat = $pdo->prepare('SELECT * FROM employes WHERE service = :marqueur'); // :marqueur est un marqueur nominatif

            // on rattache la valeur correspondante au marqueur nominatif
            // bindParam(le_marqueur, sa_valeur, son_type)
            $resultat->bindParam(':marqueur', $service, PDO::PARAM_STR); // PDO::PARAM_STR explique que la valeur doit être traitée comme une chaine de caractère

            // on execute
            $resultat->execute();

            
            $service = 'informatique';
            $salaire = 2500;

            $resultat2 = $pdo->prepare('SELECT * FROM employes WHERE service = :marqueur AND salaire > :marqueur2');

            $resultat2->bindParam(':marqueur', $service, PDO::PARAM_STR);
            $resultat2->bindParam(':marqueur2', $salaire, PDO::PARAM_STR);

            $resultat2->execute();

            $infos = $resultat2->fetchAll(PDO::FETCH_ASSOC);
            echo '<pre>'; print_r($infos); echo '</pre>';










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