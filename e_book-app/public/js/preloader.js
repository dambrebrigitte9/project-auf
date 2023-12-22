
  
  window.addEventListener('load', function () {
    // Attendez quelques secondes avant de masquer le préloader
    setTimeout(function() {
      document.getElementById('preloader').style.display = 'none';
    }, 1000); // Attendez 2 secondes avant de masquer le préloader (vous pouvez ajuster ce délai)
  });


  
  // Fermeture automatique de l'alerte après 5 secondes
  setTimeout(function() {
    document.querySelector('.alert').classList.add('fade');
    setTimeout(function() {
      document.querySelector('.alert').remove();
    }, 500); // Temps d'animation de Bootstrap
  }, 500); // Durée avant la disparition (5000 millisecondes = 5 secondes)

  

  document.addEventListener('DOMContentLoaded', function() {
    const currentPage = window.location.pathname; // Récupère le chemin de la page actuelle
  
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link'); // Sélectionne tous les liens de la barre de navigation
  
    navLinks.forEach(link => {
      const linkHref = link.getAttribute('href');
      if (linkHref === currentPage) { // Vérifie si l'URL du lien correspond exactement à la page actuelle
        link.classList.add('active'); // Ajoute la classe 'active' au lien correspondant
      }
    });
  });
  