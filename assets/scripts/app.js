const hamburger = document.querySelector('.hamburger');
const navbarNav = document.querySelector('.navbar-nav');

hamburger.addEventListener('click', mobileMenu);

function mobileMenu() {
  hamburger.classList.toggle('active');
  navbarNav.classList.toggle('active');
}

const navLink = document.querySelectorAll('.nav-link');

navLink.forEach((n) => n.addEventListener('click', closeMenu));

function closeMenu() {
  hamburger.classList.remove('active');
  navbarNav.classList.remove('active');
}
