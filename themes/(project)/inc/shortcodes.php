<?php
function hello_world_shortcode() {
    return 'Hello world!';
} 

// REGISTER SHORTCODES
add_shortcode('hello-world', 'hello_world_shortcode');