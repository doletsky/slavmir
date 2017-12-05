<?
if(!CModule::IncludeModule("iblock")) throw new \Bitrix\Main\LoaderException("Ошибка загрузки модуля iblock");
#pre($arResult);

$arFilter = Array( "IBLOCK_ID"=>AUDIO_IBLOCK_ID, 'ACTIVE'=>'Y' );
$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","PROPERTY_ARTIST"));
while($arItem = $dbList->GetNext()){
	if( !isset( $arResult["ARTIST_COUNT"][$arItem["PROPERTY_ARTIST_VALUE"]] ) ) $arResult["ARTIST_COUNT"][$arItem["PROPERTY_ARTIST_VALUE"]]=0;
	$arResult["ARTIST_COUNT"][$arItem["PROPERTY_ARTIST_VALUE"]]++;
}
#pre($arResult["ARTIST_COUNT"]);

foreach( $arResult["SECTIONS"] as $i => $arSection ){
	$arResult["SECTIONS"][$i]["ITEMS"]=array();
	$arFilter = Array( "IBLOCK_ID"=>$arParams["IBLOCK_ID"], 'ACTIVE'=>'Y', "SECTION_ID"=>$arSection["ID"] );
	$dbList = CIBlockElement::GetList(array("sort"=>"desc"), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PREVIEW_PICTURE"));
	while($arItem = $dbList->GetNext()){
		$arResult["SECTIONS"][$i]["ITEMS"][] = $arItem;
		#pre($arItem);
	}
}
#pre($arResult["SECTIONS"]);

$arFilter = Array( "IBLOCK_ID"=>$arParams["IBLOCK_ID"], 'ACTIVE'=>'Y' );
$dbList = CIBlockElement::GetList(array("sort"=>"asc"), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PREVIEW_PICTURE"));
while($arItem = $dbList->GetNext()){
	$arResult["ITEMS_ALL"][] = $arItem;
}
?>