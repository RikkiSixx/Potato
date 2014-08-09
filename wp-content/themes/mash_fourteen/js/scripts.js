jQuery(document).ready(function($){

    //$(".flexnav").flexNav();

    $('.menu-button').on('click', function(e) {
    	($(this)).toggleClass('active');
    	if ( $('.main-menu').hasClass('active') ) {
			$('.main-menu').removeClass('active').slideUp(500);
    	} else {
    		$('.main-menu').slideDown(500).addClass('active');
    	}
    	e.preventDefault();
    });


    $.fn.equalHeights = function() {
        var maxHeight = 0,
            $this = $(this);

        $this.each( function() {
            $(this).height('auto');
            var height = $(this).innerHeight();

            if ( height > maxHeight ) { maxHeight = height; }
        });

        return $this.css('height', maxHeight);
    };


	var clearheight = function(container){
		$(container).each(function() {
			$el = $(this);
			$($el).height('auto')
		});
    }




    var $container = $('.project-grid').isotope({
		itemSelector: '.project-item',
		layoutMode: 'masonry',
		getSortData: {		  
			weight: function( itemElem ) {
		    	var weight = $( itemElem ).find('.weight').text();
		    	return parseFloat( weight.replace( /[\(\)]/g, '') );
		  	}
		}
	});


	// State Manager

    var stateManager = (function () {
      	var state = null;

		var resizePage = function () {
			if ( $('body').width() < 860 ) {
				if ( state !== 'mobile' ) { displayMobile(); }
				resizeMobile();
			}
			else {
				if ( state !== 'desktop' ) { displayDesktop(); }
				resizeDesktop();
			}
		};

		var displayMobile = function() {
			state = 'mobile';
			console.log('enter mobile');

			clearheight('.service-list header');
			clearheight('.service-list .entry-content');
		};

		var displayDesktop = function() {
			state = 'desktop';
			console.log('enter desktop');

			clearheight('.service-list header');
			clearheight('.service-list .entry-content');
		};

		var resizeMobile = function() {
			console.log('Resizing mobile');

			$('.service-list header').equalHeights();
			$('.service-list .entry-content').equalHeights();
		};

		var resizeDesktop = function() {
			console.log('Resizing desktop');
			
			$('.service-list header').equalHeights();
			$('.service-list .entry-content').equalHeights();
		};

		return {
			init: function() {
				resizePage();
				$(window).on('resize', resizePage);
			}
		};

	} ());

	stateManager.init();

	// End of State Manager



});