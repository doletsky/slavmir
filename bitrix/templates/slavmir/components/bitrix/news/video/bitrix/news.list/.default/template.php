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
<section class="video_page_list_container">
	<h3>Видео</h3>
	<div class="tabs" id="video_page_tabs">
		<ul>
			<li data-id="all">Все <span><?=count($arResult["ITEMS"])?></span></li>
			<?
			$i=0;
			foreach( $arResult["CATEGORY"] as $ID => $arCategory ){?>
				<li <?if($i==0){?>class="active"<?}?> data-id="<?=$ID?>"><?=$arCategory["NAME"]?> <span><?if( isset($arResult["CATEGORY_COUNT"][$ID]) ){?><?=$arResult["CATEGORY_COUNT"][$ID]?><?}?></span></li>
				<?$i++;?>
			<?}?>
		</ul>
	</div>
	<div class="clear"></div>
	<?#pre($arResult["ITEMS"])?>
	<div class="tab_container our_prog_list_container" data-attr="all" data-id="video_page_tabs">
		<div class="video_page_list">
            <?$countItem=0;$countPagen=0;$pagen=20;$curPage=0;$navStr='';?>
			<?foreach( $arResult["ITEMS"] as $arItem ){
                $countPagen=intval($countItem/$pagen);
                if($curPage<$countPagen){
                    $navStr.="<span ";
                    if($curPage>0) $navStr.="class='video_more pagen_".$curPage."' style='display: none' ";
                    else $navStr.="class='video_more' ";
                    $navStr.="onclick=\"$('.pagen_".$countPagen."').css('display','block');$(this).css('display','none');\">Загрузить еще</span><br>";
                }
                $curPage=$countPagen;
                $countItem++;
				if( isset($arItem["PREVIEW_PICTURE"]["SRC"]) && $arItem["PREVIEW_PICTURE"]["SRC"] ){
					$image = MakeImage( $arItem["PREVIEW_PICTURE"]["SRC"], array("w"=>305,"h"=>225,"zc"=>1) );
				}
				else{
					$image = GetConfig("video_default_image");
				}
				$isNoAuth = ($arItem["PROPERTIES"]["IS_NO_AUTH"]["VALUE_XML_ID"]=="Y")?true:false;

				$needBlock = false;
				global $USER;
				if( !$isNoAuth && !$USER->IsAuthorized() ){
					$needBlock = true;
					$arItem["PROPERTIES"]["PATH"]["VALUE"] = '';
				}

				$artistID = $arItem["PROPERTIES"]["ARTIST"]["VALUE"];
				$artist = '';
				if($artistID && isset($arResult["ARTISTS"][$artistID])){
					$artist = $arResult["ARTISTS"][$artistID]["NAME"];
				}
				$url = $arItem["PROPERTIES"]["PATH"]["VALUE"];
				$url = str_replace( "https://www.youtube.com/watch?v=", "", $url );
				?>
				<div class="video_page_item <?if(!$isNoAuth){?>top<?}?> pagen_<?=$curPage?>" <?if($curPage>0) echo 'style="display:none"'?>>
					<a href="" class="pl-video-play <?if($needBlock){?>block<?}?>" data-name="<?=$arItem["NAME"]?>" data-artist="<?=$artist?>" data-picture="<?=$image?>" data-url="<?=$url?>">
						<span class="item_img" style="background-image: url(<?=$image?>);">
							<span class="video_time"><img src="<?=SITE_TEMPLATE_PATH?>/images/play_btn_small.png" alt="<?=$arItem["NAME"]?>"><?=duration($arItem["PROPERTIES"]["DURATION"]["VALUE"])?></span>
							<span class="overlay">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/play_video_orange.png" alt="Просмотр">
								<?if(!$isNoAuth){?><p>Смотреть <br> по подписке</p><?}else{?><p>Смотреть <br> бесплатно</p><?}?>
							</span>
						</span>
					</a>
					<h4><?=$arItem["NAME"]?></h4>
					<?if($artist){?>
					<p class="video_author">Автор: <?=$artist?></p>
					<?}?>
					<?/*?><p class="video_views">63 232 просмотров</p><?*/?>
				</div>
			<?}?>
            <?=$navStr?>
		</div>
	</div>
	<?
	$i=0;
	foreach( $arResult["CATEGORY"] as $ID => $arCategory ){?>
	<div class="tab_container our_prog_list_container <?if($i==0){?>active<?}?>" data-attr="<?=$ID?>" data-id="video_page_tabs">
		<div class="video_page_list">
			<?foreach( $arResult["ITEMS"] as $arItem ){
				if( in_array( $ID, $arItem["PROPERTIES"]["CATEGORY"]["VALUE_ENUM_ID"] ) ){
					if( isset($arItem["PREVIEW_PICTURE"]["SRC"]) && $arItem["PREVIEW_PICTURE"]["SRC"] ){
						$image = MakeImage( $arItem["PREVIEW_PICTURE"]["SRC"], array("w"=>305,"h"=>225,"zc"=>1) );
					}
					else{
						$image = GetConfig("video_default_image");
					}
					$isNoAuth = ($arItem["PROPERTIES"]["IS_NO_AUTH"]["VALUE_XML_ID"]=="Y")?true:false;

					$needBlock = false;
					global $USER;
					if( !$isNoAuth && !$USER->IsAuthorized() ){
						$needBlock = true;
						$arItem["PROPERTIES"]["PATH"]["VALUE"] = '';
					}
				
					$artistID = $arItem["PROPERTIES"]["ARTIST"]["VALUE"];
					$artist = '';
					if($artistID && isset($arResult["ARTISTS"][$artistID])){
						$artist = $arResult["ARTISTS"][$artistID]["NAME"];
					}
					$url = $arItem["PROPERTIES"]["PATH"]["VALUE"];
					$url = str_replace( "https://www.youtube.com/watch?v=", "", $url );
				?>
				<div class="video_page_item <?if(!$isNoAuth){?>top<?}?>">
					<a href="" class="pl-video-play <?if($needBlock){?>block<?}?>" data-name="<?=$arItem["NAME"]?>" data-artist="<?=$artist?>" data-picture="<?=$image?>" data-url="<?=$url?>">
						<span class="item_img" style="background-image: url(<?=$image?>);">
							<span class="video_time"><img src="<?=SITE_TEMPLATE_PATH?>/images/play_btn_small.png" alt="<?=$arItem["NAME"]?>"><?=duration($arItem["PROPERTIES"]["DURATION"]["VALUE"])?></span>
							<span class="overlay">
								<img src="<?=SITE_TEMPLATE_PATH?>/images/play_video_orange.png" alt="Просмотр">
								<?if(!$isNoAuth){?><p>Смотреть <br> по подписке</p><?}else{?><p>Смотреть <br> бесплатно</p><?}?>
							</span>
						</span>
					</a>
					<h4><?=$arItem["NAME"]?></h4>
					<?if($artist){?>
					<p class="video_author">Автор: <?=$artist?></p>
					<?}?>
					<?/*?><p class="video_views">63 232 просмотров</p><?*/?>
				</div>
				<?}?>
			<?}?>
		</div>
	</div>
	<?$i++;?>
	<?}?>
</section>


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>