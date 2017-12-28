<?
$arItem=array_shift($arResult["ITEMS"]);
if( isset($arItem["PREVIEW_PICTURE"]["SRC"]) && $arItem["PREVIEW_PICTURE"]["SRC"] ){
$image = MakeImage( $arItem["PREVIEW_PICTURE"]["SRC"], array("w"=>305,"h"=>225,"zc"=>1) );
}
else{
$image = GetConfig("video_default_image");
}
$artistID = $arItem["PROPERTIES"]["ARTIST"]["VALUE"];
$artist = '';
if($artistID && isset($arResult["ARTISTS"][$artistID])){
    $artist = $arResult["ARTISTS"][$artistID]["NAME"];
}
$url = $arItem["PROPERTIES"]["PATH"]["VALUE"];
$url = str_replace( "https://www.youtube.com/watch?v=", "", $url );
?>
<div class="main_img pl-video-play" style="background-image: url(<?=$image?>)" data-name="<?=$arItem["NAME"]?>" data-artist="<?=$artist?>" data-picture="<?=$image?>" data-url="<?=$url?>">
    <div id="m-video-container">
    </div>
    <?/*?><div class="time">4:30</div><?*/?>
</div>
<?/*?>
<div class="video_bar_list">
	<?
	$i=0;
	foreach( $arResult["CATEGORY"] as $ID => $arCategory ){?>
	<div class="tab_container video_bar_container <?if($i==0){?>active<?}?>" data-attr="<?=$ID?>" data-id="video_bar_tabs">
		<div class="video_bar_slider">
			<?
			$ii=0;
			foreach( $arResult["ITEMS"] as $arItem ){
				if( in_array( $ID, $arItem["PROPERTIES"]["CATEGORY"]["VALUE_ENUM_ID"] ) && $ii<=6 ){
					$ii++;
					if( isset($arItem["PREVIEW_PICTURE"]["SRC"]) && $arItem["PREVIEW_PICTURE"]["SRC"] ){
						$image = MakeImage( $arItem["PREVIEW_PICTURE"]["SRC"], array("w"=>305,"h"=>225,"zc"=>1) );
					}
					else{
						$image = GetConfig("video_default_image");
					}
					$isNoAuth = ($arItem["PROPERTIES"]["IS_NO_AUTH"]["VALUE_XML_ID"]=="Y")?true:false;
					$artistID = $arItem["PROPERTIES"]["ARTIST"]["VALUE"];
					$artist = '';
					if($artistID && isset($arResult["ARTISTS"][$artistID])){
						$artist = $arResult["ARTISTS"][$artistID]["NAME"];
					}
					$url = $arItem["PROPERTIES"]["PATH"]["VALUE"];
					$url = str_replace( "https://www.youtube.com/watch?v=", "", $url );
				?>
				<div class="video_bar_item pl-video-play" data-name="<?=$arItem["NAME"]?>" data-artist="<?=$artist?>" data-picture="<?=$image?>" data-url="<?=$url?>">
					<div class="video_bar_item_img" style="background-image: url(<?=$image?>);">
						<div class="time"></div>
					</div>
					<h6><?=$arItem["NAME"]?></h6>
					<?if($artist){?><p><?=$artist?></p><?}?>
				</div><!-- video_bar_item -->
				<?
				}
			}
			?>
		</div><!-- video_bar_slider -->
	</div><!-- video_bar_container -->
	<?$i++;?>
	<?}?>
</div>
<?*/?>