// Function to validate email format
function isValidEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

// Function to validate login form
function validateLoginForm() {
    // Get form fields
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var isValid = true;

    // Reset error messages
    document.getElementById('emailError').textContent = '';
    document.getElementById('passwordError').textContent = '';

    // Email validation
    if (email.trim() === '') {
        document.getElementById('emailError').textContent = 'Please enter your email.';
        isValid = false;
    } else if (!isValidEmail(email)) {
        document.getElementById('emailError').textContent = 'Please enter a valid email address.';
        isValid = false;
    }

    // Password validation
    if (password.trim() === '') {
        document.getElementById('passwordError').textContent = 'Please enter your password.';
        isValid = false;
    }

    return isValid;
}
