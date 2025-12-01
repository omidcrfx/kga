<?php // Static single-page site; PHP kept only so server serves index.php correctly ?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="کیهان گستر آفرینش (KGA) - شریک قابل اعتماد شما در مشاوره کسب‌وکار، راه‌حل‌های سرمایه‌گذاری، مدیریت پروژه و تجارت بین‌المللی.">
    <title>کیهان گستر آفرینش (KGA) | نوآوری و تعالی در راه‌حل‌های کسب‌وکار</title>

    <!-- SEO: language alternates -->
    <link rel="alternate" href="https://kgaholding.com/" hreflang="fa">
    <link rel="alternate" href="https://kgaholding.com/?lang=en" hreflang="en">
    <link rel="canonical" href="https://kgaholding.com/">

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

    <!-- Persian Font (default) -->
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <!-- Simple i18n configuration (FA default, EN via ?lang=en) -->
    <script>
        const translations = {
            fa: {
                nav_home: 'خانه',
                nav_about: 'درباره ما',
                nav_services: 'خدمات',
                nav_portfolio: 'نمونه کارها',
                nav_contact: 'تماس',
                nav_language: 'English',
                company_name: 'کیهان گستر آفرینش',

                hero_title: 'کیهان گستر آفرینش (KGA)',
                hero_subtitle: 'نوآوری و تعالی در راه‌حل‌های کسب‌وکار',
                hero_description: 'شرکت کیهان گستر آفرینش (KGA) یک شرکت پیشرو در ارائه راه‌حل‌ها و خدمات کسب‌وکار نوآورانه است. ماموریت ما ارائه تعالی و ارزش به مشتریان از طریق استراتژی‌های پیشرفته و تخصص حرفه‌ای است.',
                hero_cta_primary: 'شروع همکاری',
                hero_cta_secondary: 'مشاوره تخصصی',

                slide2_title: 'سرمایه‌گذاری',
                slide2_subtitle: 'تخصص در سرمایه‌گذاری و مدیریت پروژه',
                slide2_description: 'با سال‌ها تجربه در مدیریت پروژه‌های بزرگ و سرمایه‌گذاری هوشمند، شریک قابل اعتماد شما در رشد کسب‌وکار هستیم.',
                slide2_cta_primary: 'خدمات ما',
                slide2_cta_secondary: 'بیشتر بدانید',

                slide3_title: 'ماموریت ما، موفقیت شما، ',
                slide3_subtitle: 'شراکت باهم برای سود بیشتر',
                slide3_description: 'ما با شما شریک می‌شویم تا چشم‌انداز شما را درک کنیم و نتایج استثنایی ارائه دهیم که از انتظارات فراتر می‌رود.',
                slide3_cta_primary: 'مشاهده خدمات',
                slide3_cta_secondary: 'تماس با ما',

                about_title: 'درباره کیهان گستر آفرینش',
                about_subtitle: 'تخصص در توسعه املاک و تجارت بین‌المللی',
                about_description: 'کیهان گستر آفرینش تحت مدیریت دکتر آفرینش و دکتر اصغری فر، متخصصان معماری و مدیریت کسب‌وکار، در زمینه‌های توسعه املاک، واردات و صادرات، و معاملات فارکس و کریپتو(ارز دیجیتال) فعالیت می‌کند. ما با تجربه و دانش تخصصی، شریک قابل اعتماد شما در رشد و توسعه کسب‌وکار هستیم.',
                about_feature_1: 'توسعه املاک',
                about_feature_2: 'واردات و صادرات',
                about_feature_3: 'معاملات فارکس و کریپتو',
                about_feature_4: 'مشاوره معماری',

                services_title: 'خدمات ما',
                services_subtitle: 'تخصص در چهار حوزه اصلی',
                service_1_title: 'توسعه املاک',
                service_1_desc: 'طراحی، ساخت و مدیریت پروژه‌های مسکونی، تجاری، اداری، گردشگری و تفریحی',
                service_2_title: 'واردات و صادرات',
                service_2_desc: 'تجارت بین‌المللی، واردات کالاهای مورد نیاز و صادرات محصولات ایرانی به بازارهای جهانی',
                service_3_title: 'معاملات فارکس و کریپتو',
                service_3_desc: 'مشاوره و انجام معاملات فارکس و کریپتو، تحلیل بازارهای مالی و مدیریت سرمایه',
                service_4_title: 'مشاوره معماری',
                service_4_desc: 'طراحی معماری، نظارت بر اجرا و مشاوره فنی پروژه‌های ساختمانی',
                service_5_title: 'مدیریت کسب‌وکار',
                service_5_desc: 'مشاوره سرمایه‌گذاری، استراتژیست سرمایه‌گذاری',
                service_6_title: 'سرمایه‌گذاری',
                service_6_desc: 'تامین منابع مالی برای فرصت‌های سرمایه‌گذاری مناسب با بررسی ایده‌های موجود شما',

                stats_projects: 'پروژه تکمیل شده',
                stats_years: 'سال تجربه',
                stats_awards: 'جایزه کسب شده',

                portfolio_title: 'پروژه‌های موفق ما',
                portfolio_subtitle: 'نمایش تعالی و نوآوری',
                portfolio_filter_all: 'همه',
                portfolio_filter_property: 'توسعه املاک',
                portfolio_filter_trade: 'واردات و صادرات',
                portfolio_filter_forex: 'معاملات فارکس و کریپتو',
                portfolio_view_project: 'جزئیات پروژه',
                portfolio_item6_title: 'صندوق سرمایه‌گذاری',

                gallery1_subtitle: 'نمایشگاه موفقیت‌ها',
                gallery1_title: 'پروژه‌های برتر KGA',
                gallery1_description: '',
                gallery1_item1_title: 'مجتمع مسکونی گلسار',
                gallery1_item1_desc: 'طراحی و توسعه مجتمع مسکونی مدرن',
                gallery1_item2_title: 'واردات قطعات و لوازم جانبی موبایل',
                gallery1_item2_desc: 'واردات قطعات و لوازم جانبی موبایل از بازارهای بین‌المللی',
                gallery1_item3_title: 'معامله گر بازارهای مالی',
                gallery1_item3_desc: 'معامله‌گری و تحلیل بازارهای مالی و ارزی',
                gallery1_item4_title: 'مدیریت ارز شرکت‌ها',
                gallery1_item4_desc: 'مشاوره و مدیریت ریسک ارزی',
                gallery1_item5_title: 'طراحی ساختمان اداری',
                gallery1_item5_desc: 'طراحی معماری ساختمان تجاری',

                contact_title: 'تماس با ما',
                contact_subtitle: 'آماده همکاری و سرمایه‌گذاری و مشاوره هستیم',
                contact_description: '',
                contact_name: 'نام کامل',
                contact_email: 'آدرس ایمیل',
                contact_subject: 'موضوع',
                contact_message: 'پیام شما',
                contact_send: 'ارسال پیام',
                contact_info_title: 'اطلاعات تماس',
                contact_phone: 'تلفن',
                contact_email_label: 'ایمیل',
                contact_website: 'وب‌سایت',
                office_tehran: 'دفتر تهران',
                office_tehran_address: 'عباس آباد - علی اکبری -خیابان آزادی - نبش آزادی و شهید خلیل حسینی - پلاک ۲',
                office_rasht: 'دفتر رشت',
                office_rasht_address: 'گلسار، برج ایرانیان، طبقه ۱۱، واحد ۱',

                footer_description: 'کیهان گستر آفرینش (KGA) - شریک قابل اعتماد شما در نوآوری و تعالی کسب‌وکار. موفقیت شما، ماموریت ماست.',
                footer_quick_links: 'لینک‌های سریع',
                footer_services_title: 'خدمات',
                footer_newsletter: 'خبرنامه',
                footer_newsletter_desc: 'برای دریافت آخرین اخبار و به‌روزرسانی‌ها عضو شوید',
                footer_subscribe: 'عضویت',
                btn_learn_more: 'بیشتر بدانید',
                btn_back_to_top: 'بازگشت به بالا',
                footer_copyright: '© ۱۳۹۷ - ۱۴۰۴ کیهان گستر آفرینش (KGA). تمام حقوق محفوظ است.',
                meta_title: 'کیهان گستر آفرینش (KGA) | نوآوری و تعالی در راه‌حل‌های کسب‌وکار',
                meta_description: 'کیهان گستر آفرینش (KGA) - شریک قابل اعتماد شما در مشاوره کسب‌وکار، راه‌حل‌های سرمایه‌گذاری، مدیریت پروژه و تجارت بین‌المللی.'
            },
            en: {
                nav_home: 'Home',
                nav_about: 'About',
                nav_services: 'Services',
                nav_portfolio: 'Portfolio',
                nav_contact: 'Contact',
                nav_language: 'فارسی',
                company_name: 'Keyhan Gostar Afarinesh',

                hero_title: 'Keyhan Gostar Afarinesh (KGA)',
                hero_subtitle: 'Innovation and Excellence in Business',
                hero_description: 'Keyhan Gostar Afarinesh (KGA) is a leading company dedicated to providing innovative business and services. Our mission is to deliver excellence and value to our clients through cutting-edge strategies and professional expertise.',
                hero_cta_primary: 'Start Partnership',
                hero_cta_secondary: 'Expert Consultation',

                slide2_title: 'Investment Solutions',
                slide2_subtitle: 'Expertise in Investment and Project Management',
                slide2_description: 'With years of experience in managing large projects and smart investment solutions, we are your trusted partner in business growth.',
                slide2_cta_primary: 'Our Services',
                slide2_cta_secondary: 'Learn More',

                slide3_title: 'Your Success, Our Mission',
                slide3_subtitle: 'Partnership for More Profit',
                slide3_description: 'We partner with you to understand your vision and deliver exceptional results that exceed expectations.',
                slide3_cta_primary: 'View Services',
                slide3_cta_secondary: 'Contact Us',

                about_title: 'About Keyhan Gostar Afarinesh',
                about_subtitle: 'Expertise in Property Development & International Trade',
                about_description: 'Keyhan Gostar Afarinesh, led by Dr. Afarinesh and Dr. Asghari Far, specialists in Architecture and Business Administration, operates in property development, import/export, and forex and crypto trading. With experience and specialized knowledge, we are your trusted partner in business growth and development.',
                about_feature_1: 'Property Development',
                about_feature_2: 'Import & Export',
                about_feature_3: 'Forex & Crypto Trading',
                about_feature_4: 'Architecture Consulting',

                services_title: 'Our Services',
                services_subtitle: 'Expertise in Four Main Areas',
                service_1_title: 'Property Development',
                service_1_desc: 'Design, construction and management of residential, commercial, office, tourism and recreational projects',
                service_2_title: 'Import & Export',
                service_2_desc: 'International trade, importing required goods and exporting Iranian products to global markets',
                service_3_title: 'Forex & Crypto Trading',
                service_3_desc: 'Forex and crypto trading consultation, financial market analysis and capital management',
                service_4_title: 'Architecture Consulting',
                service_4_desc: 'Architectural design, construction supervision and technical consulting for building projects',
                service_5_title: 'Business Management',
                service_5_desc: 'Investment consulting, investment strategist',
                service_6_title: 'Investment',
                service_6_desc: 'Providing financial resources for suitable investment opportunities by reviewing your existing ideas',

                stats_projects: 'Projects Completed',
                stats_years: 'Years Experience',
                stats_awards: 'Awards Won',

                portfolio_title: 'Our Successful Projects',
                portfolio_subtitle: 'Showcasing Excellence and Innovation',
                portfolio_filter_all: 'All',
                portfolio_filter_property: 'Property Development',
                portfolio_filter_trade: 'Import & Export',
                portfolio_filter_forex: 'Forex & Crypto Trading',
                portfolio_view_project: 'Project Details',
                portfolio_item6_title: 'Investment Fund',

                gallery1_subtitle: 'Success Showcase',
                gallery1_title: "KGA's Premier Projects",
                gallery1_description: '',
                gallery1_item1_title: 'Golsar Residential Complex',
                gallery1_item1_desc: 'Design and development of modern residential complex',
                gallery1_item2_title: 'Mobile Parts & Accessories Import',
                gallery1_item2_desc: 'Importing mobile parts and accessories from international markets',
                gallery1_item3_title: 'Financial Markets Trader',
                gallery1_item3_desc: 'Trading and analysis of financial and currency markets',
                gallery1_item4_title: 'Corporate Forex Management',
                gallery1_item4_desc: 'Currency risk management and consulting',
                gallery1_item5_title: 'Office Building Design',
                gallery1_item5_desc: 'Architectural design of commercial building',

                contact_title: 'Contact Us',
                contact_subtitle: 'Ready for Collaboration, Investment and Consultation',
                contact_description: '',
                contact_name: 'Full Name',
                contact_email: 'Email Address',
                contact_subject: 'Subject',
                contact_message: 'Your Message',
                contact_send: 'Send Message',
                contact_info_title: 'Contact Information',
                contact_phone: 'Phone',
                contact_email_label: 'Email',
                contact_website: 'Website',
                office_tehran: 'Tehran Office',
                office_tehran_address: 'Abbas Abad - Ali Akbari - Azadi Street - Corner of Azadi and Shahid Khalil Hosseini - No. 2',
                office_rasht: 'Rasht Office',
                office_rasht_address: 'Golsar, Iranian Tower, 11th Floor, Unit 1',

                footer_description: 'Keyhan Gostar Afarinesh (KGA) - Your trusted partner in business innovation and excellence. Your success is our mission.',
                footer_quick_links: 'Quick Links',
                footer_services_title: 'Services',
                footer_newsletter: 'Newsletter',
                footer_newsletter_desc: 'Subscribe to get latest news and updates',
                footer_subscribe: 'Subscribe',
                btn_learn_more: 'Learn More',
                btn_back_to_top: 'Back to Top',
                footer_copyright: '© 2018 - 2025 Keyhan Gostar Afarinesh (KGA). All rights reserved.',
                meta_title: 'Keyhan Gostar Afarinesh (KGA) | Innovation and Excellence in Business Solutions',
                meta_description: 'Keyhan Gostar Afarinesh (KGA) - Your trusted partner in business consulting, investment solutions, project management, and international trade.'
            }
        };

        document.addEventListener('DOMContentLoaded', function () {
            const params = new URLSearchParams(window.location.search);
            const lang = params.get('lang') === 'en' ? 'en' : 'fa';
            const t = translations[lang];

            const html = document.documentElement;
            html.lang = lang === 'en' ? 'en' : 'fa';
            html.dir = lang === 'en' ? 'ltr' : 'rtl';

            const body = document.body;
            body.classList.remove('rtl-body', 'ltr-body');
            body.classList.add(lang === 'en' ? 'ltr-body' : 'rtl-body');

            const titleEl = document.querySelector('title');
            if (titleEl && t.meta_title) titleEl.textContent = t.meta_title;

            const metaDesc = document.querySelector('meta[name="description"]');
            if (metaDesc && t.meta_description) metaDesc.setAttribute('content', t.meta_description);

            const langLink = document.querySelector('.language-switcher');
            if (langLink) {
                langLink.setAttribute('data-current-lang', lang);
                langLink.textContent = t.nav_language;
            }

            document.querySelectorAll('[data-i18n]').forEach(function (el) {
                const key = el.getAttribute('data-i18n');
                if (t[key] === undefined) return;

                const tag = el.tagName.toLowerCase();
                if (tag === 'input' || tag === 'textarea') {
                    el.setAttribute('placeholder', t[key]);
                } else {
                    el.textContent = t[key];
                }
            });
        });
    </script>
</head>
<body class="rtl-body">
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
                    <img src="assets/images/logo.png" alt="کیهان گستر آفرینش" class="logo-image">
                    <span class="logo-text" data-i18n="company_name">کیهان گستر آفرینش</span>
                </div>
            </a>

            <button class="navbar-toggler" type="button" aria-expanded="false" aria-controls="navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home" data-i18n="nav_home">خانه</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about" data-i18n="nav_about">درباره ما</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services" data-i18n="nav_services">خدمات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio" data-i18n="nav_portfolio">نمونه کارها</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact" data-i18n="nav_contact">تماس</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link language-switcher" href="javascript:void(0);" data-i18n="nav_language">
                            English
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Cursor Follower -->
    <div class="cursor-follower"></div>
    <div class="cursor-dot"></div>

    <!-- Hero Slider Section -->
    <section id="home" class="hero-slider-section">
        <div class="hero-slider-container">
            <!-- Slide 1 -->
            <div class="hero-slide active" data-slide="1">
                <div class="slide-background">
                    <video autoplay muted loop playsinline preload="metadata" class="slide-video">
                        <source src="assets/videos/hero-bg.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="slide-image-fallback" style="background-image: url('assets/images/hero-slide-1.jpg');"></div>
                    <div class="slide-overlay"></div>
                </div>
                <div class="slide-particles"></div>
                <div class="container">
                    <div class="row align-items-center min-vh-100">
                        <div class="col-lg-8 mx-auto text-center">
                            <div class="slide-content">
                                <h1 class="slide-title">
                                    <span class="title-highlight" data-i18n="hero_title">کیهان گستر آفرینش (KGA)</span>
                                </h1>
                                <h2 class="slide-subtitle" data-i18n="hero_subtitle">
                                    نوآوری و تعالی در راه‌حل‌های کسب‌وکار
                                </h2>
                                <p class="slide-description" data-i18n="hero_description">
                                    شرکت کیهان گستر آفرینش (KGA) یک شرکت پیشرو در ارائه راه‌حل‌ها و خدمات کسب‌وکار نوآورانه است. ماموریت ما ارائه تعالی و ارزش به مشتریان از طریق استراتژی‌های پیشرفته و تخصص حرفه‌ای است.
                                </p>
                                <div class="slide-buttons">
                                    <a href="#contact" class="btn btn-primary btn-lg slide-btn-primary">
                                        <span data-i18n="hero_cta_primary">شروع همکاری</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                    <a href="#portfolio" class="btn btn-outline-light btn-lg slide-btn-secondary">
                                        <span data-i18n="hero_cta_secondary">مشاوره تخصصی</span>
                                        <i class="fas fa-play"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="hero-slide" data-slide="2">
                <div class="slide-background">
                    <video autoplay muted loop playsinline preload="metadata" class="slide-video">
                        <source src="assets/videos/hero-bg-2.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="slide-image-fallback" style="background-image: url('assets/images/hero-slide-2.jpg');"></div>
                    <div class="slide-overlay"></div>
                </div>
                <div class="slide-particles"></div>
                <div class="container">
                    <div class="row align-items-center min-vh-100">
                        <div class="col-lg-8 mx-auto text-center">
                            <div class="slide-content">
                                <h1 class="slide-title">
                                    <span class="title-highlight" data-i18n="slide2_title">سرمایه‌گذاری</span>
                                </h1>
                                <h2 class="slide-subtitle" data-i18n="slide2_subtitle">
                                    تخصص در سرمایه‌گذاری و مدیریت پروژه
                                </h2>
                                <p class="slide-description" data-i18n="slide2_description">
                                    با سال‌ها تجربه در مدیریت پروژه‌های بزرگ و سرمایه‌گذاری هوشمند، شریک قابل اعتماد شما در رشد کسب‌وکار هستیم.
                                </p>
                                <div class="slide-buttons">
                                    <a href="#services" class="btn btn-primary btn-lg slide-btn-primary">
                                        <span data-i18n="slide2_cta_primary">خدمات ما</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                    <a href="#about" class="btn btn-outline-light btn-lg slide-btn-secondary">
                                        <span data-i18n="slide2_cta_secondary">بیشتر بدانید</span>
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="hero-slide" data-slide="3">
                <div class="slide-background">
                    <video autoplay muted loop playsinline preload="metadata" class="slide-video">
                        <source src="assets/videos/hero-bg-3.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="slide-image-fallback" style="background-image: url('assets/images/hero-slide-3.jpg');"></div>
                    <div class="slide-overlay"></div>
                </div>
                <div class="slide-particles"></div>
                <div class="container">
                    <div class="row align-items-center min-vh-100">
                        <div class="col-lg-8 mx-auto text-center">
                            <div class="slide-content">
                                <h1 class="slide-title">
                                    <span class="title-highlight" data-i18n="slide3_title">ماموریت ما، موفقیت شما، </span>
                                </h1>
                                <h2 class="slide-subtitle" data-i18n="slide3_subtitle">
                                    شراکت باهم برای سود بیشتر
                                </h2>
                                <p class="slide-description" data-i18n="slide3_description">
                                    ما با شما شریک می‌شویم تا چشم‌انداز شما را درک کنیم و نتایج استثنایی ارائه دهیم که از انتظارات فراتر می‌رود.
                                </p>
                                <div class="slide-buttons">
                                    <a href="#portfolio" class="btn btn-primary btn-lg slide-btn-primary">
                                        <span data-i18n="slide3_cta_primary">مشاهده خدمات</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                    <a href="#contact" class="btn btn-outline-light btn-lg slide-btn-secondary">
                                        <span data-i18n="slide3_cta_secondary">تماس با ما</span>
                                        <i class="fas fa-phone"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider Controls -->
        <div class="slider-controls">
            <button class="slider-nav prev-slide" aria-label="Previous Slide">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="slider-nav next-slide" aria-label="Next Slide">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <!-- Slider Indicators -->
        <div class="slider-indicators">
            <button class="indicator active" data-slide="1"></button>
            <button class="indicator" data-slide="2"></button>
            <button class="indicator" data-slide="3"></button>
        </div>

        <!-- Floating Shapes -->
        <div class="hero-shapes">
            <div class="floating-shape shape-1"></div>
            <div class="floating-shape shape-2"></div>
            <div class="floating-shape shape-3"></div>
        </div>

        <div class="scroll-indicator">
            <div class="scroll-mouse">
                <div class="scroll-wheel"></div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="about-content">
                        <div class="section-header">
                            <span class="section-subtitle" data-i18n="about_subtitle">تخصص در توسعه املاک و تجارت بین‌المللی</span>
                            <h2 class="section-title" data-i18n="about_title">درباره کیهان گستر آفرینش</h2>
                        </div>
                        <p class="about-description" data-i18n="about_description">
                            کیهان گستر آفرینش تحت مدیریت دکتر آفرینش و دکتر اصغری فر، متخصصان معماری و مدیریت کسب‌وکار، در زمینه‌های توسعه املاک، واردات و صادرات، و معاملات فارکس و کریپتو(ارز دیجیتال) فعالیت می‌کند. ما با تجربه و دانش تخصصی، شریک قابل اعتماد شما در رشد و توسعه کسب‌وکار هستیم.
                        </p>

                        <div class="about-features">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-handshake"></i>
                                </div>
                                <h5 data-i18n="about_feature_1">توسعه املاک</h5>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <h5 data-i18n="about_feature_2">واردات و صادرات</h5>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-project-diagram"></i>
                                </div>
                                <h5 data-i18n="about_feature_3">معاملات فارکس و کریپتو</h5>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <h5 data-i18n="about_feature_4">مشاوره معماری</h5>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <div class="about-visual">
                        <div class="about-image-container">
                            <img src="assets/images/about-image.jpg" alt="About Us" class="about-image">
                            <div class="about-image-overlay"></div>
                            <div class="about-stats">
                                <div class="stat-item">
                                    <span class="stat-number" data-count="63">0</span>
                                    <span class="stat-label" data-i18n="stats_projects">پروژه تکمیل شده</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section section-padding">
        <div class="services-background">
            <div class="services-particles"></div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="section-header" data-aos="fade-up">
                        <span class="section-subtitle" data-i18n="services_subtitle">تخصص در چهار حوزه اصلی</span>
                        <h2 class="section-title" data-i18n="services_title">خدمات ما</h2>
                    </div>
                </div>
            </div>

            <div class="row gy-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h4 class="service-title" data-i18n="service_1_title">توسعه املاک</h4>
                        <p class="service-description" data-i18n="service_1_desc">طراحی، ساخت و مدیریت پروژه‌های مسکونی، تجاری، اداری، گردشگری و تفریحی</p>
                        <a href="#contact" class="service-link">
                            <span data-i18n="btn_learn_more">بیشتر بدانید</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4 class="service-title" data-i18n="service_2_title">واردات و صادرات</h4>
                        <p class="service-description" data-i18n="service_2_desc">تجارت بین‌المللی، واردات کالاهای مورد نیاز و صادرات محصولات ایرانی به بازارهای جهانی</p>
                        <a href="#contact" class="service-link">
                            <span data-i18n="btn_learn_more">بیشتر بدانید</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                        <h4 class="service-title" data-i18n="service_3_title">معاملات فارکس و کریپتو</h4>
                        <p class="service-description" data-i18n="service_3_desc">مشاوره و انجام معاملات فارکس و کریپتو، تحلیل بازارهای مالی و مدیریت سرمایه</p>
                        <a href="#contact" class="service-link">
                            <span data-i18n="btn_learn_more">بیشتر بدانید</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h4 class="service-title" data-i18n="service_4_title">مشاوره معماری</h4>
                        <p class="service-description" data-i18n="service_4_desc">طراحی معماری، نظارت بر اجرا و مشاوره فنی پروژه‌های ساختمانی</p>
                        <a href="#contact" class="service-link">
                            <span data-i18n="btn_learn_more">بیشتر بدانید</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-coins"></i>
                        </div>
                        <h4 class="service-title" data-i18n="service_5_title">مدیریت کسب‌وکار</h4>
                        <p class="service-description" data-i18n="service_5_desc">مشاوره سرمایه‌گذاری، استراتژیست سرمایه‌گذاری</p>
                        <a href="#contact" class="service-link">
                            <span data-i18n="btn_learn_more">بیشتر بدانید</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h4 class="service-title" data-i18n="service_6_title">سرمایه‌گذاری</h4>
                        <p class="service-description" data-i18n="service_6_desc">تامین منابع مالی برای فرصت‌های سرمایه‌گذاری مناسب با بررسی ایده‌های موجود شما</p>
                        <a href="#contact" class="service-link">
                            <span data-i18n="btn_learn_more">بیشتر بدانید</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="stats-background">
            <div class="stats-overlay"></div>
        </div>

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                        <div class="stat-number" data-count="63">0</div>
                        <div class="stat-label" data-i18n="stats_projects">پروژه تکمیل شده</div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="stat-number" data-count="8">0</div>
                        <div class="stat-label" data-i18n="stats_years">سال تجربه</div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <div class="stat-number" data-count="5">0</div>
                        <div class="stat-label" data-i18n="stats_awards">جایزه کسب شده</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="section-header" data-aos="fade-up">
                        <span class="section-subtitle" data-i18n="portfolio_subtitle">نمایش تعالی و نوآوری</span>
                        <h2 class="section-title" data-i18n="portfolio_title">پروژه‌های موفق ما</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="portfolio-filters" data-aos="fade-up" data-aos-delay="100">
                        <button class="filter-btn active" data-filter="*" data-i18n="portfolio_filter_all">همه</button>
                        <button class="filter-btn" data-filter=".property" data-i18n="portfolio_filter_property">توسعه املاک</button>
                        <button class="filter-btn" data-filter=".trade" data-i18n="portfolio_filter_trade">واردات و صادرات</button>
                        <button class="filter-btn" data-filter=".forex" data-i18n="portfolio_filter_forex">معاملات فارکس و کریپتو</button>
                    </div>
                </div>
            </div>

            <div class="row portfolio-grid">
                <div class="col-lg-4 col-md-6 portfolio-item property" data-aos="fade-up" data-aos-delay="200">
                    <div class="portfolio-card">
                        <div class="portfolio-image">
                            <img src="assets/images/portfolio-1.jpg" alt="Gilan Industrial Development">
                            <div class="portfolio-overlay">
                                <div class="portfolio-content">
                                    <h5 class="portfolio-title" data-i18n="gallery1_item1_title">مجتمع مسکونی گلسار</h5>
                                    <p class="portfolio-category" data-i18n="portfolio_filter_property">توسعه املاک</p>
                                    <a href="#contact" class="portfolio-link">
                                        <span data-i18n="portfolio_view_project">جزئیات پروژه</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item trade" data-aos="fade-up" data-aos-delay="300">
                    <div class="portfolio-card">
                        <div class="portfolio-image">
                            <img src="assets/images/portfolio-2.jpg" alt="Agricultural Export Program">
                            <div class="portfolio-overlay">
                                <div class="portfolio-content">
                                    <h5 class="portfolio-title" data-i18n="gallery1_item2_title">واردات قطعات و لوازم جانبی موبایل</h5>
                                    <p class="portfolio-category" data-i18n="portfolio_filter_trade">واردات و صادرات</p>
                                    <a href="#contact" class="portfolio-link">
                                        <span data-i18n="portfolio_view_project">جزئیات پروژه</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item forex" data-aos="fade-up" data-aos-delay="400">
                    <div class="portfolio-card">
                        <div class="portfolio-image">
                            <img src="assets/images/portfolio-3.jpg" alt="Rasht Housing Project">
                            <div class="portfolio-overlay">
                                <div class="portfolio-content">
                                    <h5 class="portfolio-title" data-i18n="gallery1_item3_title">معامله گر بازارهای مالی</h5>
                                    <p class="portfolio-category" data-i18n="portfolio_filter_forex">معاملات فارکس و کریپتو</p>
                                    <a href="#contact" class="portfolio-link">
                                        <span data-i18n="portfolio_view_project">جزئیات پروژه</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item property" data-aos="fade-up" data-aos-delay="500">
                    <div class="portfolio-card">
                        <div class="portfolio-image">
                            <img src="assets/images/portfolio-4.jpg" alt="Knowledge-Based Companies">
                            <div class="portfolio-overlay">
                                <div class="portfolio-content">
                                    <h5 class="portfolio-title" data-i18n="gallery1_item4_title">مدیریت ارز شرکت‌ها</h5>
                                    <p class="portfolio-category" data-i18n="portfolio_filter_property">توسعه املاک</p>
                                    <a href="#contact" class="portfolio-link">
                                        <span data-i18n="portfolio_view_project">جزئیات پروژه</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item property" data-aos="fade-up" data-aos-delay="600">
                    <div class="portfolio-card">
                        <div class="portfolio-image">
                            <img src="assets/images/portfolio-5.jpg" alt="European Market Expansion">
                            <div class="portfolio-overlay">
                                <div class="portfolio-content">
                                    <h5 class="portfolio-title" data-i18n="gallery1_item5_title">طراحی ساختمان اداری</h5>
                                    <p class="portfolio-category" data-i18n="portfolio_filter_property">توسعه املاک</p>
                                    <a href="#contact" class="portfolio-link">
                                        <span data-i18n="portfolio_view_project">جزئیات پروژه</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item property" data-aos="fade-up" data-aos-delay="700">
                    <div class="portfolio-card">
                        <div class="portfolio-image">
                            <img src="assets/images/portfolio-6.jpg" alt="Investment Fund">
                            <div class="portfolio-overlay">
                                <div class="portfolio-content">
                                    <h5 class="portfolio-title" data-i18n="portfolio_item6_title">صندوق سرمایه‌گذاری</h5>
                                    <p class="portfolio-category" data-i18n="portfolio_filter_property">توسعه املاک</p>
                                    <a href="#contact" class="portfolio-link">
                                        <span data-i18n="portfolio_view_project">جزئیات پروژه</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Image Gallery Section 1 -->
    <section class="image-gallery-section section-padding" id="gallery-creative">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="section-header" data-aos="fade-up">
                        <span class="section-subtitle" data-i18n="gallery1_subtitle">نمایشگاه موفقیت‌ها</span>
                        <h2 class="section-title" data-i18n="gallery1_title">پروژه‌های برتر KGA</h2>
                        <p class="section-description" data-i18n="gallery1_description"></p>
                    </div>
                </div>
            </div>

            <div class="row gallery-row">
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="gallery-item hover-scale-rotate">
                        <img src="assets/images/gallery-1-1.jpg" alt="Gilan Industrial Development" class="gallery-image">
                        <div class="gallery-overlay">
                            <div class="gallery-content">
                                <h5 data-i18n="gallery1_item1_title">مجتمع مسکونی گلسار</h5>
                                <p data-i18n="gallery1_item1_desc">طراحی و توسعه مجتمع مسکونی مدرن</p>
                                <a href="#contact" class="gallery-link">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="gallery-item hover-glow">
                        <img src="assets/images/portfolio-2.jpg" alt="Mobile Parts & Accessories Import" class="gallery-image">
                        <div class="gallery-overlay">
                            <div class="gallery-content">
                                <h5 data-i18n="gallery1_item2_title">واردات قطعات و لوازم جانبی موبایل</h5>
                                <p data-i18n="gallery1_item2_desc">واردات قطعات و لوازم جانبی موبایل از بازارهای بین‌المللی</p>
                                <a href="#contact" class="gallery-link">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="gallery-item hover-parallax">
                        <img src="assets/images/gallery-1-3.jpg" alt="Rasht Housing Project" class="gallery-image">
                        <div class="gallery-overlay">
                            <div class="gallery-content">
                                <h5 data-i18n="gallery1_item3_title">معامله گر بازارهای مالی</h5>
                                <p data-i18n="gallery1_item3_desc">معامله‌گری و تحلیل بازارهای مالی و ارزی</p>
                                <a href="#contact" class="gallery-link">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mb-4" data-aos="fade-right" data-aos-delay="400">
                    <div class="gallery-item hover-zoom">
                        <img src="assets/images/gallery-1-4.jpg" alt="Knowledge-Based Companies" class="gallery-image">
                        <div class="gallery-overlay">
                            <div class="gallery-content">
                                <h5 data-i18n="gallery1_item4_title">مدیریت ارز شرکت‌ها</h5>
                                <p data-i18n="gallery1_item4_desc">مشاوره و مدیریت ریسک ارزی</p>
                                <a href="#contact" class="gallery-link">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mb-4" data-aos="fade-left" data-aos-delay="500">
                    <div class="gallery-item hover-flip">
                        <img src="assets/images/gallery-1-5.jpg" alt="European Market Expansion" class="gallery-image">
                        <div class="gallery-overlay">
                            <div class="gallery-content">
                                <h5 data-i18n="gallery1_item5_title">طراحی ساختمان اداری</h5>
                                <p data-i18n="gallery1_item5_desc">طراحی معماری ساختمان تجاری</p>
                                <a href="#contact" class="gallery-link">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section section-padding">
        <div class="contact-background">
            <div class="contact-particles"></div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="section-header" data-aos="fade-up">
                        <span class="section-subtitle" data-i18n="contact_subtitle">آماده همکاری و سرمایه‌گذاری و مشاوره هستیم</span>
                        <h2 class="section-title" data-i18n="contact_title">تماس با ما</h2>
                        <p class="section-description" data-i18n="contact_description"></p>
                    </div>
                </div>
            </div>

            <div class="row gy-5">
                <div class="col-lg-8" data-aos="fade-right">
                    <div class="contact-form-container">
                        <form class="contact-form">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" data-i18n="contact_name" placeholder="نام کامل" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" data-i18n="contact_email" placeholder="آدرس ایمیل" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" data-i18n="contact_subject" placeholder="موضوع" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="6" data-i18n="contact_message" placeholder="پیام شما" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">
                                        <span data-i18n="contact_send">ارسال پیام</span>
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-left">
                    <div class="contact-info">
                        <div class="contact-info-header">
                            <h4 class="contact-info-title" data-i18n="contact_info_title">اطلاعات تماس</h4>
                        </div>

                        <div class="contact-info-items">
                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-info-content">
                                    <h6 data-i18n="office_tehran">دفتر تهران</h6>
                                    <p data-i18n="office_tehran_address">عباس آباد - علی اکبری -خیابان آزادی - نبش آزادی و شهید خلیل حسینی - پلاک ۲</p>
                                </div>
                            </div>

                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-info-content">
                                    <h6 data-i18n="office_rasht">دفتر رشت</h6>
                                    <p data-i18n="office_rasht_address">گلسار، برج ایرانیان، طبقه ۱۱، واحد ۱</p>
                                </div>
                            </div>

                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="contact-info-content">
                                    <h6 data-i18n="contact_phone">تلفن</h6>
                                    <p dir="ltr">+98 912 105 5524</p>
                                    <p dir="ltr">+98 912 108 9383</p>
                                    <p dir="ltr">+98 912 126 6383</p>
                                    <p dir="ltr">+98 912 376 9962</p>
                                </div>
                            </div>

                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-info-content">
                                    <h6 data-i18n="contact_email_label">ایمیل</h6>
                                    <p dir="ltr">dr.mahdi_afarinesh@gmail.com</p>
                                </div>
                            </div>

                            <div class="contact-info-item">
                                <div class="contact-info-icon">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <div class="contact-info-content">
                                    <h6 data-i18n="contact_website">وب‌سایت</h6>
                                    <p dir="ltr">www.kgaholding.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                            <img src="assets/images/logo.png" alt="کیهان گستر آفرینش" class="footer-logo-image">
                            <span class="footer-logo-text" data-i18n="company_name">کیهان گستر آفرینش</span>
                        </div>
                        <p class="footer-description" data-i18n="footer_description">
                            کیهان گستر آفرینش (KGA) - شریک قابل اعتماد شما در نوآوری و تعالی کسب‌وکار. موفقیت شما، ماموریت ماست.
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
                        <h5 class="footer-title" data-i18n="footer_quick_links">لینک‌های سریع</h5>
                        <ul class="footer-links">
                            <li><a href="#home" data-i18n="nav_home">خانه</a></li>
                            <li><a href="#about" data-i18n="nav_about">درباره ما</a></li>
                            <li><a href="#services" data-i18n="nav_services">خدمات</a></li>
                            <li><a href="#portfolio" data-i18n="nav_portfolio">نمونه کارها</a></li>
                            <li><a href="#contact" data-i18n="nav_contact">تماس</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="footer-widget">
                        <h5 class="footer-title" data-i18n="footer_services_title">خدمات</h5>
                        <ul class="footer-links">
                            <li><a href="#services" data-i18n="service_1_title">توسعه املاک</a></li>
                            <li><a href="#services" data-i18n="service_2_title">واردات و صادرات</a></li>
                            <li><a href="#services" data-i18n="service_3_title">معاملات فارکس و کریپتو</a></li>
                            <li><a href="#services" data-i18n="service_4_title">مشاوره معماری</a></li>
                            <li><a href="#services" data-i18n="service_5_title">مدیریت کسب‌وکار</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="footer-widget">
                        <h5 class="footer-title" data-i18n="footer_newsletter">خبرنامه</h5>
                        <p class="footer-newsletter-desc" data-i18n="footer_newsletter_desc">
                            برای دریافت آخرین اخبار و به‌روزرسانی‌ها عضو شوید
                        </p>
                        <form class="newsletter-form">
                            <div class="input-group">
                                <input type="email" class="form-control newsletter-input" data-i18n="contact_email" placeholder="آدرس ایمیل">
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
                    <p class="footer-copyright" data-i18n="footer_copyright">
                        © ۱۳۹۷ - ۱۴۰۴ کیهان گستر آفرینش (KGA). تمام حقوق محفوظ است.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="back-to-top" aria-label="بازگشت به بالا" data-i18n="btn_back_to_top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Custom JavaScript -->
    <script src="assets/js/scripts.js"></script>

    <script>
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });

        document.addEventListener('DOMContentLoaded', function () {
            const link = document.querySelector('.language-switcher');
            if (!link) return;

            const params = new URLSearchParams(window.location.search);
            const current = params.get('lang') === 'en' ? 'en' : 'fa';

            link.addEventListener('click', function () {
                const targetLang = current === 'en' ? 'fa' : 'en';
                if (typeof window.changeLanguage === 'function') {
                    window.changeLanguage(targetLang);
                } else {
                    const baseUrl = window.location.origin + window.location.pathname;
                    const urlParams = new URLSearchParams(window.location.search);
                    urlParams.set('lang', targetLang);
                    window.location.href = baseUrl + '?' + urlParams.toString();
                }
            });
        });
    </script>
</body>
</html>