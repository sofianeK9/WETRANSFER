<?php require_once '../fonctions/fonctions.php';
inscription();
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/WeTransfer/css/inscription.css">
    <title>Page d'inscription</title>
</head>

<body>
    <h1>Inscription</h1>
    <div class="formulaire">
        <form method="POST" class="form">
            <fieldset>
                <label for="identifiant">Identifiant</label>
                <input id="identifiant" name="identifiant" type="email">

                <label for="motDePasse">Mot de passe</label>
                <input id="motDePasse" name="motDePasse" type="password">

                <label for="confirmationmotDePasse">Confirmation de mot de passe</label>
                <input id="confirmationmotDePasse" name="confirmationmotDePasse" type="password">

                <input id="submit" type="submit" value="Inscription">
                <a href="/WeTransfer/pages/connexion.php">Déjà inscrit ? Connectez-vous !</a>
            </fieldset>
        </form>
    </div>


</body>

</html>