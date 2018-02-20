var playlist = null,
		isMobile = false;

var RADIO_URL = 'http://83.217.203.197/stream/2/',
		//TV_URL = 'http://213.202.223.101:1935/live/slavmir/playlist.m3u8',
		TV_URL = 'http://83.217.203.202:1935/live/slavmir/playlist.m3u8',

		tm = null, // timer for radio

		jw = null,
		jwVolume = 50,

		jwVS = null,
		jwVSVolume = 0,

		jwV = null,
		jwVVolume = 50,

		jwIVS;

var TV_PLAYER_ID = 'tv-container',
		VIDEO_PLAYER_ID = 'video-container',
		INDEX_TV_PLAYER_ID = 'index-tv-container';
var tmScrl=1;
$(document).on('ready', function(){

    if( $(window).width() <= 768 ){//if( $("html").hasClass("bx-touch") || $(window).width() <= 768 ){
		console.log('mobile');
		TV_PLAYER_ID = 'm-tv-container';
		VIDEO_PLAYER_ID = 'm-video-container';
		isMobile = true;
	}
	else{
		console.log('desktop');
		TV_PLAYER_ID = 'tv-container';
		VIDEO_PLAYER_ID = 'video-container';
		isMobile = false;
	}

	$(".efir_bar .video_bar_full").on('click',function(){
		jwVS.setFullscreen();
		console.log('playlist: fullscreen');
	});
	$(".opened_video_bar .video_bar_full").on('click',function(){
		jwV.core.mediaControl.toggleFullscreen();
		console.log('video: fullscreen');
	});
	$("#music_bar_mobile .video_mobile .full").on('click',function(){
		fullScreen( VIDEO_PLAYER_ID );
	});
	$("#music_bar_mobile .efir_mobile .full").on('click',function(){
		fullScreen( TV_PLAYER_ID );
	});
	$(".music_control .prev_song").on('click',function(){
		jw.playlistPrev();
		console.log('playlist: prev');
	});
	$(".music_control .next_song").on('click',function(){
		jw.playlistNext();
		console.log('playlist: next');
	});

	$('.music_status .song_btn').on('click', function(){
		$('.music_status').toggleClass('played');
		if( $(".music_status").hasClass("played") ){
			playAudio();
		}
		else{
			pauseAudio();
		}
	});
	$('#music_bar_mobile .music_status').on('click', function(){
		$('.music_status').toggleClass('active');
		if( $(".music_status").hasClass("active") ){
			playAudio();
		}
		else{
			pauseAudio();
		}
	});


	$('.efir_bar .video_bar_play .play_btn').on('click', function(){
		$(this).toggleClass('active');
		if( $(this).hasClass("active") ){
			stopVideoStream();
		}
		else{
			startVideoStream();
		}
	});

	$(".radio_efir").on('click',function(){
		setSwitch('type_radio');
		return false;
	});

	$('.opened_video_bar .video_bar_play .play_btn').on('click', function(){
		$(this).toggleClass('active');
		if( $(this).hasClass("active") ){
			stopVideo();
		}
		else{
			startVideo();
		}
	});


	// audio
	$( "#slider-vertical-2" ).slider({
		orientation: "vertical",
		range: "min",
		min: 0,
		max: 100,
		value: jwVolume,
		slide: function( event, ui ) {
			//$( "#amount" ).val( ui.value );
			jwVolume = ui.value;
			if(typeof jw != 'undefined') jw.setVolume( jwVolume );
		}
	});
	//$( "#amount" ).val( $( "#slider-vertical-2" ).slider( "value" ) );
	
	// tv
	$( "#slider-vertical-1" ).slider({
		orientation: "vertical",
		range: "min",
		min: 0,
		max: 100,
		value: jwVSVolume,
		slide: function( event, ui ) {
			//$( "#amount" ).val( ui.value );
			jwVSVolume = ui.value;
			if(typeof jwVS != 'undefined') jwVS.setVolume( jwVSVolume );
		}
	});
	
	// video
	$( "#slider-vertical" ).slider({
		orientation: "vertical",
		range: "min",
		min: 0,
		max: 100,
		value: jwVVolume,
		slide: function( event, ui ) {
			//$( "#amount" ).val( ui.value );
			jwVVolume = ui.value;
			if(typeof jwV != 'undefined') jwV.setVolume( jwVVolume );
		}
	});


	$('.music_type_list ul li.type_video').on('click', function(){
		setSwitch( 'type_video' );
	});
	$('.music_type_list ul li.type_audio').on('click', function(){
		//setSwitch( 'type_playlist' );
		setSwitch('type_audio');
	});
	$('.music_type_list ul li.type_radio').on('click', function(){
		setSwitch( 'type_radio' );
	});
	$('.music_type_list ul li.type_tv').on('click', function(){
        jwVSVolume=50;
        $( "#slider-vertical-1" ).slider({value: jwVSVolume});
		setSwitch( 'type_tv' );
	});


	$('#music_bar .music_left_bar .music_left_bar_item').on('click', function(){
		$('.music_right_bar_item_wrap').removeClass('active');
		$('.music_left_bar_item_wrap').removeClass('active');
		if( !$(this).hasClass("no-info") ){
			$(this).parent().addClass('active');
		}
		$('#music_bar').toggleClass('bar_song_active');
	});

//	$('#music_bar .music_right_bar .music_right_bar_item').on('click', function(){
//		$('.music_right_bar_item_wrap').removeClass('active');
//		$('.music_left_bar_item_wrap').removeClass('active');
//		if( !$(this).hasClass("no-info") ){
//			$(this).parent().addClass('active');
//		}
//		$('#music_bar').toggleClass('bar_song_active');
//	});

	

	tm = window.setInterval(updateRadioList,5000);
	updateRadioList();

	initRadio();
	initVideoStream();

	// Efir for index-page
	if( $("#index-tv-container").length ){
		jwIVS = jwplayer(INDEX_TV_PLAYER_ID).setup({
			"file": TV_URL,
			"controls": true,
			"aspectratio": '16:9',
			"width": '100%',
			"height": '265',
            "volume": jwVSVolume
		}).play();

		/*on('volume',function(obj){
			jwVolume = obj.volume;
			$( "#slider-vertical-2" ).slider("value",jwVolume);
		}).on('pause',function(obj){
			//$('.efir_bar .video_bar_play .play_btn').addClass("active");
			console.log('index-tv: stop');
		}).on('play',function(obj){
			//$('.efir_bar .video_bar_play .play_btn').removeClass("active");
			console.log('index-tv: play');
		}).on('time',function(obj){
			//setVSPlayerPosition( obj );
		})*/
	}
});

$(document).on("click",".pl-audio-play",function(){

    if($(this).data('name')===$('#jw-current-play .music_right_bar_item .music_name').text() || ($(this).parent().find(".mus_name").length>0 && $(this).parent().find(".mus_name").text()===$('#jw-current-play .music_right_bar_item .music_name').text())){
        console.log("run: ",$(this).parent().find(".mus_name").text(),"===",$('#jw-current-play .music_right_bar_item .music_name').text());
        if( $(".music_status").hasClass("played") && $(".type_audio").hasClass("active")){
            pauseAudio();
        }else{
            playAudio();
        }

            }else{
                var $this = $(this),
                    $name = '',
                    $artist = '',
                    $picture = '';
                if( $this.hasClass("block") ){
                    $(".subs_popup_container").show();
                    return false;
                }
                setSwitch('type_audio');
                if( $this.attr("data-name") ){
                    $name = $this.attr("data-name");
                }
                else{
                    $name = $this.parent().find(".mus_name").text();
                }
                if( $this.attr("data-artist") ){
                    $artist = $this.attr("data-artist");
                }
                else{
                    $artist = $this.parent().find(".mus_group").text();
                }
                    $picture = $this.attr("data-picture");
                    setPlayerName( $name, $artist );
                    setMobileName( $name, $artist );
                    setPlayerPicture( $picture );
                    playAudioFile( $(this).attr("data-url") );

            }



});

$(document).on("click",".pl-video-play",function(){
    if(tmScrl==1){
	var $this = $(this),
			$name = '',
			$artist = '',
			$picture = '';
	if( $this.hasClass("block") ){
		$(".subs_popup_container").show();
		return false;
	}
	setSwitch('opened_video');
	if( $this.attr("data-name") ){
		$name = $this.attr("data-name");
	}
	else{
		$name = $this.parent().find(".mus_name").text();
	}
	if( $this.attr("data-artist") ){
		$artist = $this.attr("data-artist");
	}
	else{
		$artist = $this.parent().find(".mus_group").text();
	}
	$picture = $this.attr("data-picture");
        var initHtml='<div class="opened_video_list">';
            initHtml+='<div class="opened_list_item">';
            initHtml+='<div class="opened_list_item_img"></div>';
            initHtml+='<div class="opened_list_item_text" id="v-main">';
            initHtml+='<h6>Загрузка...</h6>';
            initHtml+='<p></p></div><div class="clear"></div></div><div></div></div><div></div>';
    $('.opened_video_bar div.opened_video_list_wrap').html(initHtml);
	setVPlayerName( $name, $artist );
	setMobileName( $name, $artist );
	setVPlayerPicture( $picture );


        var eList=$('.video_bar_container.active .video_bar_item.pl-video-play.slick-active'); //console.log(eList);
        var cnt=eList.length;
        var cur=eList.index($(this));
        var eHtml='';
        var vUrl="";
        var vName="";
        var vArtist="";
        eList.each(function(){
            console.log($(this).children('h6').html());
            if(eList.index($(this))!=cur){
                vUrl="'"+$(this).attr("data-url")+"'";
                vName="'"+$(this).attr("data-name")+"'";
                vArtist="'"+$(this).attr("data-artist")+"'";
                eHtml='<div class="opened_list_item"><div class="opened_list_item_img" data-artist="'+$(this).attr("data-artist")+'" data-url="'+$(this).attr("data-url")+'" data-name="'+$(this).attr("data-name")+'" style="background-image: url('+$(this).attr("data-picture")+');"></div><div class="opened_list_item_text" id="v-main">';
                    eHtml+='<h6>'+$(this).children('h6').html()+'</h6>';
                    eHtml+='<p>'+$(this).children('p').html()+'</p></div><div class="clear"></div></div>';
                $(".opened_video_bar div.opened_video_list_wrap .opened_video_list div.opened_list_item").filter( ':last' ).after(eHtml);
            }else{
                var fEHtml=$(".opened_video_bar div.opened_video_list_wrap .opened_video_list div.opened_list_item").eq(0);
                fEHtml.children('.opened_list_item_img').attr('data-url',$(this).attr("data-url"));
                fEHtml.children('.opened_list_item_img').attr('data-name',$(this).attr("data-name"));
                fEHtml.children('.opened_list_item_img').attr('data-artist',$(this).attr("data-artist"));
            }
                console.log('eHtml: '+eHtml);
        });
        $('.opened_list_item').on('click','.opened_list_item_img', function(){
            var slCur=$(this);
                $('.opened_video_bar .video_bar_name h6').html( slCur.attr("data-name"));
                $('.opened_video_bar .video_bar_name p').html( slCur.attr("data-artist") );
            $('.opened_video_bar .next_btn').attr('eq', $('.opened_video_bar div.opened_video_list_wrap .opened_video_list div.opened_list_item').index($(this).parent('.opened_list_item')));
                playVideoFile( slCur.attr("data-url") );
        });

        $('.opened_video_bar .next_btn').on('click', function(){
            var nextId=1+parseInt($(this).attr('eq'));
            if(nextId==$(".opened_video_bar div.opened_video_list_wrap .opened_video_list div.opened_list_item").length) {
                nextId=0;
                $('.opened_video_bar .next_btn').removeAttr('eq');
            }
            $(".opened_video_bar div.opened_video_list_wrap .opened_video_list div.opened_list_item .opened_list_item_img").eq(nextId).click();
        });
//        if($('.opened_video_list').hasClass('slider-nav')){
//            $('.slider-nav').slick('reinit');
//        }else{
//            $('.opened_video_list').addClass('slider-nav');
//            $('.slider-nav').slick({
//                infinite: true,
//                draggable: true,
//                slidesToShow: cnt,
//                slidesToScroll: 1,
//                centerPadding: '0',
//                dots: false,
//                arrows: false,
//                centerMode: true,
//                focusOnSelect: true,
//                vertical: true,
//                verticalSwiping: true
//            });
//        }

//        var tmBlock=0;
//        var tmId;
//        $('.opened_video_bar div.opened_video_list_wrap .opened_video_list div.opened_list_item').on('mousedown touchstart','.opened_list_item_img', function(){
//            tmId=setTimeout(function(){tmBlock=1;},300);
//        });
//        $('.opened_video_bar div.opened_video_list_wrap .opened_video_list div.opened_list_item').on('mouseup touchend','.opened_list_item_img', function(){
//            clearTimeout(tmId);
//        });

//        $('.slider-nav').on('afterChange', function(event, slick, direction){
//            if(tmBlock==0){
//                var slCur=$('.opened_list_item.slick-current .opened_list_item_img');
//                $('.opened_video_bar .video_bar_name h6').html( slCur.attr("data-name"));
//                $('.opened_video_bar .video_bar_name p').html( slCur.attr("data-artist") );
//                playVideoFile( slCur.attr("data-url") );
//            }else{tmBlock=0;}

//        });
//        $('.video_bar_slider .video_bar_item').on('click', function(){
//            $('.opened_video_list.slider-nav').slick('refresh');
//        });
        playVideoFile( $(this).attr("data-url") );
    }

	return false;
});

$(document).on("click",".pl-playlist-play",function(){
	var $this = $(this),
			$name = '',
			$artist = '',
			$picture = '';
	if( $this.hasClass("block") ){
		$(".subs_popup_container").show();
		return false;
	}
    $('#music_bar .music_right_settings .loop_music').removeClass('dn');
    $('#music_bar .music_right_settings .cross_music').removeClass('dn');
    var curnam=$this.attr("data-cur-num");
	$.ajax({
		url: '/ajax/get-playlist.php?id='+$this.attr("data-pl-id"),
		method: 'post',
		success: function(data){
            console.log("pl="+data);
			window.playlist = data.playlist;

			setPlayerIsPlaylist( true );
			setPlayerStatus( 'playing' );
			setSwitch( 'type_playlist' );

			$(".playlist_played .play_list_name").text( data.info.name );
			$(".playlist_played .play_list_image").attr( "src", data.info.pic );
			$(".playlist_played .play_list_desc").text( data.info.artist );

			jw.setup({
				playlist: data.playlist
			})
            .setVolume( jwVolume )
			.play()
			.on('time',function(obj){
				setPlayerPosition( obj );
			}).on('play',function(obj){
				setPlayerStatus( 'playing' );
				console.log('playlist: play');
                    if(curnam>0){
                        jw.playlistNext();
                        curnam--;
                    }
			}).on('playlistItem',function( obj ){
				playlistUpdate( obj );
			});
		},
        error: function(dat, stat){
            console.log("er="+dat, "stat="+stat);
        }
	});
	return false;
});

$(document).on("click",".pl-samelist-play",function(){
    console.log('player: '+$(this).parent('a').find('.index_music_name').text());
    console.log('samelist: '+$('#jw-current-play .music_right_bar_item .music_name').text());
    if($(this).parent('a').find('.index_music_name').text()===$('#jw-current-play .music_right_bar_item .music_name').text()){
        if( $(".music_status").hasClass("played") && $(".type_audio").hasClass("active")){
            pauseAudio();
        }else{
            playAudio();
        }
    }else{
        var $this = $(this),
            $name = '',
            $artist = '',
            $picture = '';
        if( $this.hasClass("block") ){
            $(".subs_popup_container").show();
            return false;
        }
        $('#music_bar .music_right_settings .loop_music').removeClass('dn');
        $('#music_bar .music_right_settings .cross_music').removeClass('dn');
        var curnam=$this.attr("data-cur-num");
        $.ajax({
            url: '/ajax/get-samelist.php?id='+$this.attr("data-pl-id"),
            method: 'post',
            success: function(data){
                console.log("pl="+data);
                window.playlist = data.playlist;

                setPlayerIsPlaylist( true );
                setPlayerStatus( 'playing' );
                setSwitch( 'type_playlist' );

                $(".playlist_played .play_list_name").text( data.info.name );
                $(".playlist_played .play_list_image").attr( "src", data.info.pic );
                $(".playlist_played .play_list_desc").text( data.info.artist );

                jw.setup({
                    playlist: data.playlist
                })
                    .setVolume( jwVolume )
                    .play()
                    .on('time',function(obj){
                        setPlayerPosition( obj );
                    }).on('play',function(obj){
                        setPlayerStatus( 'playing' );
                        console.log('playlist: play');
                        if(curnam>0){
                            jw.playlistNext();
                            curnam--;
                        }
                    }).on('playlistItem',function( obj ){
                        playlistUpdate( obj );
                    });

            },
            error: function(dat, stat){
                console.log("er="+dat, "stat="+stat);
            }
        });
    }

    return false;
});

$('#music_bar .music_right_settings').on('click','.loop_music', function(){
    $('.music_right_settings').toggleClass('loop_music_active');
    if($('.music_right_settings').hasClass('loop_music_active')){
        jw.setConfig({repeat:true});
        console.log('repeat:true');
    }else{
        jw.setConfig({repeat:false});
        console.log('repeat:true');
    }
});

$('#music_bar .music_right_settings').on('click', '.cross_music', function(){
    $('.music_right_settings').toggleClass('cross_music_active');
    if($('.music_right_settings').hasClass('cross_music_active')){
        playListShuffle();
        console.log('shuffle:true');
    }else{
        if($('.pl-samelist-play').length>0)$('.pl-samelist-play').eq(0).click();
        else $('.pl-playlist-play').eq(0).click();
        console.log('shuffle:false');
    }
});

var updateRadioList = function(){
	$.ajax({
		url: '/ajax/get-radio-info.php',
		method: 'post',
		dataType: 'json',
		success: function(data){
			//console.log(data);
			$(".music_left_bar_list").html('');
			if( typeof data.cur != 'undefined' ){
				setPlayerName( data.cur.n, data.cur.a );
				//setMobileName( data.cur.n, data.cur.a );
			}
			if( typeof data.last != 'undefined' ){
				for( i in data.last ){
					//console.log(data.last[i]);
					$('#music_left_bar_item_wrap_Tmpl').tmpl(data.last[i]).appendTo(".music_left_bar_list");
				}
			}
		}
	});
};
/*  ================================ C O M M O N ========================================= */
function playAudio(){
	jw.play();
	setPlayerStatus( 'playing' );
	console.log('audio-player: playing');
}
function pauseAudio(){
	jw.pause();
	setPlayerStatus( 'pause' );
	console.log('audio-player: pause');
}
function stopAudio(){
	jw.stop();
	setPlayerStatus( 'stop' );
	console.log('audio-player: stop');
}

// radio
/*  ================================ R A D I O ========================================= */
function initRadio(){
	setPlayerIsPlaylist(false);
	setPlayerPosition(0);
	setPlayerPicture( '/bitrix/templates/slavmir/images/music_bg.png' );
	jw = jwplayer("player-container").setup({
		"type": "mpeg",
		"file": RADIO_URL
	});
	jw.resize(1, 1);
	jw.setVolume( jwVolume );
	jw.on('time',function(obj){
		setPlayerPosition( obj );
	});
	console.log('radio: init');
}
function playRadio(){
	jw.play();
	setPlayerPosition('подготовка...');
	setPlayerStatus( 'playing' );
	console.log('radio: play');
};
function stopRadio(){
	setPlayerStatus( 'stop' );
	jw.stop();
	console.log('radio: stop');
};
// tv
/*  ================================ T V ========================================= */
function initVideoStream(){
	if( isMobile ){
		/*
		$("#"+TV_PLAYER_ID).html('');
		jwVS = new Clappr.Player({
			width: '100%',
			height: '165',
			source: TV_URL, 
			parentId: "#"+TV_PLAYER_ID
		});
		jwVS.on(Clappr.Events.PLAYER_TIMEUPDATE,function(obj){
			setVSPlayerPositionC(obj);
		}).on(Clappr.Events.PLAYER_PLAY,function(obj){
			//setVPlayerStatus( 'playing' );
			$('.efir_bar .video_bar_play .play_btn').removeClass("active");
		}).on(Clappr.Events.PLAYER_PAUSE,function(obj){
			//setVPlayerStatus( 'pause' );
			$('.efir_bar .video_bar_play .play_btn').addClass("active");
		}).on(Clappr.Events.PLAYER_STOP,function(obj){
			//setVPlayerStatus( 'stop' );
			$('.efir_bar .video_bar_play .play_btn').addClass("active");
		}).on(Clappr.Events.PLAYER_ENDED,function(obj){
			//setVPlayerStatus( 'stop' );
			$('.efir_bar .video_bar_play .play_btn').addClass("active");
		});
		*/
		jwVS = jwplayer(TV_PLAYER_ID).setup({
			"file": TV_URL,
			"controls": true,
			"width": '100%',
			"height": '165'
		}).on('volume',function(obj){
			jwVSVolume = obj.volume;
			$( "#slider-vertical-1" ).slider("value",jwVSVolume);
		}).on('pause',function(obj){
			$('.efir_bar .video_bar_play .play_btn').addClass("active");
			console.log('tv: stop');
		}).on('play',function(obj){
			$('.efir_bar .video_bar_play .play_btn').removeClass("active");
			console.log('tv: play');
		}).on('time',function(obj){
			setVSPlayerPosition( obj );
		});
	}
	else{
		jwVS = jwplayer(TV_PLAYER_ID).setup({
			"file": TV_URL,
			"controls": false,
			"width": 'auto',
			"height": $('.opened_video_bar_main_img').height()//'560'
		}).on('volume',function(obj){
			jwVSVolume = obj.volume;
			$( "#slider-vertical-1" ).slider("value",jwVSVolume);
		}).on('pause',function(obj){
			$('.efir_bar .video_bar_play .play_btn').addClass("active");
			console.log('tv: stop');
		}).on('play',function(obj){
			$('.efir_bar .video_bar_play .play_btn').removeClass("active");
			console.log('tv: play');
		}).on('time',function(obj){
			setVSPlayerPosition( obj );
		});
	}
    jwVS.setVolume( jwVSVolume );
	console.log('tv: init');
    console.log('tv_volume: '+jwVSVolume);
}
function startVideoStream(){
	stopRadio();
	stopVideo();
	jwVS.setVolume( jwVSVolume );
	jwVS.play();
	console.log('tv: play');

}
function stopVideoStream(){
	jwVS.pause();
	$('.efir_bar .video_bar_play .play_btn').addClass("active");
	console.log('tv: stop');
}

/*  ================================ S I M P L E    V I D E O ========================================= */
function playVideoFile(file){
	/*
	jwV = jwplayer("video-container").setup({
		"width": "100%",
		"height": "560px",
		"file": file,
		"controls": false
	}).on('volume',function(obj){
		jwVVolume = obj.volume;
		$( "#slider-vertical" ).slider("value",jwVVolume);
	}).on('pause',function(obj){
		$('.video_bar_play .play_btn').addClass("active");
		console.log('video: stop');
	}).on('play',function(obj){
		$('.video_bar_play .play_btn').removeClass("active");
		console.log('video: play');
	}).on('time',function(obj){
		setVPlayerPosition( obj );
	});
	*/
    var usDetect = detect.parse(navigator.userAgent);
	if( isMobile || (usDetect.device.type==='Mobile' && (usDetect.browser.family.indexOf('Chrome') + 1))){
        var hh='100%';
        if(usDetect.device.type==='Mobile' && (usDetect.browser.family.indexOf('Chrome') + 1)){hh=$('.opened_video_bar_main_img').height()+'px';}
		$("#"+VIDEO_PLAYER_ID).html('<iframe width="100%" height="'+hh+'" src="https://www.youtube.com/embed/'+file+'?rel=0" frameborder="1" allowfullscreen></iframe>');
	}
	else{
		$("#"+VIDEO_PLAYER_ID).html('');
		jwV = new Clappr.Player({
			width: '100%',
			height: $('.opened_video_bar_main_img').height(),//'560',
			source: file, 
			parentId: "#"+VIDEO_PLAYER_ID,
			youtubeShowRelated: true,
            plugins: {
                playback: [YoutubePlugin]
            }
		});
		jwV.on(Clappr.Events.PLAYER_TIMEUPDATE,function(obj){
			setVPlayerPosition(obj);
		}).on(Clappr.Events.PLAYER_PLAY,function(obj){
			setVPlayerStatus( 'playing' );
		}).on(Clappr.Events.PLAYER_PAUSE,function(obj){
			setVPlayerStatus( 'pause' );
		}).on(Clappr.Events.PLAYER_STOP,function(obj){
			setVPlayerStatus( 'stop' );
		}).on(Clappr.Events.PLAYER_ENDED,function(obj){
			setVPlayerStatus( 'stop' );
		});
		jwV.play();
	}
	stopRadio();
	stopVideoStream();
	console.log('video: init & play');
}
function startVideo(){
	if(typeof jwV != 'undefined') try{ jwV.play(); }catch (err){}
	console.log( 'video: play' );
}
function stopVideo(){
	if( isMobile ) $("#"+VIDEO_PLAYER_ID).html('');
	if(typeof jwV != 'undefined') try{ jwV.pause(); }catch (err){}
	console.log( 'video: stop' );
}
// simple audio
/*  ================================ S I M P L E    A U D I O ========================================= */
function playAudioFile(file){
	setPlayerIsPlaylist(false);
	setPlayerPosition('подготовка...');
	setPlayerStatus( 'playing' );
	jw = jwplayer("player-container").setup({
		"type": "mpeg",
		"file": file
	});
	jw.setVolume( jwVolume );
	jw.play();
	jw.resize(1, 1);
	jw.on('time',function(obj){
		setPlayerPosition( obj );
	}).on('error',function(obj){
		console.error(obj.message);
		setPlayerStatus( 'stop' );
		setPlayerPosition( 'ошибка загрузки' );
	});
	console.log('audio: play');
}
function stopAudio(){
	setPlayerStatus( 'stop' );
	jw.stop();
}
/*  ======================================= P L A Y L I S T =========================================== */
function playListShuffle(){
    playListUpload(jw.getPlaylist().sort(function(){ return 0.5-Math.random() }));
}
function playListUpload(data){
    console.log("pl="+data);
    window.playlist = data;

    setPlayerIsPlaylist( true );
    setPlayerStatus( 'playing' );
    setSwitch( 'type_playlist' );

//    $(".playlist_played .play_list_name").text( data.info.name );
//    $(".playlist_played .play_list_image").attr( "src", data.info.pic );
//    $(".playlist_played .play_list_desc").text( data.info.artist );

    jw.setup({
        playlist: data
    })
        .setVolume( jwVolume )
        .play()
        .on('time',function(obj){
            setPlayerPosition( obj );
        }).on('play',function(obj){
            setPlayerStatus( 'playing' );
            console.log('playlist: play');
        }).on('playlistItem',function( obj ){
            playlistUpdate( obj );
        });

}
/*  =================================================================================================== */
function setPlayerPicture( path, auto ){
//	$(".music_bg").css("background-image","url("+path+")");
    $(".pleer_bg_slider .slick-slide:not(.slick-current):not(.slick-cloned)").children('img').attr('src',path);
    if(auto==true) $(".pleer_bg_slider").slick('slickNext');
}
function setVPlayerPicture( path ){
	$(".opened_video_bar .opened_list_item_img").css("background-image","url("+path+")");
}
function setVPlayerStatus( status ){
	if( status == 'playing' ){
		$(".opened_video_bar .play_btn").removeClass("active");
	}
	else if( status == 'pause' ){
		$(".opened_video_bar .play_btn").addClass("active");
	}
	else if( status == 'stop' ){
		$(".opened_video_bar .play_btn").addClass("active");
	}
}
function setPlayerStatus( status ){
	if( status == 'playing' ){
		$(".music_status").addClass("played active");
	}
	else if( status == 'pause' ){
		$(".music_status").removeClass("played active");
	}
	else if( status == 'stop' ){
		$(".music_status").removeClass("played active");
	}
}
function setPlayerIsPlaylist( status ){
	if( status ){
		$(".music_control .prev_song,.music_control .next_song").removeClass("hidden");
	}
	else{
		$(".music_control .prev_song,.music_control .next_song").addClass("hidden");
	}
}
function playlistUpdate( obj ){
    var dsi=$(".pleer_bg_slider .slick-current").attr('tabindex');
	console.log(dsi,obj);
	var params = {},
			playlist = window.playlist;
	$(".music_left_bar_list").html('');
	$(".music_right_bar_list .music_right_bar_item_wrap.not-main").remove();
	$(".likes_list ul").html('');
	for( i in playlist ){
		if( i >= obj.index-3 && i < obj.index ){
			params.n = playlist[i].title;
			params.a = playlist[i].description;
			$('#music_left_bar_item_wrap_Tmpl').tmpl(params).appendTo(".music_left_bar_list");
		}
		if( i > obj.index && i <= obj.index+2 ){
			params.n = playlist[i].title;
			params.a = playlist[i].description;
			$('#music_right_bar_item_wrap_Tmpl').tmpl(params).appendTo(".music_right_bar_list");
		}
		$('#likes_list_item_Tmpl').tmpl(playlist[i]).appendTo(".likes_list ul");
	}
	setPlayerName( obj.item.title, obj.item.description );
	setMobileName( obj.item.title, obj.item.description );
	setPlayerPicture( obj.item.bigpic, true );
}
function setPlayerName( name, artist ){
	$(".right_bar .played_item .music_name").text( name );
	$(".right_bar .played_item .music_group").text( artist );
	$('#music_bar_mobile .music_name').text( name );
	$('#music_bar_mobile .music_group').text( artist );
}
function setVPlayerName( name, artist ){
	$(".opened_video_bar .video_bar_name h6, #v-main h6").text( name );
	$(".opened_video_bar .video_bar_name p, #v-main p").text( artist );
}
function setMobileName( name, artist ){
	$("#music_bar_mobile_scroll .mobile_bar_name .song_name").text( name );
	$("#music_bar_mobile_scroll .mobile_bar_name .song_auth").text( artist );
}
var RADIUS = 54;
var CIRCUMFERENCE = 2 * Math.PI * RADIUS;
function setPlayerPosition( obj ){
	if( typeof obj == 'string' ){
		$("#player-progress circle,#player-progress-3 circle").attr("stroke-dashoffset",CIRCUMFERENCE);
		$("#jw-current-play .has_played").html( obj );
		$("#jw-current-play .all_time").html( '' );
	}
	else if ( !obj ){
		$("#player-progress circle,#player-progress-3 circle").attr("stroke-dashoffset",CIRCUMFERENCE);
		$("#jw-current-play .has_played").html( '' );
		$("#jw-current-play .all_time").html( '' );
	}
	else if ( typeof obj == 'object' ){
		var progressNew = 0;
		var duration = String(obj.duration).toHHMMSS();
		$("#jw-current-play .has_played").html(String(obj.position).toHHMMSS());
		if( duration ){
			progressNew = CIRCUMFERENCE * (1 - obj.position/obj.duration);
			$("#player-progress circle,#player-progress-3 circle").attr("stroke-dashoffset",progressNew);
			$("#jw-current-play .all_time").html( ' / '+String(obj.duration).toHHMMSS() );
		}
		else{
			progressNew = CIRCUMFERENCE * (1 - obj.position%60/60);
			$("#player-progress circle,#player-progress-3 circle").attr("stroke-dashoffset",progressNew);
			$("#jw-current-play .all_time").html( '' );
		}
	}
	else{
		var progressNew = CIRCUMFERENCE * (1 - obj.position%60/60);
		$("#player-progress circle,#player-progress-3 circle").attr("stroke-dashoffset",progressNew);
		$("#jw-current-play .has_played").html(String(obj).toHHMMSS());
		$("#jw-current-play .all_time").html( '' );
	}
}
function setVSPlayerPosition( obj ){
	var progressNew = 0;
	$(".efir_bar .time_passed").html(String(obj.position).toHHMMSS());
	var duration = String(obj.duration).toHHMMSS();
	if( duration ){
		progressNew = CIRCUMFERENCE * (1 - obj.position/obj.duration);
		$("#vplayer-progress circle").attr("stroke-dashoffset",progressNew);
		$(".efir_bar .whole_time").html( ' / '+String(obj.duration).toHHMMSS() );
	}
	else{
		progressNew = CIRCUMFERENCE * (1 - obj.position%60/60);
		$("#vplayer-progress circle").attr("stroke-dashoffset",progressNew);
		$(".efir_bar .whole_time").html( '' );
	}
}
function setVSPlayerPositionC( obj ){
	var progressNew = 0;
	$(".efir_bar .time_passed").html(String(obj.current).toHHMMSS());
	var duration = String(obj.total).toHHMMSS();
	if( obj.current ){
		$(".efir_bar .whole_time").html( '' );
	}
	else if( duration ){
		progressNew = CIRCUMFERENCE * (1 - obj.current/obj.total);
		$("#vplayer-progress circle").attr("stroke-dashoffset",progressNew);
		$(".efir_bar .whole_time").html( ' / '+String(obj.duration).toHHMMSS() );
	}
	else{
		progressNew = CIRCUMFERENCE * (1 - obj.current%60/60);
		$("#vplayer-progress circle").attr("stroke-dashoffset",progressNew);
		$(".efir_bar .whole_time").html( '' );
	}
}
function setVPlayerPosition( obj ){
	var progressNew = 0;
	$(".opened_video_bar .time_passed").html(String(obj.current).toHHMMSS());
	var duration = String(obj.total).toHHMMSS();
	if( duration ){
		progressNew = CIRCUMFERENCE * (1 - obj.current/obj.total);
		$("#vplayer-progress-1 circle").attr("stroke-dashoffset",progressNew);
		$(".opened_video_bar .whole_time").html( ' / '+String(obj.total).toHHMMSS() );
	}
	else{
		progressNew = CIRCUMFERENCE * (1 - obj.current%60/60);
		$("#vplayer-progress-1 circle").attr("stroke-dashoffset",progressNew);
		$(".opened_video_bar .whole_time").html( '' );
	}
}
function setSwitch( typeCode ){
	var className = '';
	if( typeCode == 'type_video' ){
		$('#music_bar').removeClass();
		$('#music_bar').addClass('music_bar video_bar_active');
		$(".music_left_bar,.music_menu,.music_right_bar_list .not-main").addClass("dn");
		$('.video_bar_slider').slick('refresh');
		$('#music_bar_mobile').removeClass();
		$('#music_bar_mobile').addClass('video_bar_active');
		stopVideoStream();
		className = 'type_video';
		$("#music_bar_mobile_scroll .mobile_bar_name .song_type").text('Видео');
	}
	else if( typeCode == 'type_audio' ){
		$('#music_bar').removeClass();
		$('#music_bar').addClass('music_bar audio_active');
		$(".music_left_bar,.music_menu,.music_right_bar_list .not-main").addClass("dn");
		$('#music_bar_mobile').removeClass();
		if( tm ) window.clearInterval(tm);
		stopVideoStream();
		stopVideo();
		stopRadio();
		className = 'type_audio';
		$("#music_bar_mobile_scroll .mobile_bar_name .song_type").text('Аудио');
	}
	else if( typeCode == 'type_playlist' ){
		$('#music_bar').removeClass();
		$('#music_bar').addClass('music_bar playlist_active');
		$(".music_left_bar,.music_menu,.music_right_bar_list .not-main").removeClass("dn");
		$('#music_bar_mobile').removeClass();
		if( tm ) window.clearInterval(tm);
		stopVideoStream();
		stopVideo();
		className = 'type_audio';
		$("#music_bar_mobile_scroll .mobile_bar_name .song_type").text('Аудио');
	}
	else if( typeCode == 'type_radio' ){
		$('#music_bar').removeClass();
		$('#music_bar').addClass('music_bar radio_bar_active');
		$(".music_left_bar,.music_right_bar_list .not-main").removeClass("dn");
		$(".music_menu").addClass("dn");
		$('#music_bar_mobile').removeClass();
		$('#music_bar_mobile .music_name').text('Радио-эфир');
		$('#music_bar_mobile .music_group').text('');
		stopVideoStream();
		stopVideo();
		stopAudio();
		if( tm ) window.clearInterval( tm );
		tm = window.setInterval(updateRadioList,5000);
		updateRadioList();
		initRadio();
		playRadio();
		className = 'type_radio';
		$("#music_bar_mobile_scroll .mobile_bar_name .song_type").text('Радио');
	}
	else if( typeCode == 'type_tv' ){
		$('#music_bar').removeClass();
		$('#music_bar').addClass('music_bar efir_bar_active');
		$(".music_left_bar,.music_menu,.music_right_bar_list .not-main").addClass("dn");
//		$('.slider-nav').slick('refresh');
		//$('.efir_bar .slider-for').slick('refresh');
		$('#music_bar_mobile').removeClass();
		$('#music_bar_mobile').addClass('efir_bar_active');
        stopVideo();
        stopAudio();
		initVideoStream();
//		if( isMobile )
            startVideoStream();
		className = 'type_tv';
		$("#music_bar_mobile_scroll .mobile_bar_name .song_type").text('ТВ-эфир');
		setMobileName( 'ТВ-эфир', '' );
	}
	else if( typeCode == 'opened_video' ){
		$('#music_bar').removeClass();
		$('#music_bar').addClass('music_bar opened_video');
		$(".music_left_bar,.music_menu,.music_right_bar_list .not-main").addClass("dn");
		$('.video_bar_slider').slick('refresh');
		$('#music_bar_mobile').removeClass();
		$('#music_bar_mobile').addClass('video_bar_active');
		stopVideoStream();
		className = 'type_video';
		$("#music_bar_mobile_scroll .mobile_bar_name .song_type").text('Видео');
	}
	$(".music_type_list li").removeClass("active");
	$(".music_type_list ."+className).addClass("active");
}


function fullScreen( id ) {
	var e = document.getElementById( id );
	if (e.requestFullscreen) {
		e.requestFullscreen();
	} else if (e.webkitRequestFullscreen) {
		e.webkitRequestFullscreen();
	} else if (e.mozRequestFullScreen) {
		e.mozRequestFullScreen();
	} else if (e.msRequestFullscreen) {
		e.msRequestFullscreen();
	}
}

String.prototype.toHHMMSS = function () {
	var sec_num = parseInt(this, 10); // don't forget the second param
	if( !sec_num ) return '';
	var hours   = Math.floor(sec_num / 3600);
	var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
	var seconds = sec_num - (hours * 3600) - (minutes * 60);

	if (hours   < 10) {hours   = "0"+hours;}
	if (minutes < 10) {minutes = "0"+minutes;}
	if (seconds < 10) {seconds = "0"+seconds;}
	if( parseInt(hours) ){
		return hours+':'+minutes+':'+seconds;
	}
	else{
		return minutes+':'+seconds;
	}
}