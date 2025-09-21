document.getElementById('signOutButton').addEventListener('click', function() {
    // Display a popup for successful sign out
    alert("You have been successfully signed out!.");

    // Redirect to the logout.php page
    window.location.href = "../home.php";
});

var stars = document.querySelectorAll('#starRating span');
var ratingInput = document.getElementById('selectedRating');

stars.forEach(function(star) {
    star.addEventListener('click', function() {
        var rating = this.getAttribute('data-rating');
        ratingInput.value = rating;
        highlightStars(rating);
    });
});

function highlightStars(rating) {
    stars.forEach(function(star) {
        star.classList.remove('active');
    });

    for (var i = 0; i < rating; i++) {
        stars[i].classList.add('active');
    }
}

document.getElementById('reviewForm').addEventListener('submit', function(event) {
    event.preventDefault();
    openThankYouModal();
});

function openThankYouModal() {
    document.getElementById('reviewThankYouModal').style.display = 'flex';
}

function closeThankYouModal() {
    document.getElementById('reviewThankYouModal').style.display = 'none';
}

function showSection(sectionId) {
    var sections = document.querySelectorAll('.container > section');
    sections.forEach(function(section) {
        section.style.display = 'none';
    });

    var targetSection = document.querySelector('.' + sectionId);
    if (targetSection) {
        targetSection.style.display = 'block';
    }
}