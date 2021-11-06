/********************/
/*******slider******/
/******************/

let counter = 1;

setInterval(function () {
    document.getElementById('radio' + counter).checked = true;
    counter++;

    if (counter > 4) {
        counter = 1;
    }
}, 5000);

function setCounter(element) {
    if (element.id == 'btn1') {
        counter = 1;
    }
    else if (element.id == 'btn2') {
        counter = 2;
    }
    else if (element.id == 'btn3') {
        counter = 3;
    }
    else if (element.id == 'btn4') {
        counter = 4;
    }
}

/********************/
/********jobs*******/
/******************/

let count = 1;
let qtdeNaTela = 0;

windowSize();

//altera os cards de vagas
function windowSize() {
    //se existir alguma vaga
    if (document.getElementById(count)) {

        /*** colocando na tela ***/

        //coloca a primeira vaga na tela
        if (document.getElementById(count).style.display != 'block') {
            document.getElementById(count).style.display = 'block';
            qtdeNaTela += 1;
        }

        //se tela >= 767px && existir próxima vaga && próxima vaga tiver o display none
        if (window.screen.width >= 767 && document.getElementById(count + 1) && document.getElementById(count + 1).style.display != 'block') {
            document.getElementById(count + 1).style.display = 'block';
            qtdeNaTela += 1;
        }

        //se tela >= 1200px && existir próxima vaga && próxima vaga tiver o display none
        if (window.screen.width >= 1200 && document.getElementById(count + 2) && document.getElementById(count + 2).style.display != 'block') {
            document.getElementById(count + 2).style.display = 'block';
            qtdeNaTela += 1;
        }

        /*** tirando da tela ***/

        //se tela < 767 && existir próxima vaga && próxima vaga tiver o display block
        if (window.screen.width < 767 && document.getElementById(count + 1) && document.getElementById(count + 1).style.display == 'block') {
            document.getElementById(count + 1).style.display = 'none';
            qtdeNaTela -= 1;
        }

        //se tela < 991 && existir próxima vaga && próxima vaga tiver o display block
        if (window.screen.width < 991 && document.getElementById(count + 2) && document.getElementById(count + 2).style.display == 'block') {
            document.getElementById(count + 2).style.display = 'none';
            qtdeNaTela -= 1;
        }
    }

    if (!document.getElementById('1')) {
        document.getElementById('jobs').style.display = 'none';
    }
}

/*** clicando nos botões ***/
let vetor = document.getElementsByClassName('vaga');

/* botão da direita */
function nextCard() {
    let cont = 1;

    while (document.getElementById(cont)) {
        if (document.getElementById(cont).style.display == 'block') {
            document.getElementById(cont).style.display = 'none';

            count++;
        }

        cont++;
    }

    if (count > vetor.length) {
        count -= 1;
    }

    windowSize();
}

/* botão da esquerda */
function preCard() {
    let cont = 1;

    while (document.getElementById(cont)) {
        if (document.getElementById(cont).style.display == 'block') {
            document.getElementById(cont).style.display = 'none';

            count--;
        }

        cont++;
    }

    if (count < 1) {
        count = 1;
    }

    windowSize();
}

//verifica se o usuário alterou o tamanho da tela
window.addEventListener('resize', function () {
    windowSize();
});



/********************/
/******contact******/
/******************/

function verificar() {
    if (document.getElementById("email").value) {
        document.getElementById("label-email").className = "levantar-label";
    }
    else {
        document.getElementById("label-email").classList.remove("levantar-label");
    }
}