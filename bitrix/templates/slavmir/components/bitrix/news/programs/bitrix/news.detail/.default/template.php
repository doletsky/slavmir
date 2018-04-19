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
//file_put_contents($_SERVER["DOCUMENT_ROOT"]."/upload/arResult_programm.txt", print_r($arResult,true));
?>
<script>
    var pageTitle='<?=$arResult["NAME"]?>';
    $('h1.page_name').text(pageTitle);
    var headerBg='';
</script>
<section id="prog_item_info" <?if($arResult["DETAIL_PICTURE"]["SRC"]){?>style="background-image:url(<?=$arResult["DETAIL_PICTURE"]["SRC"]?>)"<?}?>  >
	<div class="container">
		<div class="title">Программы</div>
		<h1><?=$arResult["NAME"]?></h1>
		<p><?=$arResult["PREVIEW_TEXT"]?></p>
	</div>
	<div class="rel_auth">
		<?
		$artistID = null;
		if( $arResult["PROPERTIES"]["ARTIST"]["VALUE"] ){
			$artistID = $arResult["PROPERTIES"]["ARTIST"]["VALUE"];
			$artistArr = $arResult["ARTISTS"][$artistID];
		}
		$screenwriterID = null;
		if( $arResult["PROPERTIES"]["SCREENWRITER"]["VALUE"] ){
			$screenwriterID = $arResult["PROPERTIES"]["SCREENWRITER"]["VALUE"];
			$screenwriterArr = $arResult["ARTISTS"][$screenwriterID];
		}

		?>
		<?if( $artistID ){?>
			<img src="<?=MakeImage($artistArr["PREVIEW_PICTURE"],array("w"=>120,"h"=>120,"zc"=>1))?>" alt="<?=$artistArr["NAME"]?>">
		<?}?>
		<?if( $screenwriterID ){?>
			<img src="<?=MakeImage($screenwriterArr["PREVIEW_PICTURE"],array("w"=>120,"h"=>120,"zc"=>1))?>" alt="<?=$screenwriterArr["NAME"]?>">
		<?}?>
		<?if( $artistID ){?>
			<p>Ведущий: <span class="rel_auth_name"><?=$artistArr["NAME"]?></span></p>
		<?}?>
		<?if( $screenwriterID ){?>
			<p>Сценарист: <span class="rel_auth_name"><?=$screenwriterArr["NAME"]?></span></p>
		<?}?>
	</div>
	<?/*?>
	<div class="right_soc">
		<ul>
			<a href="#">
				<li>
					<img src="<?=SITE_TEMPLATE_PATH?>/images/ok_r.png" alt="ok"><span>6</span>
				</li>
			</a>
			<a href="#">
				<li>
					<img src="<?=SITE_TEMPLATE_PATH?>/images/twit_r.png" alt="twit"><span>3</span>
				</li>
			</a>
			<a href="#">
				<li>
					<img src="<?=SITE_TEMPLATE_PATH?>/images/fb_r.png" alt="fb"><span>136</span>
				</li>
			</a>
			<a href="#">
				<li>
					<img src="<?=SITE_TEMPLATE_PATH?>/images/vk_r.png" alt="vk"><span>41</span>
				</li>
			</a>
		</ul>
	</div>
	<?*/?>
</section>
<section id="releases">
	<div class="container">
		<div class="rel_left ajax-list">
			<h3>Выпуски</h3>
            <?if($_REQUEST['AJAX']=='Y')
                $APPLICATION->RestartBuffer();?>
			<div class="rel_list clearfix" data-cnt="<?=$arResult["AUDIO_CNT"]?>">
				<?
				if( count($arResult["AUDIO"]) ){
					foreach( $arResult["AUDIO"] as $arItem ){
						if( isset($arItem["PREVIEW_PICTURE"]) && $arItem["PREVIEW_PICTURE"] ){
							$image = MakeImage( $arItem["PREVIEW_PICTURE"], array("w"=>305,"h"=>227,"zc"=>1) );
						}
						else{
							$image = GetConfig("audio_default_image");
						}
						$artistID = $arItem["PROPERTY_ARTIST_VALUE"];
						$artistName = $arResult["AV_ARTISTS"][$artistID]["NAME"];
						?>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="item rel_item audio pl-audio-play" data-name="<?=$arItem["NAME"]?>"  data-url="<?=$arItem["PROPERTY_PATH_VALUE"]?>" data-picture="<?=$image?>" onclick="return false;">
							<div class="rel_item_img" style="background-image: url(<?=$image?>);">
								<span class="rel_time">
									<img src="<?=SITE_TEMPLATE_PATH?>/images/rel_play.png" alt="rel_play"><?if($arItem["PROPERTY_DURATION_VALUE"]){?><span><?=duration($arItem["PROPERTY_DURATION_VALUE"])?></span><?}?>
								</span>
								<?/*?><div class="rel_comments">
									<p>120</p>
								</div>
								<div class="rel_comments active">
									<p>Мое мнение</p>
								</div>
								<div class="rel_likes">
									<p>15</p>
								</div>
								<div class="rel_likes active">
									<p class="active">Любо!</p>
								</div>
								<?*/?>
								<div class="play"></div>
							</div>
							<span class="rel_title"><?=$arResult["NAME"]?></span>
                            <span class="rel_name" onclick="location.href='<?=$arItem["DETAIL_PAGE_URL"]?>'"><?=$arItem["NAME"]?></span>
							<span class="rel_desc"><?=$arItem["PREVIEW_TEXT"]?></span>
						</a>
					<?
					}
				}
				?>

				<?
				if( count($arResult["VIDEO"]) ){
					foreach( $arResult["VIDEO"] as $arItem ){
						if( isset($arItem["PREVIEW_PICTURE"]) && $arItem["PREVIEW_PICTURE"] ){
							$image = MakeImage( $arItem["PREVIEW_PICTURE"], array("w"=>305,"h"=>227,"zc"=>1) );
						}
						else{
							$image = GetConfig("video_default_image");
						}
						$artistID = $arItem["PROPERTY_ARTIST_VALUE"];
						$artistName = $arResult["AV_ARTISTS"][$artistID]["NAME"];
                        $url=str_replace("https://www.youtube.com/watch?v=", "", $arItem["PROPERTY_PATH_VALUE"]);
						?>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="item pl-video-play" data-name="<?=$arItem["NAME"]?>" data-artist="<?=$artistName?>" data-url="<?=$url?>" data-picture="<?=$image?>" onclick="return false">
							<div class="rel_item_img" style="background-image: url(<?=$image?>);">
								<span class="rel_time">
									<img src="<?=SITE_TEMPLATE_PATH?>/images/rel_play.png" alt="rel_play"><?if($arItem["PROPERTY_DURATION_VALUE"]){?><span><?=$arItem["PROPERTY_DURATION_VALUE"]?></span><?}?>
								</span>
								<?/*?><div class="rel_comments">
									<p>120</p>
								</div>
								<div class="rel_comments active">
									<p>Мое мнение</p>
								</div>
								<div class="rel_likes">
									<p>15</p>
								</div>
								<div class="rel_likes active">
									<p class="active">Любо!</p>
								</div>
								<?*/?>
								<div class="play"></div>
							</div>
							<span class="rel_title"><?=$arResult["NAME"]?></span>
							<span class="rel_name"><?=$arItem["NAME"]?></span>
							<span class="rel_desc"><?=$arItem["PREVIEW_TEXT"]?></span>
						</a>
					<?
					}
				}
				?>
				<?/*?>
				<a class="plus played item">
					<div class="rel_item_img" style="background-image: url(images/audio_top_img1.png);">
						<span class="rel_time">
							<img src="images/rel_play.png" alt="rel_play"><span>3:59</span>
						</span>
						<div class="play"></div>
					</div>
					<span class="rel_title">Секреты бабушки Василисы</span>
					<span class="rel_name">Секретный код</span>
					<span class="rel_desc">Выпуск №8 от 6 июля</span>
				</a>
				
				<div class="item">
					<div class="prev_rel">
						<a href="#">Выпуски <br> за 2016 год</a>
					</div>
				</div>
				<?*/?>
			</div>
            <?if($arResult["AUDIO_CNT"]>18) echo $arResult['AUDIO_NAV_STRING'];?>
            <?if($_REQUEST['AJAX']=='Y')
                die();?>
		</div>
		<div class="rel_right">
			<div class="rel_auth_desc">
				<?=$arResult["DETAIL_TEXT"]?>
			</div>
			<div class="rel_all_prog">
				<h5>Все программы</h5>
				<div class="rel_all_prog_list_wrap">
					<div class="rel_all_prog_list scrolled">
						<?foreach( $arResult["ALL_PROGRAMS"] as $arItem ){
							if( isset($arItem["PREVIEW_PICTURE"]) && $arItem["PREVIEW_PICTURE"] ){
								$image = MakeImage( $arItem["PREVIEW_PICTURE"], array("w"=>110,"h"=>82,"zc"=>1) );
							}
							else{
								$image = GetConfig("program_default_image");
							}
							?>
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="prog_item">
								<img src="<?=$image?>" alt="lost-towns">
								<span class="rel_all_desc">
									<h6><?=$arItem["NAME"]?></h6>
									<p><?=$arItem["PREVIEW_TEXT"]?></p>
								</span>
							</a>
						<?}?>
					</div>
					<div class="overlay_gradient"></div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</section>