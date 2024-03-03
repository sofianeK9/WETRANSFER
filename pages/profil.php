<?php

session_start();

if (isset($_POST['chgtEmail'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des informations du formulaire ( ancien email, nouvel email )
        $ancienEmail = filter_input(INPUT_POST, "ancienEmail");
        $email = filter_input(INPUT_POST, "email");
    }
    //Si les deux emails sont différents
    if ($ancienEmail != $email) {

        // Appel de la fonction de changement de l'identifiant
        require_once '../fonctions/changementIdentifiant.php';
        list($retourChangementEmail, $messageEmail) = changementIdentifiant($ancienEmail, $email);
    } else {
        $retourChangementEmail = false;
        $messageEmail = "Les deux emails sont identiques. Veuillez en choisir un autre.";
    }
}

if (isset($_POST['chgtMotDePasse'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupération des informations du formulaire ( ancien mot de passe , nouvel mot de passe )
        $ancienMotDePasse = filter_input(INPUT_POST, "ancienMotDePasse");
        $motDePasse = filter_input(INPUT_POST, "motDePasse");
        $motDePasseConf = filter_input(INPUT_POST, "motDePasseConf");
    }
    if ($motDePasse == $motDePasseConf) {
        require_once '../fonctions/changementMdp.php';
        list($retourChangementMdp, $messageMdp) = changementMdp($ancienMotDePasse, $motDePasse);
    } else {
        $retourChangementMdp = false;
        $messageMdp = "Les deux mots de passe ne sont pas identiques. Veuillez recommencer.";
    }
}

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
    <?php if (isset($retourChangementEmail)) : ?>
        <div class="boxMessage">
            <p><?= $messageEmail ?></p>
        </div>
    <?php endif; ?>
    <?php if (isset($retourChangementMdp)) : ?>
        <div class="boxMessage">
            <p><?= $messageMdp ?></p>
        </div>
    <?php endif; ?>
    <div class="boxModification">
        <?php include '../composants/modificationIdentifiant.php'; ?>
        <?php include '../composants/modificationMdp.php'; ?>
    </div>
</main>
</body>

</html>