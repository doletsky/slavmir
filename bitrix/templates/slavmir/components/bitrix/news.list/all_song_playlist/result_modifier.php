<?
$rs_cMon=0;//нет доступа, =1 есть доступ
$cDTemp=array();
if ($USER->IsAuthorized()) {
    $rs_cMon = 1;
}
$arResult["cMon"]=$rs_cMon;

$property_enums = CIBlockPropertyEnum::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "CODE"=>"GENRE"));
while($enum_fields = $property_enums->GetNext()){
	$arResult["GENRE"][$enum_fields["ID"]]=array( "NAME" => $enum_fields["VALUE"] );
}

$arResult["GENRE_COUNT"]=array("all"=>0);
$artistIDs=array();
foreach( $arResult["ITEMS"] as &$arItem ){
	$artistIDs[] = $arItem["PROPERTIES"]["ARTIST"]["VALUE"];
	#pre($arItem);
	$genreIDs = $arItem["PROPERTIES"]["GENRE"]["VALUE_ENUM_ID"];
	if( is_array( $genreIDs ) && count( $genreIDs) ){
		foreach( $genreIDs as $genreID ){
			if( !isset( $arResult["GENRE_COUNT"][$genreID] ) ) $arResult["GENRE_COUNT"][$genreID]=0;
			$arResult["GENRE_COUNT"][$genreID]++;
		}
	}
	$arResult["GENRE_COUNT"]["all"]++;
}


$arResult["ARTISTS"] = array();
$arFilter = Array( "IBLOCK_ID"=>ARTISTS_IBLOCK_ID, 'ACTIVE'=>'Y' );
$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PREVIEW_PICTURE"));
while($arItem = $dbList->GetNext()){
	$arResult["ARTISTS"][$arItem["ID"]]=$arItem;
}
$programs=array();
$arFilter = Array( "IBLOCK_ID"=>5, 'ACTIVE'=>'Y');
$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("ID","NAME"));
while($arItem = $dbList->GetNext()){
    $arResult["PROGRAM"][$arItem["ID"]] = $arItem;
}
?>