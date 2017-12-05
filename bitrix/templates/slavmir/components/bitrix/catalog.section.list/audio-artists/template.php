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
<div class="right_audio_komp">
	<h4>Исполнители</h4>
	<div class="tabs all_tabs" id="right_audio_komp_tabs">
		<ul>
			<li data-id="all" class="active">Все <span class="item_numb"><?=count($arResult["ITEMS_ALL"])?></span></li>
			<?foreach( $arResult["SECTIONS"] as $arSection ){?>
				<li data-id="<?=$arSection["ID"]?>"><?=$arSection["NAME"]?> <span class="item_numb"><?=count($arSection["ITEMS"])?></span></li>
			<?}?>
		</ul>
	</div>
	<div class="ispolniteli_list_wrap">
		<div class="tab_container ispolniteli_list scrolled active" data-attr="all" data-id="right_audio_komp_tabs">
			<?foreach( $arResult["ITEMS_ALL"] as $arItem ){
				if( $arItem["PREVIEW_PICTURE"] ){
					$image = MakeImage( $arItem["PREVIEW_PICTURE"], array("w"=>42,"h"=>42,"zc"=>1) );
				}
				else{
					$image = GetConfig("artist_default_image");
				}
				$artistID = $arItem["ID"];
				if( isset( $arResult["ARTIST_COUNT"][$artistID] ) ){
					$count = $arResult["ARTIST_COUNT"][$artistID];
				}
				else{
					$count = 0;
				}
				#if( !$count ) continue;
				?>
				<a class="item" href="">
					<img src="<?=$image?>" alt="<?=$arItem["NAME"]?>" class="music_img">
					<span class="isp_info">
						<span class="isp_name"><?=$arItem["NAME"]?> <span class="isp_numb"><?=$count?></span></span>
					</span>
				</a>
				<?}?>
		</div>
		<?foreach( $arResult["SECTIONS"] as $arSection ){?>
		<div class="tab_container ispolniteli_list scrolled" data-attr="<?=$arSection["ID"]?>" data-id="right_audio_komp_tabs">
			<?foreach( $arSection["ITEMS"] as $arItem ){?>
				<a class="item" href="">
					<?
					if( $arItem["PREVIEW_PICTURE"] ){
						$image = MakeImage( $arItem["PREVIEW_PICTURE"], array("w"=>42,"h"=>42,"zc"=>1) );
					}
					else{
						$image = GetConfig("artist_default_image");
					}
					$artistID = $arItem["ID"];
					if( isset( $arResult["ARTIST_COUNT"][$artistID] ) ){
						$count = $arResult["ARTIST_COUNT"][$artistID];
					}
					else{
						$count = 0;
					}
					?>
					<img src="<?=$image?>" alt="<?=$arItem["NAME"]?>" class="music_img">
					<span class="isp_info">
						<span class="isp_name"><?=$arItem["NAME"]?> <span class="isp_numb"><?=$count?></span></span>
					</span>
				</a>
			<?}?>
		</div>
		<?}?>
		<div class="overlay_gradient"></div>
	</div>
</div><!-- right_audio_komp -->