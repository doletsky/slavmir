<?
$artistIDs = array();
foreach( $arResult["ITEMS"] as $arItem ){
	$artistIDs[] = $arItem["PROPERTIES"]["ARTIST"]["VALUE"];
}

$arResult["ARTISTS"] = array();
$arFilter = Array( "IBLOCK_ID"=>ARTISTS_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$artistIDs );
$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PREVIEW_PICTURE"));
while($arItem = $dbList->GetNext()){
	$arResult["ARTISTS"][$arItem["ID"]]=$arItem;
}
?>