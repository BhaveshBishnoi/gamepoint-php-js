<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3 class="footer-title"><?php echo SITE_NAME; ?></h3>
                <p class="footer-description"><?php echo SITE_DESCRIPTION; ?></p>
            </div>
            
            <div class="footer-section">
                <h4 class="footer-heading">Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/game">All Games</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/top-rated">Top Rated</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/popular">Popular</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4 class="footer-heading">Categories</h4>
                <ul class="footer-links">
                    <?php 
                    $footer_categories = array_slice(getAllCategories(), 0, 6);
                    foreach ($footer_categories as $category): 
                    ?>
                    <li>
                        <a href="<?php echo SITE_URL; ?>/category/<?php echo $category['slug']; ?>">
                            <?php echo htmlspecialchars($category['name']); ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4 class="footer-heading">Legal</h4>
                <ul class="footer-links">
                    <li><a href="<?php echo SITE_URL; ?>/privacy">Privacy Policy</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/terms">Terms of Service</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/contact">Contact Us</a></li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p class="copyright">
                &copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved.
            </p>
        </div>
    </div>
</footer>
