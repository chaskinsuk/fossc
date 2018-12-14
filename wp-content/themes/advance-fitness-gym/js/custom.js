(function( $ ) {

	// NAVIGATION CALLBACK FOR MAIN MENU
	var ww = jQuery(window).width();
	jQuery(document).ready(function() { 
		jQuery(".main-menu .nav li a").each(function() {
			if (jQuery(this).next().length > 0) {
				jQuery(this).addClass("parent");
			};
		})
		jQuery(".toggleMenu").click(function(e) { 
			e.preventDefault();
			jQuery(this).toggleClass("active");
			jQuery(".main-menu .nav").slideToggle('fast');
		});
		adjustMenu();
	})

	// navigation orientation resize callbak
	jQuery(window).bind('resize orientationchange', function() {
		ww = jQuery(window).width();
		adjustMenu();
	});

	var adjustMenu = function() {
		if (ww < 720) {
			jQuery(".toggleMenu").css("display", "block");
			if (!jQuery(".toggleMenu").hasClass("active")) {
				jQuery(".main-menu .nav").hide();
			} else {
				jQuery(".main-menu .nav").show();
			}
			jQuery(".main-menu .nav li").unbind('mouseenter mouseleave');
		} else {
			jQuery(".toggleMenu").css("display", "none");
			jQuery(".main-menu .nav").show();
			jQuery(".main-menu .nav li").removeClass("hover");
			jQuery(".main-menu .nav li a").unbind('click');
			jQuery(".main-menu .nav li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
				jQuery(this).toggleClass('hover');
			});
		}
	}


	
})( jQuery );