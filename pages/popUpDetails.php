<?php
$partage = false;

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
        <h1>Détails du fichier</h1>
        <h2 id="detailName" class="detail">Nom du fichier :  </h2>
        <h2 id="detailSize" class="detail">Taille du fichier :  </h2>
        <h2 id="detailChargement" class="detail">Nombre de telechargements : </h2> 

    <?php //if($partage): ?>
        <h2 id="detailPartage" class="detail">Partagé avec :</h2>

    <?php //else: ?>
        <div id="detailAPartager">
            <h2 class="detail">A partager avec :</h2>
            <input class="emailPartage" type="email">
            <button class="btn">Partager</button>
        </div>
    <?php //endif; ?>
    <a onclick="fermerModal('modalDetails')" class="btnClose">X</a>
    </div>

</body>
</html>