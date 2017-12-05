<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetPageProperty("header_class", "page_top_bg");
$APPLICATION->SetPageProperty("header_id", "about_page_top");
$APPLICATION->SetPageProperty("keywords", "о нас, славянский мир");
$APPLICATION->SetPageProperty("description", "Славянский Мир - народное славянское радио в прямом эфире. Ежедневно слушать онлайн радио эфиры на официальном сайте. Радио, Видео, Статьи о славянском народе.");
$APPLICATION->SetPageProperty("header_bg", "/upload/medialibrary/38e/38edb9e3f7600e98772916e6bb0477ba.jpg");
$APPLICATION->SetPageProperty("title", "О нас");
$APPLICATION->SetTitle("О нас");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_after.php");
?>
<?LocalRedirect("/about/project/");?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>