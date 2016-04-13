
	var player_container = {};
	var test = 31;

	player_container.controls = document.querySelector('.player-controls');
	player           							= document.querySelector('#player');
	durationVideo    							= player_container.controls.querySelector('.durationVideo');
	currentTimeVideo 							= player_container.controls.querySelector('.currentTimeVideo');
	/* PROGRESS BAR */
	player_container.controls.seek_bar 		  	= player_container.controls.querySelector('.seek-bar-video');
	player_container.controls.cursor_bar	 	= player_container.controls.querySelector('.cursor-bar-video');
	player_container.controls.progress_bar 	  	= player_container.controls.querySelector('.progress-bar-video');

	var tag = document.createElement('script');
	tag.src = "https://www.youtube.com/iframe_api";
	var firstScriptTag = document.getElementsByTagName('script')[0];
	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

	var player;
	function onYouTubeIframeAPIReady() {
		console.log('ok');
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
	event.target.setVolume(0);
	$('.loader').css('opacity', '0');
	setInterval(function(){$('.loader').css('display', 'none');},300)
}

function onPlayerPlaybackQualityChange(event) {
	setPlaybackQuality = 'small';
}

function onPlayerStateChange() {
	console.log('CHANGE');
}

function onPlayerError() {
	console.log('ERROR');
}

function play() {
  if (player) {
    player.playVideo();
  }
}

function pause() {
  if (player) {
    player.pauseVideo();
  }
}

function mute() {
  if (player) {
    player.mute();
  }
}

function max() {
   player.setVolume(100);
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

function dragProgressbar(e) {
	var ratio = (e.clientX - player.offsetLeft) / player_container.controls.seek_bar.offsetWidth;
	var current = ratio * player.getDuration();
	player.seekTo(current);
	player_container.controls.progress_bar.style.webkitTransform = 'scaleX' + ratio + ')';
	player_container.controls.progress_bar.style.mozTransform = 'scaleX' + ratio + ')';
	player_container.controls.progress_bar.style.msTransform = 'scaleX' + ratio + ')';
	player_container.controls.progress_bar.style.oTransform = 'scaleX' + ratio + ')';
	player_container.controls.progress_bar.style.transform = 'scaleX' + ratio + ')';
	player_container.controls.cursor_bar.style.webkitTransform = 'scale(1)';
	player_container.controls.cursor_bar.style.mozTransform = 'scale(1)';
	player_container.controls.cursor_bar.style.msTransform = 'scale(1)';
	player_container.controls.cursor_bar.style.oTransform = 'scale(1)';
	player_container.controls.cursor_bar.style.transform = 'scale(1)';
}

player_container.controls.seek_bar.addEventListener('click', function(e) {
var	bounding_rect = player_container.controls.seek_bar.getBoundingClientRect(),
	 x 			  = e.clientX - bounding_rect.left,
	 ratio 		  = x / bounding_rect.width,
	 time 		  = ratio * player.getDuration();
player.seekTo(time);
});

// DRAG ON PROGRESS BAR
player_container.controls.seek_bar.addEventListener('mousedown', function(e) {
	// if (!player.video.paused) player.video.pause();
	var ratio = (e.clientX - player.offsetLeft) / player_container.controls.seek_bar.offsetWidth;
	var current = ratio * player.getDuration();
	player.seekTo(current);
	player_container.controls.progress_bar.style.webkitTransform = 'scaleX' + ratio + ')';
	player_container.controls.progress_bar.style.mozTransform = 'scaleX' + ratio + ')';
	player_container.controls.progress_bar.style.msTransform = 'scaleX' + ratio + ')';
	player_container.controls.progress_bar.style.oTransform = 'scaleX' + ratio + ')';
	player_container.controls.progress_bar.style.transform = 'scaleX' + ratio + ')';
	document.addEventListener('mousemove', dragProgressbar);
	document.addEventListener('mouseup', function() {
		player_container.controls.cursor_bar.style.webkitTransform = 'scale(0)';
		player_container.controls.cursor_bar.style.mozTransform = 'scale(0)';
		player_container.controls.cursor_bar.style.msTransform = 'scale(0)';
		player_container.controls.cursor_bar.style.oTransform = 'scale(0)';
		player_container.controls.cursor_bar.style.transform = 'scale(0)';
		document.removeEventListener('mousemove', dragProgressbar);
		play();
	});
});

// HOVER PROGRESS BAR
player_container.controls.seek_bar.addEventListener('mouseover', function() {
	player_container.controls.cursor_bar.style.webkitTransform = 'scale(1)';
	player_container.controls.cursor_bar.style.mozTransform = 'scale(1)';
	player_container.controls.cursor_bar.style.msTransform = 'scale(1)';
	player_container.controls.cursor_bar.style.oTransform = 'scale(1)';
	player_container.controls.cursor_bar.style.transform = 'scale(1)';
	player_container.controls.seek_bar.style.height = '9px';
	player_container.controls.progress_bar.style.height = '9px';
	player_container.controls.seek_bar.style.top = '-2px';
});

player_container.controls.seek_bar.addEventListener('mouseout', function() {
	player_container.controls.cursor_bar.style.webkitTransform = 'scale(0)';
	player_container.controls.cursor_bar.style.mozTransform = 'scale(0)';
	player_container.controls.cursor_bar.style.msTransform = 'scale(0)';
	player_container.controls.cursor_bar.style.oTransform = 'scale(0)';
	player_container.controls.cursor_bar.style.transform = 'scale(0)';
	player_container.controls.seek_bar.style.height = '5px';
	player_container.controls.progress_bar.style.height = '5px';
	player_container.controls.seek_bar.style.top = '0px';
});


// AJAX 
function next() {
	var xhr = getXMLHttpRequest();

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			console.log('gg');
		}
	};

	var movie = encodeURIComponent("02_Pirates");

	xhr.open("GET", "home.php?movie=" + movie, true);
	xhr.send(null);
}
	
