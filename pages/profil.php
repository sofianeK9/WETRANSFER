<?php

session_start();


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ModificationProfil.css">
    <title>Modification du profil</title>
</head>


<?php include '../composants/header.php'; ?>
<main>
    <h1 class="titre">Modification du profil</h1>
    <div classe="boxMessage">

        <?php if ($message) : ?>
            <p><?php echo $message ?></p>
        <?php endif; ?>
    </div>
    <div class="boxModification">
        <?php include '../composants/modificationIdentifiant.php'; ?>
        <?php include '../composants/modificationMdp.php'; ?>
    </div>
</main>
</body>

</html>