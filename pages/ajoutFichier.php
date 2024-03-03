<?php require_once '../fonctions/fonctions.php';
session_start();
upload();

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
                <label for="emailPartage">Partagé avec :</label>
                <input class="emailPartage" type="emailPartage" name="emailPartage">
                <input class="btn btnAjoutFichier" type="submit" value="Envoyer le fichier">
            </form>
        </div>
        
        <a href="../pages/fichiers.php" class="btnClose">retour</a>
    </div>
</body>
</html>
