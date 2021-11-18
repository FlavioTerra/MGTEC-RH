/* Abre o pop-up */
function Open(popup) {
    document.getElementById(popup).classList.add('show-popup');
}

/* Fecha o pop-up */
function Close(btn) {
    (btn.parentNode).parentNode.classList.remove('show-popup');

    return;
}

/* Envia o formulário pelo btn do pop-up */
function Confirm(btn) {
    Close(btn);

    document.getElementById("formulario").submit();
}

/* Redireciona a página */
function Back(btn, url) {
    Close(btn);

    window.location.replace(url);
}