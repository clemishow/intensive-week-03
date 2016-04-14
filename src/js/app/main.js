var state_nav = 0;

if ($('body').hasClass('page-search-site')) {
	$('header .container-icon-search').addClass('active-search');
}

if ($('body').hasClass('page-player')) {
	$('footer').removeClass('hidden-footer');
}

$('.container-account .account-nav').on('click', function(){
	if (state_nav == 0) {
		$('.container-account .container-nav').css('display', 'block');
		setTimeout(function(){state_nav = 1}, 300);
	}

	else if (state_nav == 1) {
		$('.container-account .container-nav').css('display', 'none');
		setTimeout(function(){state_nav = 0}, 300);
	}
	
});