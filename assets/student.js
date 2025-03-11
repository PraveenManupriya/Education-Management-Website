
const form = document.querySelector('#form');

const fname = document.getElementById('fname');
const nic = document.getElementById('nic');
const gender = document.getElementById('gender');
const age = document.getElementById('age');
const dob = document.getElementById('dob');
const contact_no = document.getElementById('contact_no');
const image = document.getElementById('imgFile');

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
    if (fname.value.trim() == "") {
        setError(fname, 'Full name is requierd!');
    } else {
        setSuccess(fname);
    }

    if (nic.value.trim() == "") {
        setError(nic, 'NIC number required!');
    } else if (nic.value.trim().length != 12) { 
        setError(nic, 'NIC number is invalid, must be 12 characters');
    } else {
        setSuccess(nic);
    }
    
    if (gender.value === "Select gender") {
        setError(gender, 'Gender is required!');
    } else {
        setSuccess(gender);
    }

    if (age.value.trim() == "") {
        setError(age, 'Age is required!');
    } else {
        setSuccess(age);
    }
    if (dob.value == "") {
        setError(dob, 'date of birth is requierd!');
    } else {
        setSuccess(dob);
    }
    if (contact_no.value.trim() == "") {
        setError(contact_no, 'Contact number is required!');
    } else if (contact_no.value.trim().length != 10) { 
        setError(contact_no, 'Contact number must be 10 characters');
    } else {
        setSuccess(contact_no);
    }
    if (image.files.length === 0) {
        setError(image, 'image is required!');
    } else {
        setSuccess(image);
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

