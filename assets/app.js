import './bootstrap.js';


console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

//SideBar Toggle
document.getElementById("toggleBtn").addEventListener("click", function () {
    document.querySelector(".sidebar").classList.toggle("open");
});

//gites Sidebar
document.getElementById("toggleGites").addEventListener("click", function (e) {
    e.preventDefault(); // Empêche le lien de recharger la page
    document.getElementById("submenuGites").classList.toggle("open");
});

