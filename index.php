<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sniper Photography - Professional photography services by Abubakar Musa. Capturing moments with precision.">
    <meta name="keywords" content="photography, wedding photography, portrait, events, Lagos, Nigeria, Abubakar Musa">
    <meta name="author" content="Abubakar Musa">
    <title>Sniper Photography | Capturing Moments with Precision</title>

    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>📸</text></svg>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/hero.css">
    <link rel="stylesheet" href="assets/css/sections.css">

    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Playfair Display', serif; }
    </style>
    <!-- Paystack Payment SDK -->
    <script src="https://js.paystack.co/v2/inline.js"></script>
    <style>
        .payment-section {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 20px;
            padding: 40px;
            margin-top: 30px;
            border: 2px solid #D4AF37;
            text-align: center;
        }
        .payment-section h3 {
            color: #212529;
            margin-bottom: 15px;
            font-size: 1.5rem;
        }
        .payment-section .price-display {
            font-size: 3rem;
            font-weight: 800;
            color: #D4AF37;
            margin: 20px 0;
        }
        .payment-section .price-display span {
            font-size: 1rem;
            color: #6c757d;
            font-weight: 400;
        }
        .payment-section p {
            color: #6c757d;
            margin-bottom: 25px;
        }
        .payment-section .secure-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .payment-methods {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 20px 0;
            flex-wrap: wrap;
        }
        .payment-methods img {
            height: 30px;
            opacity: 0.7;
            transition: opacity 0.3s;
        }
        .payment-methods img:hover {
            opacity: 1;
        }
        .payment-note {
            font-size: 12px;
            color: #adb5bd;
            margin-top: 15px;
        }
        .booking-summary {
            background: #ffffff;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            text-align: left;
            border: 1px solid #e9ecef;
        }
        .booking-summary h4 {
            margin-bottom: 15px;
            color: #212529;
            font-size: 16px;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef;
            font-size: 14px;
        }
        .summary-row:last-child {
            border-bottom: none;
            font-weight: 700;
            font-size: 16px;
            color: #D4AF37;
        }
        .summary-row span:first-child {
            color: #6c757d;
        }
        .summary-row span:last-child {
            color: #212529;
        }
    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div class="loading-overlay">
        <div class="loader"></div>
    </div>

    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <a href="#" class="logo">
                <div class="logo-icon"><i class="fas fa-camera"></i></div>
                <div class="logo-text">Sniper <span>Photography</span></div>
            </a>

            <nav>
                <ul class="nav-menu">
                    <li><a href="#home" class="active">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#booking">Book Now</a></li>
                    <li><a href="#testimonials">Testimonials</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>

            <div class="header-actions">
                <button class="theme-toggle" onclick="toggleTheme()" title="Toggle Dark/Light Mode">
                    <i class="fas fa-moon"></i>
                </button>
                <div class="mobile-menu-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-slider">
            <div class="hero-slide active" style="background-image: url('https://images.unsplash.com/photo-1519741497674-611481863552?w=1920&q=80')"></div>
            <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=1920&q=80')"></div>
            <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?w=1920&q=80')"></div>
            <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1469334031218-e382a71b716b?w=1920&q=80')"></div>
        </div>

        <div class="hero-content">
            <p class="hero-subtitle">Professional Photography Services</p>
            <h1 class="hero-title">Capturing Moments <span>with Precision</span></h1>
            <p class="hero-description">
                Transform your precious moments into timeless memories. Award-winning photography 
                by Abubakar Musa, blending artistry with technical excellence.
            </p>
            <div class="hero-buttons">
                <a href="#booking" class="btn btn-primary">
                    <i class="fas fa-calendar-check"></i> Book Now
                </a>
                <a href="#portfolio" class="btn btn-outline">
                    <i class="fas fa-images"></i> View Portfolio
                </a>
            </div>
        </div>

        <div class="hero-stats">
            <div class="stat-item">
                <h3 data-count="500" data-suffix="+">0+</h3>
                <p>Projects Done</p>
            </div>
            <div class="stat-item">
                <h3 data-count="350" data-suffix="+">0+</h3>
                <p>Happy Clients</p>
            </div>
            <div class="stat-item">
                <h3 data-count="8" data-suffix="+">0+</h3>
                <p>Years Experience</p>
            </div>
        </div>

        <div class="hero-slider-dots">
            <div class="slider-dot active"></div>
            <div class="slider-dot"></div>
            <div class="slider-dot"></div>
            <div class="slider-dot"></div>
        </div>

        <div class="scroll-indicator">
            <i class="fas fa-chevron-down"></i>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <div class="about-grid">
                <div class="about-image fade-in">
                    <img src="https://images.unsplash.com/photo-1554048612-b6a482bc67e5?w=600&q=80" alt="Abubakar Musa - Professional Photographer">
                </div>
                <div class="about-content fade-in">
                    <h3>About <span>Abubakar Musa</span></h3>
                    <p>
                        Hello! I'm Abubakar Musa, a passionate professional photographer and full-stack 
                        developer based in Lagos, Nigeria. With over 8 years of experience capturing life's 
                        most beautiful moments, I've developed a unique style that blends technical precision 
                        with artistic vision.
                    </p>
                    <p>
                        From intimate weddings to grand corporate events, from stunning portraits to breathtaking 
                        landscapes, I bring the same level of dedication and creativity to every project. My goal 
                        is simple: to tell your story through images that will be cherished for generations.
                    </p>
                    <p>
                        As a full-stack developer, I also understand the digital landscape, ensuring your photos 
                        are optimized for web, social media, and print with the highest quality standards.
                    </p>

                    <div class="skills">
                        <div class="skill-item">
                            <div class="skill-header">
                                <span>Wedding Photography</span>
                                <span>95%</span>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-progress" data-width="95"></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="skill-header">
                                <span>Portrait Photography</span>
                                <span>90%</span>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-progress" data-width="90"></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="skill-header">
                                <span>Event Coverage</span>
                                <span>92%</span>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-progress" data-width="92"></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="skill-header">
                                <span>Photo Editing & Retouching</span>
                                <span>88%</span>
                            </div>
                            <div class="skill-bar">
                                <div class="skill-progress" data-width="88"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="section-header fade-in">
                <h2>Our Portfolio</h2>
                <p>Explore our collection of stunning photographs across various categories</p>
            </div>

            <div class="portfolio-filter fade-in">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="weddings">Weddings</button>
                <button class="filter-btn" data-filter="events">Events</button>
                <button class="filter-btn" data-filter="portraits">Portraits</button>
                <button class="filter-btn" data-filter="nature">Nature</button>
                <button class="filter-btn" data-filter="fashion">Fashion</button>
            </div>

            <div class="portfolio-grid">
                <div class="portfolio-item fade-in" data-category="weddings">
                    <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=600&q=80" alt="Wedding Photography">
                    <div class="portfolio-overlay">
                        <i class="fas fa-expand"></i>
                        <h4>Elegant Wedding</h4>
                        <p>Wedding Photography</p>
                    </div>
                </div>
                <div class="portfolio-item fade-in" data-category="portraits">
                    <img src="https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?w=600&q=80" alt="Portrait Photography">
                    <div class="portfolio-overlay">
                        <i class="fas fa-expand"></i>
                        <h4>Studio Portrait</h4>
                        <p>Portrait Photography</p>
                    </div>
                </div>
                <div class="portfolio-item fade-in" data-category="events">
                    <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?w=600&q=80" alt="Event Photography">
                    <div class="portfolio-overlay">
                        <i class="fas fa-expand"></i>
                        <h4>Corporate Event</h4>
                        <p>Event Photography</p>
                    </div>
                </div>
                <div class="portfolio-item fade-in" data-category="nature">
                    <img src="https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?w=600&q=80" alt="Nature Photography">
                    <div class="portfolio-overlay">
                        <i class="fas fa-expand"></i>
                        <h4>Mountain Landscape</h4>
                        <p>Nature Photography</p>
                    </div>
                </div>
                <div class="portfolio-item fade-in" data-category="fashion">
                    <img src="https://images.unsplash.com/photo-1469334031218-e382a71b716b?w=600&q=80" alt="Fashion Photography">
                    <div class="portfolio-overlay">
                        <i class="fas fa-expand"></i>
                        <h4>Fashion Editorial</h4>
                        <p>Fashion Photography</p>
                    </div>
                </div>
                <div class="portfolio-item fade-in" data-category="weddings">
                    <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=600&q=80" alt="Wedding Photography">
                    <div class="portfolio-overlay">
                        <i class="fas fa-expand"></i>
                        <h4>Traditional Wedding</h4>
                        <p>Wedding Photography</p>
                    </div>
                </div>
                <div class="portfolio-item fade-in" data-category="portraits">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=600&q=80" alt="Portrait Photography">
                    <div class="portfolio-overlay">
                        <i class="fas fa-expand"></i>
                        <h4>Professional Headshot</h4>
                        <p>Portrait Photography</p>
                    </div>
                </div>
                <div class="portfolio-item fade-in" data-category="events">
                    <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=600&q=80" alt="Event Photography">
                    <div class="portfolio-overlay">
                        <i class="fas fa-expand"></i>
                        <h4>Music Concert</h4>
                        <p>Event Photography</p>
                    </div>
                </div>
                <div class="portfolio-item fade-in" data-category="nature">
                    <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=600&q=80" alt="Nature Photography">
                    <div class="portfolio-overlay">
                        <i class="fas fa-expand"></i>
                        <h4>Forest Light</h4>
                        <p>Nature Photography</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lightbox -->
    <div class="lightbox">
        <button class="lightbox-close"><i class="fas fa-times"></i></button>
        <button class="lightbox-nav lightbox-prev"><i class="fas fa-chevron-left"></i></button>
        <img src="" alt="Portfolio Image">
        <button class="lightbox-nav lightbox-next"><i class="fas fa-chevron-right"></i></button>
    </div>

    <!-- Services Section -->
    <section id="services" class="services">
        <div class="container">
            <div class="section-header fade-in">
                <h2>Our Services</h2>
                <p>Professional photography services tailored to your unique needs</p>
            </div>

            <div class="services-grid">
                <div class="service-card fade-in">
                    <div class="service-icon"><i class="fas fa-ring"></i></div>
                    <h3>Wedding Photography</h3>
                    <p>Complete wedding day coverage including ceremony, reception, and portraits. Includes edited digital gallery and print rights.</p>
                    <div class="service-price">₦150,000 <span>per event</span></div>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Professional editing</li>
                        <li><i class="fas fa-check"></i> Online gallery</li>
                        <li><i class="fas fa-check"></i> Print rights</li>
                        <li><i class="fas fa-check"></i> Second photographer option</li>
                    </ul>
                    <a href="#booking" class="btn btn-primary" style="width:100%">Book Now</a>
                </div>

                <div class="service-card fade-in">
                    <div class="service-icon"><i class="fas fa-camera"></i></div>
                    <h3>Studio Portrait Session</h3>
                    <p>Professional studio portrait session with multiple outfit changes and backdrops. Perfect for headshots and family portraits.</p>
                    <div class="service-price">₦50,000 <span>per session</span></div>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Multiple outfits</li>
                        <li><i class="fas fa-check"></i> Professional lighting</li>
                        <li><i class="fas fa-check"></i> Retouched images</li>
                        <li><i class="fas fa-check"></i> Digital delivery</li>
                    </ul>
                    <a href="#booking" class="btn btn-primary" style="width:100%">Book Now</a>
                </div>

                <div class="service-card fade-in">
                    <div class="service-icon"><i class="fas fa-calendar"></i></div>
                    <h3>Event Coverage</h3>
                    <p>Full event coverage for corporate events, parties, conferences, and celebrations. Includes candid shots and group photos.</p>
                    <div class="service-price">₦75,000 <span>per event</span></div>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Candid photography</li>
                        <li><i class="fas fa-check"></i> Group shots</li>
                        <li><i class="fas fa-check"></i> Quick turnaround</li>
                        <li><i class="fas fa-check"></i> Social media ready</li>
                    </ul>
                    <a href="#booking" class="btn btn-primary" style="width:100%">Book Now</a>
                </div>

                <div class="service-card fade-in">
                    <div class="service-icon"><i class="fas fa-sun"></i></div>
                    <h3>Outdoor Photo Shoot</h3>
                    <p>Natural light photography at location of your choice. Ideal for engagement shoots, family photos, or creative sessions.</p>
                    <div class="service-price">₦60,000 <span>per session</span></div>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Location scouting</li>
                        <li><i class="fas fa-check"></i> Natural lighting</li>
                        <li><i class="fas fa-check"></i> Multiple locations</li>
                        <li><i class="fas fa-check"></i> Sunset option</li>
                    </ul>
                    <a href="#booking" class="btn btn-primary" style="width:100%">Book Now</a>
                </div>

                <div class="service-card fade-in">
                    <div class="service-icon"><i class="fas fa-box"></i></div>
                    <h3>Product Photography</h3>
                    <p>High-quality product photography for e-commerce, catalogs, and advertising. Clean backgrounds and professional styling.</p>
                    <div class="service-price">₦40,000 <span>per product</span></div>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> White background</li>
                        <li><i class="fas fa-check"></i> Lifestyle shots</li>
                        <li><i class="fas fa-check"></i> Color correction</li>
                        <li><i class="fas fa-check"></i> Web-ready files</li>
                    </ul>
                    <a href="#booking" class="btn btn-primary" style="width:100%">Book Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Section -->
    <section id="booking" class="booking">
        <div class="container">
            <div class="section-header fade-in">
                <h2>Book a Session</h2>
                <p>Ready to capture your special moments? Fill out the form below</p>
            </div>

            <div class="booking-grid">
                <div class="booking-info fade-in">
                    <h3>How It Works</h3>
                    <p>Booking your photography session is simple and straightforward. Follow these easy steps:</p>

                    <div class="booking-steps">
                        <div class="booking-step">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h4>Choose Your Service</h4>
                                <p>Select from our range of professional photography services</p>
                            </div>
                        </div>
                        <div class="booking-step">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h4>Pick a Date</h4>
                                <p>Select your preferred date and time for the session</p>
                            </div>
                        </div>
                        <div class="booking-step">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <h4>Fill the Form</h4>
                                <p>Provide your details and any special requirements</p>
                            </div>
                        </div>
                        <div class="booking-step">
                            <div class="step-number">4</div>
                            <div class="step-content">
                                <h4>Confirmation</h4>
                                <p>We'll contact you within 24 hours to confirm your booking</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="booking-form fade-in" id="bookingFormContainer">
                    <!-- Step 1: Booking Form -->
                    <div id="step1">
                    <div id="bookingMessage" class="form-message"></div>
                    <form id="bookingForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Full Name *</label>
                                <input type="text" id="name" name="name" required placeholder="John Doe">
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address *</label>
                                <input type="email" id="email" name="email" required placeholder="john@example.com">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone">Phone Number *</label>
                                <input type="tel" id="phone" name="phone" required placeholder="+234 800 000 0000">
                            </div>
                            <div class="form-group">
                                <label for="service_type">Service Type *</label>
                                <select id="service_type" name="service_type" required>
                                    <option value="">Select a service</option>
                                    <option value="Wedding Photography">Wedding Photography</option>
                                    <option value="Studio Portrait">Studio Portrait Session</option>
                                    <option value="Event Coverage">Event Coverage</option>
                                    <option value="Outdoor Shoot">Outdoor Photo Shoot</option>
                                    <option value="Product Photography">Product Photography</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="event_date">Event Date *</label>
                                <input type="date" id="event_date" name="event_date" required>
                            </div>
                            <div class="form-group">
                                <label for="event_time">Preferred Time</label>
                                <input type="time" id="event_time" name="event_time">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="location">Event Location</label>
                            <input type="text" id="location" name="location" placeholder="Enter event location">
                        </div>

                        <div class="form-group">
                            <label for="message">Additional Message</label>
                            <textarea id="message" name="message" placeholder="Tell us about your vision, special requests, or any questions..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" style="width:100%">
                            <i class="fas fa-paper-plane"></i> Proceed to Payment
                        </button>
                    </form>
                    </div>

                    <!-- Step 2: Payment -->
                    <div id="step2" style="display: none;">
                        <div class="booking-summary">
                            <h4><i class="fas fa-receipt"></i> Booking Summary</h4>
                            <div class="summary-row">
                                <span>Service</span>
                                <span id="summaryService">-</span>
                            </div>
                            <div class="summary-row">
                                <span>Date</span>
                                <span id="summaryDate">-</span>
                            </div>
                            <div class="summary-row">
                                <span>Client</span>
                                <span id="summaryName">-</span>
                            </div>
                            <div class="summary-row">
                                <span>Total Amount</span>
                                <span id="summaryAmount">-</span>
                            </div>
                        </div>

                        <div class="payment-section">
                            <div class="secure-badge">
                                <i class="fas fa-lock"></i> Secure Payment by Paystack
                            </div>
                            <h3>Complete Your Payment</h3>
                            <div class="price-display">
                                ₦<span id="paymentAmount">0</span>
                                <span>NGN</span>
                            </div>
                            <p>Pay securely using Card, Bank Transfer, USSD, or Mobile Money</p>

                            <div class="payment-methods">
                                <img src="https://paystack.com/assets/img/payment/visa.svg" alt="Visa">
                                <img src="https://paystack.com/assets/img/payment/mastercard.svg" alt="Mastercard">
                                <img src="https://paystack.com/assets/img/payment/verve.svg" alt="Verve">
                                <img src="https://paystack.com/assets/img/payment/bank-transfer.svg" alt="Bank Transfer">
                            </div>

                            <button id="payButton" class="btn btn-primary" style="width: 100%; padding: 16px;">
                                <i class="fas fa-credit-card"></i> Pay Now
                            </button>

                            <button onclick="resetBooking()" class="btn btn-outline" style="width: 100%; margin-top: 10px;">
                                <i class="fas fa-arrow-left"></i> Edit Booking
                            </button>

                            <p class="payment-note">
                                <i class="fas fa-shield-alt"></i> Your payment is secured with 256-bit SSL encryption
                            </p>
                        </div>
                    </div>

                    <!-- Step 3: Success -->
                    <div id="step3" style="display: none; text-align: center; padding: 40px 20px;">
                        <div style="width: 100px; height: 100px; background: rgba(40, 167, 69, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px;">
                            <i class="fas fa-check" style="font-size: 48px; color: #28a745;"></i>
                        </div>
                        <h3 style="color: #212529; margin-bottom: 15px;">Booking Confirmed!</h3>
                        <p style="color: #6c757d; margin-bottom: 20px;">Your payment was successful. We've sent a confirmation to your email.</p>
                        <div class="reference" style="background: #f8f9fa; padding: 10px 20px; border-radius: 10px; font-family: monospace; font-size: 14px; color: #495057; margin-bottom: 20px; display: inline-block;">
                            Ref: <span id="successRef">-</span>
                        </div>
                        <br>
                        <a href="index.php" class="btn btn-primary">
                            <i class="fas fa-home"></i> Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <div class="section-header fade-in">
                <h2>Client Testimonials</h2>
                <p>What our clients say about working with us</p>
            </div>

            <div class="testimonials-slider fade-in">
                <div class="testimonial-item">
                    <div class="testimonial-image">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=200&q=80" alt="Client">
                    </div>
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">
                        "Abubakar captured our wedding day perfectly! Every photo tells a story and brings back 
                        the emotions of that special day. The attention to detail and professionalism was outstanding."
                    </p>
                    <div class="testimonial-author">
                        <h4>Fatima Abdullahi</h4>
                        <p>Wedding Client</p>
                    </div>
                </div>

                <div class="testimonial-item">
                    <div class="testimonial-image">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&q=80" alt="Client">
                    </div>
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">
                        "The corporate headshots for our team were exceptional. Abubakar made everyone feel 
                        comfortable and the results were professional and polished. Highly recommended!"
                    </p>
                    <div class="testimonial-author">
                        <h4>Michael Okafor</h4>
                        <p>CEO, TechStart Nigeria</p>
                    </div>
                </div>

                <div class="testimonial-item">
                    <div class="testimonial-image">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=200&q=80" alt="Client">
                    </div>
                    <div class="testimonial-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">
                        "We hired Sniper Photography for our product launch and the images were stunning. 
                        The product photos increased our online sales by 40%. Worth every penny!"
                    </p>
                    <div class="testimonial-author">
                        <h4>Chioma Nwosu</h4>
                        <p>Marketing Director, Luxe Beauty</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-nav">
                <button class="testimonial-prev"><i class="fas fa-chevron-left"></i></button>
                <button class="testimonial-next"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-header fade-in">
                <h2>Get In Touch</h2>
                <p>Have a question or want to discuss a project? We'd love to hear from you</p>
            </div>

            <div class="contact-grid">
                <div class="contact-info fade-in">
                    <h3>Contact Information</h3>
                    <p>Reach out to us through any of the following channels:</p>

                    <div class="contact-details">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <h4>Location</h4>
                                <p>Lagos, Nigeria</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <div>
                                <h4>Phone</h4>
                                <p>+234 800 000 0000</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <div>
                                <h4>Email</h4>
                                <p>abubakar@sniperphotography.com</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-clock"></i>
                            <div>
                                <h4>Working Hours</h4>
                                <p>Mon - Sat: 9:00 AM - 6:00 PM</p>
                            </div>
                        </div>
                    </div>

                    <div class="social-links">
                        <a href="#" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                        <a href="#" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="contact-form fade-in">
                    <div id="contactMessage" class="form-message"></div>
                    <form id="contactForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="contact_name">Your Name *</label>
                                <input type="text" id="contact_name" name="name" required placeholder="John Doe">
                            </div>
                            <div class="form-group">
                                <label for="contact_email">Email Address *</label>
                                <input type="email" id="contact_email" name="email" required placeholder="john@example.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact_subject">Subject</label>
                            <input type="text" id="contact_subject" name="subject" placeholder="How can we help?">
                        </div>
                        <div class="form-group">
                            <label for="contact_message">Message *</label>
                            <textarea id="contact_message" name="message" required placeholder="Tell us about your project or inquiry..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="width:100%">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>

            <div class="contact-map fade-in" style="margin-top: 60px;">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253682.45932629778!2d3.1191421!3d6.5483763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8b2ae68280c1%3A0xdc9e87a367c3d9cb!2sLagos%2C%20Nigeria!5e0!3m2!1sen!2s!4v1700000000000!5m2!1sen!2s"
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="#" class="logo">
                        <div class="logo-icon"><i class="fas fa-camera"></i></div>
                        <div class="logo-text">Sniper <span>Photography</span></div>
                    </a>
                    <p>Professional photography services capturing life's most precious moments with precision and artistry. Based in Lagos, Nigeria.</p>
                </div>

                <div class="footer-column">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
                        <li><a href="#services">Services</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="#services">Wedding Photography</a></li>
                        <li><a href="#services">Portrait Sessions</a></li>
                        <li><a href="#services">Event Coverage</a></li>
                        <li><a href="#services">Product Photography</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4>Contact</h4>
                    <ul>
                        <li><a href="mailto:abubakar@sniperphotography.com">abubakar@sniperphotography.com</a></li>
                        <li><a href="tel:+2348000000000">+234 800 000 0000</a></li>
                        <li><a href="#booking">Book a Session</a></li>
                        <li><a href="admin/login.php">Admin Login</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2024 Sniper Photography. All rights reserved.</p>
                <p>Designed & Developed by <span>Abubakar Musa</span></p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="assets/js/main.js"></script>
</body>
</html>
