<div class="index_news">
	<h2>Новости</h2>
	<div class="index_news_list">
		<?foreach( $arResult["ITEMS"] as $arItem ){
			$image = GetConfig( "default_image" );
			if( isset( $arItem["PREVIEW_PICTURE"]["SRC"] ) && $arItem["PREVIEW_PICTURE"]["SRC"] ) $image = MakeImage( $arItem["PREVIEW_PICTURE"]["SRC"], array("w"=>84,"h"=>84,"zc"=>1) );
			?>
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="index_news_item">
				<div class="index_news_date"><?=small_russian_date("j F",MakeTimeStamp($arItem["ACTIVE_FROM"],"DD.MM.YYYY"))?></div>
				<div class="index_news_desc">
					<h2><?=$arItem["NAME"]?></h2>
                    <p><?=TruncateText($arItem["PREVIEW_TEXT"], 150)?> <span class="read_more">Подробнее</span> </p>
				</div>
				<div class="index_news_img">
					<img src="<?=$image?>" alt="<?=$arItem["NAME"]?>">
				</div>
			</a>
		<?}?>
	</div>
</div><!-- index_news -->