/*
*** AJAX BETWEEN PLAYER --> MOVIE
**/

var buttons = document.getElementsByClassName('button-player-left');

for( var i = 0; i < buttons.length; i++ ) {
    buttons[i].addEventListener('click', openDetailsMovie);
}


function openDetailsMovie(e) {
    e.preventDefault();
    
    var link = this.getElementsByTagName('a')[0].getAttribute('href');
    
    getContentDetails(link);
}


function getContentDetails(url) {
    $.ajax({
       url : url,
       type : 'GET',
       dataType : 'html', // On désire recevoir du HTML
        
       success : function(code_html, statut) { // code_html contient le HTML renvoyé
           showDetailsMovie(code_html);
       },

       error : function(resultat, statut, erreur) {

       }
    });
}

function showDetailsMovie(content) {
    var divDetails = document.getElementById('movie-details');
    divDetails.innerHTML = content;
}

/*
*** ≠ INTERACTIONS 
**/

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

$('.button-player-left').on('click', function(){
	$('#movie-details').removeClass('hidden-movie-details');
	$('footer').css('display', 'none');
	$('.site-wrapper').css('display', 'none');
});

$(document.body).on('click', '.cross-container' ,function(){
	$('#movie-details').addClass('hidden-movie-details');
	$('.site-wrapper').css('display', 'block');
});

