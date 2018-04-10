<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetPageProperty("header_class", "page_top_bg");
$APPLICATION->SetPageProperty("header_id", "about_page_top");
$APPLICATION->SetPageProperty("keywords", "о нас, славянский мир");
$APPLICATION->SetPageProperty("description", "Славянский Мир - народное славянское радио в прямом эфире. Ежедневно слушать онлайн радио эфиры на официальном сайте. Радио, Видео, Статьи о славянском народе.");
$APPLICATION->SetPageProperty("header_bg", "/upload/medialibrary/5af/5aff282ba16c71b75b8ed82d8d3c97db.jpg");
$APPLICATION->SetPageProperty("title", "О проекте");
$APPLICATION->SetTitle("О нас");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_after.php");
?>
<section class="about_text">
	<div class="container">
		<div class="left_col">
			<div class="about_top_text">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"PATH" => "/include/project.php",
						"EDIT_MODE" => "php",
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