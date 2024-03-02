<?php

function changementMdp($motDePasse)
{
    $identifieur = $_SESSION["identifiant"];

    // On recupère le contenu du fichier identifiants
    $fichier = file_get_contents('../pages/identifiants.txt');

}
?>