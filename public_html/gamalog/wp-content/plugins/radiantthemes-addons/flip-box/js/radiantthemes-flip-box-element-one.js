jQuery(window).load(function(){
	jQuery(".rt-flip-box.element-one").each(function(){
	    jQuery(this).children(".holder").justFlipIt({
    	    FlipX: jQuery(this).data("flip-box-x") ,
    	    Template: jQuery(this).find(".second-card") ,
    	});
    	jQuery(this).find(".first-card").unwrap();
	});
});