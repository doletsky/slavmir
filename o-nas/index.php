<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if($_REQUEST["PLAYER_AJAX"]=="Y"){
        ?><script>
            var pageTitle='О нас';
            var headerBg='/upload/medialibrary/38e/38edb9e3f7600e98772916e6bb0477ba.jpg';
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
                <h1>О нас</h1>
            </div>
        </section>
        <?
}
else{
    $APPLICATION->SetPageProperty("header_class", "page_top_bg");
    $APPLICATION->SetPageProperty("header_id", "about_page_top");
    $APPLICATION->SetPageProperty("keywords", "о нас, славянский мир");
    $APPLICATION->SetPageProperty("description", "Славянский Мир - народное славянское радио в прямом эфире. Ежедневно слушать онлайн радио эфиры на официальном сайте. Радио, Видео, Статьи о славянском народе.");
    $APPLICATION->SetPageProperty("header_bg", "/upload/medialibrary/38e/38edb9e3f7600e98772916e6bb0477ba.jpg");
    $APPLICATION->SetPageProperty("title", "О нас");
    $APPLICATION->SetTitle("О нас");
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_after.php");
}

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
<?if($_REQUEST["PLAYER_AJAX"]!="Y")require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>