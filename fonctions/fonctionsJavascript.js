// fonction d'ouverture de la modal
function ouvrirModal(idModal) {
    // Récupérer le modal
    var modal = document.getElementById(idModal);
    // Récupérer le contain
    var contain = document.getElementById('contain');
    // ajouter le filtre sur le contain
    contain.classList.add('overlay');
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
