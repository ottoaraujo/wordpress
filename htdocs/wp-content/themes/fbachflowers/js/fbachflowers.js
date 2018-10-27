jQuery( document ).ready(function() {

	jQuery(window).scroll(function () {

		  if (jQuery(this).scrollTop() > 100) {

			  jQuery('.scrollup').fadeIn();

		  } else {

			  jQuery('.scrollup').fadeOut();
		  }
	});

	if (fbachflowers_options && fbachflowers_options.loading_effect) {
	   fbachflowers_init_loading_effects();
  	}

	jQuery('.scrollup').click(function () {

		  jQuery("html, body").animate({
			  scrollTop: 0
		  }, 600);

		  return false;
	});

	jQuery('#navmain > div').on('click', function(e) {

		e.stopPropagation();

		var parentOffset = jQuery(this).parent().offset(); 
		
		var relY = e.pageY - parentOffset.top;
	
		if (relY < 36) {
		
			jQuery('ul:first-child', this).toggle(400);
		}
	});
});


function fbachflowers_init_loading_effects() {

	jQuery('#header-logo').addClass("hidden").viewportChecker({
            classToAdd: 'animated zoomInDown',
            offset: 1
          });

	jQuery('.header-social-widget').addClass("hidden").viewportChecker({
      classToAdd: 'animated zoomInRight',
      offset: 1
    });

    jQuery('#navmain').addClass("hidden").viewportChecker({
            classToAdd: 'animated zoomInDown',
            offset: 1
          });

    jQuery('#page-header').addClass("hidden").viewportChecker({
            classToAdd: 'animated bounceInUp',
            offset: 1
          });

    jQuery('#main-content-wrapper h2, #main-content-wrapper h3')
            .addClass("hidden").viewportChecker({
            classToAdd: 'animated bounceInUp',
            offset: 1
          });

    jQuery('img').addClass("hidden").viewportChecker({
            classToAdd: 'animated flipInY',
            offset: 1
          });

    jQuery('#sidebar').addClass("hidden").viewportChecker({
            classToAdd: 'animated zoomIn',
            offset: 1
          });

    jQuery('.before-content, .after-content').addClass("hidden").viewportChecker({
            classToAdd: 'animated bounce',
            offset: 1
          });

    jQuery('.header-social-widget, article, article p, article li')
        .addClass("hidden").viewportChecker({
            classToAdd: 'animated fadeInDown',
            offset: 1
          });

    jQuery('#footer-main h1, #footer-main h2, #footer-main h3')
        .addClass("hidden").viewportChecker({
            classToAdd: 'animated bounceInUp',
            offset: 1
          });
		  
	jQuery('#footer-main p, #footer-main ul, #footer-main li, .footer-title, .col3a, .col3b, .col3c')
        .addClass("hidden").viewportChecker({
            classToAdd: 'animated fadeInDown',
            offset: 1
          });
		  
	jQuery('#footer-menu')
        .addClass("hidden").viewportChecker({
            classToAdd: 'animated bounceInDown',
            offset: 1
          });
	
	jQuery('.footer-social-widget')
        .addClass("hidden").viewportChecker({
            classToAdd: 'rubberBand',
            offset: 1
          });  
}