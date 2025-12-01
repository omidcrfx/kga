    <!-- Footer -->
    <footer class="footer">
        <div class="footer-background">
            <div class="footer-particles"></div>
        </div>
        
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="footer-brand">
                        <div class="footer-logo">
                            <img src="assets/images/logo.png" alt="<?php echo $lang['company_name']; ?>" class="footer-logo-image">
                            <span class="footer-logo-text"><?php echo $lang['company_name']; ?></span>
                        </div>
                        <p class="footer-description">
                            <?php echo $lang['footer_description']; ?>
                        </p>
                        <div class="social-links">
                            <a href="#" class="social-link" data-tooltip="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="social-link" data-tooltip="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="social-link" data-tooltip="Telegram">
                                <i class="fab fa-telegram-plane"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="footer-widget">
                        <h5 class="footer-title"><?php echo $lang['footer_quick_links']; ?></h5>
                        <ul class="footer-links">
                            <li><a href="#home"><?php echo $lang['nav_home']; ?></a></li>
                            <li><a href="#about"><?php echo $lang['nav_about']; ?></a></li>
                            <li><a href="#services"><?php echo $lang['nav_services']; ?></a></li>
                            <li><a href="#portfolio"><?php echo $lang['nav_portfolio']; ?></a></li>
                            <li><a href="#contact"><?php echo $lang['nav_contact']; ?></a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="footer-widget">
                        <h5 class="footer-title"><?php echo $lang['footer_services_title']; ?></h5>
                        <ul class="footer-links">
                            <li><a href="#services"><?php echo $lang['service_1_title']; ?></a></li>
                            <li><a href="#services"><?php echo $lang['service_2_title']; ?></a></li>
                            <li><a href="#services"><?php echo $lang['service_3_title']; ?></a></li>
                            <li><a href="#services"><?php echo $lang['service_4_title']; ?></a></li>
                            <li><a href="#services"><?php echo $lang['service_5_title']; ?></a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="footer-widget">
                        <h5 class="footer-title"><?php echo $lang['footer_newsletter']; ?></h5>
                        <p class="footer-newsletter-desc">
                            <?php echo $lang['footer_newsletter_desc']; ?>
                        </p>
                        <form class="newsletter-form">
                            <div class="input-group">
                                <input type="email" class="form-control newsletter-input" placeholder="<?php echo $lang['contact_email']; ?>">
                                <button class="btn btn-primary newsletter-btn" type="submit">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <hr class="footer-divider">
            
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="footer-copyright">
                        <?php echo $lang['footer_copyright']; ?>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Back to Top Button -->
    <button id="back-to-top" class="back-to-top" aria-label="<?php echo $lang['btn_back_to_top']; ?>">
        <i class="fas fa-arrow-up"></i>
    </button>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Custom JavaScript -->
    <script src="assets/js/scripts.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });
    </script>
</body>
</html>
