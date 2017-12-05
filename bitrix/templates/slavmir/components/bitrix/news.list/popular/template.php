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
<?
#pre($arResult["ITEMS"]);
?>
<div class="popular_list_wrap">
	<div class="popular_list scrolled">
		<?foreach( $arResult["ITEMS"] as $arItem ){
			$image = GetConfig( "default_image" );
			if( isset($arItem["PREVIEW_PICTURE"]["SRC"]) && $arItem["PREVIEW_PICTURE"]["SRC"] ) $image = MakeImage( $arItem["PREVIEW_PICTURE"]["SRC"], array("w"=>108,"h"=>81,"zc"=>1) );
			?>
			<div class="pop_item <?if( $arItem["PROPERTIES"]["IS_NO_AUTH"]["VALUE_XML_ID"]!="Y"){?>only_subs<?}?>">
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
					<span class="pop_img" style="background-image: url(<?=$image?>);"></span>
					<span class="pop_info">
						<span class="pop_name"><?=$arItem["NAME"]?></span>
						<span class="pop_text"><?=$arItem["PREVIEW_TEXT"]?></span>
					</span>
					<span class="clear"></span>
				</a>
			</div>
		<?}?>
	</div>
	<div class="overlay_gradient"></div>
</div>