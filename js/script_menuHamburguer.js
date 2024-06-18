// LÓGICA DO MENU HAMBURGUER

function toggleNav() {
    const nav = document.getElementById("myNav");
    if (nav.style.height === '100%') {
        closeNav();
    } else {
        openNav();
    }
}

function openNav() {
    document.getElementById("myNav").style.height = '100%';
    document.addEventListener('click', closeMenu);
}

function closeNav() {
    document.getElementById("myNav").style.height = '0';
}

function closeMenu(event) {
    const overlay = document.getElementById("myNav");
    if (!overlay.contains(event.target) && !event.target.closest('.nav-button')) {
        closeNav();
    }
}