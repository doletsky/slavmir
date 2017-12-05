<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Личный кабинет");
?>
<section id="lk_section" class="<?/*?>alert<?*/?>">
	<div class="container">
		<div class="breadcrumbs dark">
			<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "tree", Array(
					"COMPONENT_TEMPLATE" => ".default",
					"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
					"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
					"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
				),
				false
			);?>
		</div>
		<h1 class="page_name">Настройки и оплата</h1>
		<?$APPLICATION->IncludeComponent("bitrix:main.profile", "lk-profile", Array(
				"COMPONENT_TEMPLATE" => ".default",
				"SET_TITLE" => "N",	// Устанавливать заголовок страницы
				"USER_PROPERTY" => "",	// Показывать доп. свойства
				"SEND_INFO" => "N",	// Генерировать почтовое событие
				"CHECK_RIGHTS" => "N",	// Проверять права доступа
				"USER_PROPERTY_NAME" => "",	// Название закладки с доп. свойствами
			),
			false
		);?>
	</div>
	<div class="subs_ends_container">
		<p>Внимание! Подписка заканчивается через <span>3 дня.</span> Рекомендуем оплатить <span>300 ₽</span></p>
		<a class="subs_add_pay" href="#">Доплатить</a>
		<div class="clear"></div>
	</div>
</section>
<section class="current_subs">
	<div class="container">
		<?/*?>
		<div class="sub_info">
			<h5>Текущая подписка</h5>
			<div class="sub_name">Мир-300</div>
			<div class="sub_act">
				<p>Активирована <span>25.04.2017</span></p>
			</div>
			<div class="sub_deact">
				<p>Дата отключения  <span>25.09.2017</span></p>
			</div>
		</div>
		<div class="sub_tarifs">
			<a href="#" class="change_tarif">Сменить тариф</a>
			<a href="#" class="tarif">Тарифы и условия</a>
		</div>
		<div class="own_balance_box">
			<p>Ваш баланс</p>
			<span class="balance_num">2 ₽</span>
			<a href="#" class="add_balance">Доплатить</a>
			<a href="#" class="pay_history">История платежей</a>
		</div>
		<?*/?>
	<div class="clear"></div>
	</div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>