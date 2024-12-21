const hamburger = document.getElementById('hamburger');
const sidebar = document.getElementById('sidebar');
const hamburgerIcon = document.getElementById('hamburger-icon');
const crossIcon = document.getElementById('cross-icon');
console.log(hamburger, sidebar)
hamburger.addEventListener('click', () => {
    sidebar.classList.toggle('-translate-x-full');
    hamburgerIcon.classList.toggle('hidden');
    crossIcon.classList.toggle('hidden');
});