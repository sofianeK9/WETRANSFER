<?php 
session_start();
if (isset($_SESSION["connecte"])){
    header:('Location: ../connexion.php');
    exit();}
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
<nav class="navbar">
            <a href="#mesFichiers">Mes fichiers</a>
            <a href="#fichiersPartages">Fichiers partagés</a>
            <a href="/WETRANSFER/pages/profil.php">Modifier mon profil</a>
            <a href="/WeTransfer/fonctions/fonctions.php">Se déconnecter</a>
        </nav>
</header>
<body>
    <a class="btn" onclick="ajoutFichier()" 
    
    >Ajouter un fichier</a>
    <h2 id="mesFichiers">Mes fichiers</h2>
    <?php //if (): ?>
    <table>
    <thead>
        <tr>
            <th>Nom du fichier</th>
            <th>Supprimer</th>
            <th>Retélécharger</th>
            <th>Détails</th>
        </tr>
    </thead>
    <?php //foreach($fichiers as $fichier) ?>
    <tbody>
        <tr>
            <td>fef</td>
            <td><span class="material-symbols-outlined">delete</span></td>
            <td><span class="material-symbols-outlined">download</span></td>
            <td><a class="btn" href="../pages/popUpDetails.php">Détails</a></td>
        </tr>
        <tr>
            <td>zfz</td>
            <td><span class="material-symbols-outlined">delete</span></td>
            <td><span class="material-symbols-outlined">download</span></td>
            <td><a class="btn" href="../pages/popUpDetails.php">Détails</a></td>
        </tr>
        <tr>
            <td>fesg</td>
            <td><span class="material-symbols-outlined">delete</span></td>
            <td><span class="material-symbols-outlined">download</span></td>
            <td><a class="btn" href="../pages/popUpDetails.php">Détails</a></td>
        </tr>
    </tbody>
    </table>
    <?php //endforeach ?>
    <?php //else: ?>
    <p>Aucun fichier disponible</p>
    <?php //endif ?>
    
    <h2 id="fichiersPartages">Fichiers partagés</h2>
    <?php //if (): ?>
    <table>
    <thead>
        <tr>
            <th>Nom du fichier</th>
            <th>Supprimer</th>
            <th>Télécharger</th>
        </tr>
    </thead>
    <?php //foreach ?>
    <tbody>
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
    </tbody>
    <?php //endforeach ?>
    </table>
    <?php //else: ?>
    <p>Aucun fichier disponible</p>
    <?php //endif ?>
    
</body>
</html>
<script>
    function details(){
        $.ajax({
            type : 'POST',
            url : '../pages/popUpDetails.php',
            success:function(){
                
            }
        })
    }

    function ajoutFichier() {
        window.open('../pages/popUpAjoutFichier.php', '_blank', 'width=600,height=400,scrollbars=yes,resizable=yes');
    }

</script>