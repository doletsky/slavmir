$(document).on('ready', function(){

	$('input[type="tel"]').mask("+7(999)999-99-99"); //phone mask

	$('.index_video_slider, #our_prog_slider_box .our_prog_slider').slick({
		arrows: false,
		dots: true,
		autoplay: true
	});

	$('#articles .articles_slider').slick({
		arrows: false,
		dots: true,
		autoplay: true
	});

	$('#video_page .daily_video_slider').slick({
		arrows: false,
		dots: true,
		autoplay: true
	});

	$('#music_bar .music_type_list ul li').on('click', function(){
		$('#music_bar .music_type_list ul li').removeClass('active');
		$(this).addClass('active');
	});

	$('.login_box').on('click', function(){
		$('#header_bar').toggleClass('logging');
	});

	

	$('#header_bar .search').on('click', function(){
		$('#header_bar').addClass('search_active');
		$('#header_bar').removeClass('settings_active');
		$('#header_bar').removeClass('likes_active');
	});

	$('body').on('click', function(e) {
        if($(e.target).closest('#header_bar .search').length == 0) {
           $('#header_bar').removeClass('search_active');
        }
        if($(e.target).closest('#header_bar .unreg_link,.register_popup').length == 0) {
           $('.register_popup_container').fadeOut(200);
        }
    });

	$('#header_bar .search.active img.active').on('click', function(){
		$('.search_form').submit();
	});

	$('#header_bar .likes_list ul, .register_popup_scroll').perfectScrollbar();

	$('.close_login_form').on('click', function(){
		$('#header_bar').removeClass('logging');
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

	$('#header_bar .settings_list a.logOut').on('click', function(e){
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
	});

	$('header .header_top_menu .burger').on('click', function(){
		$(this).toggleClass('active');
		$('header .mobile_menu').slideToggle(200);
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

	/*$('#music_bar .music_left_bar .music_left_bar_list .music_left_bar_item').on('click', function(){
		$('.music_right_bar_item_wrap').removeClass('active');
		$('.music_left_bar_item_wrap').removeClass('active');
		if( !$(this).hasClass("no-info") ){
			$(this).parent().addClass('active');
		}
		$('#music_bar').toggleClass('bar_song_active');
	});

	$('#music_bar .music_right_bar .music_right_bar_list .music_right_bar_item').on('click', function(){
		$('.music_right_bar_item_wrap').removeClass('active');
		$('.music_left_bar_item_wrap').removeClass('active');
		if( !$(this).hasClass("no-info") ){
			$(this).parent().addClass('active');
		}
		$('#music_bar').toggleClass('bar_song_active');
	});*/

	$('.unreg_link').on('click', function(){
		$('.register_popup_container').fadeIn(200);
	});

	$('.register_popup .close_popup').on('click', function(){
		$('.register_popup_container').fadeOut(200);
	});

	$('#music_bar .more_info .actives_list .bar_img.bar_like').on('click', function(){
		$(this).toggleClass('active');
	});

	$('#music_bar .music_menu').on('click', function(){
		$('#music_bar').toggleClass('bar_list_active');
		$('#music_bar').toggleClass('categories_active');
	});

	$('#music_bar .music_type_list ul li.type_audio').on('click', function(){
		$('#music_bar').addClass('playlist_active');
	});

	$('#music_bar .music_type_list ul li.type_radio').on('click', function(){
		$('#music_bar').removeClass('playlist_active');
	});

	var vh = $(window).height();
	$('.register_popup_scroll').css({'max-height': vh - 120});

	var barFromTop = $('#music_bar').offset().top;
	var barH = $('#music_bar').height();
	var triggerH = barFromTop + barH;
	$(window).on('scroll', function(){
		var fromTop = $(this).scrollTop();
		if(fromTop > triggerH){
			$('body').addClass('fixed_header');
		} else{
			$('body').removeClass('fixed_header');
		}
	});

});