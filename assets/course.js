
const form = document.querySelector('#form');

const cname = document.getElementById('name');
const description  = document.getElementById('description');
const duration = document.getElementById('duration');
const instructor = document.getElementById('instructor');
const level = document.getElementById('level');
const fee = document.getElementById('fee');

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
    if (cname.value.trim() == "") {
        setError(cname, 'course name is requierd!');
    } else {
        setSuccess(cname);
    }

    
    if (description.value.trim() == "") {
        setError(description, 'description is requierd!');
    } else {
        setSuccess(description);
    }

    if (duration.value.trim() == "") {
        setError(duration, 'duration is required!');
    } else {
        setSuccess(duration);
    }
    
    if (instructor.value.trim() == "") {
        setError(instructor, 'instructor is required!');
    } else {
        setSuccess(instructor);
    }

    if (level.value === "Select level") {
        setError(level, 'level is required!');
    } else {
        setSuccess(level);
    }

   
    if (fee.value.trim() == "") {
        setError(fee, 'fee is requierd!');
    } else {
        setSuccess(fee);
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

