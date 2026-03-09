<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="p-5">

    <?php
        echo '<pre>';
        print_r($_POST);
        echo '</pre>';

        $name = !empty($_POST['name']) ? $_POST['name'] : '' ;
        $firstname = $_POST['firstname'];
        $age = $_POST['age'];
        $city = $_POST['city'];

        if(iconv_strlen($name) < 3 || iconv_strlen($name) > 30) {
            echo '<div class="alert alert-danger mt-3">⚠ Attention, le nom doit avoir entre 3 et 30 caractères inclus.</div>';
        }

        ?>
    <div class="container">
        <?php
        echo "Bonjour $name $firstname <br>";
        echo "Vous avez $age ans <br>";
        echo "Vous habitez à $city <br><br>";
        ?>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" id="name" name="name" placeholder="Entrez votre nom" require class="form-control">
        </div>
        <div class="mb-3">
            <label for="firstname" class="form-label">Prénom</label>
            <input type="text" id="firstname" name="firstname" placeholder="Entrez votre prénom" require class="form-control">
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Âge</label>
            <input type="text" id="age" name="age" placeholder="Entrez votre âge" require class="form-control">
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">Ville</label>
            <input type="text" id="city" name="city" placeholder="Entrez le nom de votre ville" require class="form-control">
        </div>
        <button class="btn btn-primary">Valider</button>
    </form>
    

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>
</html>