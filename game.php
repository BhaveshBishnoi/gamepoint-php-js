<?php
require_once 'includes/config.php';
require_once 'includes/db.php';
require_once 'includes/functions.php';

// Get game ID from URL
$game_id = isset($_GET['id']) ? sanitize($_GET['id']) : '';

if (empty($game_id)) {
    header('Location: ' . SITE_URL);
    exit;
}

// Fetch game details
$game = getGameById($game_id);

if (!$game) {
    header('HTTP/1.0 404 Not Found');
    include '404.php';
    exit;
}

// Fetch related games
$related_games = getRelatedGames($game['categoryId'], $game['id'], 24);
$category_games = !empty($game['categoryId']) ? getCategoryGamesForSlider($game['categoryId'], $game['id'], 20) : [];
$screenshots = !empty($game['screenshots']) ? json_decode($game['screenshots'], true) : [];
$additional_category_ids = !empty($game['additionalCategories']) ? json_decode($game['additionalCategories'], true) : [];
$additional_categories = !empty($additional_category_ids) ? getAdditionalCategories($additional_category_ids) : [];

$has_play_store = !empty($game['link']);
$has_app_store = !empty($game['appleStoreLink']) && $game['appleStoreLink'] !== 'Not Found';

$page_title = $game['title'] . ' - Download & Play on your Mobile';
$page_description = !empty($game['descriptionShort']) ? $game['descriptionShort'] : substr($game['descriptionFull'], 0, 160) . '...';
$page_image = !empty($game['imagekitUrl']) ? $game['imagekitUrl'] : $game['image'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
    
    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($page_image); ?>">
    <meta property="og:url" content="<?php echo SITE_URL . '/game.php?id=' . $game['id']; ?>">
    <meta property="og:type" content="website">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($page_image); ?>">
    
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php include 'includes/adsense.php'; ?>
    
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main class="main-content game-detail">
        <div class="container">
            <?php include 'includes/DeviceCode.php'; ?>
        </div>
       

        <!-- Ad Top -->
        <div class="ad-container">
            <div class="container">
                <?php include 'includes/ads/ad-top.php'; ?>
            </div>
        </div>

        <div class="container game-content">
            <!-- Game Header -->
            <div class="game-header">
                <div class="game-icon">
                    <img src="<?php echo $game['imagekitUrl'] ?? $game['image']; ?>" 
                         alt="<?php echo htmlspecialchars($game['title']); ?>">
                </div>
                <div class="game-meta">
                    <h1 class="game-title"><?php echo htmlspecialchars($game['title']); ?></h1>
                    <?php if (!empty($game['developer'])): ?>
                    <p class="game-developer"><?php echo htmlspecialchars($game['developer']); ?></p>
                    <?php endif; ?>
                    
                    <div class="game-badges">
                        <?php if (!empty($game['category_name'])): ?>
                        <span class="badge badge-secondary"><?php echo htmlspecialchars($game['category_name']); ?></span>
                        <?php endif; ?>
                        <?php if ($game['editorsChoice']): ?>
                        <span class="badge badge-editors">⭐ Editor's Choice</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="game-stats">
                <?php if (!empty($game['rating'])): ?>
                <div class="stat-item">
                    <div class="stat-value">
                        <span class="rating-value"><?php echo $game['rating']; ?></span>
                        <svg class="star-icon" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    <p class="stat-label">Rating</p>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($game['downloads'])): ?>
                <div class="stat-item">
                    <div class="stat-value">
                        <svg class="icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                    </div>
                    <p class="stat-value-text"><?php echo htmlspecialchars($game['downloads']); ?></p>
                    <p class="stat-label">Downloads</p>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($game['contentRating'])): ?>
                <div class="stat-item">
                    <div class="stat-value">
                        <svg class="icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                    </div>
                    <p class="stat-value-text"><?php echo htmlspecialchars($game['contentRating']); ?></p>
                    <p class="stat-label">Rated</p>
                </div>
                <?php endif; ?>
            </div>

            <!-- Game Information -->
            <div class="game-info-section">
                <h2 class="section-subtitle">Game Information</h2>
                <div class="info-badges">
                    <?php if (!empty($game['price'])): ?>
                    <span class="info-badge">
                        <svg class="icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                            <line x1="7" y1="7" x2="7.01" y2="7"></line>
                        </svg>
                        <?php echo htmlspecialchars($game['price']); ?>
                    </span>
                    <?php endif; ?>
                    
                    <?php if (!empty($game['size'])): ?>
                    <span class="info-badge">
                        <svg class="icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        </svg>
                        <?php echo htmlspecialchars($game['size']); ?>
                    </span>
                    <?php endif; ?>
                    
                    <?php if (!empty($game['currentVersion'])): ?>
                    <span class="info-badge">
                        <svg class="icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="16 18 22 12 16 6"></polyline>
                            <polyline points="8 6 2 12 8 18"></polyline>
                        </svg>
                        v<?php echo htmlspecialchars($game['currentVersion']); ?>
                    </span>
                    <?php endif; ?>
                    
                    <?php if (!empty($game['updatedOn'])): ?>
                    <span class="info-badge">
                        <svg class="icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <?php echo htmlspecialchars($game['updatedOn']); ?>
                    </span>
                    <?php endif; ?>
                    
                    <?php if (!empty($game['requiresAndroid'])): ?>
                    <span class="info-badge">
                        <svg class="icon" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                            <line x1="12" y1="18" x2="12.01" y2="18"></line>
                        </svg>
                        <?php echo htmlspecialchars($game['requiresAndroid']); ?>
                    </span>
                    <?php endif; ?>
                </div>
                
                <!-- Additional Categories -->
                <?php if (!empty($additional_categories)): ?>
                <div class="additional-categories">
                    <?php foreach (array_slice($additional_categories, 0, 8) as $category): ?>
                    <a href="<?php echo SITE_URL; ?>/category/<?php echo $category['slug']; ?>" class="category-tag">
                        <?php echo htmlspecialchars($category['name']); ?>
                    </a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>

            <!-- Store Badges -->
            <?php if ($has_play_store || $has_app_store): ?>
            <div class="store-badges">
                <?php if ($has_play_store): ?>
                <a href="<?php echo htmlspecialchars($game['link']); ?>" target="_blank" rel="noopener noreferrer" class="store-badge">
                    <img src="<?php echo SITE_URL; ?>/images/google-play.svg" alt="Get it on Google Play">
                </a>
                <?php endif; ?>
                
                <?php if ($has_app_store): ?>
                <a href="<?php echo htmlspecialchars($game['appleStoreLink']); ?>" target="_blank" rel="noopener noreferrer" class="store-badge">
                    <img src="<?php echo SITE_URL; ?>/images/app-store.svg" alt="Download on the App Store">
                </a>
                <?php endif; ?>
            </div>
            <?php endif; ?>

                <!-- Ad Bio -->
            <div class="ad-container">
                <?php include 'includes/ads/ad-bio.php'; ?>
            </div>

            <?php include 'includes/FeaturedGames.php'; ?>

        
            <!-- Screenshots -->
            <?php if (!empty($screenshots)): ?>
            <section class="screenshots-section">
                <h2 class="section-subtitle">Screenshots</h2>
                <div class="screenshot-slider">
                    <div class="screenshot-wrapper">
                        <?php foreach ($screenshots as $screenshot): ?>
                        <div class="screenshot-item">
                            <img src="<?php echo htmlspecialchars($screenshot); ?>" 
                                 alt="<?php echo htmlspecialchars($game['title']); ?> screenshot"
                                 loading="lazy">
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="screenshot-btn prev">‹</button>
                    <button class="screenshot-btn next">›</button>
                </div>
            </section>
            <?php endif; ?>

            <!-- Description -->
            <?php if (!empty($game['descriptionFull'])): ?>
            <section class="game-description">
                <h2 class="section-subtitle">About this game</h2>
                <p class="description-text"><?php echo nl2br(htmlspecialchars($game['descriptionFull'])); ?></p>
            </section>
            <?php endif; ?>

            <hr class="section-divider">


            <!-- What's New -->
            <?php if (!empty($game['whatsNew'])): ?>
            <section class="whats-new">
                <h2 class="section-subtitle">What's New</h2>
                <p class="description-text"><?php echo nl2br(htmlspecialchars($game['whatsNew'])); ?></p>
            </section>
            <hr class="section-divider">
            <?php endif; ?>

            <!-- Developer Info -->
            <section class="developer-info">
                <h2 class="section-subtitle">Developer</h2>
                <div class="developer-details">
                    <?php if (!empty($game['developer'])): ?>
                    <div class="developer-item">
                        <svg class="icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="16 18 22 12 16 6"></polyline>
                            <polyline points="8 6 2 12 8 18"></polyline>
                        </svg>
                        <span><?php echo htmlspecialchars($game['developer']); ?></span>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($game['developerEmail'])): ?>
                    <div class="developer-item">
                        <svg class="icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <a href="mailto:<?php echo htmlspecialchars($game['developerEmail']); ?>" class="link">
                            <?php echo htmlspecialchars($game['developerEmail']); ?>
                        </a>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($game['developerWebsite'])): ?>
                    <div class="developer-item">
                        <svg class="icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                        </svg>
                        <a href="<?php echo htmlspecialchars($game['developerWebsite']); ?>" target="_blank" rel="noopener noreferrer" class="link">
                            Visit Website
                            <svg class="icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                <polyline points="15 3 21 3 21 9"></polyline>
                                <line x1="10" y1="14" x2="21" y2="3"></line>
                            </svg>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </section>

            <hr class="section-divider">


            <!-- Disclaimer -->
            <?php include 'includes/disclaimer.php'; ?>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="<?php echo SITE_URL; ?>/assets/js/main.js"></script>
    <script src="<?php echo SITE_URL; ?>/assets/js/game-slider.js"></script>
    <script src="<?php echo SITE_URL; ?>/assets/js/screenshot-slider.js"></script>
    <script>
        // Initialize all AdSense ads on the page
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
</body>
</html>
