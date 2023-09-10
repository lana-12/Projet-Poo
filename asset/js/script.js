console.log('Hello Toi');


function Supp(link) {
    console.log('j ai cliquer');
    if (confirm('Confirmez la suppression ?')) {
        document.location.href = link;
    }
}

// Function for display/show navBar
function toggleMenu() {
    const navbarMenu = document.getElementById("navbarMenu");
    navbarMenu.classList.toggle("show");
}

// Écouter les clics en dehors du menu et du bouton de menu pour le fermer
document.addEventListener('click', function (event) {
    const navbarMenu = document.getElementById("navbarMenu");
    const navbarToggler = document.querySelector(".navbar-toggler");

    if (event.target !== navbarMenu && event.target !== navbarToggler) {
        navbarMenu.classList.remove("show");
    }
});