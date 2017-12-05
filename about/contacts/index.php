<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetPageProperty("header_class", "contacts_top");
$APPLICATION->SetPageProperty("header_id", "");
$APPLICATION->SetPageProperty("keywords", "наша команда, славянский мир");
$APPLICATION->SetPageProperty("description", "Славянский Мир - народное славянское радио в прямом эфире. Ежедневно слушать онлайн радио эфиры на официальном сайте. Радио, Видео, Статьи о славянском народе.");
$APPLICATION->SetPageProperty("header_bg", "/upload/medialibrary/c40/c40c35d400fbc6f27f0ecab415a8503a.jpg");
$APPLICATION->SetPageProperty("title", "Контактная информация");
$APPLICATION->SetTitle("Контактная информация");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_after.php");
?>
<section id="contacts">
	<div class="container">
		<div class="clear"></div>
		<div class="left_col">
			<div class="contacts_info">
				<p>Адрес: 141092, Московская область, г. Королев, мкр. Юбилейный, ул. А.И. Соколова, д. 8А</p>
				<p class="cont_phone">Телефон: <a href="tel:+74954311234">+7 495 431-12-34</a></p>
				<p class="cont_email">Почта: <a href="mailto:info@slavmir.fm">info@slavmir.fm</a></p>
			</div>
			<div class="write_us">
				<h4>Напишите нам</h4>
				<?$APPLICATION->IncludeComponent("bitrix:form", "contacts", Array(
						"COMPONENT_TEMPLATE" => ".default",
						"START_PAGE" => "new",	// Начальная страница
						"SHOW_LIST_PAGE" => "N",	// Показывать страницу со списком результатов
						"SHOW_EDIT_PAGE" => "N",	// Показывать страницу редактирования результата
						"SHOW_VIEW_PAGE" => "Y",	// Показывать страницу просмотра результата
						"SUCCESS_URL" => "",	// Страница с сообщением об успешной отправке
						"WEB_FORM_ID" => "1",	// ID веб-формы
						"RESULT_ID" => $_REQUEST[RESULT_ID],	// ID результата
						"SHOW_ANSWER_VALUE" => "N",	// Показать значение параметра ANSWER_VALUE
						"SHOW_ADDITIONAL" => "Y",	// Показать дополнительные поля веб-формы
						"SHOW_STATUS" => "Y",	// Показать текущий статус результата
						"EDIT_ADDITIONAL" => "N",	// Выводить на редактирование дополнительные поля
						"EDIT_STATUS" => "N",	// Выводить форму смены статуса
						"NOT_SHOW_FILTER" => array(	// Коды полей, которые нельзя показывать в фильтре
							0 => "",
							1 => "",
						),
						"NOT_SHOW_TABLE" => array(	// Коды полей, которые нельзя показывать в таблице
							0 => "",
							1 => "",
						),
						"IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
						"USE_EXTENDED_ERRORS" => "N",	// Использовать расширенный вывод сообщений об ошибках
						"SEF_MODE" => "N",	// Включить поддержку ЧПУ
						"AJAX_MODE" => "Y",	// Включить режим AJAX
						"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
						"AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
						"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
						"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
						"CACHE_TYPE" => "A",	// Тип кеширования
						"CACHE_TIME" => "3600",	// Время кеширования (сек.)
						"CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
						"CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
						"VARIABLE_ALIASES" => array(
							"action" => "action",
						)
					),
					false
				);?>
			</div>
		</div>
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"PATH" => "/include/_right_col.php",
				"EDIT_MODE" => "php",
			),
			false
		);?>
		<div class="clear"></div>
	</div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>