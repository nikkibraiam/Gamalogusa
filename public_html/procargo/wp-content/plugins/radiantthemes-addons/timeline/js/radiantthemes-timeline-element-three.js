jQuery(document).ready(function(){
	jQuery(".radiantthemes-timeline.element-three").each(function(){
        jQuery(this).find(".owl-carousel").owlCarousel({
            nav: false,
            dots: false,
            loop: true,
            autoplay: true,
            autoplayTimeout: 6000,
            items: 1,
            thumbs: true,
            thumbImage: false,
        });
	});
});