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
        <h1>Exercice GET page 1</h1>

        <ul>
            <li><a href="page2.php?categorie=pantalon&couleur=rouge&taille=L">Pantalon</a></li>
        </ul>
    </div>

    <!-- Dans une url, il est possible de rajouter des informations ne concernant pas l'adresse de la page 
    S'il y a un ? dans l'url, l'adresse est avant le ?, ensuite on trouve des informations sous la forme : 
        ?indice1=valeur1&indice2=valeur2&indice3=valeur3&...  -->


    
</body>
</html>


<!-- https://
www.leboncoin.fr/
recherche
?
category=2
&
text=Audi%205
&
locations=Paris__48.84286199884429_2.3462607836534053_8158_5000
&
u_car_brand=AUDI
&
u_car_model=AUDI_A5
&
vehicle_type=berline
&
price=5000-15000
&
regdate=2010-2023 -->