import './bootstrap.js';

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

// Sidebar Toggle
document.getElementById("toggleBtn").addEventListener("click", function () {
    document.querySelector(".sidebar").classList.toggle("open");
});

// Gites Sidebar Toggle
document.getElementById("toggleGites").addEventListener("click", function (e) {
    e.preventDefault(); // Empêche le lien de recharger la page
    document.getElementById("submenuGites").classList.toggle("open");
});

// Ajouter un événement de scroll pour détecter le déplacement de la page

  
