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

?>
		<div class="news_item_bg">
			<p class="news_name">Новости</p>
			<h1><?=$arResult["NAME"]?></h1>
			<?if( $authorID ){
				$image = GetConfig( "author_default_image" );
				if( $author["PREVIEW_PICTURE"] ) $image = MakeImage( $author["PREVIEW_PICTURE"], array("w"=>120,"h"=>120,"zc"=>1) );
				?>
				<div class="article_item_auth">
					<img src="<?=$image?>" alt="<?=$author["NAME"]?>">
					<span>Автор: <a href=""><?=$author["NAME"]?></a></span>
				</div>
			<?}?>
			<?/*?>
			<div class="right_soc">
				<ul>
					<a href="#">
						<li>
							<img src="images/ok_r.png" alt="ok"><span>6</span>
						</li>
					</a>
					<a href="#">
						<li>
							<img src="images/twit_r.png" alt="twit"><span>3</span>
						</li>
					</a>
					<a href="#">
						<li>
							<img src="images/fb_r.png" alt="fb"><span>136</span>
						</li>
					</a>
					<a href="#">
						<li>
							<img src="images/vk_r.png" alt="vk"><span>41</span>
						</li>
					</a>
				</ul>
			</div>
			<?*/?>
		</div><!-- article_item_bg -->
	</div>
</section>
<section class="news_item_info">
	<div class="container">
		<div class="article_item_info">
			<div class="left_col">
				<p class="news_item_date"><?=small_russian_date("j F Y",MakeTimeStamp($arResult["ACTIVE_FROM"],"DD.MM.YYYY"))?></p>
				<?=$arResult["DETAIL_TEXT"]?>
			</div><!-- left_col -->
			<div class="right_col">
				<?/*?>
				<div class="article_types_box">
					<div class="article_types_head">
						<h5>Статьи</h5>
					</div>
					<div class="art_type_list">
						<ul>
							<li class="has_sub">
								Славянская культура
								<div class="sub_type">
									<ul>
										<li><a href="#">Музыка</a></li>
										<li><a href="#">Живопись</a></li>
										<li><a href="#">Литература</a></li>
									</ul>
								</div>
							</li>
							<li>О проекте</li>
							<li>История и мифология</li>
							<li>Воспитание</li>
							<li>Детям о предках</li>
							<li>Славянская культура</li>
							<li>О проекте</li>
							<li>История и мифология</li>
							<li>Воспитание</li>
							<li>Детям о предках</li>
						</ul>
					</div>
				</div><!-- article_types_box -->
				<div class="popular_box">
					<h5>Популярное</h5>
					<div class="popular_list">
						<div class="pop_item">
							<a href="#">
								<span class="pop_img" style="background-image: url(images/audio_top_img1.png);"></span>
								<span class="pop_info">
									<span class="pop_name">Затерянные города</span>
									<span class="pop_text">Ищем и обретаем города, которых нет</span>
								</span>
								<span class="clear"></span>
							</a>
						</div>
						<div class="pop_item only_subs">
							<a href="#">
								<span class="pop_img" style="background-image: url(images/audio_top_img2.png);"></span>
								<span class="pop_info">
									<span class="pop_name">Русь глазами иностранца</span>
									<span class="pop_text">Авторская программа Дениса Хворобова</span>
								</span>
								<span class="clear"></span>
							</a>
						</div>
						<div class="pop_item">
							<a href="#">
								<span class="pop_img" style="background-image: url(images/audio_top_img1.png);"></span>
								<span class="pop_info">
									<span class="pop_name">Зри в корень</span>
									<span class="pop_text">Откуда есть пошли Славяне</span>
								</span>
								<span class="clear"></span>
							</a>
						</div>
					</div>
				</div><!-- popular_box -->
				<?*/?>
			</div>
			<div class="clear"></div>
		</div>