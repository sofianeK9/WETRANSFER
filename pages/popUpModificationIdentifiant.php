<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = filter_input(INPUT_POST, "email");
    
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
    <form action="" class="form_modif_iden">
        <legend class="legend">Modifier mon identifiant</legend>
        <label for="email">Nouvel email : </label>
        <input type="email" id="email" name="email" >

        <input type="submit" value="Valider">
    </form>
</body>
</html>