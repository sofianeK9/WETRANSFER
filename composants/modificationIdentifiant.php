<?php

?>

<div class="container">
    <!-- Formulaire de modification du profil -->
    <form  method="POST"  class="form_modif">
        <legend class="legend">Modifier mon identifiant</legend>
        <label for="ancienEmail">Ancien email : </label>
        <input type="email" id="ancienEmail" name="ancienEmail">
        <label for="email">Nouvel email : </label>
        <input type="email" id="email" name="email">

        <input type="submit" name="chgtEmail" value="Valider">
    </form>

</div>