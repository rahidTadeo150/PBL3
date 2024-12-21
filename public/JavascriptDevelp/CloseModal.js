const MainModal = document.querySelector('#MainModal')
const CloseButton = document.querySelector('#CloseModal')

CloseButton.addEventListener('click', () => {
    MainModal.classList.toggle('hidden');
})
