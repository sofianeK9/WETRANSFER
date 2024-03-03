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
        list($retourChangement, $message) = changementIdentifiant($ancienEmail, $email);
    } else {
        $retourChangement = false;
        $message = "Les deux emails sont identiques. Veuillez en choisir un autre.";
    }
}

if (isset($_POST['chgtEmail'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ancienMotDePasse = filter_input(INPUT_POST, "ancienMotDePasse");
        $motDePasse = filter_input(INPUT_POST, "motDePasse");
        $motDePasseConfirme = filter_input(INPUT_POST, "motDePasseConfirme");
    }

    if ($motDePasse == $motDePasseConfirme) {
        require_once '../fonctions/changementMdpcomposants/modificationIdentifiant.php';
        $retourChangement = changementMdp($ancienMotDePasse, $motDePasse);
        list($valide, $retourMdp, $identifiant, $ancienMotDePasse, $motDePasse, $data1) = $retourChangement;
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
    <?php if ($message) : ?>
        <div class="boxMessage">
            <p><?= $message ?></p>
        </div>
    <?php endif; ?>
    <div class="boxModification">
        <?php include '../composants/modificationIdentifiant.php'; ?>
        <?php include '../composants/modificationMdp.php'; ?>
    </div>
</main>
</body>

</html>