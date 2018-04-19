<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if($_POST["PLAYER_AJAX"]=="Y"){
    ?><script>
        var pageTitle='Поиск';
        var headerBg='/upload/medialibrary/59b/59bdc204fd84c7c3df3cb35eda6c2b09.jpg';
    </script>
    <section id="about_page_top" class="page_top_bg">
        <div class="container">
            <div class="breadcrumbs">
                <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "tree", Array(
                    "COMPONENT_TEMPLATE" => ".default",
                    "START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
                    "PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
                    "SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
                ),
                    false
                );?>
            </div>
            <h1 class="page_name">Поиск</h1>
        </div>
    </section>
    <?
}
if($_GET["AJAX"]!="Y" && $_POST["PLAYER_AJAX"]!="Y"){
    $APPLICATION->SetTitle("Поиск");
    $APPLICATION->SetPageProperty("header_bg", "/upload/medialibrary/59b/59bdc204fd84c7c3df3cb35eda6c2b09.jpg");
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_after.php");
}
?>
<?$APPLICATION->IncludeComponent("bitrix:search.page","",array(),false)?>
<?if($_GET["AJAX"]!="Y" && $_POST["PLAYER_AJAX"]!="Y") require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>