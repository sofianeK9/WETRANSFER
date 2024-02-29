<?php

$erreur = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
$fichier = $_FILES['fichierUpload'];

/* var_dump($fichier); */

// si il n'y a pas d'erreur :
if($fichier['error'] == UPLOAD_ERR_OK) {
    // on recupere l'extension
    $partie = explode('.', $fichier['name']);
    $extension = $partie[1];
    // on verifie que l'extension n'est pas du .php
    if($extension != 'php') {
        // on ouvre le fichier
        $finfo = finfo_open(FILEINFO_MIME);
        // on recupere le type du fichier (pour verifier le contenu du fichier)
        $info = finfo_file($finfo, $fichier['tmp_name']);

        // si le fichier ne contient pas de php :
        if(!str_contains($info, 'text/x-php')) {
            // on recupere la taille du fichier
            $taille = filesize($fichier['tmp_name']);

            // si la taille ne depasse pas 20Mo :
            if($taille < 20480) {
                // on enregistre le fichier dans le dossier choisi
                move_uploaded_file($fichier['tmp_name'], 'C:/wamp64/www/ExoPhp/WETRANSFER/fichiersUpload/' . $fichier['name']);
            } else {
                $erreur = "Le fichier est trop volumineux";
            }
        } else {
            $erreur = "Le fichier ne doit pas contenir de php";
        }
    } else {
        $erreur = "le fichier ne doit pas etre un .php";
    }
} else {
    $erreur = "Une erreur est survenue";
}
}

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
            <form method="POST" enctype="multipart/form-data">
                <label for="fichierUpload">Choisir un fichier</label>
                <input type="file" name="fichierUpload">
                <input class="btn btnAjoutFichier" type="submit" value="Envoyer le fichier">
            </form>
        </div>

        <?php if($erreur): ?>
            <p class="erreur"><?= $erreur ?></p>
        <?php endif; ?>

        <div>
            <h2 class="detail">Partager le fichier avec :</h2>
            <input class="emailPartage" type="email">
            <button class="btn btnPartage">Partager</button>
        </div>
        <button class="btn btnClose">Fermer</button>
    </div>
</body>
</html>