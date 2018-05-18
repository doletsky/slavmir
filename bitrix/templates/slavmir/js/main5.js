TV_EFIR = 'https://n1.slavmir.tv/live/ngrp:Cinegy.stream_all/playlist.m3u8';
// TV_EFIR = '//content.jwplatform.com/manifests/vM7nH0Kl.m3u8';

$(document).on('ready', function(){

    $('.video_bar_item.pl-video-play').mousedown(function () {
        if (tmScrl == 1) {
            setTimeout(function () {
                tmScrl = 0;
            }, 300);
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
    var futureDate = new Date(2018,04,08,14,00,00); // (yyyy,m,d) //
    var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;

    if(diff < 0) {
        diff = 0;
    }

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

    // $('#header_bar .to_login form .login_btn').on('click', function(){
    //     $('header').removeClass('log_opened');
    //     $('#music_bar').removeClass('login_opened');
    //     location.reload();
    // });

    $('.opened_video_bar').on('click','.toggle_video_list', function(){
        $('#music_bar').removeClass();
        $('#music_bar').addClass('music_bar');
        $('#music_bar .music_type_list ul li').removeClass('active');
        $('.type_radio').addClass('active');
        $('.pleer_bg_slider').slick('reinit');
    });

    $('.opened_video_bar .music_right_settings_list').on('click','.loop_music', function(){
        $('.opened_video_bar .music_right_settings').toggleClass('loop_music_active');
    });

    $('#music_bar_mobile .music_menu').on('click', function(){
        $('#music_bar_mobile').toggleClass('menu_active');
    });

    $('.opened_video_bar_info .right .video_bar_like').on('click', function(){
        $(this).toggleClass('active');
    });

    $('.video_bar_play .next_btn').on('click', function(){
        $(this).toggleClass('active');
    });

    $('.opened_video_bar_main .opened_video_bar_main_img .play_btn').on('click', function(){
        $(this).toggleClass('active');
    });

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
        autoplay: true
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

    $(document).on('click', '.login_box>span', function(){
        $('#music_bar').toggleClass('login_opened');
        $('header').toggleClass('log_opened');
        $('#header_bar').toggleClass('logging');
    });

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

    $('.mobile_menu').on('click', 'li', function () {
        $('header .header_top_menu .burger').click();
    });

    $('.mobile_menu').on('click', '.mob_reg_btn:not(.unreg_link)', function () {
        $('header .header_top_menu .burger').click();
    });

    $('.mobile_menu').on('click', '.mobile_search>button', function () {
        $('header .header_top_menu .burger').click();
    });

    $(document).on('click', '.register-enter', function () {
        $(this).parents('.register_popup_scroll').children('.close_popup').click();
        $('header .header_top_menu .burger.active').click();
    } );

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

    $(document).on('click','.close_popup', function () {
        $('.register_popup_container, .tnx_popup_container, .subs_popup_container, .paylk_popup_container, .failpay_popup_container').fadeOut(200);
        $('body').css({'position':'relative'});
        if($(this).hasClass('opros').length>0){
            opros_form_submit();
        }
    });

    $(document).on('click','.close_tnx_popup', function(){
        $('.register_popup_container, .tnx_popup_container, .subs_popup_container, .paylk_popup_container, .failpay_popup_container').fadeOut(200);
        $('body').css({'position':'relative'});
        if($(this).hasClass('opros').length>0){
            opros_form_submit();
        }
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

    $('.music_type_list ul li.type_tv').on('click', function(){
        $('#music_bar').removeClass();
        $('#music_bar').addClass('music_bar');
        $('#music_bar').addClass('efir_bar_active');
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
        var name=$(this).data('name')+'_'+$('div.right_soc').data('name');
        $(this).find('span.numb').load(
            "/ajax/set-soc-count.php",
            {
                name: name
            });
    });

    $(document).on('click', '.send_opros', function(e){
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
    $('.tarif_top_list .tarif_top_item').on('click', function (e) {
        if ($(e.target).is('a'))
            return;
        var elId = $(this).data('id');
        var boxId = '#tarif_descr_' + elId;
        if ($(boxId).length)
            $.fancybox.open({
                src: boxId,
            });
    });
    $('.tariff_buy').on('click', function (e) {
        e.preventDefault();
        var tariffId = $(this).parent().data('id');

        BX.ajax({
            url: '/ajax/tariff-buy.php',
            data: {'act': 'set-tariff', 'id': tariffId},
            method: 'POST',
            dataType: 'json',
            timeout: 30,
            async: true,
            processData: true,
            scriptsRunFirst: true,
            emulateOnload: true,
            start: true,
            cache: false,
            onsuccess: function (data) {
                console.log(data);
                console.log('success');
                if (data.response) {
                    $('.tariff_buy').off();
                    location = "/personal";
                }
            },
            onfailure: function () {
            }
        });
    });
    (function () {
        var elPopup = $('.paylk_popup_container.addition');
        if (elPopup.length) {
            BX.ajax.post(
                '/ajax/tariff-buy.php',
                {'act': 'get-tariff-data'},
                function (data) {
                    var data = BX.parseJSON(data);
                    elPopup.find('.main_text').html('Недостаточно средств для активации тарифа "' + data.NAME + '". Стоимость тарифа ' + data.PRICE + ' ₽. Необходимо пополнить счет на ' + data.PAYMENT_AMOUNT + ' ₽');
                    elPopup.fadeIn();
                });
            $('.paylk_popup_container.addition .close_popup').on('click', function () {
                BX.ajax.post(
                    '/ajax/tariff-buy.php',
                    {'act': 'activate-cancel'},
                    function () {
                        elPopup.fadeOut();
                    }
                );
            });
        }
    })();
    (function () {
        var elPopup = $('.tariff_confirmation_popup_container');
        if (elPopup.length) {
            BX.ajax.post(
                '/ajax/tariff-buy.php',
                {'act': 'get-tariff-data'},
                function (data) {
                    var data = BX.parseJSON(data);
                    elPopup.find('.main_text').html('Будет активирован тариф "' + data.NAME + '". Произойдет списание средств в размере ' + data.PRICE + ' ₽.');
                    elPopup.fadeIn();
                });
            $('.tariff_confirmation_popup_container .close_popup').on('click', function () {
                BX.ajax.post(
                    '/ajax/tariff-buy.php',
                    {'act': 'activate-cancel'},
                    function () {
                        elPopup.fadeOut();
                    }
                );
            });
            $('.tariff_confirmation_popup_container .tariff_activate').on('click', function (e) {
                e.preventDefault();
                BX.ajax.post(
                    '/ajax/tariff-buy.php',
                    {'act': 'activate-tariff'},
                    function () {
                        location.reload();
                    }
                );
            });
        }
    })();
    $(document).on('click', 'a:not(.logOut):not(.pl-audio-play):not(.social-menu-link):not(.mob_logOut)', function(d){
        if($(this).parents(".right_soc").length>0)return true;
        if($(this).parents(".answer_text").length>0)return false;
        if (~$(this).attr('href').indexOf(".pdf")) {
            window.open( $(this).attr('href') );
            return false;
        }
        if (~$(this).attr('href').indexOf("/tarify/")) {
            location.href= $(this).attr('href');
            return false;
        }
        if (~$(this).attr('href').indexOf("/lichnoe/")) {
            location.href= $(this).attr('href');
            return false;
        }
        d.preventDefault();
        if($(this).hasClass('register-enter')) {
            if($('.unreg_container:visible').length>0){
                return false;
            }
        }
        var link=$(this).attr('href');
        var historyGo=$(this).hasClass('historyGo');
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
                if(!historyGo)
                    history.pushState({"html":link, "pageTitle":pageTitle}, '', link);

                /*active menu point*/
                var arLink=link.split('/');
                if(headerBg.length > 0)
                	$('.page_top_bg').css('background-image','url('+headerBg+')');
                $('.header_top_menu li.selected').removeClass('selected');
                $('.header_top_menu').find('a[href="/'+arLink[1]+'/"]').parent('li').addClass('selected');



               

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
               
                if( $("#index-tv-container").length ) {
                	
                    var playerInstance = jwplayer('index-tv-container');
                   
                    playerInstance.setup({
                        file: 'https://n1.slavmir.tv/live/ngrp:Cinegy.stream_all/playlist.m3u8 ',
                        controls: true,
                        width: '100%',
                        autostart: true,
                        mute: true,
                        height: '265'
                    });

                    playerInstance.on('play', function() {
                        jw.stop();
                        jwplayer('tv-container').play(false);
                        jwplayer('m-tv-container').play(false);
                        setPlayerStatus( 'stop' );
                    });
                   
                    if ($(window).width() >= 1024) {
                        // player dom elements
                        var playerContainerEl = document.querySelector('.player-container');

                        // returns video player position from top of document
                        function getElementOffsetTop(el) {
                            var boundingClientRect = el.getBoundingClientRect();
                            var bodyEl = document.body;
                            var docEl = document.documentElement;
                            var scrollTop = window.pageYOffset || docEl.scrollTop || bodyEl.scrollTop;
                            var clientTop = docEl.clientTop || bodyEl.clientTop || 0;
                            return Math.round(boundingClientRect.top + scrollTop - clientTop);
                        }

                        //
                        // returns the current y scroll position
                        function getScrollTop() {
                            var docEl = document.documentElement;
                            return (window.pageYOffset || docEl.scrollTop) - (docEl.clientTop || 0);
                        }

                        //
                        // when jwplayer instance is ready
                        playerInstance.on('ready', function () {
                            var config = playerInstance.getConfig();
                            var utils = playerInstance.utils;
                            // get height of player element
                            var playerHeight = config.containerHeight;

                            // get player element position from top of document
                            var playerOffsetTop = getElementOffsetTop(playerContainerEl);

                            // set player container to match height of actual video element
                            // this prevents container from disappearing and changing element positions
                            // on page when player becomes minimized. this also leaves a nice visual
                            // placeholder space for minimized player to return to when appropriate
                            playerContainerEl.style.height = playerHeight + 'px';
                            //
                            // below we handle window scroll event without killing performance
                            // this is a minimal approach. please consider implementing something more extensive:
                            // i.e. http://joji.me/en-us/blog/how-to-develop-high-performance-onscroll-event
                            //
                            // determine player display when scroll event is called
                            // if inline player is no longer visible in viewport, add class
                            // .player-minimize to minimize and float. otherwise, remove the class to put
                            // player back to inline inline position
                            function onScrollViewHandler() {
                                var minimize = getScrollTop() >= playerOffsetTop;
                                //
                                utils.toggleClass(playerContainerEl, 'player-minimize', minimize);
                                // update the player's size so the controls are adjusted
                                playerInstance.resize();
                            }

                            //
                            // namespace for whether or not we are waiting for setTimeout() to finish
                            var isScrollTimeout = false;
                            //
                            // window onscroll event handler
                            window.onscroll = function () {
                                // skip if we're waiting on a scroll update timeout to finish
                                if (isScrollTimeout) return;
                                // flag that a new timeout will begin
                                isScrollTimeout = true;
                                // otherwise, call scroll event view handler
                                onScrollViewHandler();
                                // set new timeout
                                setTimeout(function () {
                                    // reset timeout flag to false (no longer waiting)
                                    isScrollTimeout = false;
                                }, 80);

                            };

                        });
                    }
                }
            }
        });
    });

    // $(document).on('click', 'a.logOut', function(d) {
    //     d.preventDefault();
    //     $.ajax({type:"POST", url:"/ajax/get-logout.php", success:function(){location.href="/";}});
    // });
    //
    // $(document).on('click', 'a.mob_logOut', function(d) {
    //     d.preventDefault();
    //     $.ajax({type:"POST", url:"/ajax/get-logout.php", success:function(){location.href="/";}});
    // });

    $(document).on('submit', 'form[name="form_auth"]', function () {
        $('form[name="form_auth"] button').click();
    });

    // $('#header_bar').on('click', 'form[name="form_auth"]> button', function(e){
    //     var fValid=true;
    //     var strData='';
    //     $(this).parent('form').children('input').each(function () {
    //         if($(this).attr('required')=='required' && $(this).val().length<=0) {
    //             console.log('required val=0');
    //             fValid=false;
    //             $(this).attr('oninvalid',"this.setCustomValidity('Пожалуйста, заполните это поле')");
    //             return false;
    //         }
    //         strData+=$(this).attr('name')+'='+$(this).val()+'&';
    //     });
    //     if(fValid){
    //         e.preventDefault();
    //         $.ajax({
    //             type: "POST",
    //             url: '/ajax/get-to-login.php',
    //             data: strData+'PLAYER_AJAX=Y',
    //             success: function (el) {
    //                 $('.unreg_container').remove();
    //                 $('#header_bar .search').before(el);
    //                 $('#header_bar .reg_bar').css('display','block');
    //                 $('.mobile_search').nextAll().remove();
    //                 var lgn='<div class="logged_bar">';
    //                 lgn+='<span class="user_img" style="background-image: url(/bitrix/templates/slavmir/images/mobile_menu_user.png);"></span>';
    //                 lgn+='<span class="user_name">'+$('#header_bar').find('.user_name').text()+'</span>';
    //                 lgn+='<span class="likes dn">14</span>';
    //                 lgn+='<a href="?logout=yes" class="mob_reg_btn">Выйти</a>';
    //                 lgn+='<a class="settings" href="/lichnoe/"></a>';
    //                 lgn+='<span class="clear"></span></div>';
    //                 $('.mobile_search').append(lgn);
    //                 $('.logo a:visible').click();
    //             }});
    //     }
    // });


    $('form.search_form').submit(function () {
        $('form.search_form button').click();
    });

    $('form.mobile_search button, form.search_form button').click(function(e){
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
                history.pushState({"html":'/search/?'+strData, "pageTitle":pageTitle}, '', '/search/?'+strData);
                /*active menu point*/
                if(headerBg.length>0)$('.page_top_bg').css('background-image','url('+headerBg+')');
            }
        });
    });

    $(document).on('click', 'form.contacts_form>button', function (e) {
        e.preventDefault();
        var strData='';
        var link=$('form.contacts_form').attr('action');
        $('form.contacts_form input').each(function () {
            if($(this))
                strData+=$(this).attr('name')+'='+$(this).val()+'&';
        });
        $('form.contacts_form textarea').each(function () {
            var lines = $(this).val();
            var name=$(this).attr('name');
            strData+=name+'='+lines+'&';
        });
        var reqHdr;
        reqHdr=$.ajax({
            type: "POST",
            url: '/ajax/get-feedback.php',
            data: strData+'PLAYER_AJAX=Y',
            success: function (ans) {
                if($.parseJSON(ans).error.length==0){
                    $.ajax({
                        type: "POST",
                        url: '/kontakty/',
                        data: $.parseJSON(ans).success + '&PLAYER_AJAX=Y',
                        success: function (page) {
                            $('.right_soc').nextUntil("footer").remove();
                            $('footer').before(page);
                        }
                    });
                }

            }

        });
    });

    $(document).on('click', 'form.my_comment.active>button', function (e) {
        e.preventDefault();
        var thisTop=$(this).offset().top;
        var link=$(this).parent('form.my_comment.active').attr('action');
        var strData='';
        $(this).parent('form.my_comment.active').children('input').each(function () {
            strData+=$(this).attr('name')+'='+$(this).val()+'&';
        });
        $.ajax({
            type: "POST",
            url: '/ajax/get-add-message.php',
            data: strData+'PLAYER_AJAX=Y',
            success: function (p) {
                console.log(p);
                $.ajax({
                    type: "POST",
                    url: link,
                    data: 'PLAYER_AJAX=Y',
                    success: function (page) {
                        $('.right_soc').nextUntil("footer").remove();
                        $('footer').before(page);
                        $('body,html').animate({
                            scrollTop: thisTop-350
                        }, 100);
                        document.title = pageTitle;

                        /*active menu point*/
                        if (headerBg.length > 0) $('.page_top_bg').css('background-image', 'url(' + headerBg + ')');
                    }
                });
            }
        });
    });

    $(document).on('click', 'button.what_you_think_sbt', function (e) {
        e.preventDefault();
        var thisTop=$(this).offset().top;
        var link=$(this).parent('form.active').attr('action');
        var strData='';
        $(this).parent('form.active').children('input').each(function () {
            strData+=$(this).attr('name')+'='+$(this).val()+'&';
        });
        $.ajax({
            type: "POST",
            url: '/ajax/get-add-message.php',
            data: strData+'PLAYER_AJAX=Y',
            success: function (p) {
                console.log(p);
                $.ajax({
                    type: "POST",
                    url: link,
                    data: 'PLAYER_AJAX=Y',
                    success: function (page) {
                        $('.right_soc').nextUntil("footer").remove();
                        $('footer').before(page);
                        $('body,html').animate({
                            scrollTop: thisTop-350
                        }, 100);
                        document.title = pageTitle;

                        /*active menu point*/
                        if (headerBg.length > 0) $('.page_top_bg').css('background-image', 'url(' + headerBg + ')');
                    }
                });
            }
        });
    });

    function opros_form_submit(){
        var strData='';
        var link=$('form.opros_form').attr('action');console.log(link);

        $('form.opros_form').children('input[type="hidden"]').each(function () {
            strData+=$(this).attr('name')+'='+$(this).val()+'&';
        });

        $('form.opros_form').find('input[type="text"]').each(function () {
            strData+=$(this).attr('name')+'='+$(this).val()+'&';
        });

        $('form.opros_form').find('input:checked').each(function () {
            strData+=$(this).attr('name')+'='+$(this).val()+'&';
        });

        $.ajax({
            type: "POST",
            url: link,
            data: strData+'PLAYER_AJAX=Y',
            success: function (page) {
                $('.right_soc').nextUntil("footer").remove();
                $('footer').before(page);
                $('body,html').animate({
                    scrollTop: 0
                }, 100);
                document.title = pageTitle;

                /*active menu point*/
                var arLink=link.split('/');
                if(headerBg.length>0)$('.page_top_bg').css('background-image','url('+headerBg+')');
                $('.header_top_menu li.selected').removeClass('selected');
                $('.header_top_menu').find('a[href="/'+arLink[1]+'/"]').parent('li').addClass('selected');
            }
        });
    }

    window.addEventListener('popstate', function(event) {
        $('footer').before('<a id="historyGo" class="historyGo" href="'+event.state.html+'"></a>');
        $('#historyGo').click();
    });

    /*  ================================ T V ========================================= */



    var menu_efir = jwplayer('tv-container');
    menu_efir.setup({
        file: TV_EFIR,
        controls: true,
        width: '55%',
        height: '500'
    });
    menu_efir.on('play', function() {
        jw.stop();
        jwplayer('index-tv-container').play(false);
        setPlayerStatus( 'stop' );
        console.log(playerInstance.getState());
    });

    var mobile_menu_efir = jwplayer('m-tv-container');
    mobile_menu_efir.setup({
        file: TV_EFIR,
        controls: true,
        width: '110%',
        height: '500'
    });
    mobile_menu_efir.on('play', function() {
        jw.stop();
        jwplayer('index-tv-container').play(false);
        setPlayerStatus( 'stop' );
        console.log(playerInstance.getState());
    });

    var current = 0;

    if( $("#index-tv-container").length ) {
    	
        var playerInstance = jwplayer('index-tv-container');
       
        playerInstance.setup({
            file: TV_EFIR,
            controls: true,
            width: '100%',
            autostart: true,
            mute: true,
            height: '265'
        });

        playerInstance.on('play', function() {
            jw.stop();
            jwplayer('tv-container').play(false);
            jwplayer('m-tv-container').play(false);
            setPlayerStatus( 'stop' );
        });
        
        if ($(window).width() >= 1024) {
            // player dom elements
            var playerContainerEl = document.querySelector('.player-container');

            // returns video player position from top of document
            function getElementOffsetTop(el) {
                var boundingClientRect = el.getBoundingClientRect();
                var bodyEl = document.body;
                var docEl = document.documentElement;
                var scrollTop = window.pageYOffset || docEl.scrollTop || bodyEl.scrollTop;
                var clientTop = docEl.clientTop || bodyEl.clientTop || 0;
                return Math.round(boundingClientRect.top + scrollTop - clientTop);
            }

            //
            // returns the current y scroll position
            function getScrollTop() {
                var docEl = document.documentElement;
                return (window.pageYOffset || docEl.scrollTop) - (docEl.clientTop || 0);
            }

            //
            // when jwplayer instance is ready
            playerInstance.on('ready', function () {
                var config = playerInstance.getConfig();
                var utils = playerInstance.utils;
                // get height of player element
                var playerHeight = config.containerHeight;

                // get player element position from top of document
                var playerOffsetTop = getElementOffsetTop(playerContainerEl);

                // set player container to match height of actual video element
                // this prevents container from disappearing and changing element positions
                // on page when player becomes minimized. this also leaves a nice visual
                // placeholder space for minimized player to return to when appropriate
                playerContainerEl.style.height = playerHeight + 'px';
                //
                // below we handle window scroll event without killing performance
                // this is a minimal approach. please consider implementing something more extensive:
                // i.e. http://joji.me/en-us/blog/how-to-develop-high-performance-onscroll-event
                //
                // determine player display when scroll event is called
                // if inline player is no longer visible in viewport, add class
                // .player-minimize to minimize and float. otherwise, remove the class to put
                // player back to inline inline position
                function onScrollViewHandler() {
                    var minimize = getScrollTop() >= playerOffsetTop;
                    //
                    utils.toggleClass(playerContainerEl, 'player-minimize', minimize);
                    // update the player's size so the controls are adjusted
                    playerInstance.resize();
                }

                //
                // namespace for whether or not we are waiting for setTimeout() to finish
                var isScrollTimeout = false;
                //
                // window onscroll event handler
                window.onscroll = function () {
                    // skip if we're waiting on a scroll update timeout to finish
                    if (isScrollTimeout) return;
                    // flag that a new timeout will begin
                    isScrollTimeout = true;
                    // otherwise, call scroll event view handler
                    onScrollViewHandler();
                    // set new timeout
                    setTimeout(function () {
                        // reset timeout flag to false (no longer waiting)
                        isScrollTimeout = false;
                    }, 80);

                };

            });
        }
    }
});