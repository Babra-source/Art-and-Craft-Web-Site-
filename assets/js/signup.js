function validateForm() {
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();
    const confirmPassword = document.getElementById("confirmPassword").value.trim(); // Updated to match HTML ID
    const errorMessages = [];
    const passwordError = document.getElementById("passwordError");
    const successMessage = document.getElementById("successMessage");

    // Clear previous messages
    passwordError.innerHTML = "";
    successMessage.textContent = "";

    // Email pattern for Ashesi emails
    const emailPattern = /^[a-zA-Z0-9._%+-]+@ashesi\.edu\.gh$/;

    // Email validation
    if (email === "") {
        errorMessages.push("Email is required!");
    } else if (!emailPattern.test(email)) {
        errorMessages.push("Invalid email format. Use @ashesi.edu.gh domain.");
    }

    // Password validations
    if (password.length < 8) {
        errorMessages.push("Password must be at least 8 characters long!");
    }
    if (!/[A-Z]/.test(password)) {
        errorMessages.push("Password must contain at least one uppercase letter!");
    }
    if ((password.match(/\d/g) || []).length < 3) {
        errorMessages.push("Password must include at least three digits!");
    }
    if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
        errorMessages.push("Password must contain at least one special character!");
    }

    // Confirm password match check
    if (password !== confirmPassword) {
        errorMessages.push("Passwords do not match.");
    }

    // Show errors or success message
    if (errorMessages.length > 0) {
        passwordError.innerHTML = errorMessages.join("<br>");
        return false; // Prevent form submission if there are errors
    } else {
        successMessage.textContent = "Registered successfully!";
        setTimeout(function () {
            successMessage.textContent = ""; // Clear success message after 20 seconds
        }, 20000);

        return true; // Allow form submission if no errors
    }
}
