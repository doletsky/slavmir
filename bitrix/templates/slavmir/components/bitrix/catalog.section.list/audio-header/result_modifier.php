<?
if(!CModule::IncludeModule("iblock")) throw new \Bitrix\Main\LoaderException("Ошибка загрузки модуля iblock");


$artistIDs=array();

/*
foreach( $arResult["SECTIONS"] as $i => $arSection ){
	$arResult["SECTIONS"][$i]["ITEMS"]=array();
	$arFilter = Array( "IBLOCK_ID"=>$arParams["IBLOCK_ID"], 'ACTIVE'=>'Y', "SECTION_ID"=>$arSection["ID"] );
	$dbList = CIBlockElement::GetList(array("sort"=>"desc"), $arFilter, false, array("nTopCount"=>5), array("ID","NAME","PREVIEW_PICTURE","PROPERTY_ARTIST","PROPERTY_DURATION"));
	while($arItem = $dbList->GetNext()){
		$arResult["SECTIONS"][$i]["ITEMS"][] = $arItem;
		$artistIDs[] = $arItem["PROPERTY_ARTIST_VALUE"];
		#pre($arItem);
	}
}
*/


$property_enums = CIBlockPropertyEnum::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "CODE"=>"CATEGORY"));
while($enum_fields = $property_enums->GetNext()){
	#pre($enum_fields);
	$arResult["CATEGORY"][$enum_fields["ID"]]=array( "NAME" => $enum_fields["VALUE"] );

	$arFilter = Array( "IBLOCK_ID"=>$arParams["IBLOCK_ID"], 'ACTIVE'=>'Y', "PROPERTY_CATEGORY"=>$enum_fields["ID"] );
    //-------замена для демонстрации-----"PROPERTY_DT"=>"desc"----------------------
	$dbList = CIBlockElement::GetList(array("id"=>"desc"), $arFilter, false, array("nTopCount"=>6), array("IBLOCK_ID","ID","NAME","PREVIEW_PICTURE","PROPERTY_ARTIST","PROPERTY_DURATION","DETAIL_PAGE_URL"));
	while($arItem = $dbList->GetNext()){
		$arResult["CATEGORY"][$enum_fields["ID"]]["ITEMS"][]=$arItem;
		$artistIDs[] = $arItem["PROPERTY_ARTIST_VALUE"];
	}
}


$artists=array();
$arFilter = Array( "IBLOCK_ID"=>ARTISTS_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$artistIDs );
$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME"));
while($arItem = $dbList->GetNext()){
	$artists[$arItem["ID"]] = $arItem;
}
$arResult["ARTISTS"] = $artists;
#pre($artists);