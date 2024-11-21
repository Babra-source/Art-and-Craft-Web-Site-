
    // Get the modal, button that opens it, and close button
    const modal = document.getElementById("uploadModal");
    const btn = document.getElementById("uploadLink");
    const span = document.getElementsByClassName("close")[0];

    // When the user clicks the "Upload Artwork" link, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

