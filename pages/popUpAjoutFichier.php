<?php
$fichier = $_FILES['fichier'];

var_dump($fichier);

$erreur = "";
if($fichier['error'] == UPLOAD_ERR_OK) {
    $partie = explode('.', $fichier['name']);
    $extension = $partie[1];
    if($extension != 'php') {

        $finfo = finfo_open(FILEINFO_MIME);
        $info = finfo_file($finfo, $fichier['tmp_name']);

        // si le type n'est pas un php : 
        if(!str_contains($info, 'text/x-php')) {
            $taille = filesize($fichier['tmp_name']);

            if($taille < 200000) {
                move_uploaded_file($fichier['tmp_name'], 'C:/wamp64/www/ExoPhp/WETRANSFER/fichiersUpload/' . $fichier['name']);
            } else {
                $erreur = "Le fichier est trop volumineux";
            }
        } else {
            $erreur = "erreur du contenu";
        }
    } else {
        $erreur = "erreur du nom";
    }
    
} else {
    $erreur = "Une erreur est survenue";
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
                <label for="fichier">Choisir un fichier</label>
                <input type="file" name="fichier" id="fichier">
                <input class="btn btnAjoutFichier" type="submit" value="Envoyer le fichier">
            </form>
        </div>

        <?php if($erreur): ?>
            <p class="error"><?= $erreur ?></p>
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