<?

$newsIDs = array();
foreach( $arResult["ITEMS"] as $arItem ){
	#pre($arItem);
	if($arItem["PROPERTIES"]["NEWS1"]["VALUE"]) $newsIDs[] = $arItem["PROPERTIES"]["NEWS1"]["VALUE"];
	if($arItem["PROPERTIES"]["NEWS2"]["VALUE"]) $newsIDs[] = $arItem["PROPERTIES"]["NEWS2"]["VALUE"];
}

$news=array();
$authorIDs=array();
$authors=array();
if( count( $newsIDs ) ){
	// ARTICLES
	$arFilter = Array( "IBLOCK_ID"=>NEWS_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$newsIDs );
	$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_PAGE_URL","PROPERTY_AUTHOR","ACTIVE_FROM","PROPERTY_IS_NO_AUTH"));
	while($arItem = $dbList->GetNext()){
		$news[$arItem["ID"]] = $arItem;
		if( $arItem["PROPERTY_AUTHOR_VALUE"] ) $authorIDs[] = $arItem["PROPERTY_AUTHOR_VALUE"];
	}

	// AUTHORS
	$arFilter = Array( "IBLOCK_ID"=>NEWS_AUTHORS_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$authorIDs );
	$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PREVIEW_PICTURE"));
	while($arItem = $dbList->GetNext()){
		$authors[$arItem["ID"]] = $arItem;
	}
}
$arResult["NEWS"]=$news;
$arResult["AUTHORS"]=$authors;

?>