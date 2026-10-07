<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<section class="hero-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-4 fw-bold mb-4">Contact Puihaha Electric</h1>
                <p class="lead">Get in touch with our expert team for all your electrical needs</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information -->
<section class="section-padding">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5">
                <h2 class="display-5 fw-bold text-primary-custom mb-4">Get In Touch</h2>

                <p class="lead text-muted mb-5">
                    Have a question, need a quote, or facing an electrical emergency? Our team is
                    ready to help. Contact us today for reliable, professional electrical services.
                </p>

                <div class="contact-info">
                    <div class="d-flex align-items-start mb-4">
                        <div class="feature-icon mx-0 me-3" style="width: 60px; height: 60px; font-size: 1.5rem;">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>

                        <div>
                            <h5 class="text-primary-custom mb-2">Visit Our Office</h5>
                            <p class="text-muted mb-0">
                                123 Electric Avenue<br>
                                Power City, PC 12345
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="feature-icon mx-0 me-3" style="width: 60px; height: 60px; font-size: 1.5rem;">
                            <i class="fas fa-phone"></i>
                        </div>

                        <div>
                            <h5 class="text-primary-custom mb-2">Call Us</h5>
                            <p class="text-muted mb-1">
                                <strong>Office:</strong> (555) 123-4567
                            </p>
                            <p class="text-muted mb-0">
                                <strong>Emergency:</strong> (555) 911-HELP
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="feature-icon mx-0 me-3" style="width: 60px; height: 60px; font-size: 1.5rem;">
                            <i class="fas fa-envelope"></i>
                        </div>

                        <div>
                            <h5 class="text-primary-custom mb-2">Email Us</h5>
                            <p class="text-muted mb-1">info@puihahaelectric.com</p>
                            <p class="text-muted mb-0">emergency@puihahaelectric.com</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="feature-icon mx-0 me-3" style="width: 60px; height: 60px; font-size: 1.5rem;">
                            <i class="fas fa-clock"></i>
                        </div>

                        <div>
                            <h5 class="text-primary-custom mb-2">Business Hours</h5>
                            <p class="text-muted mb-1">Monday - Friday: 7:00 AM - 6:00 PM</p>
                            <p class="text-muted mb-1">Saturday: 8:00 AM - 4:00 PM</p>
                            <p class="text-muted mb-0">Sunday: Emergency Services Only</p>
                        </div>
                    </div>
                </div>

                <div class="card bg-light-custom border-0 p-4 mt-5">
                    <div class="text-center">
                        <i class="fas fa-exclamation-triangle text-warning mb-3" style="font-size: 2rem;"></i>
                        <h5 class="text-primary-custom">Electrical Emergency?</h5>
                        <p class="text-muted small mb-3">
                            For urgent electrical issues, call our emergency line available 24/7.
                        </p>
                        <a href="tel:5559114357" class="btn btn-danger">
                            <i class="fas fa-phone me-2"></i>Call Emergency Line
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-7">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-4 p-lg-5">
                        <h3 class="text-primary-custom mb-4">Request a Free Quote</h3>

                        <?php if (isset($success) && $success): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i><?= $success ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($error) && $error): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i><?= $error ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('contact') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label fw-semibold">Full Name *</label>
                                    <input
                                        type="text"
                                        class="form-control form-control-lg <?= isset($validation['name']) ? 'is-invalid' : '' ?>"
                                        id="name"
                                        name="name"
                                        value="<?= old('name') ?>"
                                        placeholder="Enter your full name"
                                        required
                                    >
                                    <?php if (isset($validation['name'])): ?>
                                        <div class="invalid-feedback"><?= $validation['name'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-semibold">Email Address *</label>
                                    <input
                                        type="email"
                                        class="form-control form-control-lg <?= isset($validation['email']) ? 'is-invalid' : '' ?>"
                                        id="email"
                                        name="email"
                                        value="<?= old('email') ?>"
                                        placeholder="Enter your email"
                                        required
                                    >
                                    <?php if (isset($validation['email'])): ?>
                                        <div class="invalid-feedback"><?= $validation['email'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6">
                                    <label for="phone" class="form-label fw-semibold">Phone Number *</label>
                                    <input
                                        type="tel"
                                        class="form-control form-control-lg <?= isset($validation['phone']) ? 'is-invalid' : '' ?>"
                                        id="phone"
                                        name="phone"
                                        value="<?= old('phone') ?>"
                                        placeholder="Enter your phone number"
                                        required
                                    >
                                    <?php if (isset($validation['phone'])): ?>
                                        <div class="invalid-feedback"><?= $validation['phone'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6">
                                    <label for="service_type" class="form-label fw-semibold">Service Needed *</label>
                                    <select
                                        class="form-select form-select-lg <?= isset($validation['service_type']) ? 'is-invalid' : '' ?>"
                                        id="service_type"
                                        name="service_type"
                                        required
                                    >
                                        <option value="">Choose a service</option>
                                        <option value="Residential Electrical" <?= old('service_type') == 'Residential Electrical' ? 'selected' : '' ?>>Residential Electrical</option>
                                        <option value="Commercial Electrical" <?= old('service_type') == 'Commercial Electrical' ? 'selected' : '' ?>>Commercial Electrical</option>
                                        <option value="Solar Installation" <?= old('service_type') == 'Solar Installation' ? 'selected' : '' ?>>Solar Installation</option>
                                        <option value="Emergency Repair" <?= old('service_type') == 'Emergency Repair' ? 'selected' : '' ?>>Emergency Repair</option>
                                        <option value="Other" <?= old('service_type') == 'Other' ? 'selected' : '' ?>>Other</option>
                                    </select>
                                    <?php if (isset($validation['service_type'])): ?>
                                        <div class="invalid-feedback"><?= $validation['service_type'] ?></div>
                                    <?php endif; ?>
                                </div>
                                                                <div class="col-12">
                                    <label for="message" class="form-label fw-semibold">Tell Us About Your Project *</label>
                                    <textarea
                                        class="form-control form-control-lg <?= isset($validation['message']) ? 'is-invalid' : '' ?>"
                                        id="message"
                                        name="message"
                                        rows="5"
                                        placeholder="Please describe your electrical needs, project details, or questions..."
                                        required
                                    ><?= old('message') ?></textarea>

                                    <?php if (isset($validation['message'])): ?>
                                        <div class="invalid-feedback"><?= $validation['message'] ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="consent" required>
                                        <label class="form-check-label text-muted" for="consent">
                                            I agree to be contacted by Puihaha Electric regarding my inquiry.
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">
                                        <i class="fas fa-paper-plane me-2"></i>Send My Request
                                    </button>
                                </div>
                            </div>
                        </form>

                        <p class="text-center text-muted small mt-4 mb-0">
                            <i class="fas fa-shield-alt me-1"></i>
                            Your information is secure and will never be shared with third parties.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service Areas -->
<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-5 fw-bold text-primary-custom mb-3">Areas We Serve</h2>
                <p class="lead text-muted">Proudly providing electrical services throughout the greater Power City region</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="card h-100 text-center p-4 service-area-card">
                    <i class="fas fa-city text-secondary-custom mb-3" style="font-size: 2.5rem;"></i>
                    <h5 class="text-primary-custom">Power City</h5>
                    <p class="text-muted small mb-0">Complete electrical services for residential and commercial properties</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card h-100 text-center p-4 service-area-card">
                    <i class="fas fa-tree text-secondary-custom mb-3" style="font-size: 2.5rem;"></i>
                    <h5 class="text-primary-custom">Green Valley</h5>
                    <p class="text-muted small mb-0">Sustainable electrical and solar energy solutions</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card h-100 text-center p-4 service-area-card">
                    <i class="fas fa-building text-secondary-custom mb-3" style="font-size: 2.5rem;"></i>
                    <h5 class="text-primary-custom">Industrial District</h5>
                    <p class="text-muted small mb-0">Specialized commercial and industrial electrical services</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card h-100 text-center p-4 service-area-card">
                    <i class="fas fa-home text-secondary-custom mb-3" style="font-size: 2.5rem;"></i>
                    <h5 class="text-primary-custom">Surrounding Areas</h5>
                    <p class="text-muted small mb-0">Serving communities within a 50-mile radius of Power City</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="section-padding">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-5 fw-bold text-primary-custom mb-3">Frequently Asked Questions</h2>
                <p class="lead text-muted">Quick answers to common questions about our electrical services</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item border-0 mb-3 shadow-sm">
                        <h2 class="accordion-header" id="faqOne">
                            <button class="accordion-button fw-semibold text-primary-custom" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                Do you provide free estimates?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Yes, we provide free consultations and estimates for most residential and commercial electrical projects.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 mb-3 shadow-sm">
                        <h2 class="accordion-header" id="faqTwo">
                            <button class="accordion-button collapsed fw-semibold text-primary-custom" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                Are your electricians licensed and insured?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Yes. Our electricians are fully licensed, trained, and insured for your safety and peace of mind.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 mb-3 shadow-sm">
                        <h2 class="accordion-header" id="faqThree">
                            <button class="accordion-button collapsed fw-semibold text-primary-custom" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                Do you offer emergency electrical services?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Yes. Our emergency response team is available 24/7 for urgent electrical problems and safety hazards.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item border-0 mb-3 shadow-sm">
                        <h2 class="accordion-header" id="faqFour">
                            <button class="accordion-button collapsed fw-semibold text-primary-custom" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                How quickly can you schedule an appointment?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Appointment availability depends on the service needed, but we always work to schedule regular requests as soon as possible.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>