<?
#pre($arResult);
$rs_cMon=0;//��� �������, =1 ���� ������
$cDTemp=array();
if ($USER->IsAuthorized()) {
    $rs_cMon = 1;
}
$arResult["cMon"]=$rs_cMon;

$audioIDs=array();
$artistIDs=array();
$programIDs=array();
if( is_array( $arResult["PROPERTIES"]["AUDIO"]["VALUE"] ) && count( $arResult["PROPERTIES"]["AUDIO"]["VALUE"] ) ){
	$audioIDs = $arResult["PROPERTIES"]["AUDIO"]["VALUE"];
}

#pre($audioIDs);
$audios=array();
$arFilter = Array( "IBLOCK_ID"=>AUDIO_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$audioIDs );
$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PREVIEW_PICTURE","DETAIL_PAGE_URL","PROPERTY_PROGRAM","PROPERTY_ARTIST","PROPERTY_PATH","PROPERTY_DURATION","PROPERTY_IS_NO_AUTH"));
while($arItem = $dbList->GetNext()){
	$audios[$arItem["ID"]] = $arItem;
	$artistIDs[]=$arItem["PROPERTY_ARTIST_VALUE"];
    $programIDs[] = $arItem["PROPERTY_PROGRAM_VALUE"];
}
$arResult["AUDIOS"]=$audios;

$artists=array();
if( count( $artistIDs ) ){
	$arFilter = Array( "IBLOCK_ID"=>ARTISTS_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$artistIDs );
	$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME"));
	while($arItem = $dbList->GetNext()){
		$artists[$arItem["ID"]] = $arItem;
	}
}
$arResult["ARTISTS"]=$artists;
$programs=array();
$arFilter = Array( "IBLOCK_ID"=>5, 'ACTIVE'=>'Y', "ID"=>$programIDs );
$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("ID","NAME"));
while($arItem = $dbList->GetNext()){
    $programs[$arItem["ID"]] = $arItem;
}
$arResult["PROGRAM"] = $programs;
?>