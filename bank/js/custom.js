jQuery(document).ready(function($) {
/**
 * Table of content
 *
 * main menu carets image addition
 * sticky menu element swape
 * Accordion make functioning
 */

/**
 * main menu carets image addition
 */ 
	if ($( ".main-nav > li.menu-item-has-children" ).has( "ul.sub-nav" )) {
		$( ".main-nav > li.menu-item-has-children" ).has( "ul.sub-nav" ).addClass("nav-submenu");
		$( "<span class='carets'></span>" ).insertAfter( ".main-nav > li.menu-item-has-children > a" );
	}
	if ($( ".sub-nav li.nav-submenu" ).has( "ul" )) {
		$( ".sub-nav > li.menu-item-has-children" ).addClass( "nav-submenu" );
		$( "<span class='carets-r'></span>" ).insertAfter( ".sub-nav li.nav-submenu > a" );
	}

/**
 * sticky menu element swape
 */
	//$('#menu-quick-menu li.mob-1').insertAfter($('#menu-quick-menu li.mob-2'));
	//$('.slide-info #menu-quick-menu li.mob-7').insertAfter($('.slide-info #menu-quick-menu li.mob-8'));

/**
 * Accordion make functioning
 */
    $('.invest-accordion .panel').each(function (index) { 
      $(this).find(".panel-title a").attr( "href", "#collapse-"+index);
      $(this).find(".panel-title a").attr( "aria-controls", "collapse-"+index);
      $(this).find(".panel-collapse").attr( "id", "collapse-"+index);
    });

/**
 * Footer menu ancher tag removal
 */
	$('.remove-link .menu-image-title').unwrap();
	$('.make-bold .menu-image-title').wrap("<b style='color: #034ea2;'></b>");
});


