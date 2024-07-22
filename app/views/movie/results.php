<?php require_once 'app/views/templates/header.php' ?>
<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>SEARCH RESULTS</h1>
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
                        <img src="<?php echo htmlspecialchars($movie['Poster']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($movie['Title']); ?>">
                        <div class="movie-info">
                            <h5><?php echo htmlspecialchars($movie['Title']); ?></h5>
                            <p><?php echo htmlspecialchars($movie['Year']); ?></p>
                        </div>
                        <div class="review-button">
                            <a href="/movie/review/<?php echo urlencode($movie['Title']); ?>" class="btn btn-primary">Review</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <p>No movies found for your search term.</p>
            </div>
        <?php endif; ?>
    </div>
</main>
<?php require_once 'app/views/templates/footer.php' ?>