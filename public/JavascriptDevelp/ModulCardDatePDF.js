// Declaration
const ButtonPDF = document.querySelector('#ButtonPDF');
const ClosePDF = document.querySelector('#ClosePDF');
const ModulDate = document.querySelector('#ModulDatePDF');
const BlackScreen = document.querySelector('#ModulDateLayer');

//Button Cetak PDF Onclick
ButtonPDF.addEventListener('click', (e) => {
    e.stopPropagation();
    ModulDate.classList.replace('hidden', 'flex');
    BlackScreen.classList.replace('hidden', 'flex');
});

//Button Close Cetak PDF Onclick
ClosePDF.addEventListener('click', (e) => {
    e.stopPropagation();
    ModulDate.classList.replace('flex', 'hidden');
    BlackScreen.classList.replace('flex', 'hidden');
});

//Modul Closed Saat Menekan Selain Modul Card
document.addEventListener('click', (e) => {
    if (!ModulDate.contains(e.target) && !ButtonPDF.contains(e.target)) {
        ModulDate.classList.replace('flex', 'hidden');
        BlackScreen.classList.replace('flex', 'hidden');
    }
});
