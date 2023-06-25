
window.addEventListener('scroll', function() {
    var navbar = document.querySelector('.navbare');
    var scrollPosition = window.scrollY;
    var threshold = 1; // Définissez le point de défilement où vous souhaitez que le navbar devienne fixe
  
    if (scrollPosition > threshold) {
      navbar.classList.add('fixed-navbar');
    } else {
      navbar.classList.remove('fixed-navbar');
    }
  });