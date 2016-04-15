	var player_container = {},
		state_video		 = 0,
		state_volume	 = 1;

	player_container.controls 					= document.querySelector('.player-controls');
	player           							= document.querySelector('#player');
	durationVideo    							= player_container.controls.querySelector('.durationVideo');
	currentTimeVideo 							= player_container.controls.querySelector('.currentTimeVideo');
	/* PROGRESS BAR */
	player_container.controls.seek_bar 		  	= player_container.controls.querySelector('.seek-bar-video');
	player_container.controls.cursor_bar	 	= player_container.controls.querySelector('.cursor-bar-video');
	player_container.controls.progress_bar 	  	= player_container.controls.querySelector('.progress-bar-video');
	/* ICONS */
	player_icon_play							= player_container.controls.querySelector('.icon-play');
	player_icon_volume							= player_container.controls.querySelector('.icon-volume-mute');

	var tag = document.createElement('script');
	tag.src = "https://www.youtube.com/iframe_api";
	var firstScriptTag = document.getElementsByTagName('script')[0];
	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

	var player;
	function onYouTubeIframeAPIReady() {
		player = new YT.Player('player', {
			events: {
				      'onReady': onPlayerReady,
				      'onPlaybackQualityChange': onPlayerPlaybackQualityChange,
				      'onStateChange': onPlayerStateChange,
				      'onError': onPlayerError
			}
		});
	}

function onYouTubePlayerReady(playerId) {
	player = document.getElementById('player');
}

function onPlayerReady(event) {
	getDurationVideo();
	setInterval(function(){progressBar();},100);
	setInterval(function(){getCurrentTimeVideo();},100);
	event.target.playVideo();
	state_video = 1;
}

function onPlayerPlaybackQualityChange(event) {
	setPlaybackQuality = 'small';
}

function onPlayerStateChange() {
	// DETECT CHANGE
}

function onPlayerError() {
	// DETECT ERRORS
}

function playPause() {
  if (player && state_video == 1) {
    player.pauseVideo();
    player_icon_play.src="http://hetic.saulnier.fr/src/images/icon-play.svg";
    for (var i=0;i<8;i++) {
    	$('.ball:nth-child('+i+')').css('animation-play-state', 'paused');	
    }
    setTimeout(function() {
  		state_video = 0;
  	},300);
  }

  else if (player && state_video == 0) {
  	player.playVideo();
  	for (var i=0;i<8;i++) {
    	$('.ball:nth-child('+i+')').css('animation-play-state', 'running');	
    }
  	player_icon_play.src="http://hetic.saulnier.fr/src/images/icon-pause.svg";
  	setTimeout(function() {
  		state_video = 1;
  	},300);
  }
}

function muteVolume() {
	if (!player.isMuted()) {
		player.mute();
		setTimeout(function() {
	  		player_icon_volume.src="http://hetic.saulnier.fr/src/images/icon-mute.svg";
			player_icon_volume.className = "icon-mute";
			player_icon_volume.classList.remove('icon-volume');
	  	},150);
	}

	else if (player.isMuted()) {
		player.unMute();
		setTimeout(function() {
			player_icon_volume.src="http://hetic.saulnier.fr/src/images/icon-volume.svg";
			player_icon_volume.className = "icon-volume";
			player_icon_volume.classList.remove('icon-mute');
		},150);
	}
}

function getDurationVideo() {
    m = parseInt((player.getDuration()/60)%60),
    s = parseInt(player.getDuration()%60); 
	
	if (m<10) 
		m='0'+m;
	
	if (s<10) 
		s='0'+s;

	durationVideo.innerHTML= m+':'+s;
}

function getCurrentTimeVideo() {
    m = parseInt((player.getCurrentTime()/60)%60),
    s = parseInt(player.getCurrentTime()%60); 

	if (m<10) 
		m='0'+m;
	
	if (s<10) 
		s='0'+s;

	currentTimeVideo.innerHTML= m+':'+s;
}

function progressBar() {
	var progress_ratio 			= player.getCurrentTime() / player.getDuration(),
		progress_ratio_percent  = progress_ratio * 100;

	// PROGRESS BAR 
	player_container.controls.progress_bar.style.webkitTransform = 'scaleX(' + progress_ratio + ')';
	player_container.controls.progress_bar.style.mozTransform = 'scaleX(' + progress_ratio + ')';
	player_container.controls.progress_bar.style.msTransform = 'scaleX(' + progress_ratio + ')';
	player_container.controls.progress_bar.style.oTransform = 'scaleX(' + progress_ratio + ')';
	player_container.controls.progress_bar.style.transform = 'scaleX(' + progress_ratio + ')';

	// CURSOR 
	player_container.controls.cursor_bar.style.left = progress_ratio_percent + '%';
}

player_container.controls.seek_bar.addEventListener('click', function(e) {
var	bounding_rect = player_container.controls.seek_bar.getBoundingClientRect(),
	 x 			  = e.clientX - bounding_rect.left,
	 ratio 		  = x / bounding_rect.width,
	 time 		  = ratio * player.getDuration();
player.seekTo(time);
});

// HOVER PROGRESS BAR
player_container.controls.seek_bar.addEventListener('mouseover', function() {
	player_container.controls.cursor_bar.style.webkitTransform = 'scale(1)';
	player_container.controls.cursor_bar.style.mozTransform = 'scale(1)';
	player_container.controls.cursor_bar.style.msTransform = 'scale(1)';
	player_container.controls.cursor_bar.style.oTransform = 'scale(1)';
	player_container.controls.cursor_bar.style.transform = 'scale(1)';
});

player_container.controls.seek_bar.addEventListener('mouseout', function() {
	player_container.controls.cursor_bar.style.webkitTransform = 'scale(0)';
	player_container.controls.cursor_bar.style.mozTransform = 'scale(0)';
	player_container.controls.cursor_bar.style.msTransform = 'scale(0)';
	player_container.controls.cursor_bar.style.oTransform = 'scale(0)';
	player_container.controls.cursor_bar.style.transform = 'scale(0)';
});



	
