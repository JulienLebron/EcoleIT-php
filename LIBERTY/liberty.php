<?php

$dsn = 'mysql:host=localhost;dbname=dialogue;charset=utf8mb4';
$login = 'root';
$password = '';

$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

$pdo = new PDO($dsn, $login, $password, $options);

$messageInfo = '';

if (!empty($_POST['pseudo']) && !empty($_POST['message'])) {
    $pseudo = trim($_POST['pseudo']);
    $message = trim($_POST['message']);
    $color = trim($_POST['exampleColorInput']);

    $resultat = $pdo->prepare("
        INSERT INTO commentaire (pseudo, message, date_enregistrement, color)
        VALUES (:pseudo, :message, NOW(), :color)
    ");

    $resultat->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $resultat->bindValue(':message', $message, PDO::PARAM_STR);
    $resultat->bindValue(':color', $color, PDO::PARAM_STR);
    $resultat->execute();

    header('Location: liberty.php');
    exit;
} else {
    $messageInfo = '<div class="alert alert-primary text-center"><h2>Liberty Chat</h2></div>
                    <div class="alert alert-info text-center">✅ Compléter le formulaire ci-dessous pour publier un message !</div>';
}

$commentaires = $pdo->query("SELECT * FROM commentaire ORDER BY date_enregistrement DESC");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Liberty Chat</title>
</head>
<body>
    <div class="container">
        <?= $messageInfo ?>

        <div class="row">
            <div class="col-md-8">
                <div class="row mt-3">
                    <div class="col-12 p-3 border">
                        <?php while($commentaire = $commentaires->fetch()) : ?>
                            <div class="card mb-3">
                                <h5 class="card-header text-white"
                                    style="background-color: <?= htmlspecialchars($commentaire['color']) ?>">
                                    Posté par : <?= htmlspecialchars($commentaire['pseudo']) ?>
                                    , le : <?= htmlspecialchars($commentaire['date_enregistrement']) ?>
                                </h5>
                                <div class="card-body">
                                    <p class="card-text"><?= nl2br(htmlspecialchars($commentaire['message'])) ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="row mt-3">
                    <div class="col mx-auto">
                        <form action="" method="post">
                            <div class="row mb-3">
                                <div class="col-md-10">
                                    <label for="pseudo" class="form-label">Pseudo</label>
                                    <input type="text" name="pseudo" id="pseudo" class="form-control" required>
                                </div>
                                <div class="col-md-2 text-center">
                                    <label for="exampleColorInput" class="form-label" style="margin-left:-18px;">Couleur</label>
                                    <input type="color" class="form-control form-control-color" id="exampleColorInput"
                                           value="#563d7c" name="exampleColorInput" style="height:40px;">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea name="message" id="message" rows="7" required class="form-control"></textarea>
                            </div>

                            <div class="col">
                                <input type="submit" value="Valider" class="w-100 btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>