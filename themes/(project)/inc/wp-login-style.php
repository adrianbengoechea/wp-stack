<?php

function wp_login_customization() { 
    $color = "#49bbc8";
    ?>
    <style type="text/css">
        body.login{
            background: #d0d0d0 !important;
        }
        #login h1 a, .login h1 a {

            /* FALLBACK LOGOS */
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png);

            /* MAIN LOGO */
            /* background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.svg); */

			height: auto;
			width: 320px;
			background-size: contain;
			background-repeat: no-repeat;
			padding-bottom: 30px;
            pointer-events: none;
            cursor: default;
        }

        #loginform{
            opacity: 0.8;
            transition: opacity 0.3s .0s ease;
        }

        #loginform:hover{
            opacity: 1;
        }
        
		#login #wp-submit, .login #wp-submit{
			background-color: <?php echo $color; ?>;
            border-radius: 0;
            border-color: <?php echo $color; ?>;
		}

        #login :is(#user_login:focus, #user_pass:focus),
        .login :is(#user_login:focus, #user_pass:focus){
            box-shadow: 0 0 0 1px <?php echo $color; ?>;
            outline: 0;
            border-color: <?php echo $color; ?>;
        }

        .login .button.wp-hide-pw .dashicons{
            color: <?php echo $color; ?>;
        }

        .privacy-policy-link{
            color: <?php echo $color; ?>;
        }
    </style>
<?php }

add_action( 'login_enqueue_scripts', 'wp_login_customization' );
