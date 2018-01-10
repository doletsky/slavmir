<?
$arResult["ITEMS_NEW"]=array();
$arFilter = Array(
    "IBLOCK_ID"=>$arResult["IBLOCK_ID"],
    "ACTIVE"=>"Y",
    "!PROPERTY_IS_NEW"=>false
);
$nres = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter);
while($ar_nfields = $nres->GetNext())
{
    $arResult["ITEMS_NEW"][]= $ar_nfields;
}
foreach($arResult["ITEMS_NEW"] as $key=>$item){
    $prop = CIBlockElement::GetProperty($item["IBLOCK_ID"], $item["ID"]);
    while ($ob = $prop->GetNext())
    {
        $arResult["ITEMS_NEW"][$key]["PROPERTIES"][$ob["CODE"]] = $ob;
    }
}


$authorIDs = array();
$sectionIDs=array();
foreach( $arResult["ITEMS"] as $arItem ){
	if( $arItem["PROPERTIES"]["AUTHOR"]["VALUE"] ) $artistIDs[] = $arItem["PROPERTIES"]["AUTHOR"]["VALUE"];
	$sectionIDs[] = $arItem["IBLOCK_SECTION_ID"];
}
foreach( $arResult["ITEMS_NEW"] as $arItem ){
    if( $arItem["PROPERTIES"]["AUTHOR"]["VALUE"] ) $artistIDs[] = $arItem["PROPERTIES"]["AUTHOR"]["VALUE"];
    $sectionIDs[] = $arItem["IBLOCK_SECTION_ID"];
}

$arResult["SECTIONS"]=array();
if( count( $sectionIDs ) ){
	$arFilter = Array('IBLOCK_ID'=>$arResult["IBLOCK_ID"], 'ACTIVE'=>'Y', 'ID'=> $sectionIDs );
	$db_list = CIBlockSection::GetList(Array("sort"=>"asc"), $arFilter, true);
	while($arSection = $db_list->GetNext()){
		$arResult["SECTIONS"][$arSection["ID"]]=$arSection;
	}
}

$arResult["AUTHORS"] = array();
if( count( $artistIDs ) ){
	$arFilter = Array( "IBLOCK_ID"=>NEWS_AUTHORS_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$authorIDs );
	$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME"));
	while($arItem = $dbList->GetNext()){
		$arResult["AUTHORS"][$arItem["ID"]]=$arItem;
	}
}

?>