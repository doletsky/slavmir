<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
foreach($arResult["SEARCH"] as $key=>$arItem){
    $arResult["SEARCH"][$key]["PROPERTIES"]=array();
    if(substr_count($arItem["MODULE_ID"],"iblock")==1){
        $resEl = CIBlockElement::GetByID($arItem["ID"]);
        if($ar_resEl = $resEl->GetNext()){
            $arResult["SEARCH"][$key]["PREVIEW_PICTURE"]["SRC"] = CFile::GetPath($ar_resEl["PREVIEW_PICTURE"]);
        }
        $res = CIBlockElement::GetProperty($arItem["PARAM2"], $arItem["ID"]);
        while ($ob = $res->GetNext())
        {
            $arResult["SEARCH"][$key]["PROPERTIES"][$ob["CODE"]] = $ob;
        }
    }

}