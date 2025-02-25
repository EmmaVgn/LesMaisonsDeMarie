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




let slideIndex = 0;
let thumbnails = document.querySelectorAll(".thumbnail");
let modal = document.getElementById("slideshowModal");
let fullImage = document.getElementById("fullImage");
let closeBtn = document.querySelector(".close");
let prevBtn = document.querySelector(".prev");
let nextBtn = document.querySelector(".next");

// Ouvrir le diaporama au clic sur une image
thumbnails.forEach((thumbnail, index) => {
  thumbnail.addEventListener("click", function() {
    openModal(index);  // Ouvre le diaporama
  });
});

// Fonction pour ouvrir le modal
function openModal(index) {
  modal.style.display = "block";  // Afficher le modal
  slideIndex = index;
  showSlides(slideIndex);
}

// Fermer le modal
closeBtn.addEventListener('click', function() {
  modal.style.display = "none";  // Fermer le modal
});

// Afficher l'image dans le diaporama
function showSlides(index) {
  let imageSrc = thumbnails[index].getAttribute("data-full");
  fullImage.src = imageSrc;
}

// Déplacer à l'image suivante ou précédente
function moveSlide(n) {
  slideIndex += n;
  if (slideIndex < 0) slideIndex = thumbnails.length - 1;
  if (slideIndex >= thumbnails.length) slideIndex = 0;
  showSlides(slideIndex);
}

// Associer les flèches de navigation aux fonctions moveSlide
prevBtn.addEventListener('click', function() {
  moveSlide(-1);  // Flèche gauche
});

nextBtn.addEventListener('click', function() {
  moveSlide(1);  // Flèche droite
});
