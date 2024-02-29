<?php

function inscription()
{

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $identifiant = filter_input(INPUT_POST, "identifiant");
        $motDePasse = filter_input(INPUT_POST, "motDePasse");
        $confirmationmotDePasse = filter_input(INPUT_POST, "confirmationmotDePasse");
        $motDePasseHascher = password_hash($confirmationmotDePasse, PASSWORD_DEFAULT);


        if ($identifiant != "" &&  $motDePasse != "" && $confirmationmotDePasse != "" && $motDePasse === $confirmationmotDePasse) {
            $donnees = fopen("identifiants.txt", "a");

            fwrite($donnees, "$identifiant,$motDePasseHascher\n");

            fclose($donnees);

            echo "Inscription réussie !";

            header("Location: /WeTransfer/pages/fichiers.php");
            exit();
        } elseif ($motDePasse != $confirmationmotDePasse) {
            echo "Les mots de passe ne correspondent pas. Veuillez réessayer.";
        } else {
            echo "Veuillez remplir les champs correctement.";
        }
    }
}

    function connexion()
    {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $identifieur = filter_input(INPUT_POST, "identifieur");
            $mdp = filter_input(INPUT_POST, 'motDePasse');

            if ($identifieur == "" || $mdp == "") {
                echo "Veuillez remplir les champs correctement";
            } else {
                $fichier = file_get_contents('identifiants.txt');
                $lignes = explode("\n", $fichier);
                foreach ($lignes as $ligne) {
                    $identifiants = explode(",", $ligne);
                    if ($identifieur == $identifiants[0] && password_verify($mdp, trim($identifiants[1]))){
                        $_SESSION["connecte"] = true;
                        header("Location: /WeTransfer/pages/fichiers.php");
                        exit();
                    }
                }
                echo "Identifiant ou mot de passe invalide !";
            }
        }
    }

function deconnexion()
{
    session_destroy();
    header("Location: /WeTransfer/pages/connexion.php");
    exit();
}
