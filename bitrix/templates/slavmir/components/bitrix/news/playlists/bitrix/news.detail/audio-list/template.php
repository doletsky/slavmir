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
#pre($arResult["PROPERTIES"]["AUDIO"]["VALUE"]);
?>
<div class="tab_container index_music_container active">
	<?if( count( $arResult["AUDIOS"] ) ){?>
		<ul>
			<?foreach( $arResult["AUDIOS"] as $arItem ){
				$artistID = $arItem["PROPERTY_ARTIST_VALUE"];
				$artist='';
				if( $artistID ){
					$artist = $arResult["ARTISTS"][$artistID];
				}
				$image = GetConfig("audio_default_image");
				$playerImage = $image;
				if($arItem["PREVIEW_PICTURE"]){
					$image = MakeImage($arItem["PREVIEW_PICTURE"],array("w"=>42,"h"=>42,"zc"=>1));
					$playerImage = MakeImage($arItem["PREVIEW_PICTURE"],array("w"=>125,"h"=>125,"zc"=>1));
				}
				$isNoAuth = false;
				if( $arItem["PROPERTY_IS_NO_AUTH_ENUM_ID"]=="19" ) $isNoAuth = true;

				$needBlock = false;
				global $USER;
				if( !$isNoAuth && !$USER->IsAuthorized() ){
					$needBlock = true;
					$arItem["PROPERTY_PATH_VALUE"] = '';
				}
				?>
				<li>
					<div class="mus_wrap <?if(!$isNoAuth){?>subs<?}?>">
						<div class="mus_img pl-audio-play <?if($needBlock){?>block<?}?>" style="background-image: url(<?=$image?>);" data-url="<?=$arItem["PROPERTY_PATH_VALUE"]?>" data-picture="<?=$playerImage?>">
							<div class="play_btn"></div>
						</div>
						<div class="mus_info">
							<a class="mus_name" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
							<div class="mus_group"><?if( $artistID ){?><?=$artist["NAME"]?><?}?></div>
							<div class="mus_bar">
								<div class="list_img"></div>
								<div class="likes"></div>
								<?if($needBlock){?><span class="download dn"></span><?}else{?><a href="<?=$arItem["PROPERTY_PATH_VALUE"]?>" download><span class="download"></span></a><?}?>
							</div>
							<div class="mus_time"><?if($arItem["PROPERTY_DURATION_VALUE"]){?><?=duration($arItem["PROPERTY_DURATION_VALUE"])?><?}?></div>
						</div>
					</div>
				</li>
			<?}?>
		</ul>
	<?}?>
</div><!-- index_music_container -->