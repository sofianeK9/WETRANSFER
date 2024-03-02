<?php

function changementIdentifiant($ancienEmail, $email) {
    // On vérifie que l'ancien email et le nouveau ne soient pas identiques
    if ($ancienEmail != $email) {
        // On recupère le contenu du fichier identifiants
        $fichier = file_get_contents('../pages/identifiants.txt');
        // Si la récupération n'est pas faite, on renvoie false
        if ($fichier === false) {
            return false;
        } else {
            // Sinon, on appelle la fonction de vérification de l'unicité de l'email
            require_once '../fonctions/emailUnique.php';
            if (emailUnique($email)) {
                // Si l'email n'est pas présent, on remplace l'ancien email par le nouveau
                $fichier = str_replace($ancienEmail, $email, $fichier);
                // On ecrit le nouveau contenu dans le fichier identifiants
                if (file_put_contents('../pages/identifiants.txt', $fichier) === false) {
                    return false;
                } else {
                    return true;
                }
            } else {
                // Si l'email est déjà utilisé, on renvoie false
                return false;
            }
        }
    }
    

}