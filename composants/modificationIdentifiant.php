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
var_export($message,true);

?>

<div class="container">
    <!-- Formulaire de modification du profil -->
    <form method="POST" class="form_modif">
        <legend class="legend">Modifier mon identifiant</legend>
        <label for="ancienEmail">Ancien email : </label>
        <input type="email" id="ancienEmail" name="ancienEmail">
        <label for="email">Nouvel email : </label>
        <input type="email" id="email" name="email">

        <input type="submit" value="Valider">
    </form>

</div>