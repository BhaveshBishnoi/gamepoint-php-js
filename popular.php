<?php
require_once 'includes/config.php';
require_once 'includes/db.php';
require_once 'includes/functions.php';

// Fetch popular games
$games = getGames(['orderBy' => 'downloads DESC', 'limit' => 100]);

$page_title = 'Popular Games - Most Downloaded | GamePoint';
$page_description = 'Check out the most popular and downloaded games on GamePoint.';
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
        <section class="games-section">
            <div class="container">
                <div class="section-header">
                    <h1 class="section-title">Most Popular Games</h1>
                </div>
                
                <?php if (empty($games)): ?>
                <div class="empty-state">
                    <div class="empty-icon">🔥</div>
                    <h2 class="empty-title">No Games Found</h2>
                    <p class="empty-description">Check back soon for popular games!</p>
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
