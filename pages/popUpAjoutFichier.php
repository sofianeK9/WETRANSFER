<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../fonctions/fonctionsJavascript.js"></script>
    <link rel="stylesheet" href="../css/popUp.css">
    <title>Détails</title>
</head>
<body>
    <div class="container">
        <div class="ajoutFichier">
            <h1>Ajouter un fichier</h1>
            <form method="POST" enctype="multipart/form-data">
                <label for="fichierUpload">Choisir un fichier</label>
                <input type="file" name="fichierUpload">
                <input class="btn btnAjoutFichier" type="submit" value="Envoyer le fichier">
            </form>
        </div>

        <?php if($erreur): ?>
            <p class="erreur"><?= $erreur ?></p>
        <?php else: ?>
            <?php if($_SERVER["REQUEST_METHOD"] == "POST") : ?>
            <p class="success"> Le fichier <span><?= $fichier['name'] ?></span> a bien été envoyé</p>
            <?php endif; ?>
        <?php endif; ?>

        <div>
            <h2 class="detail">Partager le fichier avec :</h2>
            <input class="emailPartage" type="email">
            <button class="btn btnPartage">Partager</button>
        </div>
        <a onclick="fermerModal('modalAjout')" class="btnClose">X</a>
    </div>
</body>
</html>

<script>
    document.getElementById('uploadForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);
        fetch('popUpAjoutFichier.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => console.log(data)) // Gérer la réponse JSON du serveur si nécessaire
        .catch(error => console.error('Erreur :', error));
    });
</script>