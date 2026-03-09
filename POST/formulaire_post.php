<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire POST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-6 mt-5 mx-auto">
                <h1>Formulaire POST</h1>
                <?php
                    echo '<pre>';
                    print_r($_POST);
                    echo '</pre>';

                    // Afficher proprement (avec echo) les informations provenant du formulaire
                    // Pseudo : 
                    // Email : 
                    // Penser au cas d'erreur possible (est-ce que ça existe)

                    if(!empty($_POST['pseudo']) && !empty($_POST['email']))
                    {
                        echo 'Votre Pseudo est : ' . $_POST['pseudo'] . '<br>';
                        echo 'Votre Email est : ' . $_POST['email'] . '<br>';
                        // supprimer les espaces en début et en fin de chaine (pseudo, email) trim()
                        $pseudo = trim($_POST['pseudo']);
                        $email = trim($_POST['email']);
                        // le pseudo doit avoir entre 4 et 14 caractères inclus, sinon afficher un message d'erreur pour l'utilisateur

                        if(iconv_strlen($pseudo) < 4 || iconv_strlen($pseudo) > 14)
                        {
                            echo '<div class="alert alert-danger mt-3">⚠ Attention, le pseudo doit avoir entre 4 et 14 caractères inclus.</div>';
                        }
                        else
                        {
                            echo '<div class="alert alert-success mt-3">✅ Le pseudo : ' . $pseudo . ' est correct ! Bienvenue sur notre site !</div>';
                        }

                        // controler la validité de l'email ( filter_var() )
                        // si le format de l'email n'est pas correct on affiche un message d'erreur pour l'utilisateur

                        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false)
                        {
                            echo "<div class='alert alert-danger mt-3'>⚠ Attention, le format de l'adresse email n'est pas correct. Veuillez renseigner une adresse email valide.</div>";
                        }
                        else
                        {
                            echo '<div class="alert alert-success mt-3">✅ L\'email : ' . $email . ' est correct ! Bienvenue sur notre site !</div>';
                        }
                    }
                    else
                    {
                        echo '<div class="alert alert-danger mt-3">🛑 Veuillez renseigner tous les champs du formulaire !</div>';
                    }
                ?>


                <!-- Attribut du formulaire : 
                ------------------------
                method => la méthode utilisée pour récupérer les données (GET ou POST, si non précisé, c'est GET par défaut)
                action => l'url cible ou l'on va lors de la validation du form et la ou seront envoyées les données du form 
                enctype => obligatoire pour récupérer les fichiers dans le cas d'un ou des inputs de type="file" ($_FILES)

                Attributs des champs : 
                ---------------------- 
                id => pour lier avec le label, pour css et/ou du js, pour ancre 
                name => obligatoire sur les champs pour récupérer leur donnée, représente l'indice que l'on retrouve dans $_GET ou $_POST -->

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="pseudo" class="form-label">Pseudo</label>
                        <input type="text" name="pseudo" id="pseudo" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary w-100" value="✅ Valider">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>