document.addEventListener('DOMContentLoaded', function() {
    const reviewModal = document.getElementById('reviewModal');
    const movieTitleElement = document.getElementById('movieTitle');
    const reviewForm = document.getElementById('reviewForm');
    const getAiReviewBtn = document.getElementById('getAiReview');

    reviewModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const movieTitle = button.getAttribute('data-movie-title');
        movieTitleElement.textContent = movieTitle;
    });

    if (reviewForm) {
        reviewForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const movieTitle = movieTitleElement.textContent;
            const rating = document.getElementById('rating').value;
            const reviewText = document.getElementById('reviewText').value;

            // Send the review data to the server
            fetch('/movie/submitReview', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    movieTitle: movieTitle,
                    rating: rating,
                    reviewText: reviewText
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Review submitted successfully!');
                    // Close the modal
                    bootstrap.Modal.getInstance(reviewModal).hide();
                } else {
                    alert('Error submitting review. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        });

        if (getAiReviewBtn) {
            getAiReviewBtn.addEventListener('click', function() {
                const movieTitle = movieTitleElement.textContent;

                // Request AI-generated review from the server
                fetch('/movie/getAiReview', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        movieTitle: movieTitle
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('reviewText').value = data.aiReview;
                    } else {
                        alert('Error generating AI review. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while generating AI review. Please try again.');
                });
            });
        }
    }
});