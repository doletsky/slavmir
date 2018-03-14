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
<?#pre($arResult["ITEMS_NEW"]);?>
<?if(!isset($_REQUEST["AJAX"]) || $_REQUEST["AJAX"]!="Y"){?>

<?if( isset( $arResult["SECTION"]["PATH"] ) ){
	$sectionPath = array();
	foreach( $arResult["SECTION"]["PATH"] as $arSection ){
		$sectionPath[] = $arSection["NAME"];
	}
	?>
	<div class="tabs" id="new_art_tabs">
		<ul>
			<li class="active" data-id="all"><?=implode(" / ",$sectionPath)?></li>
		</ul>
	</div>
<?}else{?>
<div class="tabs" id="new_art_tabs">
	<ul>
        <li class="active" data-id="new">Свежие статьи</li>
        <li data-id="all">Все статьи</li>
	</ul>
</div>
<?}?>
    <div class="tab_container new_articles_list<?if( !isset( $arResult["SECTION"]["PATH"] ) ):?> active<?endif?>" data-attr="new" data-id="new_art_tabs">
        <?
        foreach( $arResult["ITEMS_NEW"] as $arItem ){
                $sectionID = $arItem["IBLOCK_SECTION_ID"];
                $section = '';
                if( isset( $arResult["SECTIONS"][$sectionID] ) ){
                    $section = $arResult["SECTIONS"][$sectionID]["NAME"];
                }
                ?>
                <div class="new_article">
                    <div class="new_article_text">
                        <?if( $section ){?><p class="new_art_type"><?=$section?></p><?}?>
                        <?/*?><h3><?=$arItem["NAME"]?></h3>
				<article><?=$arItem["PREVIEW_TEXT"]?> <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="read_art">Читать</a>
				</article>
				<?*/?>
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" <?if( $arResult["cMon"]!=1 && $arItem["PROPERTIES"]["IS_NO_AUTH"]["VALUE_XML_ID"]!="Y" ){?>class="subs"<?}?>>
                            <span class="article_name"><?=$arItem["NAME"]?> <?if( $arItem["PROPERTIES"]["IS_NO_AUTH"]["VALUE_XML_ID"]!="Y" ){?><span class="subs_read_only"></span><?}?></span>
                            <span class="article_text"><?=$arItem["PREVIEW_TEXT"]?> <span class="read_art">Читать</span></span>
                        </a>
                        <?if( $arItem["PROPERTIES"]["AUTHOR"]["VALUE"] ){
                            $authorID = $arItem["PROPERTIES"]["AUTHOR"]["VALUE"];
                            $author = $arResult["AUTHORS"][$authorID];
                            ?>
                            <p class="new_art_auth">Автор: <a href=""><?=$author["NAME"]?></a></p>
                        <?}?>
                    </div>
                    <?
                    $image = GetConfig( "default_image" );
                    if( isset($arItem["PREVIEW_PICTURE"]["SRC"]) && $arItem["PREVIEW_PICTURE"]["SRC"] ) $image = MakeImage( $arItem["PREVIEW_PICTURE"]["SRC"], array("w"=>171,"h"=>171,"zc"=>1) );
                    ?>
                    <div class="new_article_img">
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$image?>" alt="new_art_img.png"></a>
                    </div>
                    <div class="clear"></div>
                </div><!-- new_article -->
            <?
        }?>
    </div>
<div class="tab_container new_articles_list<?if( isset( $arResult["SECTION"]["PATH"] ) ):?> active<?endif?>" data-attr="all" data-id="new_art_tabs">
	<div class="ajax-list">
		<?if( !count( $arResult["ITEMS"] ) ){?>
		В данном разделе нет статей
		<?}?>
<?}?>
	<?foreach( $arResult["ITEMS"] as $arItem ){
		$sectionID = $arItem["IBLOCK_SECTION_ID"];
		$section = '';
		if( isset( $arResult["SECTIONS"][$sectionID] ) ){
			$section = $arResult["SECTIONS"][$sectionID]["NAME"];
		}
		?>
		<div class="new_article">
			<div class="new_article_text">
				<?if( $section ){?><p class="new_art_type"><?=$section?></p><?}?>
				<?/*?><h3><?=$arItem["NAME"]?></h3>
				<article><?=$arItem["PREVIEW_TEXT"]?> <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="read_art">Читать</a>
				</article>
				<?*/?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" <?if( $arResult["cMon"]!=1 &&  $arItem["PROPERTIES"]["IS_NO_AUTH"]["VALUE_XML_ID"]!="Y" ){?>class="subs"<?}?>>
					<span class="article_name"><?=$arItem["NAME"]?> <?if($arItem["PROPERTIES"]["IS_NO_AUTH"]["VALUE_XML_ID"]!="Y" ){?><span class="subs_read_only"></span><?}?></span>
					<span class="article_text"><?=$arItem["PREVIEW_TEXT"]?> <span class="read_art">Читать</span></span>
				</a>
				<?if( $arItem["PROPERTIES"]["AUTHOR"]["VALUE"] ){
					$authorID = $arItem["PROPERTIES"]["AUTHOR"]["VALUE"];
					$author = $arResult["AUTHORS"][$authorID];
					?>
					<p class="new_art_auth">Автор: <a href=""><?=$author["NAME"]?></a></p>
				<?}?>
			</div>
			<?
			$image = GetConfig( "default_image" );
			if( isset($arItem["PREVIEW_PICTURE"]["SRC"]) && $arItem["PREVIEW_PICTURE"]["SRC"] ) $image = MakeImage( $arItem["PREVIEW_PICTURE"]["SRC"], array("w"=>171,"h"=>171,"zc"=>1) );
			?>
			<div class="new_article_img">
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$image?>" alt="new_art_img.png"></a>
			</div>
			<div class="clear"></div>
		</div><!-- new_article -->
	<?}?>
	<?=$arResult["NAV_STRING"]?>
<?if(!isset($_REQUEST["AJAX"]) || $_REQUEST["AJAX"]!="Y"){?>
	</div>
</div>
<?}?>