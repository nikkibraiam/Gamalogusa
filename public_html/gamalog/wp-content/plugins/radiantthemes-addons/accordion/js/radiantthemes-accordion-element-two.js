﻿jQuery(document).ready(function(){
	jQuery(".radiantthemes-accordion.element-two").each(function(){
		jQuery(this).find(".radiantthemes-accordion-item-body").slideUp("500");
		jQuery(this).find(".radiantthemes-accordion-item.radiantthemes-active").each(function(){
			jQuery(this).find(".radiantthemes-accordion-item-body").slideDown("500");
		});
		jQuery(this).find(".radiantthemes-accordion-item-title").click(function(){
			jQuery(this).parent().children(".radiantthemes-accordion-item-body").slideToggle("500");
			jQuery(this).parent().toggleClass("radiantthemes-active");
		});
	});
});