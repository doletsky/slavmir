$(document).on('ready', function(){

	$('.article_types_box .art_type_list ul li').on('click', function(){
		if($(this).hasClass('active') == true){
			$(this).find('.sub_type').slideUp(300);
			$(this).removeClass('active');
		} else{
			$('.article_types_box .art_type_list ul li').removeClass('active');
			$('.article_types_box .art_type_list ul li').find('.sub_type').slideUp(300);
			$(this).addClass('active');
			$(this).find('.sub_type').slideDown(300);
		}
	});

	$('#music_bar_mobile .loudness_music').on('click', function(){
		$('.music_right_settings_list').toggleClass('loudness_music_active');
	});

	$('.video_bar_slider .video_bar_item').on('click', function(){
		$('.opened_video_list.slider-nav').slick('refresh');
	});

	$('#music_bar_mobile_scroll').on('click', function(){
		$('body.fixed_header #music_bar_mobile_scroll').fadeOut(300);
		$('#music_bar_mobile').fadeIn(300);
	});

	$('#header_bar .likes_container').on('click', function(){
		$('header').toggleClass('header_likes_active');
		$('#music_bar').toggleClass('header_likes_active');
	});

	$('.loudness_music_wrap').on('click', function(){
		$('#music_bar').toggleClass('loudness');
	});

	$('.breadcrumbs ul li.active a').on('click', function(e){
		e.preventDefault();
	});

	$('#header_bar .to_login form .login_btn').on('click', function(){
		$('header').removeClass('log_opened');
		$('#music_bar').removeClass('login_opened');
	});

	$('.toggle_video_list').on('click', function(){
		$('#music_bar').removeClass();
		$('#music_bar').addClass('music_bar');
		$('#music_bar .music_type_list ul li').removeClass('active');
		$('.type_radio').addClass('active');
	});

	$('#music_bar_mobile .music_menu').on('click', function(){
		$('#music_bar_mobile').toggleClass('menu_active');
	});

	/*$('#music_bar_mobile .music_status').on('click', function(){
		$(this).toggleClass('active');
	});*/

	$('.opened_video_bar_info .right .video_bar_like').on('click', function(){
		$(this).toggleClass('active');
	});

	$('.video_bar_play .next_btn').on('click', function(){
		$(this).toggleClass('active');
	});

	$('.opened_video_bar_main .opened_video_bar_main_img .play_btn').on('click', function(){
		$(this).toggleClass('active');
	});

	/*$('.video_bar_play .play_btn').on('click', function(){
		$(this).toggleClass('active');
	});

	$( function() {
	    $(".slider-vertical").slider({
	      orientation: "vertical",
	      range: "min",
	      min: 0,
	      max: 100,
	      value: 60,
	      slide: function( event, ui ) {
	        $("#amount").val(ui.value);
	      }
	    });
	  });*/

	$('input[type="tel"]').mask("+7(999)999-99-99"); //phone mask

	$('.video_bar_slider').slick({
		arrows: false,
		dots: false,
		slidesToShow: 6,
		slidesToScroll: 6,
		responsive: [
	    {
	      breakpoint: 1280,
	      settings: {
	        slidesToShow: 5,
	        slidesToScroll: 5
	      }
	    },
	    {
	    	breakpoint: 1140,
	      	settings: {
	        slidesToShow: 4,
	        slidesToScroll: 4
	      }
	    },
	    {
	    	breakpoint: 1024,
	      	settings: {
	        slidesToShow: 3,
	        slidesToScroll: 3
	      }
	    }
	  	]
	});

	/*$('#video_bar_tabs ul li').on('click', function(){
		$('.video_bar_slider').slick('refresh');
	});

	$('.video_bar_slider .video_bar_item').on('click', function(){
		$('#music_bar').removeClass('video_bar_active');
		$('#music_bar').addClass('opened_video');
	});
*/
	$('.index_video_slider, #our_prog_slider_box .our_prog_slider').slick({
		arrows: false,
		dots: true,
		autoplay: false
	});

	$('.articles_slider').slick({
		arrows: false,
		dots: true,
		autoplay: true
	});

	$('.daily_video_slider').slick({
		arrows: false,
		dots: true,
		autoplay: false
	});

	$('#music_bar .music_type_list ul li').on('click', function(){
		$('#music_bar .music_type_list ul li').removeClass('active');
		$(this).addClass('active');
	});

	$('#music_bar_mobile .music_type_list ul li').on('click', function(){
		$('#music_bar_mobile .music_type_list ul li').removeClass('active');
		$(this).addClass('active');
	});

	$('.login_box').on('click', function(){
		$('#music_bar').toggleClass('login_opened');
		$('header').toggleClass('log_opened');
		$('#header_bar').toggleClass('logging');
	});

	/*$('.music_status .song_btn').on('click', function(){
		$('.music_status').toggleClass('played');
	});*/

	$('#header_bar .search').on('click', function(){
		$('#header_bar').addClass('search_active');
		$('#header_bar').removeClass('settings_active');
		$('#header_bar').removeClass('likes_active');
		$('#header_bar').removeClass('logging');
	});

	$('body').on('click', function(e) {
        if($(e.target).closest('#header_bar .search').length == 0) {
           $('#header_bar').removeClass('search_active');
        }
        if($(e.target).closest('#header_bar .unreg_link,.register_popup').length == 0) {
           $('.register_popup_container').fadeOut(200);
        }
    });

	$('.opros_welcome .close_welcome').on('click', function(){
		$('.opros_welcome').fadeOut(200);
	});

	$('.opros_welcome .take_part').on('click', function(e){
		e.preventDefault();
		$('html, body').animate({
	        scrollTop: $("#opros_page").offset().top
	    }, 1000);
	    $('.opros_welcome').fadeOut(200);
	});

	$('#opros_page .ask_block label').on('click', function(){
		$(this).find('input[type="text"]').focus();
	});

	$('#header_bar .search.active img.active').on('click', function(){
		$('.search_form').submit();
	});

	$('.likes_list ul, .register_popup_scroll, .scrolled').perfectScrollbar();

	$('.close_login_form').on('click', function(){
		$('#header_bar').removeClass('logging');
		$('header').removeClass('log_opened');
		$('#music_bar').removeClass('login_opened');
	});

	$('#header_bar .settings').on('click', function(e){
		$('#header_bar').toggleClass('settings_active');
		$('#header_bar').removeClass('search_active');
		$('#header_bar').removeClass('likes_active');
	});

	$('#header_bar .likes').on('click', function(){
		$('#header_bar').toggleClass('likes_active');
		$('#header_bar').removeClass('settings_active');
		$('#header_bar').removeClass('search_active');
	});

	/*$('#header_bar .settings_list a.logOut').on('click', function(e){
		$('#header_bar').removeClass('logged');
		e.preventDefault();
	});

	$('#header_bar .to_login form').on('submit', function(e){
		e.preventDefault();
		$('#header_bar').removeClass('logging');
		$('#header_bar').addClass('logged');
		$('#header_bar').removeClass('settings_active');
		$('#header_bar').removeClass('likes_active');
		$('#header_bar').removeClass('search_active');
	});


	$('.tabs ul li').on('click', function(){
		var this_attr = $(this).attr('data-id');
		var this_id = $(this).parent().parent().attr('id');
		$('.tab_container[data-id="'+ this_id +'"]').removeClass('active');
		$('#'+ this_id +'.tabs ul li').removeClass('active');
		$(this).addClass('active');
		$('.tab_container[data-attr="'+ this_attr +'"][data-id="'+ this_id +'"]').addClass('active');
	});*/

	$('header .header_top_menu .burger').on('click', function(){
		$(this).toggleClass('active');
		$('header .mobile_menu').slideToggle(200);
		$('body #music_bar_mobile_scroll').toggleClass('menu');
		$('#music_bar').fadeToggle(200);
	});

	$('#music_bar .music_right_settings .cross_music').on('click', function(){
		$('.music_right_settings').toggleClass('cross_music_active');
	});

	$('#music_bar .music_right_settings .loop_music').on('click', function(){
		$('.music_right_settings').toggleClass('loop_music_active');
	});

	$('#music_bar .music_right_settings .loudness_music').on('click', function(){
		$('.music_right_settings').toggleClass('loudness_music_active');
	});

	$('.music_control .next_song').on('click', function(){
		$('#music_bar .music_bg').addClass('animate_next');
	});

	/*$('#music_bar .music_left_bar .music_left_bar_list .music_left_bar_item').on('click', function(){
		if($(this).parent().hasClass('active') == true){
			$(this).parent().removeClass('active');
			$('#music_bar').removeClass('bar_song_active');
		} else{
			$('.music_right_bar_item_wrap').removeClass('active');
			$('.music_left_bar_item_wrap').removeClass('active');
			$(this).parent().addClass('active');
			$('#music_bar').addClass('bar_song_active');
		}
	});

	$('#music_bar .music_right_bar .music_right_bar_list .music_right_bar_item').on('click', function(){
		if($(this).parent().hasClass('active') == true){
			$(this).parent().removeClass('active');
			$('#music_bar').removeClass('bar_song_active');
		} else{
			$('.music_right_bar_item_wrap').removeClass('active');
			$('.music_left_bar_item_wrap').removeClass('active');
			$(this).parent().addClass('active');
			$('#music_bar').addClass('bar_song_active');
		}
	});*/

	$('.unreg_link').on('click', function(){
		$('.register_popup_container').fadeIn(200);
	});

	$('.close_popup, .close_tnx_popup').on('click', function(){
		$('.register_popup_container, .tnx_popup_container, .subs_popup_container').fadeOut(200);
	});

	$('#music_bar .more_info .actives_list .bar_img.bar_like').on('click', function(){
		$(this).toggleClass('active');
	});

	$('#music_bar .music_menu').on('click', function(){
		$('#music_bar').toggleClass('bar_list_active');
		$('#music_bar').toggleClass('categories_active');
	});

	

	$('.slider-for').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  dots: false,
	  fade: true,
	  asNavFor: '.slider-nav'
	});

	$('.slider-nav').slick({
	  slidesToShow: 5,
	  slidesToScroll: 1,
	  asNavFor: '.slider-for',
	  dots: false,
	  arrows: false,
	  centerMode: false,
	  focusOnSelect: true,
	  vertical: true,
	  swipe: true
	});

	/*$('.music_type_list ul li.type_tv').on('click', function(){
		$('#music_bar').removeClass();
		$('#music_bar').addClass('music_bar');
		$('#music_bar').addClass('efir_bar_active');
		$('.slider-nav').slick('refresh');
		$('.efir_bar .slider-for').slick('refresh');
		$('#music_bar_mobile').removeClass();
		$('#music_bar_mobile').addClass('efir_bar_active');
	});

	$('.music_type_list ul li.type_video').on('click', function(){
		$('#music_bar').removeClass();
		$('#music_bar').addClass('music_bar');
		$('#music_bar').addClass('video_bar_active');
		$('.video_bar_slider').slick('refresh');
		$('#music_bar_mobile').removeClass();
		$('#music_bar_mobile').addClass('video_bar_active');
	});

	$('.music_type_list ul li.type_audio').on('click', function(){
		$('#music_bar').removeClass();
		$('#music_bar').addClass('music_bar');
		$('#music_bar').addClass('playlist_active');
		$('#music_bar_mobile').removeClass();
	});

	$('.music_type_list ul li.type_radio').on('click', function(){
		$('#music_bar').removeClass();
		$('#music_bar').addClass('music_bar');
		$('#music_bar').addClass('radio_bar_active');
		$('#music_bar_mobile').removeClass();
	});*/

	$('.only_subs').on('click', function(){
		$('.subs_popup_container').fadeIn(200);
	});

	var vh = $(window).height();
	$('.register_popup_scroll').css({'max-height': vh - 120});

	var barFromTop = $('#music_bar').offset().top;
	var barH = $('#music_bar').height();
	var headerFromTop = $('header').offset().top;
	var triggerH = barFromTop + barH;
	$(window).on('scroll', function(){
		var fromTop = $(this).scrollTop();
		if(fromTop > 1){
			$('body').addClass('fixed_header');
		} else{
			$('body').removeClass('fixed_header');
		}
	});

});