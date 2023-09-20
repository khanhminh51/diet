const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

// Manager mobile
const headerMenu = $('.header__menu');
const mobileNavbar = $('.mobile__navbar');
headerMenu.onclick = function() {
    if (mobileNavbar.classList.contains('d-none')) {
        mobileNavbar.classList.remove('d-none');
    } else {
        mobileNavbar.classList.add('d-none');
    }    
}