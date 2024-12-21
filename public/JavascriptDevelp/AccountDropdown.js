const AvatarAccount = document.querySelector('#AvatarAccount');
const AccountDropdown = document.querySelector('#AccountDropdown');


AvatarAccount.addEventListener('click', (e) => {
    e.stopPropagation();
    AccountDropdown.classList.replace('hidden', 'block');
});

document.addEventListener('click', (e) => {
    if (!AccountDropdown.contains(e.target) && !AvatarAccount.contains(e.target)) {
        AccountDropdown.classList.replace('block', 'hidden');
    }
});
