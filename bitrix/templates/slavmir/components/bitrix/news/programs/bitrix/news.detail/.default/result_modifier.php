<?
$arFilter1 = Array( "IBLOCK_ID"=>PROGRAM_IBLOCK_ID, 'ACTIVE'=>'Y' );
$dbList1 = CIBlockElement::GetList(array("sort"=>"desc"), $arFilter1, false, false, array("IBLOCK_ID","ID","NAME","DETAIL_PAGE_URL","PREVIEW_PICTURE","PREVIEW_TEXT"));
while($arItem1 = $dbList1->GetNext()){
	$arResult["ALL_PROGRAMS"][]=$arItem1;
}

// PROGRAM ARTISTS
$artistIDs = array();
if( $arResult["PROPERTIES"]["ARTIST"]["VALUE"] ) $artistIDs[] = $arResult["PROPERTIES"]["ARTIST"]["VALUE"];
if( $arResult["PROPERTIES"]["SCREENWRITER"]["VALUE"] ) $artistIDs[] = $arResult["PROPERTIES"]["SCREENWRITER"]["VALUE"];
$arFilter = Array( "IBLOCK_ID"=>PROGRAM_ARTISTS_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$artistIDs );
$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PREVIEW_PICTURE"));
while($arItem = $dbList->GetNext()){
	$arResult["ARTISTS"][$arItem["ID"]]=$arItem;
}

$arResult["AV_ARTISTS"] = array();

// AUDIO
$arResult["AUDIO"]=array();
$audioArtistIDs=array();
$arFilter = Array( "IBLOCK_ID"=>AUDIO_IBLOCK_ID, 'ACTIVE'=>'Y', "PROPERTY_PROGRAM"=>$arResult["ID"] );
$dbList = CIBlockElement::GetList(array("PROPERTY_DT"=>"desc"), $arFilter, false, false, array("IBLOCK_ID","ID","PREVIEW_PICTURE","NAME","PREVIEW_TEXT","PROPERTY_DURATION","DETAIL_PAGE_URL","PROPERTY_ARTIST"));
while($arItem = $dbList->GetNext()){
	$arResult["AUDIO"][]=$arItem;
	$audioArtistIDs[]=$arItem["PROPERTY_ARTIST_VALUE"];
}
if( count( $audioArtistIDs ) ){
	$arFilter = Array( "IBLOCK_ID"=>ARTISTS_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$audioArtistIDs );
	$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME"));
	while($arItem = $dbList->GetNext()){
		$arResult["AV_ARTISTS"][$arItem["ID"]]=$arItem;
	}
}

// VIDEO
$arResult["VIDEO"]=array();
$videoArtistIDs=array();
$arFilter = Array( "IBLOCK_ID"=>VIDEO_IBLOCK_ID, 'ACTIVE'=>'Y', "PROPERTY_PROGRAM"=>$arResult["ID"] );
$dbList = CIBlockElement::GetList(array("PROPERTY_DT"=>"desc"), $arFilter, false, false, array("IBLOCK_ID","ID","PREVIEW_PICTURE","NAME","PREVIEW_TEXT","PROPERTY_DURATION","DETAIL_PAGE_URL","PROPERTY_ARTIST"));
while($arItem = $dbList->GetNext()){
	$arResult["VIDEO"][]=$arItem;
	$videoArtistIDs[]=$arItem["PROPERTY_ARTIST_VALUE"];
}
if( count( $videoArtistIDs ) ){
	$arFilter = Array( "IBLOCK_ID"=>ARTISTS_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$videoArtistIDs );
	$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME"));
	while($arItem = $dbList->GetNext()){
		$arResult["AV_ARTISTS"][$arItem["ID"]]=$arItem;
	}
}
?>