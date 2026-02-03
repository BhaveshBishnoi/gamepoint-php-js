<?php
// includes/FeaturedGames.php

// Fetch 16 games (2 rows x 8 cols for desktop, 4 rows x 4 cols for mobile)
$feat_games = getGames(['limit' => 16, 'orderBy' => 'isFeatured DESC, rating DESC']);

if (!empty($feat_games)):
?>
<section class="featured-games-section">
    <div class="section-header">
        <h2 class="section-title" style="font-size: 1.25rem; margin-bottom: 1rem;">You Might Also Like</h2>
    </div>
    <div class="featured-grid">
        <?php foreach ($feat_games as $game): 
            $image = !empty($game['imagekitUrl']) ? $game['imagekitUrl'] : $game['image'];
            $title = htmlspecialchars($game['title']);
        ?>
        <a href="<?php echo SITE_URL; ?>/game/<?php echo $game['id']; ?>" class="featured-icon-card" title="<?php echo $title; ?>">
            <div class="icon-wrapper">
                <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" loading="lazy">
            </div>
            <div class="icon-title"><?php echo $title; ?></div>
        </a>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>
