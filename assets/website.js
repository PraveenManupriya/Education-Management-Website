function toggleMenu() {
    var x = document.getElementById("links");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}


document.querySelector('.user-link').addEventListener('click', function () {
    const submenu = document.getElementById('submenu');

    if (submenu.style.display === "none") {
        submenu.style.display = "block";
    } else {
        submenu.style.display = "none";
    }
});

document.getElementById('themeToggle').addEventListener('click', function () {
    const body = document.body;
    const lightIcon = document.getElementById('lightIcon');
    const darkIcon = document.getElementById('darkIcon');

    body.classList.toggle('dark-mode');

    if (body.classList.contains('dark-mode')) {
        lightIcon.style.display = 'none';
        darkIcon.style.display = 'inline';
    } else {
        lightIcon.style.display = 'inline';
        darkIcon.style.display = 'none';
    }
});


// Event listener for "Edit Profile" link
document.getElementById('edit_profile').addEventListener('click', function (e) {
    e.preventDefault(); // Prevent default link behavior
    const form = document.getElementById('edit_profile_form');

    // Toggle the form visibility
    if (form.style.display === "none" || form.style.display === "") {
        form.style.display = "block";
    } else {
        form.style.display = "none";
    }
});

// Event listener for cancel button to hide the form
document.getElementById('cancel_edit').addEventListener('click', function () {
    const form = document.getElementById('edit_profile_form');
    form.style.display = "none";
});

// Event listener for form submission
document.getElementById('profile_form').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent form from submitting

    // Gather form data
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;

    // Perform validation or send data to server (AJAX)
    // For now, just log the information
    console.log("Profile Updated:");
    console.log("Username: " + username);
    console.log("Email: " + email);
    console.log("Phone: " + phone);

    // Hide the form after submission
    const form = document.getElementById('edit_profile_form');
    form.style.display = "none";
});

