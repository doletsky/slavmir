<?
#pre($arResult);
?>
<section class="articles_slider_box">
	<div class="articles_slider">
		<?foreach( $arResult["ITEMS"] as $arItem ){?>
		<div class="article_slide" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);">
			<div class="container">
				<h2><?=$arItem["NAME"]?></h2>
				<div class="related_art_box">
					<?
					$arr = array( "ARTICLE1", "ARTICLE2" );
					foreach( $arr as $prop ){
						if( $arItem["PROPERTIES"][$prop]["VALUE"] ){
							$articleID = $arItem["PROPERTIES"][$prop]["VALUE"];
							$arArticle = $arResult["ARTICLES"][$articleID];
							$bg = GetConfig( "article_default_image" );
							?>
							<div class="rel_art_item">
								<a href="<?=$arArticle["DETAIL_PAGE_URL"]?>" <?if($arResult["cMon"]===0 &&  $arArticle["PROPERTY_IS_NO_AUTH_ENUM_ID"]!="50" ){?>class="subs"<?}?>>
									<span class="rel_art_name" style="background-image: url(<?=$bg?>);"><span class="name"><?=$arArticle["NAME"]?> <?if( $arArticle["PROPERTY_IS_NO_AUTH_ENUM_ID"]!="50" ){?><span class="subs_read_only"></span><?}?></span></span>
									<div class="text"><?=$arArticle["PREVIEW_TEXT"]?></div>
								</a>
								<?
								$authorID = $arArticle["PROPERTY_AUTHOR_VALUE"];
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
								?>
								<a href="<?=$arArticle["DETAIL_PAGE_URL"]?>" class="read_article<?if($arResult["cMon"]===0 &&  $arArticle["PROPERTY_IS_NO_AUTH_ENUM_ID"]!="50" ){?> subs<?}?>">Читать статью</a>
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