<?
$property_enums = CIBlockPropertyEnum::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "CODE"=>"CATEGORY"));
while($enum_fields = $property_enums->GetNext()){
	$arResult["CATEGORY"][$enum_fields["ID"]]=array( "NAME" => $enum_fields["VALUE"] );
}


$artistIDs=array();
$arResult["CATEGORY_COUNT"]=array();
foreach( $arResult["ITEMS"] as $arItem ){
	$categoryArr = $arItem["PROPERTIES"]["CATEGORY"]["VALUE_ENUM_ID"];
	foreach( $categoryArr as $categoryID ){
		$arResult["CATEGORY_COUNT"][$categoryID]++;
	}
	#pre($arItem);
	/*
	$arFilter = Array( "IBLOCK_ID"=>AUDIO_IBLOCK_ID, 'ACTIVE'=>'Y', "PROPERTY_PROGRAM"=>$arItem["ID"] );
	$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID"));
	$arItem["AUDIO_COUNT"] = $dbList->SelectedRowsCount();

	$arFilter = Array( "IBLOCK_ID"=>VIDEO_IBLOCK_ID, 'ACTIVE'=>'Y', "PROPERTY_PROGRAM"=>$arItem["ID"] );
	$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID"));
	$arItem["VIDEO_COUNT"] = $dbList->SelectedRowsCount();
	*/

	$artistIDs[] = $arItem["PROPERTIES"]["ARTIST"]["VALUE"];
	#$artistIDs[] = $arItem["PROPERTIES"]["SCREENWRITER"]["VALUE"];
}
#pre($arResult["CATEGORY_COUNT"]);


$arResult["ARTISTS"] = array();
$arFilter = Array( "IBLOCK_ID"=>ARTISTS_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$artistIDs );
$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PREVIEW_PICTURE"));
while($arItem = $dbList->GetNext()){
	$arResult["ARTISTS"][$arItem["ID"]]=$arItem;
}
?>