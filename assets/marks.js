
const form = document.querySelector('#form');

const course  = document.getElementById('course');
const sname = document.getElementById('name');
const mark  = document.getElementById('mark');
const grade = document.getElementById('status');
const remark = document.getElementById('remark');


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
    if (course.value.trim() === "Select Course") {
        setError(course, 'course is requierd!');
    } else {
        setSuccess(course);
    }

    
    if (sname.value.trim() == "") {
        setError(sname, 'name is requierd!');
    } else {
        setSuccess(sname);
    }
    
    if (mark.value == "") {
        setError(mark, 'mark is required!');
    } else {
        setSuccess(mark);
    }

    if (grade.value.trim() === "Select Status") {
        setError(grade, 'status is required!');
    } else {
        setSuccess(grade);
    }
    if (remark.value.trim() == "") {
        setError(remark, 'remark is requierd!');
    } else {
        setSuccess(remark);
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

