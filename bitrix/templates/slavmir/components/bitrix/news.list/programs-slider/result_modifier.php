<?
#pre($arResult);
$programIDs=array();
$programs=array();
foreach( $arResult["ITEMS"] as $arItem ){
	if($arItem["PROPERTIES"]["LINK"]["VALUE"]) $programIDs[]=$arItem["PROPERTIES"]["LINK"]["VALUE"];
}
$arFilter = Array( "IBLOCK_ID"=>5, 'ACTIVE'=>'Y', "ID"=>$programIDs );
$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PROPERTY_AUDIO","DETAIL_PAGE_URL"));
while($arItem = $dbList->GetNext()){
	$programs[$arItem["ID"]]=$arItem;
}
#pre($programs);
foreach( $arResult["ITEMS"] as $i => $arItem ){
	$programID = $arItem["PROPERTIES"]["LINK"]["VALUE"];
	if($programID){
		$arResult["ITEMS"][$i]["PROGRAM"] = $programs[$programID];
		#pre($arResult["ITEMS"][$i]["PROGRAM"]);

		// AUDIO
		$arFilter1 = Array( "IBLOCK_ID"=>1, 'ACTIVE'=>'Y', "PROPERTY_PROGRAM"=>$programID );
		$dbList1 = CIBlockElement::GetList(array("PROPERTY_DT"=>"desc"), $arFilter1, false, array("nTopCount"=>1), array("IBLOCK_ID","ID","NAME","DETAIL_PAGE_URL","PREVIEW_PICTURE"));
		while($arItem1 = $dbList1->GetNext()){
			$arResult["ITEMS"][$i]["AUDIO"]=$arItem1;
			#pre($arItem1);
		}

	}
	else{
		$arResult["ITEMS"][$i]["PROGRAM"] = null;
	}

}
$arResult["PROGRAMS"]=$programs;
?>