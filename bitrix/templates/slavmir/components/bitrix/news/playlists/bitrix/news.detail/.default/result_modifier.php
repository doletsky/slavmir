<?
$authorIDs=array();
$authorIDs[]=$arResult["PROPERTIES"]["AUTHOR"]["VALUE"];


// AUTHORS
$arResult["AUTHORS"] = array();
if( count( $authorIDs ) ){
	$arFilter = Array( "IBLOCK_ID"=>ARTISTS_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$authorIDs );
	$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PREVIEW_PICTURE"));
	while($arItem = $dbList->GetNext()){
		$arResult["AUTHORS"][$arItem["ID"]]=$arItem;
	}
}
?>