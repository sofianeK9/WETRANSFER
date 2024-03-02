<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ancienMotDePasse = filter_input(INPUT_POST, "ancienMotDePasse");
    $motDePasse = filter_input(INPUT_POST, "motDePasse");
    $motDePasseConfirme = filter_input(INPUT_POST, "motDePasseConfirme");
}

if ($motDePasse == $motDePasseConfirme) {
    require_once '../fonctions/changementMdp.php';
    $retourChangement = changementMdp($ancienMotDePasse, $motDePasse);
    list($valide, $retourMdp, $identifiant, $ancienMotDePasse, $motDePasse, $data1) = $retourChangement;

}

?>
<div class="container">
    <form method="POST" class="form_modif">
        <legend class="legend">Modifier mon mot de passe</legend>
        <label for="ancienMotDePasse">Ancien mot de passe : </label>
        <input type="password" id="ancienMotDePasse" name="ancienMotDePasse">

        <label for="motDePasse">Nouveau mot de passe : </label>
        <input type="password" id="motDePasse" name="motDePasse">

        <label for="motDePasseConf">Confirmer votre mot de passe : </label>
        <input type="password" id="motDePasseConf" name="motDePasseconf">

        <input type="submit" value="Valider">
    </form>
</div>