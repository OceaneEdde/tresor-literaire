document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('ajouterLivreForm');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const titre = document.getElementById('titre').value;
        const auteur = document.getElementById('auteur').value;
        const annee = document.getElementById('annee').value;

        // Remplacer le chemin ci-dessous par le chemin local de l'image
        const imageUrl = `../images/${titre}-${auteur}-${annee}.jpg`;
        afficherImageLivre(imageUrl);
    });

    function afficherImageLivre(imageUrl) {
        const imageLivre = document.createElement('img');
        imageLivre.src = imageUrl;
        imageLivre.alt = 'Couverture du livre';

        const contenuBibliotheque = document.getElementById('contenuBibliotheque');
        contenuBibliotheque.appendChild(imageLivre);
    }
});
