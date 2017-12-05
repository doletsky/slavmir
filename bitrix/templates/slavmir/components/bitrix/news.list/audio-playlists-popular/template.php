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
$count = count($arResult["ITEMS"]);
if( $count ){
	?>
	<div class="pop_playlists_box">
		<h3>Популярные плейлисты</h3>
		<div class="playlist_items">
			<?foreach( $arResult["ITEMS"] as $arItem ){
				if( $arItem["PREVIEW_PICTURE"]["SRC"] ){
					$image = MakeImage( $arItem["PREVIEW_PICTURE"]["SRC"], array("w"=>188,"h"=>188,"zc"=>1) );
				}
				else{
					$image = GetConfig("playlist_default_image");
				}
				?>
				<div class="playlist_box">
					<div class="pl_top_row">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
							<span class="pl_item pl_x2" style="background-image: url(<?=$image?>)">
								<span class="pl_name"><?=$arItem["NAME"]?></span>
							</span>
						</a>
						<?audioPlaylistAudio( 0, $arItem, $arResult["AUDIOS"] );?>
						<?audioPlaylistAudio( 1, $arItem, $arResult["AUDIOS"] );?>
					</div>
					<div class="pl_bot_row">
						<?audioPlaylistAudio( 2, $arItem, $arResult["AUDIOS"] );?>
						<?audioPlaylistAudio( 3, $arItem, $arResult["AUDIOS"] );?>
						<?audioPlaylistAudio( 4, $arItem, $arResult["AUDIOS"] );?>
					</div>
					<div class="pl_box_text">
						<?
						$authorID = $arItem["PROPERTIES"]["AUTHOR"]["VALUE"];
						if( $authorID && isset( $arResult["AUTHORS"][$authorID] ) ){?>
							<p class="pl_author">Автор: <?=$arResult["AUTHORS"][$authorID]["NAME"]?></p>
						<?}?>
						<?if( $arItem["PROPERTIES"]["DURATION"]["VALUE"] ){?>
							<p class="pl_time"><?=$arItem["PROPERTIES"]["DURATION"]["VALUE"]?></p>
						<?}?>
					</div>
				</div>
			<?}?>
		</div><!-- playlist_items -->
	</div>
<?}?>
<?
function audioPlaylistAudio($i,$arItem,$audios){
	if( isset( $arItem["PROPERTIES"]["AUDIO"]["VALUE"][$i] ) ){
		$audioID = $arItem["PROPERTIES"]["AUDIO"]["VALUE"][$i];
		if( isset( $audios[$audioID] ) ){
			if( $audios[$audioID]["PREVIEW_PICTURE"] ){
				$image = MakeImage( $audios[$audioID]["PREVIEW_PICTURE"], array("w"=>90,"h"=>90,"zc"=>1) );
			}
			else{
				$image = GetConfig("audio_default_image");
			}
			?>
			<a href="<?=$audios[$audioID]["DETAIL_PAGE_URL"]?>">
				<span class="pl_item" style="background-image: url(<?=$image?>)"></span>
			</a>
			<?
		}
	}
}
?>


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>