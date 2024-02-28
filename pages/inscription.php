<?php ini_set('display_errors', 1); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifiant = filter_input(INPUT_POST, "identifiant");
    $motDePasse = filter_input(INPUT_POST, "motDePasse"); 
    $confirmationmotDePasse = filter_input(INPUT_POST, "confirmationmotDePasse");

    // Vérification si les mots de passe correspondent
    if ($motDePasse === $confirmationmotDePasse) {
        $donnees = fopen("donnees.txt", "a");

        fwrite($donnees, "$identifiant,$motDePasse,$confirmationmotDePasse\n");
        
        fclose($donnees);
        
        echo "Inscription réussie !";
        
        // Redirection vers la page de connexion
        header("Location: /WeTransfer/pages/connexion.php");
        exit();
    } else {
        echo "Les mots de passe ne correspondent pas. Veuillez réessayer.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <form method="POST">
        <label for="identifiant">Identifiant</label>
        <input id="identifiant" name="identifiant" type="text">

        <label for="motDePasse">Mot de passe</label>
        <input id="motDePasse" name="motDePasse" type="password">

        <label for="confirmationmotDePasse">Confirmation de mot de passe</label>
        <input id="confirmationmotDePasse" name="confirmationmotDePasse" type="password">

        <input id="submit" type="submit" value="Inscription">
    </form>
    
</body>
</html>


