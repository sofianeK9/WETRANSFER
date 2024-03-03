<?php



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

        <input type="submit" name="chgtMotDePasse" value="Valider">
    </form>
</div>