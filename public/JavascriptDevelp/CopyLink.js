
function CopyLink() {
    let link = document.getElementById('linkToCopy');
    navigator.clipboard.writeText(link.innerText)
}
