
const form = document.querySelector('#form');

const username  = document.getElementById('username');
const password = document.getElementById('password');

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

    if (username.value.trim() == "") {
        setError(username, 'username requierd!');
    } else {
        setSuccess(username);
    }

    if (password.value.trim() == "") {
        setError(password, 'password requierd!');
    } else {
        setSuccess(password);
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

