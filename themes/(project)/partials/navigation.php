<div class="site-navigation">

					<nav class="navbar navbar-expand-md fixed-top navbar-light ">
						<div class="container" data-aos="fade">
							
							<a class="navbar-brand" href="<?php echo site_url(); ?>">
								<img src="<?=get_stylesheet_directory_uri().'/assets/img/logo.png'?>" alt="<?=get_the_title()?>">
							</a>

							<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavigation" aria-controls="mainNavigation" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							
							<div class="collapse navbar-collapse" id="mainNavigation">


								<?=generate_nav('main-menu')?>
								

							</div>


						</div>
						</nav>
				</div>