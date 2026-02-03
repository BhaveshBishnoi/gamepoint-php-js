<?php
require_once 'includes/config.php';
require_once 'includes/db.php';
require_once 'includes/functions.php';

// Get category slug from URL
$category_slug = isset($_GET['slug']) ? sanitize($_GET['slug']) : '';

if (empty($category_slug)) {
    header('Location: ' . SITE_URL);
    exit;
}

// Fetch category details
$category = getCategoryBySlug($category_slug);

if (!$category) {
    header('HTTP/1.0 404 Not Found');
    include '404.php';
    exit;
}

// Fetch games in this category
$games = getGamesByCategory($category_slug);

$page_title = $category['name'] . ' Games | GamePoint';
$page_description = !empty($category['description']) ? $category['description'] : 'Browse ' . $category['name'] . ' games on GamePoint.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <?php include 'includes/adsense.php'; ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main class="main-content">
        <!-- Category Header -->
        <section class="category-header">
            <div class="container">
                <h1 class="category-title"><?php echo htmlspecialchars($category['name']); ?> Games</h1>
                <?php if (!empty($category['description'])): ?>
                <p class="category-description"><?php echo htmlspecialchars($category['description']); ?></p>
                <?php endif; ?>
            </div>
        </section>

        <!-- Games Grid -->
        <section class="games-section">
            <div class="container">
                <?php if (empty($games)): ?>
                <div class="empty-state">
                    <div class="empty-icon">🎮</div>
                    <h2 class="empty-title">No Games Found</h2>
                    <p class="empty-description">No games in this category yet. Check back soon!</p>
                </div>
                <?php else: ?>
                <div class="game-grid">
                    <?php renderGameGrid($games, true); ?>
                </div>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="<?php echo SITE_URL; ?>/assets/js/main.js"></script>
    <script>
        // Initialize all AdSense ads on the page
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</body>
</html>
