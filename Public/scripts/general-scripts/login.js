/*ao segurar o click o input vira texto e troca a imagem do olho*/
document.getElementById('eye-img').addEventListener('mousedown', function () {
    document.getElementById('password').type = 'text';
    document.getElementById('eye-img').src = '../../../../Public/images/login/eye.svg'
});

/*ao tirar o click o input vira password e retorna a imagem do olho*/
document.getElementById('eye-img').addEventListener('mouseup', function () {
    document.getElementById('password').type = 'password';
    document.getElementById('eye-img').src = '../../../../Public/images/login/eye-off.svg'
});

/*Tira o bug do input permanecer como texto ao mover a imagem*/
document.getElementById('eye-img').addEventListener('mousemove', function () {
    document.getElementById('password').type = 'password';
    document.getElementById('eye-img').src = '../../../../Public/images/login/eye-off.svg'
});


/*Específico para a tela de recuperar senha e registro*/
/*ao segurar o click o input vira texto e troca a imagem do olho*/
document.getElementById('eye-img-2').addEventListener('mousedown', function () {
    document.getElementById('password-2').type = 'text';
    document.getElementById('eye-img-2').src = '../../../../Public/images/login/eye.svg'
});

/*ao tirar o click o input vira password e retorna a imagem do olho*/
document.getElementById('eye-img-2').addEventListener('mouseup', function () {
    document.getElementById('password-2').type = 'password';
    document.getElementById('eye-img-2').src = '../../../../Public/images/login/eye-off.svg'
});

/*Tira o bug do input permanecer como texto ao mover a imagem*/
document.getElementById('eye-img-2').addEventListener('mousemove', function () {
    document.getElementById('password-2').type = 'password';
    document.getElementById('eye-img-2').src = '../../../../Public/images/login/eye-off.svg'
});