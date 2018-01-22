<?
$property_enums = CIBlockPropertyEnum::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "CODE"=>"CATEGORY"));
while($enum_fields = $property_enums->GetNext()){
	$arResult["CATEGORY"][$enum_fields["ID"]]=array( "NAME" => $enum_fields["VALUE"] );
}


$artistIDs=array();
foreach( $arResult["ITEMS"] as &$arItem ){

	$arFilter = Array( "IBLOCK_ID"=>AUDIO_IBLOCK_ID, 'ACTIVE'=>'Y', "PROPERTY_PROGRAM"=>$arItem["ID"] );
	$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID"));
	$arItem["AUDIO_COUNT"] = $dbList->SelectedRowsCount();

	$arFilter = Array( "IBLOCK_ID"=>VIDEO_IBLOCK_ID, 'ACTIVE'=>'Y', "PROPERTY_PROGRAM"=>$arItem["ID"] );
	$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID"));
	$arItem["VIDEO_COUNT"] = $dbList->SelectedRowsCount();

	$artistIDs[] = $arItem["PROPERTIES"]["ARTIST"]["VALUE"];
	$artistIDs[] = $arItem["PROPERTIES"]["SCREENWRITER"]["VALUE"];
}


$arResult["ARTISTS"] = array();
$arFilter = Array( "IBLOCK_ID"=>PROGRAM_ARTISTS_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$artistIDs );
$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PREVIEW_PICTURE"));
while($arItemAr = $dbList->GetNext()){
	$arResult["ARTISTS"][$arItemAr["ID"]]=$arItemAr;
}
?>