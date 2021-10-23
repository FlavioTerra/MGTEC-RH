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

    //incrementa número da experiencia
    addNumExp(div);

    //incrementa id nos botões
    addIdsButtons(div);

    //incrementa os names
    addNamesExp(div);

    //anexa a div criada dentro da classe exp
    i.appendChild(div);

    //remove os botões antigos
    removeBtnExp();
}

//remove nova experiência
function removeExp() {
    if(contExp > 2) {
        j--;
        numExp--;
        contExp--;
    
        //cria array das divs adicionadas
        let divs = document.getElementsByClassName('add-div-exp');
    
        //pega a ultima div
        let last = divs.length - 1;
    
        //remove a ultima div
        i.removeChild(divs[last]);
    
        //retorna os botões antigos
        addBtnExp();
    }
}

//incrementa número da experiencia
let numExp = 2;

function addNumExp(div) {
    let h3Exp = div.getElementsByClassName('numExp');

    h3Exp[0].innerHTML = numExp;

    numExp++;
}

let contExp = 2;

function addNamesExp(div) {
    /*Experiencia*/
    let nameFormacaoExp = div.getElementsByClassName('cl-exp-formacao');
    let nameStatusExp = div.getElementsByClassName('cl-exp-status');
    let nameAnosExp = div.getElementsByClassName('cl-exp-anos-experiencia');

    nameFormacaoExp[0].setAttribute('name', `exp-formacao-${contExp}`);
    nameStatusExp[0].setAttribute('name', `exp-status-${contExp}`);
    nameAnosExp[0].setAttribute('name', `exp-anos-experiencia-${contExp}`);

    contExp++;

    return;
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

    //incrementa número da competencia
    addNumComp(divComp);

    //incrementa id nos botões
    addIdsButtonsComp(divComp);

    //incrementa os names
    addNamesComp(divComp);

    //anexa a div criada dentro da classe comp
    comp.appendChild(divComp);

    //remove os botões antigos
    removeBtnComp();
}

//remove nova competencia
function removeComp() {
    if(contComp > 2) {
        jComp--;
        numComp--;
        contComp--;
    
        //cria array das divs adicionadas
        let divs = document.getElementsByClassName('add-div-comp');
    
        //pega a ultima div
        let last = divs.length - 1;
    
        //remove a ultima div
        comp.removeChild(divs[last]);
    
        //retorna os botões antigos
        addBtnComp();
    }
}

let contComp = 2;

function addNamesComp(divComp) {
    /*Competencia*/
    let nameNomeComp = divComp.getElementsByClassName('cl-comp-nome');
    let nameGrauComp = divComp.getElementsByClassName('cl-comp-grau');
    let nameStatusComp = divComp.getElementsByClassName('cl-comp-status');

    nameNomeComp[0].setAttribute('name', `comp-nome-${contComp}`);
    nameGrauComp[0].setAttribute('name', `comp-grau-${contComp}`);
    nameStatusComp[0].setAttribute('name', `comp-status-${contComp}`);

    contComp++;

    return;
}

//incrementa número da competencia
let numComp = 2;

function addNumComp(divComp) {
    let h3Comp = divComp.getElementsByClassName('numComp');

    h3Comp[0].innerHTML = numComp;

    numComp++;
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

//adiciona nova formação
function addForm() {
    //cria a nova div e seta a classe que contem tudo para adicionar
    let divForm = document.createElement('div');
    divForm.setAttribute('class', 'add-div-form');

    //adiciona o html na nova div
    divForm.innerHTML = contentForm;

    //incrementa número da formação
    addNumForm(divForm);

    //incrementa id nos botões
    addIdsButtonsForm(divForm);

    //incrementa os names
    addNamesForm(divForm);

    //anexa a div criada dentro da classe form
    form.appendChild(divForm);

    //remove os botões antigos
    removeBtnForm();
}

//remove nova formação
function removeForm() {
    if(contForm > 2) {
        jForm--;
        numForm--;
        contForm--;
    
        //cria array das divs adicionadas
        let divs = document.getElementsByClassName('add-div-form');
    
        //pega a ultima div
        let last = divs.length - 1;
    
        //remove a ultima div
        form.removeChild(divs[last]);
    
        //retorna os botões antigos
        addBtnForm();
    }
}

let contForm = 2;

function addNamesForm(divForm) {
    let nameTipoForm = divForm.getElementsByClassName('cl-form-tipo');
    let nameStatusForm = divForm.getElementsByClassName('cl-form-status');
    let nameNomeForm = divForm.getElementsByClassName('cl-form-nome');
    let nameGrauForm = divForm.getElementsByClassName('cl-form-grau');

    nameTipoForm[0].setAttribute('name', `form-tipo-${contForm}`);
    nameStatusForm[0].setAttribute('name', `form-status-${contForm}`);
    nameNomeForm[0].setAttribute('name', `form-nome-${contForm}`);
    nameGrauForm[0].setAttribute('name', `form-grau-${contForm}`);

    contForm++;

    return;
}


//incrementa número da formação
let numForm = 2;

function addNumForm(divForm) {
    let h3Form = divForm.getElementsByClassName('numForm');

    h3Form[0].innerHTML = numForm;

    numForm++;
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

// Pega o Departamento selecionado e insere os options dos cargos daquele departamento
function atribuitDept(obj) {
    const dept = obj.value;

    cargos.forEach(element => {
        if(dept == element.id_departamento) {
            let elementForm = document.createElement('option');
            elementForm.value = element.id_cargo;
            elementForm.innerHTML = element.nome_cargo;
            document.querySelector('[name=cargo]').appendChild(elementForm);
        }
    });
}