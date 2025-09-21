// Add JavaScript code here to handle seat selection and confirmation
const seats = document.querySelectorAll('.seat');

seats.forEach(seat => {
    seat.addEventListener('click', () => {
        seat.classList.toggle('selected');
    });
});

function confirmBooking() {
    const selectedSeats = document.querySelectorAll('.seat.selected');
    const numberOfSeats = selectedSeats.length;
    const selectedSeatNumbers = Array.from(selectedSeats).map(seat => seat.innerText).join(', ');

    if (numberOfSeats === 0) {
        alert("Please select at least one seat before confirming the booking.");
    } else {
        const confirmation = confirm(`Confirm booking for seat(s): ${selectedSeatNumbers}?`);
        if (confirmation) {
            document.getElementById('selectedSeatsInput').value = selectedSeatNumbers;
            document.getElementById('bookingForm').submit();
        }
    }
}