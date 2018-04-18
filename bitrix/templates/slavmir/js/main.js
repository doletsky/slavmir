$(document).on('ready', function(){

    $('.video_bar_item.pl-video-play').mousedown(function(){
            if(tmScrl==1){
                setTimeout(function(){tmScrl=0;}, 300);
            }
    });
    $('.video_bar_item.pl-video-play').mouseup(function(){
        setTimeout(function(){tmScrl=1;}, 100)});

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

	$('.own_balance_box .pay_history').on('click', function(){
		$('.pay_history_box').slideDown(400);
	});

   var currentDate = new Date();
   var futureDate = new Date(2018,01,29,24,00,00); // (yyyy,m,d) //
   var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;

	if(diff < 0) {diff = 0;}

	$('.clock').FlipClock(diff,{
		clockFace: 'DailyCounter',
		countdown: true,
		showSeconds: false
	});
	
	$('.flip-clock-divider.days .flip-clock-label').text('Дней');
	$('.flip-clock-divider.hours .flip-clock-label').text('Часов');
	$('.flip-clock-divider.minutes .flip-clock-label').text('Мин');

	$('#music_bar_mobile .loudness_music').on('click', function(){
		$('.music_right_settings_list').toggleClass('loudness_music_active');
	});

//	$('.video_bar_slider .video_bar_item').on('click', function(){
//		$('.opened_video_list.slider-nav').slick('refresh');
//	});

	$('#music_bar_mobile_scroll').on('click', function(){
		$('body').addClass('mobile_bar_scroll');
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

    $('.opened_video_bar').on('mouseup','.toggle_video_list', function(){
		$('#music_bar').removeClass();
		$('#music_bar').addClass('music_bar');
		$('#music_bar .music_type_list ul li').removeClass('active');
		$('.type_radio').addClass('active');
        $('.pleer_bg_slider').slick('reinit');
	});
    $('.opened_video_bar .music_right_settings_list').on('click','.loop_music', function(){
        $('.opened_video_bar .music_right_settings').toggleClass('loop_music_active');
    });

    // $('.opened_video_bar .music_right_settings_list').on('click','.cross_music', function(){
    //     $('.opened_video_bar .music_right_settings').toggleClass('cross_music_active');
    // });

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

	$('.video_bar_slider').slick({
        infinite: true,
		arrows: false,
		dots: false,
		slidesToShow: 6,
		slidesToScroll: 2,
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

	$('#video_bar_tabs ul li').on('click', function(){
		$('.video_bar_slider').slick('refresh');
	});

	$('.video_bar_slider .video_bar_item').on('click', function(){
        if($(this).hasClass('subs')){return false;}
        if(tmScrl==1){
		$('#music_bar').removeClass('video_bar_active');
		$('#music_bar').addClass('opened_video');
        }

	});

	$('#our_prog_slider_box .our_prog_slider').slick({
		arrows: true,
		dots: true,
		autoplay: false
	});

	$('.index_video_slider').slick({
		arrows: false,
		dots: true,
		autoplay: false
	});

	$('.articles_slider').slick({
		arrows: true,
		dots: true,
		autoplay: true,
		/*adaptiveHeight: true*/
	});

	$('.daily_video_slider').slick({
		arrows: true,
		dots: true,
		autoplay: true,
        autoplaySpeed: 4000
	});

	$('#music_bar .music_type_list ul li').on('click', function(){
		$('#music_bar .music_type_list ul li').removeClass('active');
		$(this).addClass('active');
	});

	$('#music_bar_mobile .music_type_list ul li').on('click', function(){
		$('#music_bar_mobile .music_type_list ul li').removeClass('active');
		$(this).addClass('active');
	});

	$('.login_box').on('click', 'span', function(){
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
		$('header').removeClass('log_opened');
	});

	$('body').on('click', function(e) {
        if($(e.target).closest('#header_bar .search').length == 0) {
           $('#header_bar').removeClass('search_active');
        }
        if($(e.target).closest('.unreg_link,.unreg_link.mob_reg_btn,.register_popup').length == 0) {
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

	$('.likes_list ul, .scrolled, .subs_container, .audio_playlist_bottom .index_music_container, .tnx_container, .index_music .index_music_container ul, #audio_item .audio_item_top .index_music_container, .opened_video_list_wrap').perfectScrollbar({
		suppressScrollX: true
	});

	$(document).on('click','.close_login_form', function(){
		$('#header_bar').removeClass('logging');
		$('header').removeClass('log_opened');
		$('#music_bar').removeClass('login_opened');
	});

	$('#header_bar').on('mouseup', '.settings', function(e){
		$('#header_bar').toggleClass('settings_active');
		$('#header_bar').removeClass('search_active');
		$('#header_bar').removeClass('likes_active');
        $('#music_bar').toggleClass('settings_active');
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

    $('.right_bar .music_right_settings .music_right_settings_list .cross_music').on('click', function(){
        if($(this).parents('#music_bar').hasClass('playlist_active'))$('#music_bar.playlist_active .container .right_bar .music_right_settings').toggleClass('cross_music_active');
    });
	$('.right_bar .music_right_settings .music_right_settings_list .loop_music').on('click', function(){
		if($(this).parents('#music_bar').hasClass('playlist_active'))$('#music_bar.playlist_active .container .right_bar .music_right_settings').toggleClass('loop_music_active');
	});

	$('#music_bar .music_right_settings .loudness_music').on('click', function(){
		$('.music_right_settings').toggleClass('loudness_music_active');
	});

	$('#music_bar .music_left_bar .music_left_bar_list').on('click','.music_left_bar_item', function(){
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

	$('#music_bar .music_right_bar .music_right_bar_list').on('click','.music_right_bar_item', function(){
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

	
	$('input[name="REGISTER[PERSONAL_MOBILE]"]').keyup(function(e){
	  if (/\D/g.test(this.value))
	  {
	    this.value = this.value.replace(/\D/g, '');
	  }
	});

	$('.unreg_link').on('click', function(){
		$('.register_popup_container').fadeIn(200);
		$('body').css({'position':'fixed'});
	});

	$('.close_popup, .close_tnx_popup').on('click', function(){
		$('.register_popup_container, .tnx_popup_container, .subs_popup_container, .paylk_popup_container, .failpay_popup_container').fadeOut(200);
		$('body').css({'position':'relative'});
        $('form.opros_form').submit();
        console.log($(this).attr('class'));
	});

    $('.add_balance').on('click', function(){
        $('.paylk_popup_container').fadeIn(200);
        return false;
    });

	$('#music_bar .more_info .actives_list .bar_img.bar_like').on('click', function(){
		$(this).toggleClass('active');
	});

	$('#music_bar .music_menu').on('click', function(){
		$('#music_bar').toggleClass('bar_list_active');
		$('#music_bar').toggleClass('categories_active');
	});

	$('.pleer_bg_slider').slick({
		slidesToShow: 1,
	    slidesToScroll: 1,
	    prevArrow: $('.prev_song'),
      	nextArrow: $('.next_song'),
	    dots: false
	});
    $('.prev_song').attr('style','');
    $('.next_song').attr('style','');

	$('.slider-for').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  dots: false,
	  fade: true,
	  asNavFor: '.slider-nav'
	});

//	$('.slider-nav').slick({
//	  slidesToShow: 5,
//	  slidesToScroll: 1,
//	  asNavFor: '.slider-for',
//	  dots: false,
//	  arrows: false,
//	  centerMode: false,
//	  focusOnSelect: true,
//	  vertical: true,
//	  swipe: true
//	});

	$('.music_type_list ul li.type_tv').on('click', function(){
		$('#music_bar').removeClass();
		$('#music_bar').addClass('music_bar');
		$('#music_bar').addClass('efir_bar_active');
//		$('.slider-nav').slick('refresh');
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
		/*$('.slider-nav .slick-slide').eq(0).addClass('slick-active');*/
		/*$('#music_bar').removeClass('playlist_active');*/
	});

	$('.only_subs, .subs').on('click', function(e){
        e.preventDefault();
		$('.subs_popup_container').fadeIn(200);
	});

	$('.news_slider_box .news_box .news_item a.subs').on('click', function(e){
        e.preventDefault();
		$('.subs_popup_container').fadeIn(200);
	});

	$('.opros_form,.data_info').on('submit', function(e){
		var hid_in_val = $('#for_bots').val();
		if(hid_in_val == ''){

		} else{
			e.preventDefault();
		}
	});

    // $('.opros_form,.data_info').on('submit', function(e){
    //     e.preventDefault();
    //     console.log('submit data_info');
    //     var hid_in_val = $('#for_bots').val();
    //     if(hid_in_val == ''){
    //         if($(this).children('[type="email"]').length>0){
    //             var vMail=$(this).children('[type="email"]').val();
    //             var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    //             if(reg.test(vMail) == false){
    //
    //                 $(this).children('[type="email"]').attr('oninvalid','setCustomValidity("Не верный формат email")');
    //                 $(this).children('[type="email"]').attr('id','email');
    //                 document.getElementById('email').setCustomValidity("Не верный формат email");
    //                 $(this).children('button').click();
    //                 return false;
    //             }
    //         }
    //         $(this).submit();
    //     } else{
    //         return false;
    //     }
    //
    // });

	var vh = $(window).height();
	$('.register_popup_scroll').css({'max-height': vh - 120});
	$('.subs_container').css({'max-height': vh - 50});
	$('.tnx_container').css({'max-height': vh - 220});

	$(window).on('scroll', function(){
		var fromTop = $(this).scrollTop();
		if(fromTop > 80){
			$('body').addClass('fixed_header');
			$('header').removeClass('log_opened');
			$('#music_bar').removeClass('login_opened');
			$('#header_bar').removeClass('logging');
			$('body').removeClass('mobile_bar_scroll');
		} else{
			$('body').removeClass('fixed_header');
		}
	});

    $('div.right_soc a').click(function(e){
//        e.preventDefault();
//        console.log($(this).find('span.numb'));
        var name=$(this).data('name')+'_'+$('div.right_soc').data('name');
        $(this).find('span.numb').load(
            "/ajax/set-soc-count.php",
            {
                name: name
            });
    });

    $('.send_opros').on('click', function(e){
        e.preventDefault();
        var noteError=0;
        $('.note_req').remove();
        $('.ask_block').each(function(){
            if($(this).find('.starrequired').length>0){
                if($(this).find('input').length>0){
                    if($(this).find('input:checked').length<=0 && $(this).find('input[type="text"]').val().length<=0){
                        $(this).css('position','relative');
                        $(this).prepend('<div class="note_req" style="color: red;position: absolute;top:25px;left:90px">Необходимо ответить на этот вопрос.</div>');
                        noteError=1;
                    }
                }
            }else{
                if($('.ask_block').find('input:checked').length<=0 && $('.ask_block').find('input[type="text"]').val().length<=0){
                    $('.ask_block:first').css('position','relative');
                    $('.ask_block:first').prepend('<div class="note_req" style="color: red;position: absolute;top:25px;left:90px">Необходимо ответить хотя бы на один вопрос.</div>');
                    noteError=1;
                }
            }


        });
        if(noteError==0){
            $('.tnx_popup_container.opros').css('display','block');
        }else{
            var scrTop=$('.note_req:first').offset().top;
            $(document).scrollTop(scrTop-200);
        }
    });

//player ajax $('#player_ajax a')
    $(document).on('click', 'a:not(.logOut)', function(d){
        d.preventDefault();
        var link=$(this).attr('href');
        $.ajax({
            type: "POST",
            url: link,
            data: "PLAYER_AJAX=Y",
            success: function(page){
                $('.right_soc').nextUntil("footer").remove();
                $('footer').before(page);
                $('body,html').animate({
                    scrollTop: 0
                }, 100);
                document.title = pageTitle;
                history.pushState({"html":link, "pageTitle":pageTitle}, '', link);console.log(link);
                /*active menu point*/
                var arLink=link.split('/');
                if(headerBg.length>0)$('.page_top_bg').css('background-image','url('+headerBg+')');
                $('.header_top_menu li.selected').removeClass('selected');
                $('.header_top_menu').find('a[href="/'+arLink[1]+'/"]').parent('li').addClass('selected');

                /*index page*/
                if( $("#index-tv-container").length ) {
                    jwIVS = jwplayer(INDEX_TV_PLAYER_ID).setup({
                        "file": TV_URL,
                        "controls": true,
                        "aspectratio": '16:9',
                        "width": '100%',
                        "height": '265',
                        "volume": jwVSVolume
                    }).play();
                }
                $('.index_music_container ul').perfectScrollbar({
                    suppressScrollX: true
                });

                /*video page*/
                $('.daily_video_slider').slick({
                    arrows: true,
                    dots: true,
                    autoplay: true,
                    autoplaySpeed: 4000
                });

                /*audio page*/
                $('.tabs ul li').on('click', function(){
                    var this_attr = $(this).attr('data-id');
                    var this_id = $(this).parent().parent().attr('id');
                    if($(this).parent().parent().parent().hasClass('all_song_category')){
                        if(this_attr==="all"){
                            $('#'+ this_id +'.tabs ul li').not('[data-id="all"]').removeClass('active');
                            $(this).addClass('active');
                            $('.likes_list ul li').css('display', 'block');
                        }else{
                            $('.likes_list ul li').css('display', 'none');
                            $('#'+ this_id +'.tabs ul li[data-id="all"]').removeClass('active');
                            $(this).toggleClass('active');
                            if($('#'+ this_id +'.tabs ul li.active').not('[data-id="all"]').length<=0) {
                                $('#'+ this_id +'.tabs ul li[data-id="all"]').addClass('active');
                                $('.likes_list ul li').css('display', 'block');
                            }else{
                                $('#'+ this_id +'.tabs ul li.active').each(function(){
                                    $('.likes_list ul li.tab_'+$(this).attr('data-id')).css('display', 'block');
                                });

                            }
                        }
                        $('.likes_list ul').slick('slickGoTo',1);
                    }else{
                        $('.tab_container[data-id="'+ this_id +'"]').removeClass('active');
                        $('#'+ this_id +'.tabs ul li').removeClass('active');
                        $(this).addClass('active');
                        $('.tab_container[data-attr="'+ this_attr +'"][data-id="'+ this_id +'"]').addClass('active');
                    }

                    // custom
                    if( this_id == 'video_bar_tabs' ) $('.tab_container.active .video_bar_slider').slick('refresh');
                });

                /*programm page*/
                $('.index_video_slider, #our_prog_slider_box .our_prog_slider').slick({
                    arrows: false,
                    dots: true,
                    autoplay: true
                });

                /*stati page*/
                $('.articles_slider').slick({
                    arrows: false,
                    dots: true,
                    autoplay: true
                });
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
            }
        });
    });
    $(document).on('click', 'a.logOut', function(d) {
        d.preventDefault();
        $.ajax({
            type: "POST",
            url: '/ajax/get-to-login.php',
            data: 'logout=yes&PLAYER_AJAX=Y',
            success: function (el) {
                $('#header_bar .reg_bar').remove();
                $('#header_bar .search').before(el);
                $('.logo a:visible').click();

            }
        });
    });

    $('form[name="form_auth"]').submit(function () {
        $('form[name="form_auth"] button').click();
    });
    $('form[name="form_auth"] button').click(function(e){
        e.preventDefault();
        var strData='';
        $(this).parent('form').children('input').each(function () {
            strData+=$(this).attr('name')+'='+$(this).val()+'&';
        });
        $.ajax({
            type: "POST",
            url: '/ajax/get-to-login.php',
            data: strData+'PLAYER_AJAX=Y',
            success: function (el) {
                $('.unreg_container').remove();
                $('#header_bar .search').before(el);
                $('#header_bar .reg_bar').css('display','block');
                $('.logo a:visible').click();
            }
        });
    });

    $('form.search_form').submit(function () {
        $('form[name="form_auth"] button').click();
    });
    $('form.search_form button').click(function(e){
        e.preventDefault();
        var strData='';
        $(this).parent('form').children('input').each(function () {
            strData+=$(this).attr('name')+'='+$(this).val()+'&';
        });
        $.ajax({
            type: "POST",
            url: '/search/',
            data: strData+'PLAYER_AJAX=Y',
            success: function (page) {
                $('.right_soc').nextUntil("footer").remove();
                $('footer').before(page);
                $('body,html').animate({
                    scrollTop: 0
                }, 100);
                document.title = pageTitle;
                history.pushState({"html":link, "pageTitle":pageTitle}, '', link);console.log(link);
                /*active menu point*/
                var arLink=link.split('/');
                if(headerBg.length>0)$('.page_top_bg').css('background-image','url('+headerBg+')');
                $('.header_top_menu li.selected').removeClass('selected');
                $('.header_top_menu').find('a[href="/'+arLink[1]+'/"]').parent('li').addClass('selected');
            }
        });
    });
});
