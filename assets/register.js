
const form = document.querySelector('#form');

const reg_name = document.getElementById('name');
const username  = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const c_password = document.getElementById('c_password');

form.addEventListener('submit', (e) => {
    validationForm();

    if (isValidForm() == true) {
        form.submit();
    } else {
        e.preventDefault();
    }
});

function isValidForm() {
    const allInputValues = document.querySelectorAll('.input_group');
    let result = true;

    allInputValues.forEach((container) => {
        if (container.classList.contains('error')) {
            result = false;
        }
    });
    return result;
}

function validationForm() {
    if (reg_name.value.trim() == "") {
        setError(reg_name, 'name requierd!');
    } else {
        setSuccess(reg_name);
    }

    if (username.value.trim() == "") {
        setError(username, 'username requierd!');
    }else {
        setSuccess(username);
    }
    
    if (email.value.trim() == "") {
        setError(email, 'email requierd!');
    } else {
        setSuccess(email);
    }

    if (password.value.trim() == "") {
        setError(password, 'password requierd!');
    } else {
        setSuccess(password);
    }

    if (c_password.value.trim() == "") {
        setError(c_password, 're-password requierd!');
    } else if (password.value != c_password.value) {
        setError(c_password, 'password does not match!');
    } else {
        setSuccess(c_password);
    }

}

function setError(element, errorMassage) {
    const parent = element.parentElement;
    if (parent.classList.contains('success')) {
        parent.classList.remove('success');
    }
    parent.classList.add('error');
    const errorParagraph = parent.querySelector('p');
    errorParagraph.textContent = errorMassage;

}

function setSuccess(element) {
    const parent = element.parentElement;
    if (parent.classList.contains('error')) {
        parent.classList.remove('error');
    }
    parent.classList.add('success');

}

// const chechPassword = document.querySelector('#cb_password');
// const chechConfirmPassword = document.querySelector('#cb_confirm_password');

// chechPassword.onclick = function () {
//     if (password.type == "password") {
//         password.type = "text";
//     }else{
//         password.type="password";
//     }
// }

// chechConfirmPassword.onclick = function () {
//     if (cPassword.type == "password") {
//         cPassword.type = "text";
//     }else{
        
//         cPassword.type="password";
//     }
// }