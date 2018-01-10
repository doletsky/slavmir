<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if($_GET["AJAX"]!="Y"){
    $APPLICATION->SetTitle("Поиск");
    $APPLICATION->SetPageProperty("header_bg", "/upload/medialibrary/59b/59bdc204fd84c7c3df3cb35eda6c2b09.jpg");
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_after.php");
}
?>
<?$APPLICATION->IncludeComponent("bitrix:search.page","",array(),false)?>
<?if($_GET["AJAX"]!="Y") require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>