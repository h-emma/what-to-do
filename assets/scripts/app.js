const hamburger = document.querySelector('.hamburger');
const navbarNav = document.querySelector('.navbar-nav');

hamburger.addEventListener('click', () => {
  hamburger.classList.toggle('active');
  navbarNav.classList.toggle('active');
});

document.querySelectorAll('.nav-link').forEach((n) =>
  n.addEventListener('click', () => {
    hamburger.classList.remove('active');
    navbarNav.classList.remove('active');
  })
);
