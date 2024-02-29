<?php require_once '../fonctions/fonctions.php';
connexion();
ini_set('display_errors', 1);
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

                <label id="motDePasse" name="motDePasse" for="motDePasse">Mot de passe</label>
                <input id="motDePasse" name="motDePasse" type="text">

                <input id="submit" type="submit" value="connexion">
                <a href="/WeTransfer/pages/inscription.php">Inscrivez-vous !</a>
            </fieldset>
        </form>
    </div>

</body>

</html>