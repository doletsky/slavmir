<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Личный кабинет");
?>
<section id="lk_section" class="alert">
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
    <?/*?>
<?//"забор" в style.css:3602 #lk_section:after?>
	<div class="subs_ends_container">
		<p>Внимание! Подписка заканчивается через <span>3 дня.</span> Рекомендуем оплатить <span>300 ₽</span></p>
		<a class="subs_add_pay" href="#">Доплатить</a>
		<div class="clear"></div>
	</div>

    <div class="log_out">
    	<a href="/?logout=yes">Выйти</a>
    </div><?*/?>
</section>
<section class="current_subs">
	<div class="container">
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
			<a href="/rates/" class="change_tarif">Сменить тариф</a>
			<a href="/rates/" class="tarif">Тарифы и условия</a>
		</div>
		<div class="own_balance_box">
			<p>Ваш баланс</p>
			<span class="balance_num"><?$ar = CSaleUserAccount::GetByUserID($USER->GetID(), "RUB"); echo intval($ar["CURRENT_BUDGET"]);?> ₽</span>
			<a href="#" class="add_balance">Доплатить</a>
			<a href="#" class="pay_history">История платежей</a>
		</div>

	<div class="clear"></div>
	</div>
</section>
    <section class="pay_history_box">
        <div class="container">
            <h3>История платежей</h3>
            <?$APPLICATION->IncludeComponent("bitrix:sale.personal.order.list","",Array(
                    "STATUS_COLOR_N" => "green",
                    "STATUS_COLOR_P" => "yellow",
                    "STATUS_COLOR_F" => "gray",
                    "STATUS_COLOR_PSEUDO_CANCELLED" => "red",
                    "PATH_TO_DETAIL" => "order_detail.php?ID=#ID#",
                    "PATH_TO_COPY" => "basket.php",
                    "PATH_TO_CANCEL" => "order_cancel.php?ID=#ID#",
                    "PATH_TO_BASKET" => "basket.php",
                    "PATH_TO_PAYMENT" => "payment.php",
                    "ORDERS_PER_PAGE" => 20,
                    "ID" => $ID,
                    "SET_TITLE" => "Y",
                    "SAVE_IN_SESSION" => "Y",
                    "NAV_TEMPLATE" => "",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "3600",
                    "CACHE_GROUPS" => "Y",
                    "HISTORIC_STATUSES" => "F",
                    "ACTIVE_DATE_FORMAT" => "d.m.Y"
                )
            );?>
<!--            <div class="history_list">-->
<!--                <div class="item">-->
<!--                    <div class="date">28.06.2017</div>-->
<!--                    <div class="time">15:40</div>-->
<!--                    <div class="price">1500 ₽</div>-->
<!--                    <div class="pay_sys">Электронный платеж Яндекс</div>-->
<!--                </div>-->
<!--                <div class="item">-->
<!--                    <div class="date">28.06.2017</div>-->
<!--                    <div class="time">15:40</div>-->
<!--                    <div class="price">1500 ₽</div>-->
<!--                    <div class="pay_sys">Электронный платеж Яндекс</div>-->
<!--                </div>-->
<!--                <div class="item">-->
<!--                    <div class="date">28.06.2017</div>-->
<!--                    <div class="time">15:40</div>-->
<!--                    <div class="price">1500 ₽</div>-->
<!--                    <div class="pay_sys">Электронный платеж Яндекс</div>-->
<!--                </div>-->
<!--            </div>-->
        </div>

    </section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>