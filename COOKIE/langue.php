<?php
// pour conserver le choix de l'utilisateur, nous allons créer un cookie sur le navigateur de l'utilisateur afin de pouvoir l'interroger lors de ses prochaines visites.


if(isset($_GET['langue']))
{
    // Si l'indice langue existe dans la superglobale $_GET (si utilisateur à cliqué sur un des liens)
    $langue = $_GET['langue'];
}
elseif(isset($_COOKIE['lang']))
{
    // Si l'indice lang existe dans la superglobal $_COOKIE (un cookie existe déjà sur le navigateur de l'internaute)
    $langue = $_COOKIE['lang'];
}
else
{
    // sinon la langue par défaut sera le français
    $langue = $langue_navigateur;
}


// setcookie(son_nom, sa_valeur, sa_duree_de_vie)
time();
//calcul une année en seconde : 
$un_an = 365*24*3600;
setcookie('lang', $langue, time() + $un_an);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOKIE</title>
    <style>
        .conteneur{ width: 1000px; margin: 0 auto; padding: 20px; border: 1px solid;}
        h1 {background-color: steelblue; padding: 20px; color: #fff;}
    </style>
</head>
<body>

    <div class="conteneur">
        <h1>Veuillez choisir une langue</h1>
        <ul>
            <li><a href="?langue=fr">Français</a></li>
            <li><a href="?langue=es">Espagnol</a></li>
            <li><a href="?langue=it">Italien</a></li>
            <li><a href="?langue=en">Anglais</a></li>
            <li><a href="?langue=de">Allemand</a></li>
        </ul>

        <?php
        if($langue == 'fr')
        {
            echo '<p>Bonjour, vous visiter actuellement le site en Français. Effectivement, la sauvegarde du cookie permet de retenir la langue avec laquelle vous naviguer sur le site pour vos prochaines visites. A bientot</p>';
        }
        elseif($langue == 'es')
        {
            echo '<p>Hola, En este momento està visitando el sitio en espanol. De hecho, la cookie permite la copia de seguridad de conservar el idioma que utilise el sitio para futuras visitas. Pronto.</p>';
        }
        elseif($langue == 'it')
        {
            echo '<p>Ciao, Se stai attualmente visitando il sito in Italiano. Infatti, il cookie consente il backup per mantenere la lingua che il sito per una futura visita. A presto </p>';
        }
        elseif($langue == 'en')
        {
            echo '<p>Hello, You are currently visiting the site in English. Indeed, the cookie allows the backup to retain the language that you use the site for future visits. Soon</p>';
        }
        elseif($langue == 'de')
        {
            echo '<p>Hallo, Sie besuchen die Seite derzeit auf Deutsch. Tatsächlich wird durch das Speichern des Cookies die Sprache, mit der Sie auf der Seite navigieren, für Ihre nächsten Besuche gespeichert. Bis bald</p>';
        }

        echo '<pre>';
        print_r($_SERVER);   
        echo '</pre>';   

        $langue_navigateur = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        echo $langue_navigateur;

        ?>

    </div>
    
</body>
</html>