<?
$authorIDs = array();
foreach( $arResult["ITEMS"] as $arItem ){
	if( $arItem["PROPERTIES"]["AUTHOR"]["VALUE"] ) $artistIDs[] = $arItem["PROPERTIES"]["AUTHOR"]["VALUE"];
}

$arResult["AUTHORS"] = array();
if( count( $artistIDs ) ){
	$arFilter = Array( "IBLOCK_ID"=>NEWS_AUTHORS_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$authorIDs );
	$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME"));
	while($arItem = $dbList->GetNext()){
		$arResult["AUTHORS"][$arItem["ID"]]=$arItem;
	}
}
?>