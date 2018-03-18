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

// Собираем плейлист
foreach( $arr as $arItem ){
    $artistID = $arItem["PROPERTY_ARTIST_VALUE"];
    $artist = '';
    if( $artistID ){
        $artist = $artists[$artistID]["NAME"];
    }
    $image = GetConfig( "audio_default_image" );
    $bigimage = $image;
    if( isset($arItem["PREVIEW_PICTURE"]) && $arItem["PREVIEW_PICTURE"] ){
        $image = MakeImage( $arItem["PREVIEW_PICTURE"], array("w"=>44,"h"=>44,"zc"=>1) );
        $bigimage = MakeImage( $arItem["PREVIEW_PICTURE"], array("w"=>125,"h"=>125,"zc"=>1) );
    }
    $audios[] = array(
        "mediaid" => $arItem["ID"],
        "title" => $arItem["NAME"],
        "description" => $artist,
        "file" => $arItem["PROPERTY_PATH_VALUE"],
        "pic" => $image,
        "bigpic" => $bigimage,
        "duration" => $arItem["PROPERTY_DURATION_VALUE"],
        "url" => "/audio/".$arItem["CODE"]."/"
    );
}


#pre($audios);
$image = GetConfig( "playlist_default_image" );
if( isset($arResult["PREVIEW_PICTURE"]["SRC"]) && $arResult["PREVIEW_PICTURE"]["SRC"] ) $image = MakeImage( $arResult["PREVIEW_PICTURE"]["SRC"], array("w"=>44,"h"=>44,"zc"=>1) );

$author = '';
if( $arResult["PROPERTIES"]["AUTHOR"]["VALUE"] ){
    $author = $artists[$arResult["PROPERTIES"]["AUTHOR"]["VALUE"]]["NAME"];
}
$arResult["JSON"] = array(
    "info" => array(
        "name" => $arResult["NAME"],
        "pic" => $image,
        "artist" => $author
    ),
    "playlist" => $audios
);

$cp->SetResultCacheKeys(array('JSON'));
?>