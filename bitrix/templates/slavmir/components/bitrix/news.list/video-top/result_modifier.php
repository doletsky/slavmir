<?
$artistIDs = array();
foreach( $arResult["ITEMS"] as $arItem ){
	$artistIDs[] = $arItem["PROPERTIES"]["ARTIST"]["VALUE"];
}

$property_enums = CIBlockPropertyEnum::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "CODE"=>"CATEGORY"));
while($enum_fields = $property_enums->GetNext()){
	$arResult["CATEGORY"][$enum_fields["ID"]]=array( "NAME" => $enum_fields["VALUE"] );
}

$arResult["ARTISTS"] = array();
$arFilter = Array( "IBLOCK_ID"=>ARTISTS_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$artistIDs );
$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PREVIEW_PICTURE"));
while($arItem = $dbList->GetNext()){
	$arResult["ARTISTS"][$arItem["ID"]]=$arItem;
}
?>