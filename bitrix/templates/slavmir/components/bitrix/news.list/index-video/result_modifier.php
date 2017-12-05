<?
if(!CModule::IncludeModule("iblock")) throw new \Bitrix\Main\LoaderException("Ошибка загрузки модуля iblock");

$artistIDs = array();
foreach( $arResult["ITEMS"] as $arItem ){
	if($arItem["PROPERTIES"]["ARTISTS"]["VALUE"]) $artistIDs[] = $arItem["PROPERTIES"]["ARTISTS"]["VALUE"];
}

$artists=array();
$arFilter = Array( "IBLOCK_ID"=>ARTISTS_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$artistIDs );
$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME"));
while($arItem = $dbList->GetNext()){
	$artists[$arItem["ID"]] = $arItem;
}
$arResult["ARTISTS"] = $artists;