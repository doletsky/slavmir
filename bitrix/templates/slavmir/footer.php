<?
$prefix=str_replace("/","_",$APPLICATION->GetCurDir());
?>
<?$APPLICATION->IncludeFile("/include/seo_texts/".$prefix."-seo.php", Array(), Array(
	"MODE"      => "html",
	"NAME"      => "Редактирование SEO-текстов",
	"TEMPLATE"  => "seo.php"
));
?>
<footer>
	<div class="container">
		<div class="footer_left_col">
			<div class="footer_logo">
				<img src="<?=SITE_TEMPLATE_PATH?>/images/favicon.png" alt="favicon">
			</div>
			<nav class="footer_nav_left">
				<?$APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
						"COMPONENT_TEMPLATE" => ".default",
						"ROOT_MENU_TYPE" => "foot1",	// Тип меню для первого уровня
						"MENU_CACHE_TYPE" => "A",	// Тип кеширования
						"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
						"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
						"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
						"MAX_LEVEL" => "1",	// Уровень вложенности меню
						"CHILD_MENU_TYPE" => "top",	// Тип меню для остальных уровней
						"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
						"DELAY" => "N",	// Откладывать выполнение шаблона меню
						"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
					),
					false
				);?>
			</nav>
			<nav class="footer_nav_right">
				<?$APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
						"COMPONENT_TEMPLATE" => ".default",
						"ROOT_MENU_TYPE" => "foot2",	// Тип меню для первого уровня
						"MENU_CACHE_TYPE" => "A",	// Тип кеширования
						"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
						"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
						"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
						"MAX_LEVEL" => "1",	// Уровень вложенности меню
						"CHILD_MENU_TYPE" => "top",	// Тип меню для остальных уровней
						"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
						"DELAY" => "N",	// Откладывать выполнение шаблона меню
						"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
					),
					false
				);?>
			</nav>
			<div class="clear"></div>
			<div class="copy">
				<p>© Славянский МIРЪ</p>
			</div>
		</div><!-- footer_left_col -->
		<div class="footer_right_col">
			<p>Мы в соцсетях:</p>
			<ul class="soc">
				<li><a target="blank" title="facebook" href="https://ru-ru.facebook.com/slavmir.tv" class="social-menu-link is-facebook"></a></li>
				<li><a target="blank" title="YouTube" href="https://www.youtube.com/channel/UCqwMwPPSgWk73kK4QjGxpoQ/videos" class="social-menu-link is-youtube"></a></li>
				<li><a target="blank" title="Вk" href="https://vk.com/slavmirtv" class="social-menu-link is-vk"></a></li>
				<li><a target="blank" title="Instagram" href="https://www.instagram.com/slavmir.tv/" class="social-menu-link is-instagram"></a></li>
				<li><a target="blank" title="Ok" href="https://ok.ru/group/53435314405595" class="social-menu-link is-odnoklassniki"></a></li>
			</ul>
			<p>Помогите нам стать лучше:</p>
			<div class="opros">
				<a href="/polls/">Принять участие в опросе</a>
			</div>
		</div>
		<div class="roskom">
			<?$APPLICATION->IncludeFile("/include/disclamer.php", Array(), Array(
				"MODE" => "html",
				"NAME" => "Редактирование текстового блока",
			));
			?>
		</div>
		<div class="mobile_copy">
			<p>© Славянский МIРЪ</p>
		</div>
		<div class="clear"></div>
	</div>
</footer>
<div class="count_down_box">
	<div class="container">
		<div class="count_text">
			<p><b>Телеканал «Славянскiй Мiръ»</b>начнет вещание через</p>
			<div class="clock"></div>
		</div>
	</div>
</div>
<div class="register_popup_container" <?if(count($_POST) && isset($_POST["register_submit_button"])){?>style="display:block;"<?}?> >
	<div class="register_popup">
		<div class="register_popup_scroll">
			<div class="close_popup"></div>
				<?$APPLICATION->IncludeComponent("bitrix:main.register","",array(
						"SHOW_FIELDS" => Array("NAME", "PERSONAL_MOBILE"),
						"AUTH" => "Y",
						"SET_TITLE" => "N"
					),
				false);?>
		</div>
	</div>
</div>
<div class="subs_popup_container">
	<div class="subs_container">
		<div class="close_popup"></div>
		<img src="<?=SITE_TEMPLATE_PATH?>/images/subs_popup_img.png" alt="subs_popup_img.png" class="top_img">
		<h3>Этот материал доступен только по подписке</h3>
		<p class="main_text">Зарегистрированным друзьям Славянского Мира доступны тысячи материалов, ежедневные обновления. Вы будете первым узнавать обо всех мероприятиях, станете нашим особым гостем.</p>
		<a href="#" class="subscribe">Подписатся на <b>Славянск<small>i</small>й Мiр<small>ъ</small></b></a>
		<h4>Стоимость подписки 99 ₽ в месяц</h4>
		<p class="license">Данное предложение не является публичной офертой. Лицензия СМИ 12278172</p>
	</div>
</div>
<div class="tnx_popup_container reg">
	<div class="tnx_container">
		<div class="close_popup"></div>
		<div class="popup_bg"></div>
		<h4>Ваша регистрация прошла успешно!</h4>
		<p>Мы вышлем подтверждение регистрации на указанный адрес почты.</p>
		<div class="close_tnx_popup">
			<img src="<?=SITE_TEMPLATE_PATH?>/images/close_popup.png" alt="close_popup"><span>Закрыть</span>
		</div>
	</div>
</div>
<div class="tnx_popup_container opros">
	<div class="tnx_container">
		<div class="close_popup"></div>
		<div class="popup_bg"></div>
		<h4>Благодарим за ваше мнение!</h4>
		<p>Нам очень важны ваши мысли по поводу развития проекта. <br>Мы постараемся учесть ваши пожелания и, при необходимости, свяжемся с вами!</p>
		<div class="close_tnx_popup">
			<img src="<?=SITE_TEMPLATE_PATH?>/images/close_popup.png" alt="close_popup"><span>Закрыть</span>
		</div>
	</div>
</div>

<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery-2.2.3.min.js"></script>
<!--<script src="https://content.jwplatform.com/libraries/abYwhQ0o.js"></script>-->
<!--<script data-version="7" src="https://content.jwplatform.com/libraries/PLYp0Up4.js"></script>-->
<script data-version="8" src="https://content.jwplatform.com/libraries/isafOMFt.js"></script>

<script type="text/javascript" charset="utf-8" src="https://cdn.jsdelivr.net/clappr/latest/clappr.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/clappr-youtube-plugin.min.js"></script>

<script src="<?=SITE_TEMPLATE_PATH?>/js/perfect-scrollbar.jquery.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/maskedInput.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery-ui.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/slick.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/flipclock.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.tmpl.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/player.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/main.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/sv.js"></script>
<? include( dirname(__FILE__).'/jq-templates.php' );?>
</body>
</html>