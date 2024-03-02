<?php
function partage()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $emailPartager = filter_input(INPUT_POST, "emailPartage", FILTER_VALIDATE_EMAIL);
        $name = filter_input(INPUT_POST, "name");
        // Récupération des données existantes du fichier JSON
        $existingData = json_decode(file_get_contents('../data/dataFichiers.json'), true);
        // Rechercher le fichier concerné
        foreach ($existingData as &$fichier) {
            if ($fichier['name'] == $name) {
                // Mettre à jour la valeur de 'emailPartage' pour ce fichier
                $fichier['emailPartage'] = $emailPartager;
                break;
            }
        }
        // Enregistrer les données mises à jour dans le fichier JSON
        file_put_contents('../data/dataFichiers.json', json_encode($existingData));

        header("Location: fichiers.php");

        exit();
    }
}
partage();
