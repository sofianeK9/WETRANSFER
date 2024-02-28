<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/popUp.css">
    <title>Détails</title>
</head>
<body>
    <div class="container">
        <div class="ajoutFichier">
            <h1>Ajouter un fichier</h1>
            <form method="POST" action="upload.php" enctype="multipart/form-data">
            <!-- On limite le fichier à 100Ko -->
            <input type="hidden" name="MAX_FILE_SIZE" value="20000">
            Fichier : <input type="file" name="" id="avatar">
            <input type="submit" name="envoyer" value="Envoyer le fichier">
</form>
        </div>
        <div>
            <h2 class="detail">A partagé avec :</h2>
            <input class="emailPartage" type="email">
            <button class="btn btnPartage">Partager</button>
        </div>
        <button class="btn btnClose">Fermer</button>
    </div>
</body>
</html>