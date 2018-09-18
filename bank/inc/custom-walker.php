<?php
/**
 * Table of content
 *
 * create new walker class for adding extra features on main menu
 * filter for adding active class in menu
 */

/**
 * create new walker class for adding extra features on main menu
 */
	class Esaf_walker extends Walker_Nav_Menu {
	  function start_lvl(&$output, $depth = 0, $args = array()) {
		if ( 0 == $depth ) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class=\"sub-nav\">\n";
		} elseif ( 1 == $depth ) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class=\"sub-nav-sub\">\n";
		} elseif ( 2 == $depth ) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class=\"sub-nav-sub-nav\">\n";
		} else {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class=\"sub-nav\">\n";
		}
		
	  }
	}

/**
 * filter for adding active class in menus
 */
	add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

	function special_nav_class ($classes, $item) {
	    if (in_array('current-menu-item', $classes) ){
	        $classes[] = 'active ';
	    }
	    return $classes;
	}