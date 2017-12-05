<div id="music_bar" class="music_bar radio_bar_active">
	<div class="container">
		<div class="left_bar">
			<div class="music_menu dn">
				<div class="music_bar_list_img"></div>
			</div>
			<?$APPLICATION->IncludeComponent("bitrix:news.list", "video-top", Array(
					"COMPONENT_TEMPLATE" => ".default",
					"IBLOCK_TYPE" => "catalog",	// Тип информационного блока (используется только для проверки)
					"IBLOCK_ID" => "3",	// Код информационного блока
					"NEWS_COUNT" => "99",	// Количество новостей на странице
					"SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
					"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
					"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
					"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
					"FILTER_NAME" => "",	// Фильтр
					"FIELD_CODE" => array(	// Поля
						0 => "",
						1 => "",
					),
					"PROPERTY_CODE" => array(	// Свойства
						0 => "PATH",
						1 => "",
					),
					"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
					"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
					"AJAX_MODE" => "N",	// Включить режим AJAX
					"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
					"AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
					"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
					"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
					"CACHE_TYPE" => "A",	// Тип кеширования
					"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
					"CACHE_FILTER" => "Y",	// Кешировать при установленном фильтре
					"CACHE_GROUPS" => "Y",	// Учитывать права доступа
					"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
					"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
					"SET_TITLE" => "N",	// Устанавливать заголовок страницы
					"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
					"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
					"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
					"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
					"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
					"PARENT_SECTION" => "",	// ID раздела
					"PARENT_SECTION_CODE" => "",	// Код раздела
					"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
					"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
					"DISPLAY_DATE" => "N",	// Выводить дату элемента
					"DISPLAY_NAME" => "Y",	// Выводить название элемента
					"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
					"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
					"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
					"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
					"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
					"PAGER_TITLE" => "Новости",	// Название категорий
					"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
					"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
					"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
					"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
					"SET_STATUS_404" => "N",	// Устанавливать статус 404
					"SHOW_404" => "N",	// Показ специальной страницы
					"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
				),
				false
			);?>
			<div class="opened_video_bar">
				<div class="opened_video_bar_main">
					<div class="opened_video_bar_main_img">
						<div id="video-container"></div>
					</div>
					<div class="opened_video_bar_info">
						<div class="left">
							<div class="time">
								<span class="time_passed"></span>
								<span class="whole_time"></span>
							</div>
							<div class="video_bar_play">
								<div class="prog_bar">
									<svg class="progress" width="120" height="120" viewBox="0 0 120 120" id="vplayer-progress-1">
										<circle cx="60" cy="60" r="54" fill="none" stroke="#ededed" stroke-width="12" />
										<circle cx="60" cy="60" r="54" fill="none" stroke="#f47b22" stroke-width="12" stroke-dasharray="339.292" stroke-dashoffset="339.292" class="progress__value" />
									</svg>
									<div class="overlay"></div>
								</div>
								<div class="play_btn"></div>
								<div class="next_btn dn"></div>
							</div>
							<div class="video_bar_name">
								<h6>Загрузка...</h6>
								<p></p>
							</div>
						</div><!-- left -->
						<div class="right">
							<div class="video_bar_full"></div>
							<?/*?><div class="video_bar_quality">720 <span>hd</span></div>
							<div class="video_bar_like"></div><?*/?>
						</div><!-- right -->
					</div><!-- opened_video_bar_info -->
				</div><!-- opened_video_bar_main -->
				<div class="opened_video_list_wrap">
					<div class="opened_video_list">
						<div class="opened_list_item">
							<div class="opened_list_item_img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/video_bar_item_img.png);"></div>
							<div class="opened_list_item_text" id="v-main">
								<h6>Загрузка...</h6>
								<p></p>
							</div>
							<div class="clear"></div>
						</div><!-- opened_list_item -->
						
						<div class="toggle_video_list"></div>
					</div><!-- opened_video_list -->
				</div>
				<div class="clear"></div>
				<div class="right_bar">
					<div class="music_right_bar">
						<div class="music_right_bar_list">
							<div class="music_right_bar_item_wrap played_item">
								<div class="music_right_bar_item no-info">
									<div class="music_name"><?=GetConfig("radio_current_name")?></div>
									<div class="music_group"><?=GetConfig("radio_current_artist")?></div>
									<div class="played_item_time">
										<span class="has_played"></span><span class="all_time"></span>
									</div>
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
							<div class="music_right_bar_item_wrap not-main">
								<div class="music_right_bar_item">
									<div class="music_name">Був бы в мэнэ <br> сывый кинь</div>
									<div class="music_group">Криница</div>
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
						</div><!-- music_right_bar_list -->
					</div><!-- music_right_bar -->
					<div class="music_right_settings">
						<div class="music_right_settings_list">
							<div class="right_settings_img cross_music dn"></div>
							<div class="right_settings_img loop_music dn"></div>
							<div class="loudness_music_wrap">
								<div class="loudness_bar">
									<div class="slider-vertical" id="slider-vertical"></div>
								</div>
								<div class="right_settings_img loudness_music"></div>
								
							</div>
						</div>
					</div>
				</div><!-- right_bar -->
			</div><!-- opened_video_bar -->
			<div class="playlist_played">
				<img src="<?=SITE_TEMPLATE_PATH?>/images/playlist_played.png" alt="playlist_played.png" class="play_list_image">
				<div class="playlist_played_text">
					<p>ПЛЕЙЛИСТ</p>
					<div class="play_list_name">Хиты нашего радио</div>
					<div class="play_list_desc">Славянскiй Мiръ, апрель 2017</div>
				</div>
			</div>
			<div class="all_song_category">
				<div class="tabs one_song_tabs" id="one_song_tabs">
					<ul>
						<li data-id="1">Все <span class="num">312</span></li>
						<li data-id="2">Популярное <span class="num">12</span></li>
						<li data-id="3">Новинки <span class="num">51</span></li>
						<li data-id="4">Казачьи песни <span class="num">12</span></li>
						<li data-id="5">Детям <span class="num">65</span></li>
						<li data-id="6">Хиты нашего радио <span class="num">52</span></li>
						<li data-id="7">Русские <span class="num">16</span></li>
						<li data-id="8">Украинские <span class="num">55</span></li>
						<li data-id="9">Моя музыка <span class="num">15</span></li>
					</ul>
				</div>
			</div>
			<div class="likes_list">
				<ul>
				</ul>
			</div>
			<div class="music_left_bar">
				<div class="music_left_bar_list">
					<div class="music_left_bar_item_wrap">
						<div class="music_left_bar_item gradient no-info">
							<div class="music_name">&nbsp;</div>
							<div class="music_group">&nbsp;</div>
						</div>
					</div>
				</div>
			</div>
			<div class="efir_bar">
				<div class="opened_video_bar_main">
					<div class="opened_video_bar_main_img video-strem">
						<div id="tv-container"></div>
					</div>
					<div class="opened_video_bar_info">
						<div class="left">
							<div class="time">
								<span class="time_passed"></span>
								<span class="whole_time"></span>
							</div>
							<div class="video_bar_play">
								<div class="prog_bar">
									<svg class="progress" width="120" height="120" viewBox="0 0 120 120" id="vplayer-progress">
										<circle cx="60" cy="60" r="54" fill="none" stroke="#ededed" stroke-width="12" />
										<circle cx="60" cy="60" r="54" fill="none" stroke="#f47b22" stroke-width="12" stroke-dasharray="339.292" stroke-dashoffset="339.292" class="progress__value" />
									</svg>
									<div class="overlay"></div>
								</div>
								<div class="play_btn active"></div>
							</div>
							<div class="video_bar_name">
								<h6>ТВ-эфир</h6>
								<p>Славянский Мир</p>
							</div>
						</div><!-- left -->
						<div class="right">
							<div class="video_bar_full"></div>
							<?/*?><div class="video_bar_quality">720 <span>hd</span></div>
							<div class="video_bar_like"></div><?*/?>
						</div><!-- right -->
					</div><!-- opened_video_bar_info -->
				</div><!-- opened_video_bar_main -->

				<div class="opened_video_list_wrap">
					<div class="toggle_video_list"></div>
					<div class="efir_live">
						<h5>Прямой эфир</h5>
						<div class="opened_list_item">
							<div class="opened_list_item_img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/video_bar_item_img.png);"></div>
							<div class="clear"></div>
						</div><!-- opened_list_item -->
					</div>
					<?/*?>
					<h5>Архив ТВ-программ</h5>
					<div class="opened_video_list">
						<div class="slider-nav">
							<div class="opened_list_item">
								<div class="opened_list_item_img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/video_bar_item_img.png);"></div>
								<div class="opened_list_item_text">
									<h6>Вербовой</h6>
									<p>Русская доблесть</p>
								</div>
								<div class="clear"></div>
							</div><!-- opened_list_item -->
						</div>
					</div><!-- opened_video_list -->
					<?*/?>
				</div>
				<div class="clear"></div>
				<div class="right_bar">
					<div class="music_right_bar">
						<div class="music_right_bar_list">
							<div class="music_right_bar_item_wrap played_item">
								<div class="music_right_bar_item">
									<div class="music_name">За высокий <br>за курган</div>
									<div class="music_group">Русичи</div>
									<div class="played_item_time">
										<span class="has_played"></span>  <span class="all_time"></span>
									</div>
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
							<div class="music_right_bar_item_wrap not-main">
								<div class="music_right_bar_item">
									<div class="music_name">Був бы в мэнэ <br> сывый кинь</div>
									<div class="music_group">Криница</div>
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
							<div class="music_right_bar_item_wrap not-main">
								<div class="music_right_bar_item gradient">
									<div class="music_name">Був бы в мэнэ <br> сывый кинь</div>
									<div class="music_group">Криница</div>
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
								</div><!-- more_info -->
							</div><!-- music_right_bar_item_wrap -->
						</div><!-- music_right_bar_list -->
					</div><!-- music_right_bar -->
					<div class="music_right_settings">
						<div class="music_right_settings_list">
							<div class="right_settings_img cross_music dn"></div>
							<div class="right_settings_img loop_music dn"></div>
							<div class="loudness_music_wrap">
								<div class="loudness_bar">
									<div class="slider-vertical" id="slider-vertical-1"></div>
								</div>
								<div class="right_settings_img loudness_music"></div>
							</div>
						</div>
					</div>
				</div><!-- right_bar -->
				
			</div><!-- efir_bar -->
		</div><!-- left_bar -->
		<div class="music_played">
			<div class="prog_bar">
				<svg class="progress" width="120" height="120" viewBox="0 0 120 120" id="player-progress">
					<circle cx="60" cy="60" r="54" fill="none" stroke="#ededed" stroke-width="12" />
					<circle cx="60" cy="60" r="54" fill="none" stroke="#f47b22" stroke-width="12" stroke-dasharray="339.292" stroke-dashoffset="339.292" class="progress__value" />
					<?/*?><circle cx="0" cy="0" fill-opacity="0" r="10" stroke="#666" stroke-opacity="1" stroke-width="4" transform="rotate(-90 0 0)" stroke-dasharray="64" stroke-dashoffset="0"></circle><?*/?>
				</svg>
			</div>
			<!-- <figure class="progress">
				<div class="p-ring"></div>
				<div class="p-sector">
					<div class="p-active" style="transform: rotate(20deg);transition: all 400ms 260ms;"></div>
				</div>
			</figure> -->
			<div class="music_bg" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/music_bg.png)"></div>
			<div class="music_control">
				<img src="<?=SITE_TEMPLATE_PATH?>/images/prev_song.png" alt="prev_song" class="prev_song hidden">
				<div class="music_status">
					<img src="<?=SITE_TEMPLATE_PATH?>/images/paused.png" alt="paused" class="song_btn pause_song">
					<img src="<?=SITE_TEMPLATE_PATH?>/images/play.png" alt="play.png" class="song_btn play_song">
				</div>
				<img src="<?=SITE_TEMPLATE_PATH?>/images/next_song.png" alt="next_song" class="next_song hidden">
			</div>
			<!-- <img src="<?=SITE_TEMPLATE_PATH?>/images/music_played.png" alt="music_played" class="music_played_desktop"> -->
			<img src="<?=SITE_TEMPLATE_PATH?>/images/music_played_mobile.png" alt="music_played_mobile.png" class="music_played_mobile">
		</div>
		<div class="right_bar">
			<div class="music_right_bar">
				<div class="music_right_bar_list">
					<div class="music_right_bar_item_wrap played_item" id="jw-current-play">
						<div class="music_right_bar_item no-info">
							<div class="music_name"><?=GetConfig("radio_current_name")?></div>
							<div class="music_group"><?=GetConfig("radio_current_artist")?></div>
							<div class="played_item_time">
								<span class="has_played"></span><span class="all_time"></span>
							</div>
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
				</div><!-- music_right_bar_list -->
			</div><!-- music_right_bar -->
			<div class="music_right_settings">
				<div class="music_right_settings_list">
					<div class="right_settings_img cross_music dn"></div>
					<div class="right_settings_img loop_music dn"></div>
					<div class="loudness_music_wrap">
						<div class="loudness_bar">
							<div class="slider-vertical" id="slider-vertical-2"></div>
						</div>
						<div class="right_settings_img loudness_music"></div>
						
					</div>
				</div>
			</div>
		</div><!-- right_bar -->
		<div class="music_type_list">
			<ul>
				<li class="active type_radio" data-id='type_radio'>Радио</li>
				<li class="type_tv" data-id="type_tv">ТВ-эфир</li>
				<li class="type_video" data-id="type_video">Видео</li>
				<li class="type_audio" data-id="type_audio">Аудио</li>
			</ul>
		</div><!-- music_type_list -->
		<div class="clear"></div>
	</div>
</div><!-- music_bar -->
<div id="music_bar_mobile">
	<div class="container">
		<div class="music_played">
			<div class="prog_bar">
				<svg class="progress" width="120" height="120" viewBox="0 0 120 120" id="player-progress-3">
					<circle cx="60" cy="60" r="54" fill="none" stroke="#ededed" stroke-width="12" />
					<circle cx="60" cy="60" r="54" fill="none" stroke="#f47b22" stroke-width="12" stroke-dasharray="339.292" stroke-dashoffset="339.292" class="progress__value" />
				</svg>
			</div>
			<div class="music_bg" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/music_bg.png)"></div>
			<div class="music_control">
				<img src="<?=SITE_TEMPLATE_PATH?>/images/opened_prev_video.png" alt="prev_song" class="prev_song hidden">
				<div class="music_status"></div>
				<img src="<?=SITE_TEMPLATE_PATH?>/images/opened_next_video.png" alt="next_song" class="next_song hidden">
			</div>
		</div><!-- music_played -->
		<div class="music_info">
			<div class="music_name"></div>
			<div class="music_group"></div>
			<div class="played_item_time">
				<span class="has_played"></span> <span class="all_time"></span>
			</div>
		</div>
		<div class="music_menu">
			<div class="music_bar_list_img dn"></div>
		</div><!-- music_menu -->
		<div class="music_type_list">
			<ul>
				<li class="active type_radio" data-id='type_radio'>Радио</li>
				<li class="type_tv" data-id="type_tv">ТВ-эфир</li>
				<li class="type_video" data-id="type_video">Видео</li>
				<li class="type_audio" data-id="type_audio">Аудио</li>
			</ul>
		</div><!-- music_type_list -->
		<div class="music_right_settings_list">
			<div class="right_settings_img cross_music dn"></div>
			<div class="right_settings_img loop_music dn"></div>
			<div class="loudness_music_wrap">
				<div class="loudness_bar">
					<div class="slider-vertical"></div>
				</div>
				<div class="right_settings_img loudness_music"></div>
				
			</div>
		</div><!-- music_right_settings_list -->
		<div class="efir_mobile">
			<div class="main_img">
				<div id="m-tv-container"></div>
			</div>
			<div class="list"></div>
			<div class="full"></div>
		</div>
		<div class="video_mobile">
			<div class="main_img">
				<div id="m-video-container"></div>
				<?/*?><div class="time">4:30</div><?*/?>
			</div>
			<div class="list"></div>
			<div class="full"></div>
		</div>
		<div class="next_on_radio">
			<p>Далее на радио</p>
			<?/*?>
			<div class="mus_list">
				<div class="mus_wrap">
					<div class="mus_img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/verbovoy.png);"></div>
					<div class="mus_info">
						<a href="#" class="mus_name">Моя свеча</a>
						<div class="mus_group">Жанна Бичевская</div>
						<div class="mus_bar">
							<div class="list_img"></div>
							<div class="likes"></div>
							<a href="#" download><span class="download"></span></a>
						</div>
						<div class="mus_time">03:53</div>
					</div>
				</div><!-- mus_wrap -->
				<div class="mus_wrap">
					<div class="mus_img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/verbovoy.png);"></div>
					<div class="mus_info">
						<a href="#" class="mus_name">Донские частушки</a>
						<div class="mus_group">Жанна Бичевская</div>
						<div class="mus_bar">
							<div class="list_img"></div>
							<div class="likes"></div>
							<a href="#" download><span class="download"></span></a>
						</div>
						<div class="mus_time">03:53</div>
					</div>
				</div><!-- mus_wrap -->
				<div class="mus_wrap">
					<div class="mus_img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/verbovoy.png);"></div>
					<div class="mus_info">
						<a href="#" class="mus_name">Моя свеча</a>
						<div class="mus_group">Жанна Бичевская</div>
						<div class="mus_bar">
							<div class="list_img"></div>
							<div class="likes"></div>
							<a href="#" download><span class="download"></span></a>
						</div>
						<div class="mus_time">03:53</div>
					</div>
				</div><!-- mus_wrap -->
			</div>
			<?*/?>
		</div>
	</div>
</div>
<div id="music_bar_mobile_scroll">
	<div class="container">
		<div class="mobile_bar_name">
			<p>
				<span class="song_name"><?=GetConfig("radio_current_name")?></span>
				<span class="song_auth"><?=GetConfig("radio_current_artist")?></span>
			</p>
			<span class="song_type">Радио</span>
			<span class="clear"></span>
		</div>
	</div>
</div>