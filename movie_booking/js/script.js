document.addEventListener('DOMContentLoaded', () => {
    fetchMovies();

    const form = document.getElementById('bookingForm');
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const data = new FormData(form);

        fetch('book.php', {
            method: 'POST',
            body: data
        })
        .then(res => res.text())
        .then(msg => {
            document.getElementById('message').innerText = msg;
            fetchMovies(); // Refresh the movie dropdown to update seat availability
        })
        .catch(err => {
            document.getElementById('message').innerText = 'Booking failed. Please try again.';
            console.error(err);
        });
    });
});

function fetchMovies() {
    fetch('get_movies.php')
    .then(res => res.json())
    .then(data => {
        const movieSelect = document.getElementById('movieSelect');
        movieSelect.innerHTML = ''; // clear previous

        data.forEach(movie => {
            const option = document.createElement('option');
            option.value = movie.id;
            option.textContent = `${movie.title} - ${movie.showtime} (Seats: ${movie.available_seats})`;
            movieSelect.appendChild(option);
        });
    })
    .catch(err => {
        console.error('Error fetching movies:', err);
    });
}
