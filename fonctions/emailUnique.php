<?php 

function emailUnique($email) {
    // Récupération du contenu du fichier identifiants.txt
    $fichier = file_get_contents('../pages/identifiants.txt');
    // Génèreation du motif ( email ) à verifier
    $motif='/'.$email.'/i';
    //Vérification de la presence du motif ( de l'email dans le fichier d'identifiants)
    $verification = preg_match($motif, $fichier);
    //Si la verification ne trouve pas le motif, renvoie false, sinon renvoie la valeur
        if ($verification == false) {
        // Si le motif n'est pas trouvé dans le fichier, emailUnique renvoie true
        return true;
    } else {
        // Si le motif est dans le fichier, emailUnique renvoie false
        return false;
    }
}

?>