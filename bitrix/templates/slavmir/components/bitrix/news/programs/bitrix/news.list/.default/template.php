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
<section id="our_prog_list_box">
	<div class="container">
		<div class="tabs" id="our_prog_list">
			<ul>
				<li data-id="all">Все</li>
				<?
				$i=0;
				foreach( $arResult["CATEGORY"] as $ID => $arCategory ){?>
					<li <?if($i==0){?>class="active"<?}?> data-id="<?=$ID?>"><?=$arCategory["NAME"]?></li>
					<?$i++;?>
				<?}?>
			</ul>
		</div>
		<?#pre($arResult["ITEMS"])?>
		<div class="tab_container our_prog_list_container" data-attr="all" data-id="our_prog_list">
			<?foreach( $arResult["ITEMS"] as $arItem ){
				if( isset($arItem["PREVIEW_PICTURE"]["SRC"]) && $arItem["PREVIEW_PICTURE"]["SRC"] ){
					$image = MakeImage( $arItem["PREVIEW_PICTURE"]["SRC"], array("w"=>303,"h"=>225,"zc"=>1) );
				}
				else{
					$image = GetConfig("program_default_image");
				}
				?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="prog_item">
					<img src="<?=$image?>" alt="">
					<div class="prog_name"><?=$arItem["NAME"]?></div>
					<p class="prog_desc"><?=$arItem["PREVIEW_TEXT"]?></p>
					<?
					$artistID = $arItem["PROPERTIES"]["ARTIST"]["VALUE"];
					if($artistID && isset($arResult["ARTISTS"][$artistID])){?>
						<p class="ved">Ведущий: <?=$arResult["ARTISTS"][$artistID]["NAME"]?></p>
					<?}?>
					<?
					$screenwriterID = $arItem["PROPERTIES"]["SCREENWRITER"]["VALUE"];
					if($screenwriterID && isset($arResult["ARTISTS"][$screenwriterID])){?>
						<p class="ved">Сценарист: <?=$arResult["ARTISTS"][$screenwriterID]["NAME"]?></p>
					<?}?>
					<div class="prog_info">
						<?if($arItem["VIDEO_COUNT"]>0){?><img src="<?=SITE_TEMPLATE_PATH?>/images/prog_video.png" alt=""><span><?=$arItem["VIDEO_COUNT"]?> <?=morph($arItem["VIDEO_COUNT"],"видео-выпуск","видео-выпуска","видео-выпусков")?></span><?}?>
						<?if($arItem["AUDIO_COUNT"]>0){?><img src="<?=SITE_TEMPLATE_PATH?>/images/prog_mat.png" alt=""><span><?=$arItem["AUDIO_COUNT"]?> <?=morph($arItem["AUDIO_COUNT"],"аудио-выпуск","аудио-выпуска","аудио-выпусков")?></span><?}?>
					</div>
				</a>
			<?}?>
		</div>
		<?
		$i=0;
		foreach( $arResult["CATEGORY"] as $ID => $arCategory ){?>
		<div class="tab_container our_prog_list_container <?if($i==0){?>active<?}?>" data-attr="<?=$ID?>" data-id="our_prog_list">
			<?foreach( $arResult["ITEMS"] as $arItem ){
				if( in_array( $ID, $arItem["PROPERTIES"]["CATEGORY"]["VALUE_ENUM_ID"] ) ){
					if( isset($arItem["PREVIEW_PICTURE"]["SRC"]) && $arItem["PREVIEW_PICTURE"]["SRC"] ){
						$image = MakeImage( $arItem["PREVIEW_PICTURE"]["SRC"], array("w"=>303,"h"=>225,"zc"=>1) );
					}
					else{
						$image = GetConfig("program_default_image");
					}
				?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="prog_item">
					<img src="<?=$image?>" alt="">
					<div class="prog_name"><?=$arItem["NAME"]?></div>
					<p class="prog_desc"><?=$arItem["PREVIEW_TEXT"]?></p>
					<?
					$artistID = $arItem["PROPERTIES"]["ARTIST"]["VALUE"];
					if($artistID && isset($arResult["ARTISTS"][$artistID])){?>
						<p class="ved">Ведущий: <?=$arResult["ARTISTS"][$artistID]["NAME"]?></p>
					<?}?>
					<?
					$screenwriterID = $arItem["PROPERTIES"]["SCREENWRITER"]["VALUE"];
					if($screenwriterID && isset($arResult["ARTISTS"][$screenwriterID])){?>
						<p class="ved">Сценарист: <?=$arResult["ARTISTS"][$screenwriterID]["NAME"]?></p>
					<?}?>
					<div class="prog_info">
						<?if($arItem["VIDEO_COUNT"]>0){?><img src="<?=SITE_TEMPLATE_PATH?>/images/prog_video.png" alt=""><span><?=$arItem["VIDEO_COUNT"]?> <?=morph($arItem["VIDEO_COUNT"],"видео-выпуск","видео-выпуска","видео-выпусков")?></span><?}?>
						<?if($arItem["AUDIO_COUNT"]>0){?><img src="<?=SITE_TEMPLATE_PATH?>/images/prog_mat.png" alt=""><span><?=$arItem["AUDIO_COUNT"]?> <?=morph($arItem["AUDIO_COUNT"],"аудио-выпуск","аудио-выпуска","аудио-выпусков")?></span><?}?>
					</div>
				</a>
				<?}?>
			<?}?>
		</div>
		<?$i++;?>
		<?}?>
	</div>
</section>


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>