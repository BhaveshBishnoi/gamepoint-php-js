<?php
require_once 'includes/config.php';
$page_title = 'Privacy Policy | ' . SITE_NAME;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main class="main-content">
        <div class="container">
            <h1 class="page-title">Privacy Policy</h1>
            <div class="content-box">
                <p>Privacy Policy content goes here.</p>
            </div>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="<?php echo SITE_URL; ?>/assets/js/main.js"></script>
</body>
</html>
