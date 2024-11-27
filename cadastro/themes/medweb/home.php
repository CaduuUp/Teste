<?php $v->layout("_theme"); ?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1>Up+</h1>
                <h2>Transforme a experiência dos seus colaboradores com benefícios flexíveis que aumentam a satisfação, engajamento e produtividade.</h2>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    <a href="https://www.youtube.com/watch?v=7v2cCgZ8yCs" <?= $video; ?> class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="<?= theme("/assets/images/hero-img.png", CONF_VIEW_MED); ?>" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= Cliens Section ======= -->
    <section id="cliens" class="cliens section-bg">
        <div class="container">

            <div class="row" data-aos="zoom-in">

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="<?= theme("/assets/images/clients/client-1.png", CONF_VIEW_MED); ?>" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="<?= theme("/assets/images/clients/client-2.png", CONF_VIEW_MED); ?>" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="<?= theme("/assets/images/clients/client-3.png", CONF_VIEW_MED); ?>" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="<?= theme("/assets/images/clients/client-4.png", CONF_VIEW_MED); ?>" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="<?= theme("/assets/images/clients/client-5.png", CONF_VIEW_MED); ?>" class="img-fluid" alt="">
                </div>

                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                    <img src="<?= theme("/assets/images/clients/client-6.png", CONF_VIEW_MED); ?>" class="img-fluid" alt="">
                </div>

            </div>

        </div>
    </section>
    <!-- End Cliens Section -->
    <div id="services" class="services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                        <h4>Amazing <em>Services &amp; Features</em> for you</h4>
                        <img src="<?= theme("/assets/images/heading-line-dec.png", CONF_VIEW_MED); ?>" alt="">
                        <p>If you need the greatest collection of HTML templates for your business, please visit <a rel="nofollow" href="https://www.toocss.com/" target="_blank">TooCSS</a> Blog. If you need to have a contact form PHP script, go to <a href="https://templatemo.com/contact" target="_parent">our contact page</a> for more information.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="service-item first-service">
                        <div class="icon"></div>
                        <h4>App Maintenance</h4>
                        <p>You are not allowed to redistribute this template ZIP file on any other website.</p>
                        <div class="text-button">
                            <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-item second-service">
                        <div class="icon"></div>
                        <h4>Rocket Speed of App</h4>
                        <p>You are allowed to use the Chain App Dev HTML template. Feel free to modify or edit this layout.</p>
                        <div class="text-button">
                            <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-item third-service">
                        <div class="icon"></div>
                        <h4>Multi Workflow Idea</h4>
                        <p>If this template is beneficial for your work, please support us <a rel="nofollow" href="https://paypal.me/templatemo" target="_blank">a little via PayPal</a>. Thank you.</p>
                        <div class="text-button">
                            <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-item fourth-service">
                        <div class="icon"></div>
                        <h4>24/7 Help &amp; Support</h4>
                        <p>Lorem ipsum dolor consectetur adipiscing elit sedder williamsburg photo booth quinoa and fashion axe.</p>
                        <div class="text-button">
                            <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>