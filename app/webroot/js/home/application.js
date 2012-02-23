jQuery(document).ready(function($){
    $("#home_slider").carouFredSel({
        auto : {
			play 			: true,
			pauseDuration 	: 5000,
			pauseOnHover    : true
		},
		scroll : {
			easing		: 'easeOutExpo',
			duration	: 1300
		},
		items : {
	        visible         : 1,
	        height           : "variable"
	    },
        prev : {   
	        button  : "#prev_btn",
	        key     : "left"
	    },
	    next : {
	        button  : "#next_btn",
	        key     : "right"
	    }
    });
});