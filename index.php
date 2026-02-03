<?php
require_once 'includes/config.php';
require_once 'includes/db.php';
require_once 'includes/functions.php';

// Fetch games data
$featured_games = getGames(['limit' => 50, 'orderBy' => 'isFeatured DESC, createdAt DESC']);
$top_rated_games = getGames(['limit' => 40, 'orderBy' => 'rating DESC', 'where' => 'rating IS NOT NULL']);
$popular_games = getGames(['limit' => 24, 'orderBy' => 'downloads DESC', 'where' => 'downloads IS NOT NULL']);
$action_games = getGamesByCategory('action', 30);
$puzzle_games = getGamesByCategory('puzzle', 30);
$casual_games = getGamesByCategory('casual', 30);
$racing_games = getGamesByCategory('racing', 30);


$page_title = 'GamePoint - Browse & Download Games';
$page_description = 'Browse our extensive collection of games. Filter by category, rating, and more to find your next favorite game.';
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
        <!-- Banners Section -->


        <!-- Featured Games -->
        <?php if (!empty($featured_games)): ?>
        <section class="games-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Featured Games</h2>
                    <a href="<?php echo SITE_URL; ?>/game" class="view-all-link">
                        View All
                        <svg class="icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </a>
                </div>
                <div class="game-grid">
                    <?php renderGameGrid($featured_games, true); ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- Top Rated Games -->
        <?php if (!empty($top_rated_games)): ?>
        <section class="games-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Top Rated</h2>
                    <a href="<?php echo SITE_URL; ?>/top-rated" class="view-all-link">
                        View All
                        <svg class="icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </a>
                </div>
                <div class="game-grid">
                    <?php renderGameGrid($top_rated_games, false); ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- Popular Games -->
        <?php if (!empty($popular_games)): ?>
        <section class="games-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Most Popular</h2>
                    <a href="<?php echo SITE_URL; ?>/popular" class="view-all-link">
                        View All
                        <svg class="icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </a>
                </div>
                <div class="game-grid">
                    <?php renderGameGrid($popular_games, false); ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- Action Games -->
        <?php if (!empty($action_games)): ?>
        <section class="games-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Action Games</h2>
                    <a href="<?php echo SITE_URL; ?>/category/action" class="view-all-link">
                        View All
                        <svg class="icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </a>
                </div>
                <div class="game-grid">
                    <?php renderGameGrid($action_games, false); ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- Puzzle Games -->
        <?php if (!empty($puzzle_games)): ?>
        <section class="games-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Puzzle Games</h2>
                    <a href="<?php echo SITE_URL; ?>/category/puzzle" class="view-all-link">
                        View All
                        <svg class="icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </a>
                </div>
                <div class="game-grid">
                    <?php renderGameGrid($puzzle_games, false); ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- Casual Games -->
        <?php if (!empty($casual_games)): ?>
        <section class="games-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Casual Games</h2>
                    <a href="<?php echo SITE_URL; ?>/category/casual" class="view-all-link">
                        View All
                        <svg class="icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </a>
                </div>
                <div class="game-grid">
                    <?php renderGameGrid($casual_games, false); ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- Racing Games -->
        <?php if (!empty($racing_games)): ?>
        <section class="games-section">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Racing Games</h2>
                    <a href="<?php echo SITE_URL; ?>/category/racing" class="view-all-link">
                        View All
                        <svg class="icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </a>
                </div>
                <div class="game-grid">
                    <?php renderGameGrid($racing_games, false); ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="<?php echo SITE_URL; ?>/assets/js/main.js"></script>
    <script>
        // Initialize all AdSense ads on the page
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</body>
</html>
