<?php
require_once '../fonctions/fonctions.php';
session_start();
if (!isset($_SESSION["connecte"])) {
    header:
    ('Location: ../pages/connexion.php');
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
foreach ($dataFichiers as $f) {
    //si des fichiers ont pour propriétaire l'identifiant de la personne connectée
    if ($f["proprietaire"] == $_SESSION["identifiant"]) {
        $mesFichiers[] = $f;
    //si des fichiers ont pour cible l'identifiant de la personne connectée
    } elseif ($f["emailPartage"] == $_SESSION["identifiant"]) {
        $fichiersPartages[] = $f;
    }
}
$erreur = "";
upload();
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
<header>
    <!-- barre de navigation -->
    <nav class="navbar">
        <a href="#mesFichiers">Mes fichiers</a>
        <a href="#fichiersPartages">Fichiers partagés</a>
        <a onclick="ouvrirModal('modalModifIdentifiant')">Modifier mon email</a>
        <a onclick="ouvrirModal('modalModifMdp')">Modifier mon mot de passe</a>
        <a href="../pages/deconnexion.php">Se déconnecter</a>
    </nav>
</header>

<body>
    <h2>Bonjour <?= $_SESSION["identifiant"] ?></h2>
    <div id="contain">
        <a class="btn btnAjout" onclick="ouvrirModal('modalAjout')">Ajouter un fichier</a>
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
                        <th>Détails</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- boucle sur chacun de mes fichiers -->
                    <?php foreach ($mesFichiers as $f) : ?>
                        <tr>
                            <td><?= $f ?></td>
                            <!-- ajout fonction JS pour delete au niveau de la popup de confirmation? -->
                            <td><span onclick="ouvrirModal('modalDelete')" class="material-symbols-outlined">delete</span></td>
                            <!-- ajout fonction JS pour download -->
                            <td><a <?php //readfile($f) ou file_get_contents($f) 
                                    ?> href="../fichiersUpload/<?= $f ?>" download><span class="material-symbols-outlined">download</span></td>
                            <td><a class="btn" onclick="ouvrirModal('modalDetails')">Détails</a></td>
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
                    <th>Supprimer</th>
                    <th>Télécharger</th>
                </tr>
            </thead>
            <tbody>
                <!-- boucle sur chacun des fichiers -->
                <?php foreach ($fichiersPartages as $f) : ?>
                    <tr>
                        <td><?= $f ?></td>
                        <!-- ajout fonction JS pour delete au niveau de la popup de confirmation -->
                        <td><span onclick="ouvrirModal('modalDelete')" class="material-symbols-outlined">delete</span></td>
                        <!-- ajout fonction JS pour download -->
                        <td><span class="material-symbols-outlined">download</span></td>
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
    <!--//Popup d'ajout de fichier-->
    <div id="modalAjout" class="modal hidden">
        <div class="modal-content">
            <?php include '../pages/popUpAjoutFichier.php' ?>
        </div>
    </div>
    <!--Popup de détails(ou mettre ds le meme modal avec des classe add remove ?)-->
    <div id="modalDetails" class="modal hidden">
        <div class="modal-content">
            <?php include '../pages/popUpDetails.php' ?>
        </div>
    </div>
    <!--//Popup de modif identifiant-->
    <div id="modalModifIdentifiant" class="modal hidden">
        <div class="modal-content">
            <?php include '../pages/popUpModificationIdentifiant.php' ?>
        </div>
    </div>
    <!--Popup de modif mdp-->
    <div id="modalModifMdp" class="modal hidden">
        <div class="modal-content">
            <?php include '../pages/popUpModificationMdp.php' ?>
        </div>
    </div>
    <div id="modalDelete" class="modal hidden">
        <div class="container">
            <h1>Suppression du fichier</h1>
            <h2 class="detail">Etes-vous certain de vouloir supprimer le fichier <?= $f ?> ? </h2>
            <button class="btn btnDelete">Oui</button>
            <a onclick="fermerModal('modalDelete')" class="btnClose">X</a>
        </div>
    </div>
</body>

</html>