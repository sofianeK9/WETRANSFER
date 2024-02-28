<?php
function inscription() {

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $identifiant = filter_input(INPUT_POST, "identifiant");
        $motDePasse = filter_input(INPUT_POST, "motDePasse");
        $confirmationMotDePasse = filter_input(INPUT_POST, "confirmationMotDePasse");

        if($identifiant != "" && $motDePasse === $confirmationMotDePasse) {

            $fichier = fopen("informations.txt", "a");

            fwrite($fichier, "$identifiant,$motDePasse,$confirmationMotDePasse\n");

            fclose($fichier);

            echo "inscription réussi !";

            // header("Location, ")
        }
    } else {
        echo "Veuillez remplir correctement tous les champs et vérifier que les mots de passe correspondent.";
    }

}