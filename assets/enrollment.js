
const form = document.querySelector('#form');

const student = document.getElementById('student');
const course = document.getElementById('course');
const date = document.getElementById('date');
const status = document.getElementById('status');

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
    if (student.value === "Select Student") {
        setError(student, 'student is required!');
    } else {
        setSuccess(student);
    }

    if (course.value === "Select Course") {
        setError(course, 'course is required!');
    } else {
        setSuccess(course);
    }
   
    if (date.value == "") {
        setError(date, 'date is requierd!');
    } else {
        setSuccess(date);
    }

    if (status.value === "Select Status") {
        setError(status, 'Status is required!');
    } else {
        setSuccess(status);
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

