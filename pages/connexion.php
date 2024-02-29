<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifieur = filter_input(INPUT_POST, "identifieur");
    $mdp = filter_input(INPUT_POST, 'mdp');

    $personnes = [];
    $fichier = file_get_contents('informations.txt');
    $lignes = explode("\n", $fichier);
    foreach ($lignes as $ligne) {
        $identifiants = explode(",", $ligne);
        $personnes[] = ["identifiant" => $identifiants[0], "motDePasse" => $identifiants[1], "confirmationmotDePasse" => $identifiants[2]];
    }
    header("Location: /WeTransfer/pages/fichiers.php");
    exit();
    if ( $identifieur != "" && $password != "" && $identifieur == $identifiant && $password == $mdp) {
        $_SESSION["connecte"] = true;

        header("Location: /WeTransfer/pages/connexion.php");
        exit();
    } elseif ($identifieur != $identifiant && $password != $mdp) {
        echo "identifiant invalide !";
    }
}
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/WeTransfer/css/inscription.css">
    <title>Page de connexion</title>
</head>

<body>
    <h1>Connexion</h1>
    <div class="formulaire">
        <form method="post" class="form">
            <fieldset>
                <label for="identifieur">Identifiant</label>
                <input id="identifieur" name="identifieur" type="text">

                <label id="mdp" name="mdp" for="mdp">Mot de passe</label>
                <input id="mdp" name="mdp" type="text">

                <input id="submit" type="submit" value="connexion">
                <a href="/WeTransfer/pages/inscription.php">Inscrivez-vous !</a>
            </fieldset>
        </form>
    </div>

</body>

</html>