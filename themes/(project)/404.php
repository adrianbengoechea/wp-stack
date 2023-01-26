<?php 
get_header(); ?>

<main role="main">
    <section class="regular-content" id="error">
        <div class="section-wrap">
            <div class="container">
                <div class="error-section__content">
                    <div class="row align-items-center justify-content-center">
                        <div class="col col-12 col-lg-6">
                            <div class="content">
                                <h2>OOPS! <br> This page doesn’t exist.</h2>
                                <h3>Here’s a solution</h3>
                                <a href="<?php echo site_url(); ?>" class="btn">Return Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>