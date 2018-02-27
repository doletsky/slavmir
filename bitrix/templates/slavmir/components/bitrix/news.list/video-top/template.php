<div class="video_bar_list">
	<div class="tabs" id="video_bar_tabs">
		<ul>
			<?
			$i=0;
			foreach( $arResult["CATEGORY"] as $ID => $arCategory ){?>
				<li <?if($i==0){?>class="active"<?}?> data-id="<?=$ID?>"><?=$arCategory["NAME"]?> <span><?if( isset($arResult["CATEGORY_COUNT"][$ID]) ){?><?=$arResult["CATEGORY_COUNT"][$ID]?><?}?></span></li>
				<?$i++;?>
			<?}?>
		</ul>
	</div>
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
					if($arItem["PROPERTIES"]["IS_NO_AUTH"]["VALUE_XML_ID"]=="Y" || $arResult["cMon"]!=0)$isNoAuth = true; else $isNoAuth = false;
					$artistID = $arItem["PROPERTIES"]["ARTIST"]["VALUE"];
					$artist = '';
					if($artistID && isset($arResult["ARTISTS"][$artistID])){
						$artist = $arResult["ARTISTS"][$artistID]["NAME"];
					}
					$url = $arItem["PROPERTIES"]["PATH"]["VALUE"];
					$url = str_replace( "https://www.youtube.com/watch?v=", "", $url );
				?>
				<div class="video_bar_item pl-video-play<?if(!$isNoAuth){?> subs <?echo $cMon;}?>" data-name="<?=$arItem["NAME"]?>" data-artist="<?=$artist?>" data-picture="<?=$image?>" data-url="<?=$url?>">
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