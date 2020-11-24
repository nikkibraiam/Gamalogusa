jQuery(window).load(function(){
    jQuery(".radiantthemes-case-studies-slider.element-two.owl-carousel").each(function(){
		jQuery(this).owlCarousel({
			nav: false,
			dots: false,
			mouseDrag: true,
			touchDrag: true,
			loop: jQuery(this).data("case-studies-loop") ,
			autoplay: jQuery(this).data("case-studies-autoplay") ,
			autoplayTimeout: jQuery(this).data("case-studies-autoplaytimeout") ,
			responsive:{
		        0:{ items: jQuery(this).data("case-studies-mobileitem") },
		        321:{ items: jQuery(this).data("case-studies-mobileitem") },
		        480:{ items: jQuery(this).data("case-studies-tabitem") },
		        768:{ items: jQuery(this).data("case-studies-tabitem") },
		        992:{ items: jQuery(this).data("case-studies-desktopitem") },
		        1200:{ items: jQuery(this).data("case-studies-desktopitem") }
		    }
        });
        if ( jQuery(this).hasClass("has-fancybox") ) {
            jQuery(this).find(".fancybox").fancybox({
                animationEffect: "zoom-in-out",
                animationDuration: 500,
                zoomOpacity: "auto",
            });
        }
	});
});