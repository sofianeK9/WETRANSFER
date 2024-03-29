<?php


function changementMdp($ancienMotDePasse, $motDePasse)
{
    $identifieur = $_SESSION["identifiant"];

    // On recupère le contenu du fichier identifiants
    $donnees = file_get_contents('../pages/identifiants.txt');
    if ($donnees === false) {
        $messageMdp = "Une erreur est survenue. Veuillez recharger la page.";
        return [false, $messageMdp];
    } else {
        // On separe les lignes
        $entrees = explode("\n", $donnees);

        // Pour chacune des lignes, on  vérifie que l'identifiant de la session correspond a utilisiteur de la ligne traitée
        // et que l'ancien mot de passe correspond bien au mot de passe de l'utilisateur
        foreach ($entrees as $entree) {
            $datas = explode(",", $entree);
            if ($identifieur == $datas[0] && password_verify($ancienMotDePasse, trim($datas[1]))) {
                // On hache le nouveau mot de passe
                include '../fonctions/hashage.php';
                $nouveauMotDePasse = hachage($motDePasse);
                $ancienMotDePasseHache = $datas[1];
            } 
        }
        // On remplace l'ancien mot de passe par le nouveau
        $donnees = str_replace($ancienMotDePasseHache, $nouveauMotDePasse, $donnees);
        if (file_put_contents('../pages/identifiants.txt', $donnees) === false) {
            $messageMdp = "Une erreur est survenue. Veuillez recharger la page.";
            return [false, $messageMdp];
        } else {
            $messageMdp = "Mot de passe modifié.";
            return [true, $messageMdp];
        }
    }
}