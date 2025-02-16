<?php require_once 'app/views/templates/header.php' ?>
<main role="main" class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>ALL 2024 Movies</h1>
            </div>
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

<?php require_once 'app/views/templates/footer.php' ?>