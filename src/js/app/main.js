var search_bar 		 = $('header .glyphicon-search'),
	count_search_bar = 0;

search_bar.on('click', function(){
	if (count_search_bar == 0) {
		$('header .search-bar, header .search-fullscreen').removeClass('hidden-search-bar');
		setTimeout(function(){ count_search_bar = 1; }, 300);
	}

	else if (count_search_bar == 1) {
		$('header .search-bar, header .search-fullscreen').addClass('hidden-search-bar');
		setTimeout(function(){ count_search_bar = 0; }, 300);
	}
});