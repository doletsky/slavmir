var loading = false;

$(document).ready(function(){

	$(document).on('click',".register-enter",function(){
		$(".register_popup_container").hide();
		$("#header_bar").addClass("logging");
		return false;
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

});