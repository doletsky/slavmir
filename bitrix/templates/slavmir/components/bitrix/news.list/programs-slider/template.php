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
<section id="our_prog_slider_box">
	<div class="our_prog_slider">
		<?foreach( $arResult["ITEMS"] as $arItem ){?>
		<div class="our_prog_slide" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);">
			<div class="prog_slide_text">
				<h2><?=$arItem["NAME"]?></h2>
				<p><?=$arItem["PREVIEW_TEXT"]?></p>
				<?if( $arItem["PROGRAM"] ){?>
				<div class="vipusk">
					<?#pre($arItem["AUDIO"])?>
					<?if( isset( $arItem["AUDIO"] ) ){
						if( $arItem["AUDIO"]["PREVIEW_PICTURE"] ){
							$image = MakeImage( $arItem["AUDIO"]["PREVIEW_PICTURE"], array("w"=>60,"h"=>60,"zc"=>1) );
						}
						else{
							$image = GetConfig( "audio_default_image" );
						}
						?>
						<div class="vipusk_img">
							<img src="<?=$image?>" alt="<?=$arItem["AUDIO"]["NAME"]?>">
						</div>
						<span class="vipusk_desc"><?=$arItem["AUDIO"]["NAME"]?></span>
					<?}?>
					<a href="<?=$arItem["PROGRAM"]["DETAIL_PAGE_URL"]?>">Все выпуски</a>					
					<div class="clear"></div>
				</div>
				<?}?>
			</div>
		</div>
		<?}?>
	</div>
</section>
