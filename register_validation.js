// Function to validate email format
function isValidEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

// Function to validate password format
function isValidPassword(password) {
    // Regular expressions to check for at least one number and at least one capital letter
    var hasNumber = /\d/.test(password);
    var hasCapitalLetter = /[A-Z]/.test(password);

    // Check if password meets the criteria
    if (hasNumber && hasCapitalLetter) {
        return true; // Password is valid
    } else {
        return false; // Password is invalid
    }
}

// Function to validate registration form
function validateRegistrationForm() {
    // Get form fields
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var cpassword = document.getElementById('cpassword').value;
    var isValid = true;

    // Reset error messages
    document.getElementById('nameError').textContent = '';
    document.getElementById('emailError').textContent = '';
    document.getElementById('passwordError').textContent = '';
    document.getElementById('cpasswordError').textContent = '';

    // Name validation
    if (name.trim() === '') {
        document.getElementById('nameError').textContent = 'Please enter your username.';
        isValid = false;
    }

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
    } else if (!isValidPassword(password)) {
        document.getElementById('passwordError').textContent = 'Password must contain at least one number and at least one capital letter.';
        isValid = false;
    }

    // Confirm password validation
    if (cpassword.trim() === '') {
        document.getElementById('cpasswordError').textContent = 'Please confirm your password.';
        isValid = false;
    } else if (password !== cpassword) {
        document.getElementById('cpasswordError').textContent = 'Passwords do not match.';
        isValid = false;
    }

    return isValid;
}
