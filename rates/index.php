<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetPageProperty("header_bg", "/upload/medialibrary/325/3255041644f12fe27a672a5a4b6c6802.jpg");
$APPLICATION->SetTitle("Тарифы");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_after.php");
?>
    <section id="tarifs" <?$APPLICATION->ShowProperty("bg_dop")?> >
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
            <h1 class="page_name">Тарифы и условия</h1>
    <h2>До конца зимы мы снизили стоимость подписки на 67%!</h2>
    <div class="tarif_top_list">
        <div class="tarif_top_item akcia" style="background-image: url(images/tarif_bg1.png);">
            <h3 class="tarif_srok">Месяц</h3>
            <p class="tarif_price new">99 ₽</p>
            <p class="tarif_price before">299 ₽</p>
            <p>3,19 руб. в день</p>
            <a href="#">Купить</a>
            <div class="akcia_proc">67%</div>
        </div>
        <div class="tarif_top_item akcia border small_mb" style="background-image: url(images/tarif_bg2.png);">
            <h3 class="tarif_srok">Три <br> месяця</h3>
            <p class="tarif_price new">269 ₽</p>
            <p class="tarif_price before">815 ₽</p>
            <p>2,9 руб. в день</p>
            <a href="#">Купить</a>
            <div class="akcia_proc">67%</div>
        </div>
        <div class="tarif_top_item akcia small_mb" style="background-image: url(images/tarif_bg3.png);">
            <h3 class="tarif_srok">Шесть <br> месяцев</h3>
            <p class="tarif_price new">519 ₽</p>
            <p class="tarif_price before">1 573 ₽</p>
            <p>2,8 руб. в день</p>
            <a href="#">Купить</a>
            <div class="akcia_proc">67%</div>
        </div>
        <div class="tarif_top_item akcia" style="background-image: url(images/tarif_bg3.png);">
            <h3 class="tarif_srok">Год</h3>
            <p class="tarif_price new">899 ₽</p>
            <p class="tarif_price before">2 724 ₽</p>
            <p>2,46 руб. в день</p>
            <a href="#">Купить</a>
            <div class="akcia_proc">67%</div>
        </div>
    </div>
    </div>
    </section>
    <section class="other_tarifs">
        <div class="container">
            <div class="tarif_top_list">
                <div class="tarif_top_item akcia">
                    <h3 class="tarif_srok">Пробная <br> подписка на день</h3>
                    <p>Дает право продления <br> на льготных условиях</p>
                    <p class="tarif_price new">6,60 ₽</p>
                    <p class="tarif_price before">20₽</p>
                    <p><br></p>
                    <a href="#">Купить</a>
                    <div class="akcia_proc">67%</div>
                </div>
                <div class="tarif_top_item akcia">
                    <h3 class="tarif_srok">Льготная <br> подписка на год</h3>
                    <p>Для оформления обратитесь к менеджеру</p>
                    <p class="tarif_price new">399 ₽</p>
                    <p class="tarif_price before">1 209 ₽</p>
                    <p>1,09 руб. в день</p>
                    <a href="#">Оформить заявку</a>
                    <div class="akcia_proc">67%</div>
                </div>
            </div>
            <div class="sub_benefit">
                <p>Дорогие друзья! Команда медиа-портала «Славянский Мир» рада представить Вам наши творения: телеканал, радио, познавательный блог и новостную службу! Мы постоянно находимся в стадии развития, собираем и учитываем Ваши мнения, предложения, а также аудио/видео/текстовые материалы. Все это, чтобы делать наш портал все более интересным и полезным для Вас с каждым днем. </p>
                <p>У нас очень много  идей и планов, и мы будем продолжать Вас радовать и удивлять своими нововведениями. А сейчас мы только в начале большого пути и на старте своих возможностей! </p>
                <p>До 1 февраля 2018  года мы предоставляем скидку на подписку в размере 67 % и снижаем месячный тариф с 299 до 99 рублей! А годовой с  2 724 до 899 рублей! Оставайтесь и развивайтесь с нами!</p>
            </div>
        </div>
    </section>

<?if(0):?>
<section id="tarifs" <?$APPLICATION->ShowProperty("bg_dop")?> >
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
		<h1 class="page_name">Тарифы и условия</h1>
		<div class="tarif_top_list">
			<div class="tarif_top_item" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/tarif_bg1.png);">
				<h3 class="tarif_srok">Месяц</h3>
				<p class="tarif_price">299 ₽</p>
				<p>12 руб. в день</p>
				<a href="#">Купить</a>
			</div>
			<div class="tarif_top_item" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/tarif_bg2.png);">
				<h3 class="tarif_srok">Три месяця</h3>
				<p class="tarif_price">720 ₽</p>
				<p>11 руб. в день</p>
				<a href="#">Купить</a>
			</div>
			<div class="tarif_top_item" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/tarif_bg3.png);">
				<h3 class="tarif_srok">Год</h3>
				<p class="tarif_price">3 200 ₽</p>
				<p>10 руб. в день</p>
				<a href="#">Купить</a>
			</div>
		</div>
	</div>
</section>
<section class="other_tarifs">
	<div class="container">
		<div class="tarif_top_list">
			<div class="tarif_top_item">
				<h3 class="tarif_srok">Льготная подписка</h3>
				<p>Подписка дает доступ к прямому эфиру в HD-качестве</p>
				<p class="tarif_price">299 ₽</p>
				<p>12 руб. в день</p>
				<a href="#">Купить</a>
			</div>
			<div class="tarif_top_item">
				<h3 class="tarif_srok">Отключение рекламы</h3>
				<p>Подписка дает доступ к прямому эфиру в HD-качестве</p>
				<p class="tarif_price">720 ₽</p>
				<p>11 руб. в день</p>
				<a href="#">Купить</a>
			</div>
			<div class="tarif_top_item">
				<h3 class="tarif_srok">Премиум -подписка</h3>
				<p>Подписка дает доступ к прямому эфиру в HD-качестве</p>
				<p class="tarif_price">3 200 ₽</p>
				<p>10 руб. в день</p>
				<a href="#">Купить</a>
			</div>
		</div>
		<div class="sub_benefit">
			<p>Подписка дает доступ к прямому эфиру в HD-качестве, архиву программ, возможность комментировать (соблюдая правила) материалы на сайте и общаться с ведущими в специальной закрытой группе в Фейсбуке.</p>
		</div>
	</div>
</section>
<?endif?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>