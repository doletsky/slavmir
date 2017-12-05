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
<div class="index_video">
	<h2>Видео дня</h2>
	<div class="index_video_slider">
		<?foreach( $arResult["ITEMS"] as $arItem ){
			$artistID = $arItem["PROPERTIES"]["ARTIST"]["VALUE"];
			$artist='';
			if( $artistID ) $artist = $arResult["ARTISTS"][$artistID]["NAME"];

			$isNoAuth = false;
			if( $arItem["PROPERTIES"]["IS_NO_AUTH"]["VALUE_XML_ID"]=="Y" ) $isNoAuth = true;

			$needBlock = false;
			global $USER;
			if( !$isNoAuth && !$USER->IsAuthorized() ){
				$needBlock = true;
				$arItem["PROPERTIES"]["PATH"]["VALUE"] = '';
			}

			$bg = GetConfig("video_default_image");
			if( isset($arItem["PREVIEW_PICTURE"]["SRC"]) && $arItem["PREVIEW_PICTURE"]["SRC"] ) $bg =  MakeImage($arItem["PREVIEW_PICTURE"]["SRC"],array("w"=>647,"h"=>265,"zc"=>1));
			$url = $arItem["PROPERTIES"]["PATH"]["VALUE"];
			$url = str_replace( "https://www.youtube.com/watch?v=", "", $url );
			?>
			<div class="index_video_slide pl-video-play <?if($needBlock){?>block<?}?>" data-name="<?=$arItem["NAME"]?>" data-artist="<?=$artist?>" data-picture="<?=$bg?>" data-url="<?=$url?>">
				<div class="index_video_slide_bg" <?if($bg){?>style="background-image: url(<?=$bg?>);"<?}?> ></div>
				<?/*?><div class="video_stat">
					<div class="video_comments">120</div>
					<div class="video_likes">15</div>
				</div><?*/?>
				<div class="play_btn"></div>
				<?if( $arItem["PROPERTIES"]["DURATION"]["VALUE"] ){?><div class="play_video_time"><?=duration($arItem["PROPERTIES"]["DURATION"]["VALUE"])?></div><?}?>
				<div class="video_overlay"></div>
				<div class="video_name_container">
					<span class="video_name"><?=$arItem["NAME"]?></span><span class="video_author"><?=$artist?></span>
				</div>
			</div>
		<?}?>
	</div>
</div>