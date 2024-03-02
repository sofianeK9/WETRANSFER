<?php
$user = $_SESSION['identifiant'];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ModificationProfil.css">
    <title>Modification du profil</title>
</head>

<body>
    <nav class="navBarProfil">
        <div class="liens">
            <a href="../pages/fichiers.php">Mes fichiers</a>
            <a href="../pages/profil.php"><?php $user ?></a>
            <a href="../pages/deconnexion.php">Se déconnecter</a>
        </div>
    </nav>
    <h1 class="titre">Modification du profil</h1>
    <div class="boxModification">
        <?php include '../composants/modificationIdentifiant.php'; ?>
        <?php include '../composants/modificationMdp.php'; ?>
    </div>
    <div>
        <!-- Affichage du message du résultat -->
        <?php if ($message) : ?>
            <p><?php $message ?></p>
        <?php endif; ?>
    </div>
</body>

</html>