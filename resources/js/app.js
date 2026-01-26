import './bootstrap';

const ham = document.querySelector('#js-hamburger');
const nav = document.querySelector('#js-nav');

ham.addEventListener('click', (el) =>{
  ham.classList.toggle('active');
  nav.classList.toggle('active');
})