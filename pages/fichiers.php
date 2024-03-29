<?php
require_once '../fonctions/fonctions.php';
session_start();
if (!isset($_SESSION["connecte"])) {
    header('Location: ../pages/connexion.php');
    exit();
}
//$fichiersUpload = '../fichiersUpload';
//$fichiers = scandir($fichiersUpload);
//$fichiers = array_diff($fichiers, array('.', '..'));
//récupérer le tableau avec les données des fichiers
$dataFichier = file_get_contents('../data/dataFichiers.json');
$dataFichiers = json_decode($dataFichier, true);
//créer des tableaux vides pour remplir le tableau 1 et 2
$mesFichiers = [];
$fichiersPartages = [];
//remplir les tableaux précédents selon la liste des données de fichiers
if ($dataFichiers != null){
    foreach ($dataFichiers as $f) {
        //si des fichiers ont pour propriétaire l'identifiant de la personne connectée
        if ($f["proprietaire"] == $_SESSION["identifiant"]) {
            $mesFichiers[] = $f;
        //si des fichiers ont pour cible l'identifiant de la personne connectée
        } if ($f["emailPartage"] == $_SESSION["identifiant"]) {
            $fichiersPartages[] = $f;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fonction de suppression d'un fichier
    $existingData = json_decode(file_get_contents('../data/dataFichiers.json'), true);
    $nomFichier = filter_input(INPUT_POST, "name");

        // Recherche du fichier dans les données existantes
        foreach ($existingData as $fichier) {
            if ($fichier["name"] == $nomFichier) {
                // Suppression du fichier du tableau
                unset($existingData[array_search($fichier, $existingData)]);
                break;
            }
        }
        // Enregistrement des données mises à jour dans le fichier JSON
        file_put_contents('../data/dataFichiers.json', json_encode(array_values($existingData)));
    
        // Suppression du fichier physique
        $cheminFichier = '../fichiersUpload/' . $nomFichier;
        if (file_exists($cheminFichier)) {
            unlink($cheminFichier);
        }
    header("Location: ../pages/fichiers.php");
    exit();

}


function nombreTelechargement($nomFichier)
{
    $dataFichier = file_get_contents('../data/dataFichiers.json');
    $dataFichiers = json_decode($dataFichier, true);
    foreach ($dataFichiers as &$f) {
        if ($f["name"] == $nomFichier) {
            $f["nombreTelechargement"] = $f["nombreTelechargement"] + 1;
            file_put_contents('../data/dataFichiers.json', json_encode($dataFichiers));
            return $f["nombreTelechargement"];
            break;
        }
    }
    return 0; // Valeur de retour par défaut si aucun fichier correspondant n'est trouvé
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fichiers.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="../fonctions/fonctionsJavascript.js"></script>

    <title>Liste des fichiers</title>
</head>
<?php require_once '../composants/header.php'; ?>
    <div id="contain">
        <a class="btn btnAjout" href="ajoutFichier.php">Ajouter un fichier</a>
        <!-- tableau de mes fichiers -->
        <h2 id="mesFichiers">Mes fichiers</h2>
        <!-- si j'ai des fichiers, le tableau s'affiche -->
        <?php if (!empty($mesFichiers)) : ?>
            <table>
                <thead>
                    <tr>
                        <th>Nom du fichier</th>
                        <th>Supprimer</th>
                        <th>Retélécharger</th>
                        <th>Taille</th>
                        <th>Nombre de téléchargements</th>
                        <th>Partager avec :</th>
                    </tr>
                </thead>
                
                <tbody>
                    <!-- boucle sur chacun de mes fichiers -->
                    <?php foreach ($mesFichiers as $f) : ?>
                        <tr>
                            <td><?= $f['name'] ?></td>
                            <!-- ajout fonction JS pour delete au niveau de la popup de confirmation? -->
                            <td><span onclick="ouvrirModal('modalDelete', '<?= $f['name'] ?>')" class="material-symbols-outlined">delete</span></td>
                            <!-- ajout fonction JS pour download -->
                            <td><a <?php nombreTelechargement($f['name']);?> href="../fichiersUpload/<?= $f['name'] ?>" download ><span class="material-symbols-outlined">download</span></td>
                            <td><?= $f['size'] ?> octets</td>
                            <td><?= $f['nombreTelechargement'] ?></td>
                            <!-- si email de partage : l'afficher -->
                            <td><?php if($f['emailPartage']): ?>
                                <?= $f['emailPartage'] ?>
                             <?php endif ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <!-- si je n'ai pas de fichier, pas de tableau, j'informe par un message -->
        <?php else : ?>
            <p>Aucun fichier disponible</p>
        <?php endif ?>
        <!-- tableau des fichiers qui me sont partagés -->
        <h2 id="fichiersPartages">Fichiers partagés</h2>
        <!-- s'il y a des fichiers, le tableau s'affiche -->
        <?php if (!empty($fichiersPartages)) : ?>
        <table>
            <thead>
                <tr>
                    <th>Nom du fichier</th>
                    <th>Taille</th>
                    <th>Télécharger</th>
                </tr>
            </thead>
            <tbody>
                <!-- boucle sur chacun des fichiers -->
                <?php foreach ($fichiersPartages as $f) : ?>
                    <tr>
                        <td><?= $f['name'] ?></td>
                        <td><?= $f['size'] ?> octets</td>
                        <!-- ajout fonction JS pour download -->
                        <td><a href="../fichiersUpload/<?= $f['name'] ?>" download><span class="material-symbols-outlined">download</span></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <!-- s'il n'y a pas de fichier, pas de tableau, j'informe par un message -->
        <?php else :?>
        <p>Aucun fichier disponible</p>
        <?php endif ?>
    </div>
<!-- ----------------------------------------------------------------
                            POP UPS 
--------------------------------------------------------------------->
    <!--Popup de confirmation de suppression-->
    <div id="modalDelete" class="modal hidden">
        <div class="container">
            <h1>Suppression du fichier</h1>
            <h2 id="fileToDelete" class="detail">Etes-vous certain de vouloir supprimer le fichier ? </h2>
            <form method="POST">
                <input class="hidden" type="text" value="<?= $f['name']?>" name="name">
                <button class="btn btnDelete" type="submit">Oui</button>
            </form>
            <a onclick="fermerModal('modalDelete')" class="btnClose">X</a>
        </div>
    </div>
</body>
</html>