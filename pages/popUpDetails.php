<?php
$partage = false;
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
        <h1>Détails du fichier</h1>
        <h2 class="detail">Nom du fichier : </h2><!--  <?php echo $name ?> -->
        <h2 class="detail">Propriétaire du fichier : </h2> <!-- <?php echo $owner ?> -->
        <h2 class="detail">Nombres de telechargements : </h2> <!-- <?php echo $downloads ?> -->

    <?php if($partage): ?>
        <h2>Partagé avec :</h2>

    <?php else: ?>
        <div>
            <h2 class="detail">A partagé avec :</h2>
            <input class="emailPartage" type="email">
            <button class="btn">Partager</button>
        </div>
    <?php endif; ?>
         
        <button class="btn btnClose">Fermer</button>
    </div>
</body>
</html>