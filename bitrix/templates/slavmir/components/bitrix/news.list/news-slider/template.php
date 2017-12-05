<?
#pre($arResult);
?>
<section class="articles_slider_box news_slider_box">
	<div class="articles_slider">
		<?foreach( $arResult["ITEMS"] as $arItem ){?>
		<div class="article_slide" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);">
			<div class="container">
				<h2><?=$arItem["NAME"]?></h2>
				<div class="news_box">
					<?
					$arr = array( "NEWS1", "NEWS2" );
					foreach( $arr as $prop ){
						if( $arItem["PROPERTIES"][$prop]["VALUE"] ){
							$articleID = $arItem["PROPERTIES"][$prop]["VALUE"];
							$arNews = $arResult["NEWS"][$articleID];
							$bg = GetConfig( "article_default_image" );
							?>
							<div class="news_item">
								<p class="item_date"><?=small_russian_date("j F",MakeTimeStamp($arNews["ACTIVE_FROM"],"DD.MM.YYYY"))?></p>
								<a href="<?=$arNews["DETAIL_PAGE_URL"]?>">
									<span class="name"><?=$arNews["NAME"]?> <?if( $arNews["PROPERTY_IS_NO_AUTH_ENUM_ID"]!="49" ){?><span class="subs_read_only"></span><?}?></span>
									<div class="text"><?=$arNews["PREVIEW_TEXT"]?></div>
								</a>
								<?
								/*
								$authorID = $arNews["PROPERTY_AUTHOR_VALUE"];
								#pre($authorID);
								if( $authorID ){
									$author = $arResult["AUTHORS"][$authorID];

									$image = GetConfig( "author_default_image" );
									if( $author["PROPERTY_PREVIEW_PICTURE"] ) $image = MakeImage( $author["PROPERTY_PREVIEW_PICTURE"], array("w"=>72,"h"=>72,"zc"=>1) );
									?>
									<div class="rel_art_author">
										<div class="art_author_img"><img src="<?=$image?>" alt="<?=$author["NAME"]?>"></div>
										<span>Автор: <a href=""><?=$author["NAME"]?></a></span>
									</div>
									<?
								}
								*/
								?>
								<a href="<?=$arNews["DETAIL_PAGE_URL"]?>" class="read_article">Подробнее</a>
							</div>
							<?
						}
					}
					?>
					<div class="art_descr">
						<p><?=$arItem["PREVIEW_TEXT"]?></p>
					</div>
				</div>
			</div>
		</div><!-- article_slide -->
		<?}?>
	</div><!-- article_slider -->
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
</section>