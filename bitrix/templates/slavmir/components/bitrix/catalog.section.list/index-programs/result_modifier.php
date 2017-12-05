<?
if(!CModule::IncludeModule("iblock")) throw new \Bitrix\Main\LoaderException("Ошибка загрузки модуля iblock");

$artistIDs=array();

/*
$arResult["SECTIONS_ALL"]=array("ITEMS"=>array());
foreach( $arResult["SECTIONS"] as $i => $arSection ){
	$arResult["SECTIONS"][$i]["ITEMS"]=array();
	$arFilter = Array( "IBLOCK_ID"=>$arParams["IBLOCK_ID"], 'ACTIVE'=>'Y', "SECTION_ID"=>$arSection["ID"] );
	$dbList = CIBlockElement::GetList(array("sort"=>"desc"), $arFilter, false, array("nTopCount"=>4), array("ID","NAME","PREVIEW_PICTURE","PREVIEW_TEXT","PROPERTY_ARTIST","PROPERTY_IS_BLACK"));
	while($arItem = $dbList->GetNext()){
		$arResult["SECTIONS"][$i]["ITEMS"][] = $arItem;
		$arResult["SECTIONS_ALL_ITEMS"][] = $arItem;
		$artistIDs[] = $arItem["PROPERTY_ARTIST_VALUE"];
		#pre($arItem);
	}
}

$artists=array();
$arFilter = Array( "IBLOCK_ID"=>6, 'ACTIVE'=>'Y', "ID"=>$artistIDs );
$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("ID","NAME"));
while($arItem = $dbList->GetNext()){
	$artists[$arItem["ID"]] = $arItem;
}
$arResult["ARTISTS"] = $artists;
*/

$property_enums = CIBlockPropertyEnum::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "CODE"=>"CATEGORY"));
while($enum_fields = $property_enums->GetNext()){
	#pre($enum_fields);
	$arResult["CATEGORY"][$enum_fields["ID"]]=array( "NAME" => $enum_fields["VALUE"] );

	$arFilter = Array( "IBLOCK_ID"=>$arParams["IBLOCK_ID"], 'ACTIVE'=>'Y', "PROPERTY_CATEGORY"=>$enum_fields["ID"] );
	$dbList = CIBlockElement::GetList(array("sort"=>"desc"), $arFilter, false, array("nTopCount"=>4), array("IBLOCK_ID","ID","NAME","PREVIEW_PICTURE","PREVIEW_TEXT","PROPERTY_ARTIST","PROPERTY_IS_BLACK","DETAIL_PAGE_URL"));
	while($arItem = $dbList->GetNext()){
		$arResult["CATEGORY"][$enum_fields["ID"]]["ITEMS"][]=$arItem;
	}

	$arFilter = Array( "IBLOCK_ID"=>$arParams["IBLOCK_ID"], 'ACTIVE'=>'Y' );
	$dbList = CIBlockElement::GetList(array("sort"=>"desc"), $arFilter, false, array("nTopCount"=>4), array("IBLOCK_ID","ID","NAME","PREVIEW_PICTURE","PREVIEW_TEXT","PROPERTY_ARTIST","PROPERTY_IS_BLACK","DETAIL_PAGE_URL"));
	while($arItem = $dbList->GetNext()){
		$arResult["CATEGORY_ALL"][]=$arItem;
	}
}