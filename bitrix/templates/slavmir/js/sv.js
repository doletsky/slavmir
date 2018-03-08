var loading = false;

$(document).ready(function(){

	// detect IE8 and above, and Edge
	if (document.documentMode || /Edge/.test(navigator.userAgent)) {
		$('body').on("mousewheel", function () {
	        // remove default behavior
	        event.preventDefault(); 

	        //scroll without smoothing
	        var wheelDelta = event.wheelDelta;
	        var currentScrollPosition = window.pageYOffset;
	        window.scrollTo(0, currentScrollPosition - wheelDelta);
	    });
	}

	$('.related_art_box .rel_art_item a').on('click', function(e){
		if($(this).hasClass('subs')){
			e.preventDefault();
			$('.subs_popup_container').fadeIn(300);
		}
	});

	$(document).on('click',".register-enter",function(){
        if(!isMobile){
            $(".register_popup_container").hide();
            $("#header_bar").addClass("logging");
            return false;
        }

	});
	$(document).on('click',".auth-registr-form",function(){
		$(".register_popup_container").show();
		$("#header_bar").removeClass("logging");
		return false;
	});
	$(document).on('click',"#lk_section .no_photo .no_photo_img,#lk_section .no_photo .add-photo",function(){
		$("#lk_section .no_photo input").trigger("click");
		return false;
	});
	

	$(document).on("click",".more",function(){
		if (loading) return;

		var $this = $(this),
				$href = $this.attr("data-href");
		
		$this.addClass('loading');
		loading = true;
		
		$.ajax({
			type: "GET",
			url: $href,
			success: function(data){
				var $data = $(data);
				$data.insertBefore($this);
			},
			error:function(){
				console.error("ajax load error");
			},
			complete:function(){
				$this.removeClass('loading');
				loading = false;
				$this.remove();
			}
		});
		
		return false;
	});

	// from line 122
	/*$('#video_bar_tabs ul li').on('click', function(){
		$('.tab_container.active .video_bar_slider').slick('refresh');
	});*/

	// from line 240
	$('.tabs ul li').on('click', function(){
		var this_attr = $(this).attr('data-id');
		var this_id = $(this).parent().parent().attr('id');
		$('.tab_container[data-id="'+ this_id +'"]').removeClass('active');
		$('#'+ this_id +'.tabs ul li').removeClass('active');
		$(this).addClass('active');
		$('.tab_container[data-attr="'+ this_attr +'"][data-id="'+ this_id +'"]').addClass('active');
		// custom
		if( this_id == 'video_bar_tabs' ) $('.tab_container.active .video_bar_slider').slick('refresh');
	});

    //активирует popup благодарности за опрос
    if($('ol.voting-result-box').data('result')==1) $('.tnx_popup_container.opros').css('display','block');
});