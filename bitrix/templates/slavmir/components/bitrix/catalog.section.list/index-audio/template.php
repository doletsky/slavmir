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
global $USER;
?>
<?
#pre($arResult);
#pre($arResult["CATEGORY"]);
?>
<div class="index_music">
	<div class="index_music_header">
		<h2>Музыка</h2>
		<div class="tabs index_music_tabs" id="music">
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
				<?/*?>
				<li data-id="3">Моя музыка <span class="my_music_num">15</span></li>
				<?*/?>
			</ul>
		</div>
	</div><!-- index_music_header -->
	<?
	$i=0;
	foreach( $arResult["CATEGORY"] as $ID => $arCategory ){
		?>
		<div class="tab_container index_music_container <?if($i==0){?>active<?}?>" data-attr="<?=$ID?>" data-id="music">
			<ul>
				<?foreach( $arCategory["ITEMS"] as $arItem ){
					$artistID = $arItem["PROPERTY_ARTIST_VALUE"];
					$artistName = '';
					if(isset($arResult["ARTISTS"][$artistID])){
						$artistName = $arResult["ARTISTS"][$artistID]["NAME"];
					}
					$image = GetConfig("audio_default_image");
					$playerImage = $image;
					if($arItem["PREVIEW_PICTURE"]){
						$image = MakeImage($arItem["PREVIEW_PICTURE"],array("w"=>42,"h"=>42,"zc"=>1));
						$playerImage = MakeImage($arItem["PREVIEW_PICTURE"],array("w"=>125,"h"=>125,"zc"=>1));
					}
					$isNoAuth = false;
					if( $arItem["PROPERTY_IS_NO_AUTH_ENUM_ID"]==19 ) $isNoAuth = true;


					$needBlock = false;
					global $USER;
					if( !$isNoAuth && !$USER->IsAuthorized() ){
						$needBlock = true;
						$arItem["PROPERTY_PATH_VALUE"] = '';
					}
					?>
					<li>
						<div class="item mus_wrap <?if(!$isNoAuth){?>subs<?}?>">
							<div class="mus_img pl-audio-play <?if($needBlock){?>block<?}?>" style="background-image: url(<?=$image?>);" data-url="<?=$arItem["PROPERTY_PATH_VALUE"]?>" data-picture="<?=$playerImage?>">
								<div class="play_btn"></div>
							</div>
							<div class="mus_info">
								<a class="mus_name" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
								<div class="mus_group"><?=$artistName?></div>
								<div class="mus_bar">
									<div class="list_img"></div>
									<div class="likes"></div>
									<?if($needBlock){?><span class="download dn"></span><?}else{?><a href="<?=$arItem["PROPERTY_PATH_VALUE"]?>" download><span class="download"></span></a><?}?>
								</div>
								<div class="mus_time"><?if($arItem["PROPERTY_DURATION_VALUE"]){?><?=duration($arItem["PROPERTY_DURATION_VALUE"])?><?}?></div>
							</div>
						</div>

						<?/*?>
						<img src="<?=$image?>" alt="<?=$arItem["NAME"]?> - <?=$artistName?>" class="music_img">
						<div class="index_mus_info">
							<span class="index_music_name"><?=$arItem["NAME"]?></span>
							<span class="index_music_group"><?=$artistName?></span>
							<span class="index_music_duration"><?if($arItem["PROPERTY_DURATION_VALUE"]){?><?=duration($arItem["PROPERTY_DURATION_VALUE"])?><?}?></span>
						</div>
						<?*/?>
					</li>
				<?}?>
			</ul>
		</div><!-- index_music_container -->
		<?
		$i++;
		?>
	<?}?>
</div><!-- index_music -->