<?php

function inscription()
{

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $identifiant = filter_input(INPUT_POST, "identifiant", FILTER_VALIDATE_EMAIL);
        $motDePasse = filter_input(INPUT_POST, "motDePasse");
        $confirmationmotDePasse = filter_input(INPUT_POST, "confirmationmotDePasse");
        $motDePasseHascher = password_hash($confirmationmotDePasse, PASSWORD_DEFAULT);

      $fichier = file("identifiants.txt");
      foreach($fichier as $ligne) {
        $infos = explode(",", $ligne);
        if($infos[0] == $identifiant) {
            echo "Cet e-mai existe déjà, veuillez en choisir un autre.";
            return;
        }

      }

        if ($identifiant != "" &&  $motDePasse != "" && $confirmationmotDePasse != "" && $motDePasse === $confirmationmotDePasse) {
            $donnees = fopen("identifiants.txt", "a");

            fwrite($donnees, "$identifiant,$motDePasseHascher\n");

            fclose($donnees);

            echo "Inscription réussie !";

            header("Location: /WETRANSFER/pages/connexion.php");
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
                        header("Location: /WETRANSFER/pages/fichiers.php");
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
    header("Location: /WETRANSFER/pages/connexion.php");
    exit();
}

function upload() {
if($_SERVER["REQUEST_METHOD"] == "POST")
{

$fichier = $_FILES['fichierUpload'];

/* var_dump($fichier); */

// si il n'y a pas d'erreur :
if($fichier['error'] == UPLOAD_ERR_OK) {
    // on recupere l'extension
    $partie = explode('.', $fichier['name']);
    $extension = $partie[1];
    // on verifie que l'extension n'est pas du .php
    if($extension != 'php') {
        // on ouvre le fichier
        $finfo = finfo_open(FILEINFO_MIME);
        // on recupere le type du fichier (pour verifier le contenu du fichier)
        $info = finfo_file($finfo, $fichier['tmp_name']);

        // si le fichier ne contient pas de php :
        if(!str_contains($info, 'text/x-php')) {
            // on recupere la taille du fichier
            $taille = filesize($fichier['tmp_name']);

            // si la taille ne depasse pas 20Mo :
            if($taille < 2000480) {
                // on enregistre le fichier dans le dossier choisi
                move_uploaded_file($fichier['tmp_name'], 'C:/wamp64/www/WETRANSFER/fichiersUpload/' . $fichier['name']);

                // Enregistrement des informations sur le fichier dans un tableau
                $fileInfo = array(
                    'id' => uniqid(),
                    'name' => $fichier['name'],
                    'size' => $fichier['size'],
                    'type' => $fichier['type']
                );
                // Récupération des données existantes du fichier JSON
                $existingData = json_decode(file_get_contents('../data/dataFichiers.json'), true);

                // Ajout des nouvelles informations sur le fichier
                $existingData[] = $fileInfo;

                // Écriture des données mises à jour dans le fichier JSON
                file_put_contents('../data/dataFichiers.json', json_encode($existingData));

                header("Location: fichiers.php");

                exit();
            } else {
                $erreur = "Le fichier est trop volumineux";
            }
        } else {
            $erreur = "Le fichier ne doit pas contenir de php";
        }
    } else {
        $erreur = "le fichier ne doit pas etre un .php";
    }
} else {
    $erreur = "Une erreur est survenue";
}
}
}