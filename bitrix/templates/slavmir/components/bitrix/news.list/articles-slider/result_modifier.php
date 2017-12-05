<?

$articleIDs = array();
foreach( $arResult["ITEMS"] as $arItem ){
	#pre($arItem);
	if($arItem["PROPERTIES"]["ARTICLE1"]["VALUE"]) $articleIDs[] = $arItem["PROPERTIES"]["ARTICLE1"]["VALUE"];
	if($arItem["PROPERTIES"]["ARTICLE2"]["VALUE"]) $articleIDs[] = $arItem["PROPERTIES"]["ARTICLE2"]["VALUE"];
}

$articles=array();
$authorIDs=array();
$authors=array();
if( count( $articleIDs ) ){
	// ARTICLES
	$arFilter = Array( "IBLOCK_ID"=>ARTICLES_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$articleIDs );
	$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_PAGE_URL","PROPERTY_AUTHOR","PROPERTY_IS_NO_AUTH"));
	while($arItem = $dbList->GetNext()){
		$articles[$arItem["ID"]] = $arItem;
		if( $arItem["PROPERTY_AUTHOR_VALUE"] ) $authorIDs[] = $arItem["PROPERTY_AUTHOR_VALUE"];
	}

	// AUTHORS
	$arFilter = Array( "IBLOCK_ID"=>NEWS_AUTHORS_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$authorIDs );
	$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PREVIEW_PICTURE"));
	while($arItem = $dbList->GetNext()){
		$authors[$arItem["ID"]] = $arItem;
	}
}
$arResult["ARTICLES"]=$articles;
$arResult["AUTHORS"]=$authors;

?>