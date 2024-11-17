// Add event listener for the toggle button
document.getElementById("togglePostFormBtn").addEventListener("click", function() {
    var form = document.getElementById("formContainer");
    if (form.style.display === "none" || form.style.display === "") {
        form.style.display = "block"; // Show the form
    } else {
        form.style.display = "none"; // Hide the form
    }
});

// Add event listener for the close button inside the form
document.getElementById("closeFormBtn").addEventListener("click", function() {
    var form = document.getElementById("formContainer");
    form.style.display = "none"; // Hide the form when close is clicked
});
