<?
$arFilter1 = Array( "IBLOCK_ID"=>PROGRAM_IBLOCK_ID, 'ACTIVE'=>'Y' );
$dbList1 = CIBlockElement::GetList(array("sort"=>"desc"), $arFilter1, false, false, array("IBLOCK_ID","ID","NAME","DETAIL_PAGE_URL","PREVIEW_PICTURE","PREVIEW_TEXT"));
while($arItem1 = $dbList1->GetNext()){
	$arResult["ALL_PROGRAMS"][]=$arItem1;
}


$artistIDs=array();
$artistIDs[]=$arResult["PROPERTIES"]["ARTIST"]["VALUE"];

// SAME
$arResult["SAME"]=array();
if( $arResult["PROPERTIES"]["SAME"]["VALUE"] ){
	$arFilter = Array( "IBLOCK_ID"=>AUDIO_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$arResult["PROPERTIES"]["SAME"]["VALUE"] );
	$dbList = CIBlockElement::GetList(array("PROPERTY_DT"=>"desc"), $arFilter, false, false, array("IBLOCK_ID","ID","PREVIEW_PICTURE","NAME","PROPERTY_DURATION","DETAIL_PAGE_URL","PROPERTY_ARTIST","PROPERTY_PROGRAM","PROPERTY_IS_NO_AUTH"));
	while($arItem = $dbList->GetNext()){
		$arResult["SAME"][]=$arItem;
		$artistIDs[]=$arItem["PROPERTY_ARTIST_VALUE"];
        $programIDs[]=$arItem["PROPERTY_PROGRAM_VALUE"];
	}
}


// ARTISTS
$arResult["ARTISTS"] = array();
if( count( $artistIDs ) ){
	$arFilter = Array( "IBLOCK_ID"=>ARTISTS_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$artistIDs );
	$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PREVIEW_PICTURE"));
	while($arItem = $dbList->GetNext()){
		$arResult["ARTISTS"][$arItem["ID"]]=$arItem;
	}
}

// ARTIST COUNT
$arFilter = Array( "IBLOCK_ID"=>AUDIO_IBLOCK_ID, 'ACTIVE'=>'Y', "PROPERTY_ARTIST"=>$arResult["PROPERTIES"]["ARTIST"]["VALUE"] );
$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID"));
$arResult["ARTIST_COUNT"] = $dbList->SelectedRowsCount();

//PROGRAMM
$arResult["PROGRAM"] = array();
if( count( $artistIDs ) ){
    $arFilter = Array( "IBLOCK_ID"=>PROGRAM_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$programIDs );
    $dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME"));
    while($arItem = $dbList->GetNext()){
        $arResult["PROGRAM"][$arItem["ID"]]=$arItem;
    }
}


// IN PLAYLIST
$arResult["IN_PLAYLIST"] = array();
$arFilter = Array( "IBLOCK_ID"=>PLAYLIST_IBLOCK_ID, 'ACTIVE'=>'Y', "PROPERTY_AUDIO"=>$arResult["ID"] );
$dbList = CIBlockElement::GetList(array("sort"=>"asc"), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PREVIEW_PICTURE","DETAIL_PAGE_URL"));
while($arItem = $dbList->GetNext()){
	$arResult["IN_PLAYLIST"][]=$arItem;
}
?>