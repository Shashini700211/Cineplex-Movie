document.addEventListener("DOMContentLoaded", function() {
    // Simulate loading time
    setTimeout(function() {
        document.getElementById("loading-screen").style.display = "none";
        document.getElementById("content").style.display = "block";
    }, 2000); // Adjust the timeout duration as needed
});

        // Add JavaScript code here to handle seat selection
        const seats = document.querySelectorAll('.seat');

        seats.forEach(seat => {
            seat.addEventListener('click', () => {
                seat.classList.toggle('selected');
            });
        });
