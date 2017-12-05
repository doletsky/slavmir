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
<div class="index_prog">
	<div class="container">
		<div class="index_prog_header">
			<h2>Программы</h2>
			<div class="tabs index_prog_tabs" id="prog">
				<ul>
					<li class="active" data-id="all">Все</li>
					<?foreach( $arResult["CATEGORY"] as $ID => $arCategory ){?>
					<li data-id="<?=$ID?>"><?=$arCategory["NAME"]?></li>
					<?}?>
				</ul>
			</div><!-- index_prog_tabs -->
		</div><!-- index_prog_header -->
		<div class="clear"></div>
	</div><!-- container -->
	<div class="tab_container index_prog_container active" data-attr="all" data-id="prog">
		<?foreach( $arResult["CATEGORY_ALL"] as $i => $arItem ){
			if( $i>3 ) break;
			#pre($arItem);
			if( $arItem["PREVIEW_PICTURE"] ){
				$bg = MakeImage( $arItem["PREVIEW_PICTURE"], array("w"=>357,"h"=>265,"zc"=>1) );
			}
			else{
				$bg = GetConfig("program_default_image");
			}
			$isBlack = ($arItem["PROPERTY_IS_BLACK_ENUM_ID"]==33)?true:false;
			?>
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="index_prog_item <?if($isBlack){?>black<?}?>" style="background-image: url(<?=$bg?>)">
				<span class="prog_name_container">
					<p class="prog_name"><?=$arItem["NAME"]?></p>
					<p class="prog_desc"><?=$arItem["PREVIEW_TEXT"]?></p>
				</span>
			</a>
		<?}?>
	</div>
	<?foreach( $arResult["CATEGORY"] as $ID => $arCategory ){?>
	<div class="tab_container index_prog_container" data-attr="<?=$ID?>" data-id="prog">
		<?/*?><ul><?*/?>
		<?foreach( $arCategory["ITEMS"] as $ii => $arItem ){
			if( $ii>3 ) break;
			if( $arItem["PREVIEW_PICTURE"] ){
				$bg = MakeImage( $arItem["PREVIEW_PICTURE"], array("w"=>357,"h"=>265,"zc"=>1) );
			}
			else{
				$bg = GetConfig("program_default_image");
			}
			$isBlack = ($arItem["PROPERTY_IS_BLACK_ENUM_ID"]==33)?true:false;
			?>
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="index_prog_item <?if($isBlack){?>black<?}?>" style="background-image: url(<?=$bg?>)">
				<?/*?><li data-src="<?=SITE_TEMPLATE_PATH?>/images/lost-towns.png"><?*/?>
					<span class="prog_name_container">
						<p class="prog_name"><?=$arItem["NAME"]?></p>
						<p class="prog_desc"><?=$arItem["PREVIEW_TEXT"]?></p>
					</span>
				<?/*?></li><?*/?>
			</a>
		<?}?>	
		<?/*?></ul><?*/?>
	</div>
	<?}?>
</div><!-- index_prog -->