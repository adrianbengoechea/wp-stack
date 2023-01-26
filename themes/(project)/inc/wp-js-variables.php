<?php  
add_action('wp_head', 'wp_urls_to_js');
function wp_urls_to_js(){
    ?>
    
      <script>
        const wpURL = {
          ajax: "<?php echo admin_url( 'admin-ajax.php' ); ?>",
          stylesheet: "<?php echo get_stylesheet_directory_uri(); ?>",
          site: "<?php echo get_site_url(); ?>",
          home: "<?php echo get_home_url(); ?>"
        }
      </script>
  
    <?php
}
