<?php 
//session_start();
//if (!isset($_SESSION["connecte"])){
    //header:('Location: ../pages/connexion.php');
    //exit();}
$fichiersUpload = '../fichiersUpload';
$fichiers= scandir($fichiersUpload);
$fichiers = array_diff($fichiers, array('.', '..'));
//problème j'ai tous les fichiers
//faire une variable avec QUE mes fichiers pr tableau 1 -> propriétaire = id de celui connecté
//faire une variable avec fichiers dont je suis la cible pr tableau 2 -> cible = id de celui connecté
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fichiers.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    <title>Liste des fichiers</title>
</head>
<header>
    <!-- barre de navigation -->
<nav class="navbar">
            <a href="#mesFichiers">Mes fichiers</a>
            <a href="#fichiersPartages">Fichiers partagés</a>
            <a onclick="ouvrirModal('modalModifIdentifiant')">Modifier mon email</a>
            <a onclick="ouvrirModal('modalModifMpd')">Modifier mon mot de passe</a>
            <a href="../pages/deconnexion.php">Se déconnecter</a>
        </nav>
</header>
<body>
    <a class="btn" onclick="ouvrirModal('modalAjout')" >Ajouter un fichier</a>
    <!-- tableau de mes fichiers -->
    <h2 id="mesFichiers">Mes fichiers</h2>
    <!-- si j'ai des fichiers, le tableau s'affiche -->
    <?php if (!empty($fichiers)): ?>
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
    <?php foreach($fichiers as $f): ?>
        <tr>
            <td><?= $f ?></td>
            <!-- ajout fonction JS pour delete : créer une popup de confirmation? -->
            <td><span class="material-symbols-outlined">delete</span></td>
            <!-- ajout fonction JS pour download : créer une popup de confirmation? -->
            <td><span class="material-symbols-outlined">download</span></td>
            <td><a class="btn" onclick="ouvrirModal('modalDetails')">Détails</a></td>
        </tr>
        <?php endforeach ?>
    </tbody>
    </table>
    <!-- si je n'ai pas de fichier, pas de tableau, j'informe par un message -->
    <?php else: ?>
    <p>Aucun fichier disponible</p>
    <?php endif ?>
    <!-- tableau des fichiers qui me sont partagés -->
    <h2 id="fichiersPartages">Fichiers partagés</h2>
    <!-- s'il y a des fichiers, le tableau s'affiche -->
    <?php //if (): ?>
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
    <?php //foreach ?>
        <tr>
            <td>dggf</td>
            <td><span class="material-symbols-outlined">delete</span></td>
            <td><span class="material-symbols-outlined">download</span></td>
        </tr>
        <tr>
            <td>dggf</td>
            <td><span class="material-symbols-outlined">delete</span></td>
            <td><span class="material-symbols-outlined">download</span></td>
        </tr>
    <?php //endforeach ?>
    </tbody>
    </table>
    <!-- s'il n'y a pas de fichier, pas de tableau, j'informe par un message -->
    <?php //else: ?>
    <p>Aucun fichier disponible</p>
    <?php //endif ?>
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
</body>
</html>
    <!-- ----------------------------------------------------------------
                             FONCTION JAVASCRIPT 
    --------------------------------------------------------------------->
<script>
    //afficher le pop up sélectionné
    function ouvrirModal(idModal) {
    // Récupérer le modal
    var modal = document.getElementById(idModal);
    // afficher le modal
    modal.classList.remove('hidden');
}
</script>