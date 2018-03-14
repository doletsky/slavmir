<?
$rs_cMon=0;//нет доступа, =1 есть доступ
$cDTemp=array();
if ($USER->IsAuthorized()){
    $rs_cMon=1;

//    $rsUser = CUser::GetByID($USER->GetID());
//    $arUser = $rsUser->Fetch();
//    $arGroups = CUser::GetUserGroup($arUser['ID']);
//    if (in_array("1", $arGroups)) {// id группы пользователей, которым разрешен доступ к контенту
//        $rs_cMon=1;
//    } else {
//        $arReg=explode('.',ConvertDateTime($arUser['DATE_REGISTER'], "DD.MM.YYYY", "ru"));
//        $arCur=explode('.',ConvertTimeStamp());
//        $mon=($arCur[2]-$arReg[2])*12+$arCur[1]-$arReg[1]-(int)($arReg[0]/$arCur[0]);
//        if($mon<1){
//            $rs_cMon=1;
//            $cDTemp[0]=ConvertDateTime($arUser['DATE_REGISTER'], "DD.MM.YYYY", "ru");
//            $tmpM=(int)$arReg[1]+1;
//            $tmpY=$arReg[2];
//            if($tmpM>12){
//                $tmpY=$arReg[2]+1;
//                $tmpM='01';
//            }elseif($tmpM<10){
//                $tmpM='0'.$tmpM;
//            }
//            $cDTemp[1]=$arReg[0].'.'.$tmpM.'.'.$tmpY;
//        }
//    }

}
$arResult["cMon"]=$rs_cMon;
$newsIDs = array();
foreach( $arResult["ITEMS"] as $arItem ){
	#pre($arItem);
	if($arItem["PROPERTIES"]["NEWS1"]["VALUE"]) $newsIDs[] = $arItem["PROPERTIES"]["NEWS1"]["VALUE"];
	if($arItem["PROPERTIES"]["NEWS2"]["VALUE"]) $newsIDs[] = $arItem["PROPERTIES"]["NEWS2"]["VALUE"];
}

$news=array();
$authorIDs=array();
$authors=array();
if( count( $newsIDs ) ){
	// ARTICLES
	$arFilter = Array( "IBLOCK_ID"=>NEWS_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$newsIDs );
	$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_PAGE_URL","PROPERTY_AUTHOR","ACTIVE_FROM","PROPERTY_IS_NO_AUTH"));
	while($arItem = $dbList->GetNext()){
		$news[$arItem["ID"]] = $arItem;
		if( $arItem["PROPERTY_AUTHOR_VALUE"] ) $authorIDs[] = $arItem["PROPERTY_AUTHOR_VALUE"];
	}

	// AUTHORS
	$arFilter = Array( "IBLOCK_ID"=>NEWS_AUTHORS_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$authorIDs );
	$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PREVIEW_PICTURE"));
	while($arItem = $dbList->GetNext()){
		$authors[$arItem["ID"]] = $arItem;
	}
}
$arResult["NEWS"]=$news;
$arResult["AUTHORS"]=$authors;

?>