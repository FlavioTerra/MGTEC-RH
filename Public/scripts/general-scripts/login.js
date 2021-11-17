/*ao segurar o click o input vira texto e troca a imagem do olho*/
document.getElementById('eye-img').addEventListener('mousedown', function () {
    document.getElementById('password').type = 'text';
    document.getElementById('eye-img').src = '/images/login/eye.svg'
});

/*ao tirar o click o input vira password e retorna a imagem do olho*/
document.getElementById('eye-img').addEventListener('mouseup', function () {
    document.getElementById('password').type = 'password';
    document.getElementById('eye-img').src = '/images/login/eye-off.svg'
});

/*Tira o bug do input permanecer como texto ao mover a imagem*/
document.getElementById('eye-img').addEventListener('mousemove', function () {
    document.getElementById('password').type = 'password';
    document.getElementById('eye-img').src = '/images/login/eye-off.svg'
});


/*Específico para a tela de recuperar senha e registro*/
/*ao segurar o click o input vira texto e troca a imagem do olho*/
document.getElementById('eye-img-2').addEventListener('mousedown', function () {
    document.getElementById('password-2').type = 'text';
    document.getElementById('eye-img-2').src = '/images/login/eye.svg'
});

/*ao tirar o click o input vira password e retorna a imagem do olho*/
document.getElementById('eye-img-2').addEventListener('mouseup', function () {
    document.getElementById('password-2').type = 'password';
    document.getElementById('eye-img-2').src = '/images/login/eye-off.svg'
});

/*Tira o bug do input permanecer como texto ao mover a imagem*/
document.getElementById('eye-img-2').addEventListener('mousemove', function () {
    document.getElementById('password-2').type = 'password';
    document.getElementById('eye-img-2').src = '/images/login/eye-off.svg'
});

/*submit*/
function enviar() {
    let resposta;

    resposta = verificar();

    if (resposta == true) {
        document.getElementById('myForm').submit();
        window.location.replace('http://localhost:3000/usuario_entrar')
    }
    else if (resposta == false) {
        alert("Favor preencher todos os campos.")
    }

    if (resposta == 'senha') {
        alert('As senhas estão divergentes');
    }
}

function verificar() {
    if (document.getElementById('password').value == document.getElementById('password-2').value) {
        if (document.getElementById("login").value && document.getElementById("email").value
            && document.getElementById("email-2").value && document.getElementById("nome").value
            && document.getElementById("password").value && document.getElementById("password-2").value) {
            return true;
        }
        else {
            return false;
        }
    }
    else {
        return 'senha';
    }
}