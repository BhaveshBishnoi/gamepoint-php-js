<?php
// includes/disclaimer.php
?>
<div class="disclaimer-component">
    <div class="disclaimer-container">
        <!-- Decorative background -->
        <div class="disclaimer-bg"></div>

        <div class="disclaimer-content">
            <!-- Header -->
            <div class="disclaimer-header">
                <div class="icon-wrapper alert-icon">
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                        <line x1="12" y1="9" x2="12" y2="13"></line>
                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                    </svg>
                </div>
                <div class="header-text">
                    <h3>Important Disclaimer</h3>
                    <p>Please read the following information carefully before using our services</p>
                </div>
                <!-- Mobile toggle button (implemented via JS/CSS checkbox hack or simple JS) -->
                <button class="disclaimer-toggle" id="disclaimerToggle" aria-label="Toggle disclaimer">
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
            </div>

            <!-- Content Body (Collapsible on mobile) -->
            <div class="disclaimer-body" id="disclaimerBody">
                <div class="grid-layout">
                    <!-- About Our Service -->
                    <div class="info-card">
                        <div class="card-icon">
                            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            </svg>
                        </div>
                        <div class="card-text">
                            <strong>About Our Service</strong>
                            <p>We are an independent gaming information platform. We do not represent any developer, nor are we the official developer of any app or game featured on this website.</p>
                        </div>
                    </div>

                    <!-- Content Source -->
                    <div class="info-card">
                        <div class="card-icon">
                            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                            </svg>
                        </div>
                        <div class="card-text">
                            <strong>Content Source</strong>
                            <p>Our website provides game information, screenshots, reviews, and download links collected from Google Play Store and Apple App Store. All content is sourced from publicly available information to help users make informed choices.</p>
                        </div>
                    </div>

                    <!-- Trademarks & Safety (Grid columns) -->
                    <div class="info-grid">
                        <div class="info-card">
                            <div class="card-icon">
                                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                            </div>
                            <div class="card-text">
                                <strong>Trademarks</strong>
                                <p>All trademarks, product names, and logos are the property of their respective owners. We do not claim ownership of any third-party content.</p>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="card-icon">
                                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                            </div>
                            <div class="card-text">
                                <strong>Download Safety</strong>
                                <p>We provide official download links directly to Google Play Store and Apple App Store. We do not host or distribute any APK files.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Copyright & Ads (Grid columns) -->
                    <div class="info-grid">
                        <div class="info-card">
                            <div class="card-icon">
                                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                </svg>
                            </div>
                            <div class="card-text">
                                <strong>Copyright Policy</strong>
                                <p>We comply with DMCA and respond promptly to copyright infringement notices. We respect intellectual property rights.</p>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="card-icon">
                                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                                    <line x1="12" y1="9" x2="12" y2="13"></line>
                                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                </svg>
                            </div>
                            <div class="card-text">
                                <strong>Advertising</strong>
                                <p>This website displays advertisements following Google Ads policies. We do not endorse advertised third-party products.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Section -->
                <div class="contact-card">
                    <div class="contact-header">
                        <h4>Need to Contact Us?</h4>
                        <p>For copyright removal requests, questions, or concerns, please reach out to us:</p>
                    </div>
                    <a href="mailto:contact@gamepoint.com" class="contact-button">
                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <span>contact@gamepoint.com</span>
                    </a>
                </div>

                <!-- Footer Note -->
                <div class="disclaimer-footer">
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                    <p>We are committed to maintaining a safe, legal, and respectful platform for all users. Your privacy and security are our top priorities.</p>
                </div>
            </div>

            <!-- Mobile Toggle Text -->
            <div class="mobile-toggle-text">
                <button id="mobileReadMore">Read Full Disclaimer</button>
            </div>
        </div>
    </div>
</div>

<style>
/* Disclaimer Component Styles */
.disclaimer-component {
    margin-top: 2rem;
    margin-bottom: 2rem;
}

.disclaimer-container {
    position: relative;
    border-radius: 1rem;
    border: 1px solid rgba(251, 191, 36, 0.4);
    background: linear-gradient(135deg, rgba(255, 251, 235, 0.9), rgba(255, 237, 213, 0.6), rgba(255, 251, 235, 0.9));
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -2px rgba(0, 0, 0, 0.025);
    overflow: hidden;
}

.disclaimer-bg {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(251, 191, 36, 0.05), transparent, rgba(251, 146, 60, 0.05));
    pointer-events: none;
}

.disclaimer-content {
    position: relative;
    padding: 1.5rem;
}

@media (min-width: 640px) {
    .disclaimer-content {
        padding: 2rem;
    }
}

/* Header */
.disclaimer-header {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.icon-wrapper {
    flex-shrink: 0;
    padding: 0.6rem;
    border-radius: 0.75rem;
    background: linear-gradient(135deg, #fef3c7, #ffedd5);
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
}

.icon-wrapper svg {
    width: 1.5rem;
    height: 1.5rem;
}

.alert-icon svg {
    color: #d97706;
}

.header-text {
    flex: 1;
}

.header-text h3 {
    font-weight: 700;
    color: #78350f;
    font-size: 1.125rem;
    margin-bottom: 0.25rem;
}

.header-text p {
    font-size: 0.75rem;
    color: #b45309;
}

@media (min-width: 640px) {
    .header-text h3 {
        font-size: 1.25rem;
    }
    .header-text p {
        font-size: 0.875rem;
    }
}

.disclaimer-toggle {
    display: none;
    padding: 0.5rem;
    background: none;
    border: none;
    border-radius: 0.5rem;
    cursor: pointer;
    color: #d97706;
}

.disclaimer-toggle:hover {
    background-color: rgba(254, 243, 199, 0.5);
}

/* Body */
.grid-layout {
    display: grid;
    gap: 1rem;
    margin-bottom: 2rem;
}

.info-card {
    display: flex;
    gap: 0.75rem;
    padding: 1rem;
    border-radius: 0.75rem;
    background-color: rgba(255, 255, 255, 0.4);
    transition: background-color 0.2s;
}

.info-card:hover {
    background-color: rgba(255, 255, 255, 0.6);
}

.card-icon {
    flex-shrink: 0;
    margin-top: 0.1rem;
}

.card-icon div, .card-icon {
    padding: 0.4rem;
    background-color: #fef3c7;
    border-radius: 0.5rem;
}

.card-icon svg {
    width: 1rem;
    height: 1rem;
    color: #d97706;
}

.card-text {
    flex: 1;
}

.card-text strong {
    display: block;
    font-weight: 600;
    color: #92400e;
    font-size: 0.875rem;
    margin-bottom: 0.25rem;
}

.card-text p {
    font-size: 0.75rem;
    color: #9a3412;
    line-height: 1.5;
}

@media (min-width: 640px) {
    .card-text strong {
        font-size: 1rem;
    }
    .card-text p {
        font-size: 0.875rem;
    }
}

.info-grid {
    display: grid;
    gap: 1rem;
}

@media (min-width: 640px) {
    .info-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Contact Section */
.contact-card {
    padding: 1.5rem;
    border-radius: 0.75rem;
    background: linear-gradient(135deg, rgba(254, 243, 199, 0.6), rgba(255, 237, 213, 0.4));
    border: 1px solid rgba(253, 230, 138, 0.5);
    margin-bottom: 1.5rem;
}

.contact-header h4 {
    font-weight: 700;
    color: #78350f;
    font-size: 0.875rem;
    margin-bottom: 0.25rem;
}

@media (min-width: 640px) {
    .contact-header h4 {
        font-size: 1rem;
    }
}

.contact-header p {
    font-size: 0.75rem;
    color: #92400e;
    margin-bottom: 1rem;
}

.contact-button {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.6rem 1rem;
    border-radius: 0.5rem;
    background: linear-gradient(to right, #d97706, #ea580c);
    color: white;
    font-weight: 500;
    font-size: 0.75rem;
    text-decoration: none;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    transition: all 0.2s;
}

.contact-button:hover {
    transform: scale(1.02);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
}

.contact-button svg {
    width: 1rem;
    height: 1rem;
}

/* Footer Note */
.disclaimer-footer {
    display: flex;
    align-items: flex-start;
    gap: 0.6rem;
    padding-top: 1.25rem;
    border-top: 1px solid rgba(253, 230, 138, 0.6);
}

.disclaimer-footer svg {
    flex-shrink: 0;
    width: 1rem;
    height: 1rem;
    color: #d97706;
    margin-top: 0.1rem;
}

.disclaimer-footer p {
    font-size: 0.75rem;
    color: #b45309;
    line-height: 1.5;
}

/* Mobile Toggle */
.mobile-toggle-text {
    display: none;
    text-align: center;
    margin-top: 0.75rem;
}

.mobile-toggle-text button {
    background: none;
    border: none;
    color: #d97706;
    font-weight: 500;
    font-size: 0.75rem;
    cursor: pointer;
}

/* Mobile Responsive JS Handling */
@media (max-width: 639px) {
    .disclaimer-toggle {
        display: block;
    }
    .mobile-toggle-text {
        display: block;
    }
    
    .disclaimer-body.collapsed {
        display: none;
    }
    
    .disclaimer-toggle.expanded {
        transform: rotate(180deg);
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('disclaimerToggle');
    const toggleText = document.getElementById('mobileReadMore');
    const body = document.getElementById('disclaimerBody');
    
    // Only apply collapse logic on mobile
    if (window.innerWidth < 640) {
        body.classList.add('collapsed');
        
        function toggle() {
            const isCollapsed = body.classList.contains('collapsed');
            
            if (isCollapsed) {
                body.classList.remove('collapsed');
                toggleBtn.classList.add('expanded');
                toggleText.innerHTML = "Show Less";
            } else {
                body.classList.add('collapsed');
                toggleBtn.classList.remove('expanded');
                toggleText.innerHTML = "Read Full Disclaimer";
            }
        }
        
        if(toggleBtn) toggleBtn.addEventListener('click', toggle);
        if(toggleText) toggleText.addEventListener('click', toggle);
    }
});
</script>
