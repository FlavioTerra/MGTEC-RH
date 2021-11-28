function acionarBtn() {
    document.getElementById('btn-foto').click();
}


function acionarBtn2() {
    document.getElementById('btn-curriculo').click();
}

// Pega o Departamento selecionado e insere os options dos cargos daquele departamento
function atribuiEstado(obj) {
    const estado = obj.value;

    document.querySelector('[name=cidade]').innerHTML = '';

    let elementForm = document.createElement('option');
    elementForm.innerHTML = '--Selecione--';
    document.querySelector('[name=cidade]').appendChild(elementForm);

    cidades.forEach(element => {
        if(estado == element.id_estado) {
            let elementForm = document.createElement('option');
            elementForm.value = element.id_cidade;
            elementForm.innerHTML = element.nome;
            document.querySelector('[name=cidade]').appendChild(elementForm);
        }
    });
}