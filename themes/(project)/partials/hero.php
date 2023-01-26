<?php

    if(function_exists('get_field')):


        if ( is_home() || (is_single() && 'post' == get_post_type()) ) {
            $pid = get_option('page_for_posts');
        }else{
            $pid = $post->ID; 
        }
        
        $hero = get_field('page-hero', $pid );
        $active = get_field('page-hero-active', $pid );


        if($hero && $active):
        // print_r($hero);

        $get_desktop = ($hero['background_desktop']) ? $hero['background_desktop'] : '';
        $get_mobile = ($hero['background_mobile']) ? $hero['background_mobile'] : '';
        

        $get_title = $hero['title'];
        $get_content = $hero['content'];
        

        $desktop_image = ($get_desktop) ? $get_desktop['url'] : get_stylesheet_directory_uri() . '/assets/img/hero.jpg';
        $mobile_image = ($get_mobile) ? $get_mobile['url'] : $desktop_image;

    
?>
    <div class="regular-banner">
        <div class="hero site-hero">

            <div class="hero-items">
                <div class="hero__item">
                    <div class="hero__wrap">
                        <div class="hero__background">

                            <div 
                                class="hero__background--mobile is-block is-hidden-tablet hero__background--img" 
                                style="background-image: url(<?php echo $mobile_image; ?>)"
                            ></div>

                            <div 
                                class="hero__background--desktop  is-hidden-mobile is-block-tablet hero__background--img" 

                                style="background:transparent;"
                                data-parallax="scroll" 
                                data-image-src="<?php echo $desktop_image; ?>"
                            ></div>
                            

                        </div>

                        <div class="hero__content is-flex is-align-items-center">
                            <div class="container">
                                <?=(trim($get_title)) ? '<h1>'.$get_title.'</h1>':''?>
                                <?php echo (trim($get_content)) ? $get_content : ''; ?>

                                
                            </div>
                        </div>

                    </div>
                </div> 
            </div>

        </div>
    </div>
    <?php endif; ?>
<?php endif; ?>