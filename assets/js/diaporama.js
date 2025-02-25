let slideIndex = 0;
let thumbnails = document.querySelectorAll(".thumbnail");
let modal = document.getElementById("slideshowModal");
let fullImage = document.getElementById("fullImage");

// Ouvrir le diaporama lorsque l'image est cliquée
thumbnails.forEach((thumbnail, index) => {
  thumbnail.addEventListener("click", function() {
    openModal(index);
  });
});

function openModal(index) {
  modal.style.display = "flex"; /* Affiche le modal */
  slideIndex = index;  // Définir l'index initial sur l'image cliquée
  showSlides();  // Afficher l'image correspondant à l'index
}

function closeModal() {
  modal.style.display = "none";
}

function showSlides() {
  let imageSrc = thumbnails[slideIndex].getAttribute("data-full");
  fullImage.src = imageSrc;  // Met à jour l'image principale du diaporama
  loadThumbnails();  // Recharger les miniatures sous l'image
}

function moveSlide(n) {
  slideIndex += n;  // Incrémenter ou décrémenter l'index

  // Boucle pour revenir à la première ou dernière image
  if (slideIndex < 0) slideIndex = thumbnails.length - 1;  // Si trop petit, revenir à la dernière image
  if (slideIndex >= thumbnails.length) slideIndex = 0;  // Si trop grand, revenir à la première image

  showSlides();  // Met à jour l'image du diaporama
}

function currentSlide(n) {
  slideIndex = n;
  showSlides();  // Met à jour l'image principale
}

function loadThumbnails() {
  let thumbContainer = document.querySelector(".thumbnail-container");
  thumbContainer.innerHTML = ''; // Vider le conteneur des miniatures avant d'ajouter les nouvelles
  
  // Ajouter les miniatures sous l'image principale
  thumbnails.forEach((thumb, i) => {
    let thumbClone = thumb.cloneNode();  // Cloner la miniature pour l'afficher
    thumbClone.classList.add("thumbnail-slide");
    thumbClone.src = thumb.getAttribute("data-full");
    thumbClone.addEventListener("click", function() {
      currentSlide(i);  // Mettre à jour l'image lorsque l'on clique sur une miniature
    });
    thumbContainer.appendChild(thumbClone);
  });
}

// Fonction pour le bouton "fermer" (close)
document.querySelector('.close').addEventListener('click', closeModal);

// Ajout des événements aux flèches pour changer d'image
document.querySelector('.prev').addEventListener('click', function() {
  moveSlide(-1);  // Flèche gauche
});

document.querySelector('.next').addEventListener('click', function() {
  moveSlide(1);  // Flèche droite
});
