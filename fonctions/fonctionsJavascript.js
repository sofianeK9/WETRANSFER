// fonction d'ouverture de la modal
function ouvrirModal(idModal, detailName) {
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
