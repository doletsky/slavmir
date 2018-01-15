<div class="index_articles">
	<h2>Статьи</h2>
	<div class="index_articles_list">
		<?foreach( $arResult["ITEMS"] as $arItem ){
			$image = GetConfig( "default_image" );
			if( isset( $arItem["PREVIEW_PICTURE"]["SRC"] ) && $arItem["PREVIEW_PICTURE"]["SRC"] ) $image = MakeImage( $arItem["PREVIEW_PICTURE"]["SRC"], array("w"=>137,"h"=>137,"zc"=>1) );
			?>
			<div class="index_articles_item">
				<div class="article_text">
					<?/*?><p class="type">Славянская культура</p><?*/?>
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" style="text-decoration: none"><h3 class="art_name"><?=$arItem["NAME"]?></h3></a>
					<article><a href="<?=$arItem["DETAIL_PAGE_URL"]?>" style="text-decoration: none;color: #000"><?=$arItem["PREVIEW_TEXT"]?></a> <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="read">Читать</a></article>
				</div>
				<div class="article_img">
					<img src="<?=$image?>" alt="<?=$arItem["NAME"]?>">
				</div>
				<div class="clear"></div>
			</div>
		<?}?>
		<div class="clear"></div>
	</div>
</div><!-- index_articles -->