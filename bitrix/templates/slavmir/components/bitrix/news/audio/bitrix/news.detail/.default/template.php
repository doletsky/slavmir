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

$artistName = null;
$artistID = $arResult["PROPERTIES"]["ARTIST"]["VALUE"];

$isNoAuth = false;
if( $arResult["PROPERTIES"]["IS_NO_AUTH"]["VALUE_XML_ID"]=="Y" ) $isNoAuth = true;

$needBlock = false;
global $USER;
if( !$isNoAuth && !$USER->IsAuthorized() ){
	$needBlock = true;
	$arResult["PROPERTIES"]["PATH"]["VALUE"] = '';
}
?>
		<h1 class="page_name">Аудио</h1>
		<div class="audio_item_top">
			<div class="left_box">
				<?
				$image = GetConfig("audio_default_image");
				$playerImage = $image;
				if( $arResult["PREVIEW_PICTURE"]["SRC"] ){
					$image = MakeImage($arResult["PREVIEW_PICTURE"]["SRC"],array("w"=>270,"h"=>270,"zc"=>1));
					#$playerImage = MakeImage($arItem["PREVIEW_PICTURE"]["SRC"],array("w"=>125,"h"=>125,"zc"=>1));
					$playerImage = $image;
				}
				?>
				<div class="audio_item_img">
					<img src="<?=$image?>" alt="audio_item_img">
				</div>
				<div class="audio_item_info">
					<h2><?=$arResult["NAME"]?></h2>
					<!--<p class="album">АЛЬБОМ: <a href="#">Станица</a> <span>1996</span></p>-->
					<div class="audio_item_author">
						<?
						$artist = '';
						if( isset( $arResult["ARTISTS"][$artistID] ) ){
							$artistImage = GetConfig("artist_default_image");
							if( $arResult["ARTISTS"][$artistID]["PREVIEW_PICTURE"] ) $artistImage = MakeImage($arResult["ARTISTS"][$artistID]["PREVIEW_PICTURE"],array("w"=>58,"h"=>58,"zc"=>1));
							$artist = $arResult["ARTISTS"][$artistID]["NAME"];
							?>
							<div class="audio_item_author_img">
								<img src="<?=$artistImage?>" alt="user_img">
							</div>
							<p><?=$arResult["ARTISTS"][$artistID]["NAME"]?> <span><?=$arResult["ARTIST_COUNT"]?></span></p>
						<?}?>
					</div>
					<div class="audio_item_bar">
						<div class="play_audio_item pl-audio-play <?if($needBlock){?>block<?}?>" data-url="<?=$arResult["PROPERTIES"]["PATH"]["VALUE"]?>" data-name="<?=$arResult["NAME"]?>" data-artist="<?=$artist?>" data-picture="<?=$playerImage?>">
							<div class="play_audio_item_img"></div>
							<?if( $arResult["PROPERTIES"]["DURATION"]["VALUE"] ){?><span><?=duration($arResult["PROPERTIES"]["DURATION"]["VALUE"])?></span><?}?>
						</div>
						<?/*?>
						<div class="audio_item_comments">
							<div class="audio_item_comments_img"></div>
							<span>15</span>
						</div>
						<div class="audio_item_likes">
							<div class="audio_item_likes_img"></div>
							<span>15</span>
						</div>
						<div class="audio_item_add">
							<div class="audio_item_add_img"></div>
						</div>
						<?*/?>
						<div class="audio_item_download">
							<?if($needBlock){?><span class="download dn"></span><?}else{?><a href="<?=$arResult["PROPERTIES"]["PATH"]["VALUE"]?>" download><span class="audio_item_download_img"></span></a><?}?>
						</div>
					</div>
				</div>
			</div><!-- left_box -->
			<div class="right_box">
				<?if( count( $arResult["SAME"] ) ){?>
				<p class="same">Похожее</p>
				<div class="tab_container index_music_container active">
					<?foreach( $arResult["SAME"] as $arItem ){
						$artistID = $arItem["PROPERTY_ARTIST_VALUE"];
						$artistName = '';
						if(isset($arResult["ARTISTS"][$artistID])){
							$artistName = $arResult["ARTISTS"][$artistID]["NAME"];
						}
						$image = GetConfig("audio_default_image");
						if($arItem["PREVIEW_PICTURE"]) $image = MakeImage($arItem["PREVIEW_PICTURE"],array("w"=>42,"h"=>42,"zc"=>1));
						?>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="item">
							<img src="<?=$image?>" alt="<?=$arItem["NAME"]?> - <?=$artistName?>" class="music_img">
							<div class="index_mus_info">
								<span class="index_music_name"><?=$arItem["NAME"]?></span>
								<span class="index_music_group"><?=$artistName?></span>
								<span class="index_music_duration"><?if($arItem["PROPERTY_DURATION_VALUE"]){?><?=duration($arItem["PROPERTY_DURATION_VALUE"])?><?}?></span>
								<?/*?><span class="audio_komp_plus"><img src="images/audio_plus.png" alt="audio_plus.png"></span><?*/?>
							</div>
						</a>
					<?}?>
				</div><!-- index_music_container -->
				<?}?>
			</div>
			<div class="clear"></div>
			<?/*?>
			<div class="right_soc dark">
				<ul>
					<a href="#">
						<li>
							<img src="images/ok_r_dark.png" alt="ok"><span>6</span>
						</li>
					</a>
					<a href="#">
						<li>
							<img src="images/twit_r_dark.png" alt="twit"><span>3</span>
						</li>
					</a>
					<a href="#">
						<li>
							<img src="images/fb_r_dark.png" alt="fb"><span>136</span>
						</li>
					</a>
					<a href="#">
						<li>
							<img src="images/vk_r_dark.png" alt="vk"><span>41</span>
						</li>
					</a>
				</ul>
			</div><!-- right_soc -->
			<?*/?>
		</div><!-- audio_item_top -->
	</div><!-- container -->
</div><!-- #audio_item -->
<div id="audio_item_text">
	<div class="container">
		<div class="left_col">
			<div class="tabs index_music_tabs" id="audio_item_text_tabs">
				<ul>
					<li class="active" data-id="text">Текст песни</li>
					<?/*?><li data-id="accord">Аккорды</li><?*/?>
				</ul>
			</div>
			<div class="tab_container active" data-attr="text" data-id="audio_item_text_tabs">
				<h3><?=$arResult["NAME"]?></h3>
				<?if( $arResult["DETAIL_TEXT"] ){?>
					<?=$arResult["DETAIL_TEXT"]?>
				<?}else{?>
					Текст песни пока не загружен
				<?}?>
			</div>
			<?/*?>
			<div class="tab_container" data-attr="accord" data-id="audio_item_text_tabs">
			</div>
			<?*/?>
		</div>
		<div class="right_col">
			<?if( count( $arResult["IN_PLAYLIST"] ) ){?>
			<div class="in_playlist_box">
				<h4>В плей-листах</h4>
				<?foreach( $arResult["IN_PLAYLIST"] as $arItem ){
					$bg = GetConfig("playlist_default_image");
					if($arItem["PREVIEW_PICTURE"]) $bg = MakeImage($arItem["PREVIEW_PICTURE"],array("w"=>188,"h"=>188,"zc"=>1));
					?>
				<div class="in_playlist" style="background-image: url(<?=$bg?>)">
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
				</div>
				<?}?>
			</div>
			<?}?>

			<?/*?>
			<div class="discussion_box">
				<h4>Обсуждение <span>22</span></h4>
				<div class="dis_item">
					<p>Наше радио «Славянский МирЪ» вовлечет вас в мир культуры, сформировавшейся за многие тысячи лет. У нас вы найдете и узнаете все самое интересное и важное о развивающ <a href="#">Ответить</a></p>
					<div class="disscus_user">
						<div class="disscus_user_img">
							<img src="images/rel_auth1.png" alt="disscus_user">
						</div>
						<p><a href="#">Гранин</a><span class="time">12:20</span><span class="date">21.04.2016</span></p>
					</div>
				</div>
				<div class="dis_item">
					<p>Наше радио «Славянский МирЪ» вовлечет вас в мир культуры, сформировавшейся за многие тысячи лет. У нас вы найдете и узнаете все самое интересное и важное о развивающ <a href="#">Ответить</a></p>
					<div class="disscus_user">
						<div class="disscus_user_img">
							<img src="images/rel_auth1.png" alt="disscus_user">
						</div>
						<p><a href="#">Гранин</a><span class="time">12:20</span><span class="date">21.04.2016</span></p>
						<div class="answer">
							<div class="disscus_user">
								<p>Наше радио «Славянский МирЪ» вовлечет вас в мир культуры, сформировавшейся за многие тысячи лет. <a href="#">Ответить</a></p>
								<div class="disscus_user_img">
									<img src="images/rel_auth1.png" alt="disscus_user">
								</div>
								<p><a href="#">Гранин</a><span class="time">12:20</span><span class="date">21.04.2016</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="what_you_think">
				<div class="cur_user">
					<div class="cur_user_img">
						<img src="images/rel_auth1.png" alt="disscus_user">
					</div>
					<div class="cur_user_info">
						<p>Добриня Никитич</p>
						<form action="." method="post">
							<input type="text" placeholder="Что вы думаете?">
						</form>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<?*/?>
		</div>
		<div class="clear"></div>