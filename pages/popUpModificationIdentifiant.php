<?php
$message = "";
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

//suivant le retour de la fonction, on paramètre le message approprié
if ($retourChangement) {
    $changement = $message;
} else {
    $changement = $message;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/popUpModificationProfil.css">
    <script src="../fonctions/fonctionsJavascript.js"></script>
    <title>Modification du profil</title>
</head>

<body>
    <div class="container">
        <!-- Formulaire de modification du profil -->
        <form method="POST" class="form_modif_iden">
            <legend class="legend">Modifier mon identifiant</legend>
            <label for="ancienEmail">Ancien email : </label>
            <input type="email" id="ancienEmail" name="ancienEmail">
            <label for="email">Nouvel email : </label>
            <input type="email" id="email" name="email">

            <input type="submit" value="Valider">
        </form>
        <!-- Affichage du message du résultat -->
        <?php if($message): ?>
        <p><?php $message ?></p>
        <?php endif; ?>
        <a onclick="fermerModal('modalModifIdentifiant')" class="btnClose">X</a>

    </div>

</body>

</html>