<?php require_once 'app/views/templates/header.php' ?>
<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Search Results</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <?php if (!empty($data['movies'])): ?>
            <?php foreach ($data['movies'] as $movie): ?>
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?php echo htmlspecialchars($movie['Poster']); ?>" class="img-fluid rounded-start" alt="<?php echo htmlspecialchars($movie['Title']); ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($movie['Title']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($movie['Year']); ?></p>
                                <a href="/movie/review/<?php echo urlencode($movie['Title']); ?>" class="btn btn-primary">Review</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No movies found for your search term.</p>
        <?php endif; ?>
    </div>

    <br>
</main>
<?php require_once 'app/views/templates/footer.php' ?>