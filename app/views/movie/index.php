<?php require_once 'app/views/templates/header.php' ?>
<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>MOVIES</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form action="/movie/search" method="post" class="mb-4">
                <div class="input-group">
                    <input required type="text" class="form-control" name="search_term" id="search_term" placeholder="Search...">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row movie-grid">
        <?php if (!empty($data['movies'])): ?>
            <?php foreach ($data['movies'] as $movie): ?>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4">
                    <div class="movie-card">
                        <?php
                        $posterUrl = !empty($movie['Poster']) && $movie['Poster'] != 'N/A' 
                            ? htmlspecialchars($movie['Poster']) 
                            : 'app/public/img/default_cover_image.jpg';  // If no image provided
                        ?>
                        <img src="<?php echo $posterUrl; ?>" class="img-fluid" alt="<?php echo htmlspecialchars($movie['Title']); ?>">
                        <div class="movie-info">
                            <h5><?php echo htmlspecialchars($movie['Title']); ?></h5>
                            <p><?php echo htmlspecialchars($movie['Year']); ?></p>
                        </div>
                        <div class="review-button">
                            <button class="btn btn-primary review-modal-btn" data-bs-toggle="modal" data-bs-target="#reviewModal" data-movie-title="<?php echo htmlspecialchars($movie['Title']); ?>">Review</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <p>No movies found.</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<!-- Review Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">Review Movie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 id="movieTitle"></h6>
                <?php if (isset($_SESSION['auth']) && $_SESSION['auth']): ?>
                    <form id="reviewForm">
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <select class="form-select" id="rating" name="rating" required>
                                <option value="">Select a rating</option>
                                <option value="1">1 Star</option>
                                <option value="2">2 Stars</option>
                                <option value="3">3 Stars</option>
                                <option value="4">4 Stars</option>
                                <option value="5">5 Stars</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-secondary" id="getAiReview">Get AI Review</button>
                        </div>
                        <div class="mb-3">
                            <label for="reviewText" class="form-label">Review</label>
                            <textarea class="form-control" id="reviewText" name="reviewText" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </form>
                <?php else: ?>
                    <div class="alert alert-warning" role="alert">
                        You need to be logged in to leave a review. <a href="/login" class="alert-link">Click here to log in</a>.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php require_once 'app/views/templates/footer.php' ?>