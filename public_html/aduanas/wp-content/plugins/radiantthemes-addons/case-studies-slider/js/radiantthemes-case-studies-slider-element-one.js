jQuery(window).load(function(){
    jQuery(".radiantthemes-case-studies-slider.element-one.owl-carousel").each(function(){
		jQuery(this).owlCarousel({
			nav: false,
			dots: true,
			mouseDrag: false,
			touchDrag: true,
			loop: false ,
			autoplay: jQuery(this).data("case-studies-mobileitem") ,
			autoplayTimeout: jQuery(this).data("case-studies-mobileitem") ,
			items: jQuery(this).data("case-studies-desktopitem") ,
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