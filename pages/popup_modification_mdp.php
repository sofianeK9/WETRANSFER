<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $motDePasse = filter_input(INPUT_POST, "motDePasse");
    $motDePasseConf = filter_input(INPUT_POST, "motDePasseConf");

    if($motDePasse = $motDePasseConf) {
        
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/popup_modification_mdp.css">
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