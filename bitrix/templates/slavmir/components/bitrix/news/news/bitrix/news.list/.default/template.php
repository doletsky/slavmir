<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?if(!isset($_REQUEST["AJAX"]) || $_REQUEST["AJAX"]!="Y"){?>
<div class="tabs" id="new_art_tabs">
	<ul>
		<li class="active" data-id="all">Все новости</li>
		<?/*?><li data-id="2">Все</li><?*/?>
	</ul>
</div>
<div class="tab_container news_page_list active" data-attr="all" data-id="new_art_tabs">
	<div class="ajax-list">
<?}?>
	<?foreach( $arResult["ITEMS"] as $arItem ){
		?>
        <div class="news_page_item">
            <?
            $image = GetConfig( "default_image" );
            if( isset($arItem["PREVIEW_PICTURE"]["SRC"]) && $arItem["PREVIEW_PICTURE"]["SRC"] ) $image = MakeImage( $arItem["PREVIEW_PICTURE"]["SRC"], array("w"=>171,"h"=>171,"zc"=>1) );
            ?>
            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"<?if( $arItem["PROPERTIES"]["IS_NO_AUTH"]["VALUE_XML_ID"]!="Y" ){?> class="subs"<?}?>><span class="news_img" style="background-image: url(<?=$image?>);"></span></a>
            <div class="news_text">
                <div class="news_head">
                    <span class="news_date"><?=small_russian_date("j F Y",MakeTimeStamp($arItem["ACTIVE_FROM"],"DD.MM.YYYY"))?></span>
                    <?
                    if( is_array($arItem["PROPERTIES"]["TYPE"]["VALUE"]) && count($arItem["PROPERTIES"]["TYPE"]["VALUE"]) ){
                        foreach( $arItem["PROPERTIES"]["TYPE"]["VALUE"] as $newsType ){
                            ?>
                            <span class="news_type"><?=$newsType?></span>
                        <?
                        }
                    }
                    ?>
                </div>
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" <?if( $arItem["PROPERTIES"]["IS_NO_AUTH"]["VALUE_XML_ID"]!="Y" ){?> class="subs"<?}?>>
                    <span class="name"><?=$arItem["NAME"]?> <?if( $arItem["PROPERTIES"]["IS_NO_AUTH"]["VALUE_XML_ID"]!="Y" ){?><span class="subs_read_only"></span><?}?></span>
                    <div class="text"><?=$arItem["PREVIEW_TEXT"]?> <span class="read_more">Подробнее</span></div>
                </a>
            </div>
            <div class="clear"></div>
        </div>
        <!-- new_article -->
	<?}?>
	<?=$arResult["NAV_STRING"]?>
<?if(!isset($_REQUEST["AJAX"]) || $_REQUEST["AJAX"]!="Y"){?>
	</div>
</div>
<?}?>
