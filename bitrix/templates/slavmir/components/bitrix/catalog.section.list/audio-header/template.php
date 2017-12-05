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
#pre($arResult);
#pre($arResult["CATEGORY"]);
?>
<div class="audio_page_header">
	<div class="tabs" id="audio_page_tabs">
		<ul>
			<?
			$i=0;
			foreach( $arResult["CATEGORY"] as $ID => $arCategory ){
				?>
				<li <?if($i==0){?>class="active"<?}?> data-id="<?=$ID?>"><?=$arCategory["NAME"]?></li>
				<?
				$i++;
				?>
			<?}?>
			<?/*?><li data-id="4">Моя музыка</li><?*/?>
		</ul>
	</div>
	<div class="radio_efir">
		<a href="">Радио-эфир</a>
	</div>
	<div class="clear"></div>
</div>
<?
$i=0;
foreach( $arResult["CATEGORY"] as $ID => $arCategory ){
	?>
	<div class="tab_container <?if($i==0){?>active<?}?>" data-attr="<?=$ID?>" data-id="audio_page_tabs">
		<ul>
			<?foreach( $arCategory["ITEMS"] as $arItem ){
				$artistID = $arItem["PROPERTY_ARTIST_VALUE"];
				$artistName = '';
				if(isset($arResult["ARTISTS"][$artistID])){
					$artistName = $arResult["ARTISTS"][$artistID]["NAME"];
				}
				$image = GetConfig("audio_default_image");
				if($arItem["PREVIEW_PICTURE"]) $image = MakeImage($arItem["PREVIEW_PICTURE"],array("w"=>219,"h"=>229,"zc"=>1));
				?>
				<li>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$image?>" alt="<?=$arItem["NAME"]?> - <?=$artistName?>" class="audioP_top_img"></a>
					<span class="audioP_name"><?=$arItem["NAME"]?></span>
					<span class="audioP_descr"><?=$artistName?></span>
				</li>
			<?}?>
		</ul>
	</div>
	<?
	$i++;
	?>
<?}?>