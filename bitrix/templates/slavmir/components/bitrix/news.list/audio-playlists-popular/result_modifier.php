<?
#pre($arResult);

$audioIDs=array();
$authorIDs=array();
foreach( $arResult["ITEMS"] as $arItem ){
	if( is_array( $arItem["PROPERTIES"]["AUDIO"]["VALUE"] ) && count( $arItem["PROPERTIES"]["AUDIO"]["VALUE"] ) ){
		$audioIDs = array_merge( $arItem["PROPERTIES"]["AUDIO"]["VALUE"], $audioIDs );
		if( $arItem["PROPERTIES"]["AUTHOR"]["VALUE"] ) $authorIDs[] = $arItem["PROPERTIES"]["AUTHOR"]["VALUE"];
	}
}
#pre($audioIDs);
$audios=array();
$arFilter = Array( "IBLOCK_ID"=>AUDIO_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$audioIDs );
$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PREVIEW_PICTURE","DETAIL_PAGE_URL"));
while($arItem = $dbList->GetNext()){
	$audios[$arItem["ID"]] = $arItem;
}
$arResult["AUDIOS"]=$audios;

$authors=array();
if( count( $authorIDs ) ){
	$arFilter = Array( "IBLOCK_ID"=>ARTISTS_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$authorIDs );
	$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME"));
	while($arItem = $dbList->GetNext()){
		$authors[$arItem["ID"]] = $arItem;
	}
}
$arResult["AUTHORS"]=$authors;
?>