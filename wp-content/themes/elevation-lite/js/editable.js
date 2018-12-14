jQuery(window).load(function() {
		if(jQuery('#slider') > 0) {
        jQuery('.nivoSlider').nivoSlider({
        	effect:'fade',
    });
		} else {
			jQuery('#slider').nivoSlider({
        	effect:'fade',
    });
		}
});
	

// NAVIGATION CALLBACK
var ww = jQuery(window).width();
jQuery(document).ready(function() { 
	jQuery(".header-menu li a").each(function() {
		if (jQuery(this).next().length > 0) {
			jQuery(this).addClass("parent");
		};
	})
	jQuery(".toggleMenu").click(function(e) { 
		e.preventDefault();
		jQuery(this).toggleClass("active");
		jQuery(".header-menu").slideToggle('fast');
	});
	adjustMenu();
})

// navigation orientation resize callbak
jQuery(window).bind('resize orientationchange', function() {
	ww = jQuery(window).width();
	adjustMenu();
});

var adjustMenu = function() {
	if (ww < 981) {
		jQuery(".toggleMenu").css("display", "block");
		if (!jQuery(".toggleMenu").hasClass("active")) {
			jQuery(".header-menu").hide();
		} else {
			jQuery(".header-menu").show();
		}
		jQuery(".header-menu li").unbind('mouseenter mouseleave');
	} else {
		jQuery(".toggleMenu").css("display", "none");
		jQuery(".header-menu").show();
		jQuery(".header-menu li").removeClass("hover");
		jQuery(".header-menu li a").unbind('click');
		jQuery(".header-menu li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
			jQuery(this).toggleClass('hover');
		});
	}
}


jQuery(window).bind('scroll', function() {
		if (jQuery(window).scrollTop() >= 80) {
		   jQuery('.header').addClass('fixed-header');
		}
		else {
		   jQuery('.header').removeClass('fixed-header');
		}
});