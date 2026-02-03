<?php
// Sanitize input
function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Get games with filters
function getGames($options = []) {
    $db = getDB();
    
    $limit = isset($options['limit']) ? (int)$options['limit'] : 100;
    $orderBy = isset($options['orderBy']) ? $options['orderBy'] : 'createdAt DESC';
    $where = isset($options['where']) ? $options['where'] : '1=1';
    
    $sql = "SELECT g.*, 
                   c.name as category_name, 
                   c.slug as category_slug, 
                   c.color as category_color
            FROM `Game` g
            LEFT JOIN `Category` c ON g.`categoryId` = c.id
            WHERE $where
            ORDER BY $orderBy
            LIMIT :limit";
    
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll();
}

// Get game by ID
function getGameById($id) {
    $db = getDB();
    
    $sql = "SELECT g.*, 
                   c.name as category_name, 
                   c.slug as category_slug, 
                   c.color as category_color
            FROM `Game` g
            LEFT JOIN `Category` c ON g.`categoryId` = c.id
            WHERE g.id = :id";
    
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
    
    return $stmt->fetch();
}

// Get games by category
function getGamesByCategory($categorySlug, $limit = 100) {
    $db = getDB();
    
    $sql = "SELECT g.*, 
                   c.name as category_name, 
                   c.slug as category_slug, 
                   c.color as category_color
            FROM `Game` g
            INNER JOIN `Category` c ON g.`categoryId` = c.id
            WHERE c.slug = :slug
            ORDER BY g.`isFeatured` DESC, g.rating DESC
            LIMIT :limit";
    
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':slug', $categorySlug, PDO::PARAM_STR);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll();
}

// Get category by slug
function getCategoryBySlug($slug) {
    $db = getDB();
    
    $sql = "SELECT * FROM `Category` WHERE slug = :slug AND `isActive` = true";
    
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':slug', $slug, PDO::PARAM_STR);
    $stmt->execute();
    
    return $stmt->fetch();
}

// Get related games
function getRelatedGames($categoryId, $currentGameId, $limit = 24) {
    if (empty($categoryId)) return [];
    
    $db = getDB();
    
    $sql = "SELECT g.*, 
                   c.name as category_name, 
                   c.slug as category_slug, 
                   c.color as category_color
            FROM `Game` g
            LEFT JOIN `Category` c ON g.`categoryId` = c.id
            WHERE (g.`categoryId` = :categoryId)
              AND g.id != :currentId
            ORDER BY g.`isFeatured` DESC, g.rating DESC
            LIMIT :limit";
    
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_STR);
    $stmt->bindValue(':currentId', $currentGameId, PDO::PARAM_STR);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll();
}

// Get category games for slider
function getCategoryGamesForSlider($categoryId, $currentGameId, $limit = 20) {
    $db = getDB();
    
    $sql = "SELECT g.id, g.title, g.image, g.`imagekitUrl`,
                   c.name as category_name, 
                   c.slug as category_slug
            FROM `Game` g
            LEFT JOIN `Category` c ON g.`categoryId` = c.id
            WHERE (g.`categoryId` = :categoryId )
              AND g.id != :currentId
            ORDER BY g.`isFeatured` DESC, g.rating DESC
            LIMIT :limit";
    
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_STR);
    $stmt->bindValue(':currentId', $currentGameId, PDO::PARAM_STR);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll();
}

// Get additional categories
function getAdditionalCategories($categoryIds) {
    if (empty($categoryIds)) return [];
    
    $db = getDB();
    
    $placeholders = implode(',', array_fill(0, count($categoryIds), '?'));
    $sql = "SELECT id, name, slug, color 
            FROM `Category` 
            WHERE id IN ($placeholders)";
    
    $stmt = $db->prepare($sql);
    $stmt->execute($categoryIds);
    
    return $stmt->fetchAll();
}

// Get active banners


// Render game grid
function renderGameGrid($games, $showAd = false) {
    $adShown = false;
    
    foreach ($games as $index => $game) {
        $isFeatured = $game['isFeatured'] || $game['editorsChoice'];
        
        if ($isFeatured) {
            renderFeaturedGameCard($game);
        } else {
            renderGameCard($game);
        }
        
        // Show ad after 9 cards on mobile
        if ($showAd && !$adShown && $index === 8) {
            echo '<div class="ad-mobile-only game-grid-ad">';
            include 'includes/ads/ad-bio.php';
            echo '</div>';
            $adShown = true;
        }
    }
}

// Render regular game card
function renderGameCard($game) {
    $image = !empty($game['imagekitUrl']) ? $game['imagekitUrl'] : $game['image'];
    $title = htmlspecialchars($game['title']);
    $titleShort = htmlspecialchars(substr($game['title'], 0, 6));
    ?>
    <a href="<?php echo SITE_URL; ?>/game/<?php echo $game['id']; ?>" class="game-card">
        <div class="game-card-image">
            <div class="image-wrapper">
                <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" loading="lazy">
                <div class="shine-effect"></div>
            </div>
            <div class="gradient-overlay"></div>
        </div>
        <div class="game-card-content">
            <h3 class="game-card-title" title="<?php echo $title; ?>"><?php echo $titleShort; ?></h3>
        </div>
    </a>
    <?php
}

// Render featured game card
function renderFeaturedGameCard($game) {
    $image = !empty($game['imagekitUrl']) ? $game['imagekitUrl'] : $game['image'];
    $title = htmlspecialchars($game['title']);
    $titleShort = htmlspecialchars(substr($game['title'], 0, 6));
    ?>
    <a href="<?php echo SITE_URL; ?>/game/<?php echo $game['id']; ?>" class="game-card featured">
        <div class="game-card-image featured-image">
            <div class="image-wrapper">
                <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" loading="lazy">
                <div class="shine-effect"></div>
            </div>
            <div class="gradient-overlay"></div>
        </div>
        <div class="game-card-content">
            <h3 class="game-card-title featured-title" title="<?php echo $title; ?>"><?php echo $titleShort; ?></h3>
        </div>
    </a>
    <?php
}

// Render banner


// Get all categories
function getAllCategories() {
    $db = getDB();
    
    $sql = "SELECT * FROM `Category` 
            WHERE `isActive` = true 
            ORDER BY `sortOrder` ASC, name ASC";
    
    $stmt = $db->prepare($sql);
    $stmt->execute();
    
    return $stmt->fetchAll();
}
