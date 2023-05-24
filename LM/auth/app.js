let formulario = document.forms;

let iniciarSesion = formulario[0];
let registrarse = formulario[1];

formulario[1].setAttribute('hidden', 'true');

function mostrarIS() {
    formulario[0].setAttribute('hidden', 'true');
    formulario[1].removeAttribute('hidden');
}

function mostrarR() {
    formulario[1].setAttribute('hidden', 'true');
    formulario[0].removeAttribute('hidden');
}

function validar(nombreForm) {
    let email = nombreForm['elements']['email']['value'];
    let contraseña = nombreForm['elements']['contraseña']['value'];
    let emailCorrecto = false;
    let passCorrecto = false;
    let passCompCorrecto = false;

    let regexMail = /^\w+@[^\d\s]+[.][^\d\s]+$/;
    let regexContraseña = /(?=.*\d)+(?=.*\d)+(?=.*[A-Z])+(?=.*[a-z])+(?=.*[. - _ , =])+.{7,}/;

    if (regexMail.test(email)) {
        nombreForm['elements']['email'].setAttribute('class', 'correcto');
        emailCorrecto = true;
    } else {
        nombreForm['elements']['email'].setAttribute('class', 'incorrecto');
        emailCorrecto = false;
    }

    if (regexContraseña.test(contraseña)) {
        nombreForm['elements']['contraseña'].setAttribute('class', 'correcto');
        passCorrecto = true;
    } else {
        nombreForm['elements']['contraseña'].setAttribute('class', 'incorrecto');
        passCorrecto = false;
    }

    if (nombreForm == formulario[1]) {
        let compContraseña = registrarse['elements']['compContraseña']['value'];

        if (contraseña === compContraseña && compContraseña.length != 0) {
            nombreForm['elements']['compContraseña'].setAttribute('class', 'correcto');
            passCompCorrecto = true;
        } else {
            nombreForm['elements']['compContraseña'].setAttribute('class', 'incorrecto');
            passCompCorrecto = false;
        }
    }

    if (emailCorrecto && passCorrecto && passCompCorrecto) {
        formulario[1].classList.add('action', 'comprobar.php?form=1');
    } else {
        formulario[1].classList.remove('action');
    }
}

function verContraseña(nombreForm) {
    let ojo1 = document.getElementsByClassName('eye')[0];
    let ojo2 = document.getElementsByClassName('eye')[1];

    if (nombreForm['elements']['contraseña']['type'] == 'password') {
        nombreForm['elements']['contraseña'].setAttribute('type', 'text');
        ojo1.setAttribute('src', '../img/hidden.png');
        if (nombreForm == registrarse) {
            nombreForm['elements']['compContraseña'].setAttribute('type', 'text');
            ojo2.setAttribute('src', '../img/hidden.png');
        }
    } else {
        nombreForm['elements']['contraseña'].setAttribute('type', 'password');
        ojo1.setAttribute('src', '../img/view.png');
        if (nombreForm == registrarse) {
            nombreForm['elements']['compContraseña'].setAttribute('type', 'password');
            ojo2.setAttribute('src', '../img/view.png');
        }
    }

}