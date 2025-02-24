import 'bootstrap';

// Fonction d'attachement des événements
function attachToggleEvent() {
    const toggleBtn = document.getElementById("toggleBtn");
    const sidebar = document.querySelector(".sidebar");

    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener("click", function () {
            console.log('Toggle clicked');  // Debug log
            sidebar.classList.toggle("open");
        });
    }

    // Gites Sidebar Toggle
    const toggleGites = document.getElementById("toggleGites");
    if (toggleGites) {
        toggleGites.addEventListener("click", function (e) {
            e.preventDefault(); // Empêche le lien de recharger la page
            const submenuGites = document.getElementById("submenuGites");
            submenuGites.classList.toggle("open");
        });
    }
}

// Attacher les événements une fois que la page est entièrement chargée
window.addEventListener("load", function () {
    // Attacher les événements du toggle à chaque chargement complet de la page
    attachToggleEvent();
});

// Si la navigation n'effectue pas un rechargement complet de la page (ex: AJAX ou SPA)
window.addEventListener("popstate", function () {
    // Réinitialiser les événements du toggle après un changement de route
    attachToggleEvent();
});