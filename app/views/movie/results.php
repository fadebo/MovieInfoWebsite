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
        <div class="col-sm-auto">
            <?php if (isset($data['movie'])): ?>
                <h2><?php echo htmlspecialchars($data['movie']['title']); ?></h2>
                <p><?php echo htmlspecialchars($data['movie']['description']); ?></p>
                <!-- Add more movie details here -->
            <?php else: ?>
                <p>No movie found.</p>
            <?php endif; ?>
        </div>
    </div>
    <br>
</main>
<?php require_once 'app/views/templates/footer.php' ?>