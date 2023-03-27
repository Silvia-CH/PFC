let formulario = document.forms;

let iniciarSesion = formulario[0];
let registrarse = formulario[1];

formulario[1].hidden = true;

function mostrarIS() {
    formulario[1].hidden = false;
    formulario[0].hidden = true;

}

function mostrarR() {
    formulario[1].hidden = true;
    formulario[0].hidden = false;
}

function validarIS() {
    let email = iniciarSesion['elements']['email']['value'];
    let contraseña = iniciarSesion['elements']['contraseña']['value'];

    let regexMail = /^\w+[@]\w+([.]com|[.]es)$/;
    let regexContraseña = /^\w{8,15}$/;

    if (regexMail.test(email)) {
        console.log('Está correcto');
        iniciarSesion['elements']['email'].style.border = '3px solid green';
    } else {
        console.log('Está incorrecto');
        iniciarSesion['elements']['email'].style.border = '3px solid red';
    }

    if (regexContraseña.test(contraseña)) {
        console.log('Está correcto');
        iniciarSesion['elements']['contraseña'].style.border = '3px solid green';
    } else {
        console.log('Está incorrecto');
        iniciarSesion['elements']['contraseña'].style.border = '3px solid red';
    }

    console.log(email, contraseña);
}

function validarR() {
    let email = registrarse['elements']['email']['value'];
    let contraseña = registrarse['elements']['contraseña']['value'];
    let compContraseña = registrarse['elements']['compContraseña']['value'];

    let regexMail = /^\w+[@]\w+([.]com|[.]es)$/;
    let regexContraseña = /([A-Z]+)([a-z]+)(\d+){8,15}/;

    if (regexMail.test(email)) {
        console.log('Está correcto');
        registrarse['elements']['email'].style.border = '3px solid green';
    } else {
        console.log('Está incorrecto');
        registrarse['elements']['email'].style.border = '3px solid red';
    }

    if (regexContraseña.test(contraseña)) {
        console.log('Está correcto');
        registrarse['elements']['contraseña'].style.border = '3px solid green';
    } else {
        console.log('Está incorrecto');
        registrarse['elements']['contraseña'].style.border = '3px solid red';
    }

    if (contraseña === compContraseña) {
        console.log('Está correcto');
        registrarse['elements']['compContraseña'].style.border = '3px solid green';
    } else {
        console.log('Está incorrecto');
        registrarse['elements']['compContraseña'].style.border = '3px solid red';
    }

    console.log(email, contraseña, compContraseña);
}