<?
if(!CModule::IncludeModule("iblock")) throw new \Bitrix\Main\LoaderException("Ошибка загрузки модуля iblock");

$rs_cMon=0;//нет доступа, =1 есть доступ
if ($USER->IsAuthorized()) {
    $rs_cMon = 1;
}
$arResult["cMon"]=$rs_cMon;
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
	$dbList = CIBlockElement::GetList(array("sort"=>"desc"), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PREVIEW_PICTURE","PROPERTY_ARTIST", "PROPERTY_PROGRAM","PROPERTY_DURATION","PROPERTY_IS_NO_AUTH","DETAIL_PAGE_URL","PROPERTY_PATH"));
	while($arItem = $dbList->GetNext()){
		$arResult["CATEGORY"][$enum_fields["ID"]]["ITEMS"][]=$arItem;
		$artistIDs[] = $arItem["PROPERTY_ARTIST_VALUE"];
        $programIDs[] = $arItem["PROPERTY_PROGRAM_VALUE"];
	}
}


$artists=array();
$arFilter = Array( "IBLOCK_ID"=>2, 'ACTIVE'=>'Y', "ID"=>$artistIDs );
$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("ID","NAME"));
while($arItem = $dbList->GetNext()){
	$artists[$arItem["ID"]] = $arItem;
}
$arResult["ARTISTS"] = $artists;
#pre($artists);

$programs=array();
$arFilter = Array( "IBLOCK_ID"=>5, 'ACTIVE'=>'Y', "ID"=>$programIDs );
$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("ID","NAME"));
while($arItem = $dbList->GetNext()){
    $programs[$arItem["ID"]] = $arItem;
}
$arResult["PROGRAM"] = $programs;