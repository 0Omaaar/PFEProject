// On va chercher les différents éléments de notre page
const pages = document.querySelectorAll(".page");
const header = document.querySelector("#card-header");
const nbPages = pages.length; // Nombre de pages du formulaire
let pageActive = 1;

// On attend le chargement de la page
window.onload = () => {
    // On affiche la 1ère page du formulaire
    document.querySelector(".page").style.display = "initial";
    // On affiche le numéro de la page active dans le card header
    header.innerText = "Ajouter une annonce " + pageActive + " / " + nbPages;

    // On gère les boutons "suivant"
    let boutons = document.querySelectorAll(".next");
    for (let bouton of boutons) {
        bouton.addEventListener("click", pageSuivante);
    }

    // On gère les boutons "précédent"
    boutons = document.querySelectorAll(".prev");
    for (let bouton of boutons) {
        bouton.addEventListener("click", pagePrecedente);
    }
};

/**
 * Cette fonction fait avancer le formulaire d'une page
 */
function pageSuivante() {
    // On masque toutes les pages
    for (let page of pages) {
        page.style.display = "none";
    }

    // On affiche la page suivante
    this.parentElement.nextElementSibling.style.display = "initial";

    // On incrémente pageActive
    pageActive++;

    // On met à jour le numéro de la page dans le card header
    header.innerText = "Ajouter une annonce " + pageActive + " / " + nbPages;

}

/**
 * Cette fonction fait reculer le formulaire d'une page
 */ function pagePrecedente() {
    // On masque toutes les pages
    for (let page of pages) {
        page.style.display = "none";
    }

    // On affiche la page précédente
    this.parentElement.previousElementSibling.style.display = "initial";

    // On décrémente pageActive
    pageActive--;

    // On met à jour le numéro de la page dans le card header
    header.innerText = "Ajouter une annonce " + pageActive + " / " + nbPages;

    
    // Déplacer automatiquement vers le haut de la page
    window.scrollTo(0, 0);
}
