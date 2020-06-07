//-- Menu toggle button

$('#menu-toggle').click(function(){
    $(this).toggleClass('open');
    $('.menu').toggleClass('open');
    //$('html, body').toggleClass('noScroll');
});

$('.overlay').on('click', function (event) {
if (!$(event.target).closest('.menu-wrapper').length) {
    // ... clicked on the 'body', but not inside of #menutop
    $('.menu').removeClass('open');
        $('#menu-toggle').removeClass('open');
        //$('html, body').removeClass('noScroll');
    }
});


//-- Scroll to top
$(window).scroll(function(){
	let windowScrollTop = $(window).scrollTop();
	if(windowScrollTop > 400) {
		$('.scroll-top').fadeIn();
	}
	else {
		$('.scroll-top').fadeOut();
	}
});

$('.scroll-top').click(function() {
	console.log("scroll top")
	$("html, body").animate({ scrollTop: 0 }, "slow");
	return false;
});

//-- Scroll down

$('.scroll-down').click(function() {
	console.log("scroll down")
	$("html, body").animate({ scrollTop: $(".first").offset().top});
	return false;
});

$('body').on('click', '.load-more-wrapper > a', function (event) {
   // reference the href attribute of the list item anchor tag
    var page = $(this).attr('href');

    $('.blog-loader').show();
    $('.load-more').hide();

    event.preventDefault(); 
    if ($(this).attr('href') != '#') {
        //$("html, body").animate({scrollTop: 0}, "slow");
        $('body').find('form.filterProjects').request('onFilterProjects', {  
            data: {page: page},
            update:{
                'projects/projects':'.project-list',
            },
            success: function(response){
              $.each(response, function(index, element) {
                  $('.project-list').html(element);
              });
              $('.blog-loader').hide();
              $('.load-more').show();
            },
        });
    }
    
});