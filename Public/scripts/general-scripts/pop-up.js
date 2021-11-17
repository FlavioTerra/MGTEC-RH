// const showPopup = (openButton, popupContent) => {
//     const openBtn = document.getElementById(openButton),
//         popupContainer = document.getElementById(popupContent);

//     if (openBtn && popupContainer) {
//         openBtn.addEventListener('click', () => {
//             popupContainer.classList.add('show-popup')
//         })
//     }
// }

// showPopup('open-popup', 'popup-container');

function Open(popup) {
    document.getElementById(popup).classList.add('show-popup');
}

function Close(btn) {
    (btn.parentNode).parentNode.classList.remove('show-popup');

    return;
}

function Confirm(btn) {
    Close(btn);

    let container = (btn.parentNode).parentNode;

    if (container.id == 'popup-confirm') {
        document.getElementById("formulario").submit();
    }
}