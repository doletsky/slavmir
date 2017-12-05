<?
#pre($arResult["SECTIONS"]);
$sections=array();
foreach( $arResult["SECTIONS"] as $arSection ){
	if( !$arSection["IBLOCK_SECTION_ID"] ) $arSection["IBLOCK_SECTION_ID"]="root";
	$sections[$arSection["IBLOCK_SECTION_ID"]][]=$arSection;
}
#pre($sections);
?>
<div class="article_types_box">
	<div class="article_types_head">
		<h5>Статьи</h5>
	</div>
	<div class="art_type_list">
		<ul>
			<?foreach( $sections["root"] as $arSection ){?>
			<li>
				<?=$arSection["NAME"]?>
				<div class="sub_type">
					<ul>
						<?foreach( $sections[$arSection["ID"]] as $arSection1 ){?>
						<li><a href="<?=$arSection1["SECTION_PAGE_URL"]?>"><?=$arSection1["NAME"]?></a></li>
						<?}?>
					</ul>
				</div>
			</li>
			<?}?>
		</ul>
	</div>
</div><!-- article_types_box -->