<?php

function changementIdentifiant($ancienEmail, $email) {
        $retour = "";
        // On recupère le contenu du fichier identifiants
        $fichier = file_get_contents('../pages/identifiants.txt');
        // Si la récupération n'est pas faite, on renvoie false
        if ($fichier === false) {
            $retour = "Une erreur est survenue. Veuillez recharger la page.";
            return [false, $retour];
        } else {
            // Sinon, on appelle la fonction de vérification de l'unicité de l'email
            require_once '../fonctions/emailUnique.php';
            if (emailUnique($email)) {
                // Si l'email n'est pas présent, on remplace l'ancien email par le nouveau
                $fichier = str_replace($ancienEmail, $email, $fichier);
                // On ecrit le nouveau contenu dans le fichier identifiants
                if (file_put_contents('../pages/identifiants.txt', $fichier) === false) {
                    $retour = "Une erreur est survenue. Veuillez recharger la page.";
                    return false;
                } else {
                    // Si tout est bon, on renvoie true
                    $retour = "L'identifiant a bien été modifié.";
                    return [true, $retour];
                }
            } else { 
                // Si l'email est déjà utilisé, on renvoie false
                $retour = "Cet email est déjà utilisé. Veuillez en selectionner un autre.";
                return [false, $retour];
            }
        }  
}