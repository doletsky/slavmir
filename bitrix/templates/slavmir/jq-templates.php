<script id="music_left_bar_item_wrap_Tmpl" type="text/x-jquery-tmpl">
	<div class="music_left_bar_item_wrap">
		<div class="music_left_bar_item ${c}">
			<div class="music_name">${n}</div>
			<div class="music_group">${a}</div>
		</div>
		<div class="more_info">
			<p>АЛЬБОМ: Станичники</p>
			<p>1998</p>
			<p>4:30</p>
			<div class="actives_list">
				<div class="activity_item">
					<a href="#"><span class="bar_img bar_like"></span></a>
				</div>
				<div class="activity_item">
					<a href="#"><span class="bar_img bar_plus"></span></a>
				</div>
				<div class="activity_item">
					<a href="#"><span class="bar_img bar_download"></span></a>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="music_right_bar_item_wrap_Tmpl" type="text/x-jquery-tmpl">
	<div class="music_right_bar_item_wrap not-main">
		<div class="music_right_bar_item ${c}">
			<div class="music_name">${n}</div>
			<div class="music_group">${a}</div>
		</div>
		<div class="more_info">
			<p>АЛЬБОМ: Станичники</p>
			<p>1998</p>
			<p>4:30</p>
			<div class="actives_list">
				<div class="activity_item">
					<a href="#"><span class="bar_img bar_like"></span></a>
				</div>
				<div class="activity_item">
					<a href="#"><span class="bar_img bar_plus"></span></a>
				</div>
				<div class="activity_item">
					<a href="#"><span class="bar_img bar_download"></span></a>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="likes_list_item_Tmpl" type="text/x-jquery-tmpl">
	<li>
		<div class="likes_img pl-audio-play" style="background-image: url(${pic});" data-url="${file}" data-picture="${bigpic}">
			<div class="play_btn"></div>
		</div>
		<div class="likes_mus_info">
			<a class="likes_mus_name mus_name" href="${url}">${title}</a>
			<div class="likes_mus_group mus_group">${description}</div>
			<div class="likes_mus_bar">
				<span class="likes_list_img likes_list_img likes_list"></span>
				<span class="likes_list_img likes_like"></span>
				<a href="${file}" download=""><span class="likes_list_img likes_download"></span></a>
			</div>
			<div class="likes_mus_time">${duration}</div>
		</div>
		<div class="clear"></div>
	</li>
</script>
<script id="music_list_item_Tmpl" type="text/x-jquery-tmpl">
	<li>
		<div class="mus_wrap subs">
			<div class="mus_img pl-audio-play" style="background-image: url(${pic});" data-url="${file}" data-picture="${bigpic}">
				<div class="play_btn"></div>
			</div>
			<div class="mus_info">
				<a class="mus_name" href="${url}">${title}</a>
				<div class="mus_group">${description}</div>
				<div class="mus_bar">
					<div class="list_img"></div>
					<div class="likes"></div>
					<a href="${file}" download=""><span class="download"></span></a>
				</div>
				<div class="mus_time">${duration}</div>
			</div>
		</div>
	</li>
</script>