<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $motDePasse = filter_input(INPUT_POST, "motDePasse");
    $motDePasseConfirme = filter_input(INPUT_POST, "motDePasseConfirme");
}
var_dump($motDePasse, $motDePasseConfirme);
if ($motDePasse == $motDePasseConfirme) {
    require_once '../fonctions/changementMdp.php';
    $retourChangement = changementMdp($motDePasse);
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/popUpModificationProfil.css">
    <title>Modification du profil</title>
</head>

<body>
    <form method="POST" class="form_modif_mdp">
        <legend class="legend">Modifier mon mot de passe</legend>
        <label for="motDePasse">Nouveau mot de passe : </label>
        <input type="password" id="motDePasse" name="motDePasse">

        <label for="motDePasseConf">Confirmer votre mot de passe : </label>
        <input type="password" id="motDePasseConf" name="motDePasseconf">

        <input type="submit" value="Valider">
    </form>
</body>

</html>