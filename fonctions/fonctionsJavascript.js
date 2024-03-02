// fonction d'ouverture de la modal
function ouvrirModal(idModal, detailName, detailSize, detailChargement, detailPartage) {
    // Récupérer le modal
    var modal = document.getElementById(idModal);
    // Récupérer le contain
    var contain = document.getElementById('contain');
    // ajouter le filtre sur le contain
    contain.classList.add('overlay');
    // Si le modal est la modalDelete, mettre à jour le texte avec le nom du fichier à supprimer
    if (idModal === 'modalDelete') {
    var fileToDelete = document.getElementById('fileToDelete');
    fileToDelete.textContent = "Etes-vous certain de vouloir supprimer le fichier " + detailName + " ?";
    }
    // Si le modal est la modalDetails, mettre à jour le texte avec les détails du fichier(emailPartage s'il existe)
    if (idModal === 'modalDetails') {
    var detailNameElement = document.getElementById('detailName');
    var detailSizeElement = document.getElementById('detailSize');
    var detailChargementElement = document.getElementById('detailChargement');
    var detailPartageElement = document.getElementById('detailPartage');
    var detailAPartagerElement = document.getElementById('detailAPartager');
    detailNameElement.textContent = "Nom du fichier : " + detailName;
    detailSizeElement.textContent = "Taille du fichier : " + detailSize + " octets";
    detailChargementElement.textContent = "Ce fichier a été téléchargé : " + detailChargement + " fois";
        //si emailPartage est défini
        if (detailPartage != ""){
            detailPartageElement.textContent = "Partagé avec : " + detailPartage;
            detailPartageElement.classList.remove('hidden');
            detailAPartagerElement.classList.add('hidden')
        //si emailPartage n'est pas défini
        }else{detailPartageElement.classList.add('hidden');
        detailAPartagerElement.classList.remove('hidden')};
    }
    // afficher le modal
    modal.classList.remove('hidden');
    }   


// fonction de fermeture de la modal
function fermerModal(idModal) {
    // Récupérer le modal
    var modal = document.getElementById(idModal);
    // Récupérer le contain
    var contain = document.getElementById('contain');
    // supprimer le filtre sur le contain
    contain.classList.remove('overlay');
    // supprimer le modal
    modal.classList.add('hidden');
}
