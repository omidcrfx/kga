<!DOCTYPE html>
<html lang="<?php echo $current_lang; ?>" dir="<?php echo $current_lang === 'fa' ? 'rtl' : 'ltr'; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $lang['meta_description']; ?>">
    <title><?php echo $lang['meta_title']; ?></title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/webfonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/webfonts/fa-brands-400.woff2" as="font" type="font/woff2" crossorigin>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Persian Fonts -->
    <?php if ($current_lang === 'fa'): ?>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <?php endif; ?>
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>
<body class="<?php echo $current_lang === 'fa' ? 'rtl-body' : 'ltr-body'; ?>">
    
    <!-- Loading Screen -->
    <div id="loading-screen" class="loading-screen">
        <div class="loading-content">
            <div class="loading-spinner"></div>
            <div class="loading-text">Loading...</div>
        </div>
    </div>
    
    <!-- Navigation -->
    <nav id="navbar" class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#home">
                <div class="logo-container">
                    <img src="assets/images/logo.png" alt="<?php echo $lang['company_name']; ?>" class="logo-image">
                    <span class="logo-text"><?php echo $lang['company_name']; ?></span>
                </div>
            </a>
            
            <button class="navbar-toggler" type="button" aria-expanded="false" aria-controls="navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home"><?php echo $lang['nav_home']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about"><?php echo $lang['nav_about']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services"><?php echo $lang['nav_services']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio"><?php echo $lang['nav_portfolio']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact"><?php echo $lang['nav_contact']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link language-switcher" href="javascript:void(0);" onclick="changeLanguage('<?php echo $current_lang === 'en' ? 'fa' : 'en'; ?>')">
                            <i class="fas fa-globe"></i>
                            <?php echo $lang['nav_language']; ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Cursor Follower -->
    <div class="cursor-follower"></div>
    <div class="cursor-dot"></div>
