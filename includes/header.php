<?php
$categories = getAllCategories();
$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>
<header class="site-header">
    <div class="container">
        <div class="header-content">
            <a href="<?php echo SITE_URL; ?>" class="logo">
                <span class="logo-icon">🎮</span>
                <span class="logo-text"><?php echo SITE_NAME; ?></span>
            </a>
            
            <nav class="main-nav">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="<?php echo SITE_URL; ?>" class="nav-link <?php echo $current_page === 'index' ? 'active' : ''; ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo SITE_URL; ?>/game" class="nav-link <?php echo $current_page === 'games' ? 'active' : ''; ?>">All Games</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link">
                            Categories
                            <svg class="dropdown-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach ($categories as $category): ?>
                            <li>
                                <a href="<?php echo SITE_URL; ?>/category/<?php echo $category['slug']; ?>" class="dropdown-link">
                                    <?php echo htmlspecialchars($category['name']); ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
            </nav>
            
            <button class="mobile-menu-toggle" aria-label="Toggle menu">
                <span class="hamburger"></span>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div class="mobile-menu">
    <div class="mobile-menu-content">
        <ul class="mobile-nav-list">
            <li class="mobile-nav-item">
                <a href="<?php echo SITE_URL; ?>" class="mobile-nav-link <?php echo $current_page === 'index' ? 'active' : ''; ?>">Home</a>
            </li>
            <li class="mobile-nav-item">
                <a href="<?php echo SITE_URL; ?>/game" class="mobile-nav-link <?php echo $current_page === 'games' ? 'active' : ''; ?>">All Games</a>
            </li>
            <li class="mobile-nav-item">
                <button class="mobile-nav-link mobile-dropdown-toggle">
                    Categories
                    <svg class="dropdown-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <ul class="mobile-dropdown-menu">
                    <?php foreach ($categories as $category): ?>
                    <li>
                        <a href="<?php echo SITE_URL; ?>/category/<?php echo $category['slug']; ?>" class="mobile-dropdown-link">
                            <?php echo htmlspecialchars($category['name']); ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>
    </div>
</div>
