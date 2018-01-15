<?
?>
<section class="daily_video_slider_box">
	<div class="daily_video_slider">
		<?foreach( $arResult["ITEMS"] as $arItem ){
			if( $arItem["PREVIEW_PICTURE"]["SRC"] ){
				$image = $arItem["PREVIEW_PICTURE"]["SRC"];
			}
			else{
				$image = GetConfig( "video_default_image" );
			}

			$isNoAuth = false;
			if( $arItem["PROPERTIES"]["IS_NO_AUTH"]["VALUE_XML_ID"]=="Y" ) $isNoAuth = true;

			$needBlock = false;
			global $USER;
			if( !$isNoAuth && !$USER->IsAuthorized() ){
				$needBlock = true;
				$arItem["PROPERTIES"]["PATH"]["VALUE"] = '';
			}
			
			$url = $arItem["PROPERTIES"]["PATH"]["VALUE"];
			$url = str_replace( "https://www.youtube.com/watch?v=", "", $url );

			$artistID = $arItem["PROPERTIES"]["ARTIST"]["VALUE"];
			$artist = '';
			if($artistID && isset($arResult["ARTISTS"][$artistID])){
				$artist = $arResult["ARTISTS"][$artistID]["NAME"];
			}
			?>
			<div class="daily_video_item">
				<div class="item_img" style="background-image: url(<?=$image?>);"></div>
				<div class="play_video_btn pl-video-play <?if($needBlock){?>block<?}?>" data-name="<?=$arItem["NAME"]?>" data-artist="<?=$artist?>" data-picture="<?=$image?>" data-url="<?=$url?>"><img src="<?=SITE_TEMPLATE_PATH?>/images/play_btn_large.png" alt="<?=$arItem["NAME"]?>"></div>
				<?if( $arItem["PROPERTIES"]["IS_NO_AUTH"]["VALUE_XML_ID"] != "Y" ){?>
				<div class="only_subs">
					<span>Доступно по подписке </span><img src="<?=SITE_TEMPLATE_PATH?>/images/only_subs_btn.png" alt="Доступно по подписке">
				</div>
				<?}?>
				<?#pre($arItem["PROPERTIES"]["IS_NO_AUTH"])?>
			</div>
		<?}?>
	</div>
</section>