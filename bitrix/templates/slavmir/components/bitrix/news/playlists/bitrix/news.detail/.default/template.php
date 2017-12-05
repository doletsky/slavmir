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
// Начало шаблона в файле detail.php

$authorID = $arResult["PROPERTIES"]["AUTHOR"]["VALUE"];
if( $authorID ){
	$author = $arResult["AUTHORS"][$authorID];
}
$image = GetConfig( "playlist_default_image" );
if( isset($arResult["PREVIEW_PICTURE"]["SRC"]) && $arResult["PREVIEW_PICTURE"]["SRC"] ) $image = MakeImage( $arResult["PREVIEW_PICTURE"]["SRC"], array("w"=>270,"h"=>277,"zc"=>1) );

$isNoAuth = false;
if( $arResult["PROPERTIES"]["IS_NO_AUTH"]["VALUE_XML_ID"]=="Y" ) $isNoAuth = true;

$needBlock = false;
global $USER;
if( !$isNoAuth && !$USER->IsAuthorized() ){
	$needBlock = true;
	#$arItem["PROPERTY_PATH_VALUE"] = '';
}
?>
<h1 class="page_name">Аудио</h1>
<div class="audio_item_top">
	<div class="audio_item_img">
		<img src="<?=$image?>" alt="<?=$arResult["NAME"]?>">
	</div>
	<div class="audio_item_info">
		<p class="playlist_top_name">Плейлист</p>
		<h2><?=$arResult["NAME"]?></h2>
		<?if($authorID){?><p class="album">АВТОР: <a href=""><?=$author["NAME"]?></a></p><?}?>
		<div class="audio_item_bar">
			<div class="play_audio_item">
				<div class="play_audio_item_img pl-playlist-play <?if($needBlock){?>block<?}?>" data-pl-id="<?=$arResult["ID"]?>"></div>
				<span><?=$arResult["PROPERTIES"]["DURATION"]["VALUE"]?></span>
			</div>
			<?/*?>
			<div class="audio_item_likes">
				<div class="audio_item_likes_img"></div>
				<span>15</span>
			</div>
			<div class="audio_item_add">
				<div class="audio_item_add_img"></div>
			</div>
			<div class="audio_item_download">
				<a href="#"><span class="audio_item_download_img"></span></a>
			</div>
			<?*/?>
		</div>
	</div>
</div><!-- audio_item_top -->