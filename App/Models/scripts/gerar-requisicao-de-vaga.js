/******Experiência******/

//array da classe
let i = document.getElementById("Exp");

//pega o html dentro da primeira classe
let content = i.innerHTML;

//adiciona nova experiência
function addExp() {
    //cria a nova div e seta a classe que contem tudo para adicionar
    let div = document.createElement('div');
    div.setAttribute('class', 'add-div-exp');

    //adiciona o html na nova div
    div.innerHTML = content;

    //incrementa id nos botões
    addIdsButtons(div);

    //anexa a div criada dentro da classe exp
    i.appendChild(div);

    //remove os botões antigos
    removeBtnExp();
}

//remove nova experiência
function removeExp() {
    j--;

    //cria array das divs adicionadas
    let divs = document.getElementsByClassName('add-div-exp');

    //pega a ultima div
    let last = divs.length - 1;

    //remove a ultima div
    i.removeChild(divs[last]);

    //retorna os botões antigos
    addBtnExp();
}


/*botões de experiência*/

//ids dos botões
let j = 0;

function addIdsButtons(div) {
    j++;

    let botoes = div.getElementsByClassName('btn-area-exp');
    botoes[0].id = `btn-area-${j}`;

    return;
}

//remove botões antigos
function removeBtnExp() {
    //pega a div de botão anterior
    document.getElementById(`btn-area-${j - 1}`).style.display = "none";

    return;

}

//adiciona botões antigos
function addBtnExp() {
    //pega a div de botão anterior
    document.getElementById(`btn-area-${j}`).style.display = "block";
}


/******Competência******/

//array da classe
let comp = document.getElementById("Comp");

//pega o html dentro da primeira classe
let contentComp = comp.innerHTML;

//adiciona nova competencia
function addComp() {
    //cria a nova div e seta a classe que contem tudo para adicionar
    let divComp = document.createElement('div');
    divComp.setAttribute('class', 'add-div-comp');

    //adiciona o html na nova div
    divComp.innerHTML = contentComp;

    //incrementa id nos botões
    addIdsButtonsComp(divComp);

    //anexa a div criada dentro da classe comp
    comp.appendChild(divComp);

    //remove os botões antigos
    removeBtnComp();
}

//remove nova competencia
function removeComp() {
    jComp--;

    //cria array das divs adicionadas
    let divs = document.getElementsByClassName('add-div-comp');

    //pega a ultima div
    let last = divs.length - 1;

    //remove a ultima div
    comp.removeChild(divs[last]);

    //retorna os botões antigos
    addBtnComp();
}


/*botões de competencia*/

//ids dos botões
let jComp = 0;

function addIdsButtonsComp(divComp) {
    jComp++;

    let botoes = divComp.getElementsByClassName('btn-area-comp');
    botoes[0].id = `btn-area-comp-${jComp}`;

    return;
}

//remove botões antigos
function removeBtnComp() {
    //pega a div de botão anterior
    document.getElementById(`btn-area-comp-${jComp - 1}`).style.display = "none";

    return;

}

//adiciona botões antigos
function addBtnComp() {
    //pega a div de botão anterior
    document.getElementById(`btn-area-comp-${jComp}`).style.display = "block";
}


/******Formação******/

//array da classe
let form = document.getElementById("Form");

//pega o html dentro da primeira classe
let contentForm = form.innerHTML;

//adiciona nova competencia
function addForm() {
    //cria a nova div e seta a classe que contem tudo para adicionar
    let divForm = document.createElement('div');
    divForm.setAttribute('class', 'add-div-form');

    //adiciona o html na nova div
    divForm.innerHTML = contentForm;

    //incrementa id nos botões
    addIdsButtonsForm(divForm);

    //anexa a div criada dentro da classe form
    form.appendChild(divForm);

    //remove os botões antigos
    removeBtnForm();
}

//remove nova formação
function removeForm() {
    jForm--;

    //cria array das divs adicionadas
    let divs = document.getElementsByClassName('add-div-form');

    //pega a ultima div
    let last = divs.length - 1;

    //remove a ultima div
    form.removeChild(divs[last]);

    //retorna os botões antigos
    addBtnForm();
}


/*botões de formação*/

//ids dos botões
let jForm = 0;

function addIdsButtonsForm(divForm) {
    jForm++;

    let botoes = divForm.getElementsByClassName('btn-area-form');
    botoes[0].id = `btn-area-form-${jForm}`;

    return;
}

//remove botões antigos
function removeBtnForm() {
    //pega a div de botão anterior
    document.getElementById(`btn-area-form-${jForm - 1}`).style.display = "none";

    return;

}

//adiciona botões antigos
function addBtnForm() {
    //pega a div de botão anterior
    document.getElementById(`btn-area-form-${jForm}`).style.display = "block";
}