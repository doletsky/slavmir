<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$cp = $this->__component;
if (is_object($cp)){


	global $USER;
	$arr=array();
	$audios=array();
	$artistIDs=array();
	$arFilter = Array( "IBLOCK_ID"=>AUDIO_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$arResult["PROPERTIES"]["AUDIO"]["VALUE"] );
	$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PREVIEW_PICTURE","PROPERTY_PATH","PROPERTY_ARTIST","CODE","PROPERTY_DURATION","PROPERTY_IS_NO_AUTH"));
	while($arItem = $dbList->GetNext()){

		$isNoAuth = false;
		if( $arItem["PROPERTY_IS_NO_AUTH_ENUM_ID"]=="19" ) $isNoAuth = true;

		$needBlock = false;
		global $USER;
		if( !$isNoAuth && !$USER->IsAuthorized() ){
			$needBlock = true;
			$arItem["PROPERTY_PATH_VALUE"] = '';
		}

		if( !$needBlock ){
			$arr[] = $arItem;
			if($arItem["PROPERTY_ARTIST_VALUE"]) $artistIDs[] = $arItem["PROPERTY_ARTIST_VALUE"];
		}
	}
	if( $arResult["PROPERTIES"]["AUTHOR"]["VALUE"] ) $artistIDs[]=$arResult["PROPERTIES"]["AUTHOR"]["VALUE"];

	$artists=array();
	if( count( $artistIDs ) ){
		$arFilter = Array( "IBLOCK_ID"=>ARTISTS_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$artistIDs );
		$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME"));
		while($arItem = $dbList->GetNext()){
			$artists[$arItem["ID"]] = $arItem;
		}
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

	#pre($arResult["JSON"]);

	$cp->SetResultCacheKeys(array('JSON'));
}