<?php
//enqueue all styles here
add_action('wp_enqueue_scripts', function(){
	$src = get_template_directory_uri(). '/css';
	wp_enqueue_style( 'font-awesome-min', $src. '/font-awesome.min.css');
	wp_enqueue_style( 'bootstrap', $src. '/bootstrap.css');
	wp_enqueue_style( 'owl-carousel', $src. '/owl.carousel.css');
	wp_enqueue_style( 'owl-theme', $src. '/owl.theme.css');
	wp_enqueue_style( 'owl-transitions', $src. '/owl.transitions.css');
	wp_enqueue_style( 'nav-layout', $src. '/nav-layout.css');
	wp_enqueue_style( 'style', $src. '/style.css');
	wp_enqueue_style( 'responsive', $src. '/responsive.css');
	wp_enqueue_style( 'custom-css', $src. '/custom.css');
});

//include all scripts here
add_action('wp_enqueue_scripts', function(){
	$src = get_template_directory_uri(). '/js';
	wp_enqueue_script( 'modernizr', $src .'/modernizr-2.8.3.min.js', array(), '1.0.0', false );
	wp_enqueue_script( 'bootstrap', $src .'/bootstrap.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'owl-js', $src .'/owl.carousel.js', array(), '1.0.0', true );
	wp_enqueue_script( 'owl-transitions', $src .'/bootstrap-transition.js', array(), '1.0.0', true );
	wp_enqueue_script( 'nav-js', $src .'/nav.jquery.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'metisMenu-js', $src .'/metisMenu.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'main-js', $src .'/main.js', array(), '1.0.0', true );
	wp_enqueue_script( 'custom-js',$src . '/custom.js', array(), '1.0.0', true );
});