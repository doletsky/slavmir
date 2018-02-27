<?
$rs_cMon=0;//нет доступа, =1 есть доступ
$cDTemp=array();
if ($USER->IsAuthorized()){
    $rsUser = CUser::GetByID($USER->GetID());
    $arUser = $rsUser->Fetch();
    $arGroups = CUser::GetUserGroup($arUser['ID']);
    if (in_array("1", $arGroups)) {// id группы пользователей, которым разрешен доступ к контенту
        $rs_cMon=1;
    } else {
        $arReg=explode('.',ConvertDateTime($arUser['DATE_REGISTER'], "DD.MM.YYYY", "ru"));
        $arCur=explode('.',ConvertTimeStamp());
        $mon=($arCur[2]-$arReg[2])*12+$arCur[1]-$arReg[1]-(int)($arReg[0]/$arCur[0]);
        if($mon<1){
            $rs_cMon=1;
            $cDTemp[0]=ConvertDateTime($arUser['DATE_REGISTER'], "DD.MM.YYYY", "ru");
            $tmpM=(int)$arReg[1]+1;
            $tmpY=$arReg[2];
            if($tmpM>12){
                $tmpY=$arReg[2]+1;
                $tmpM='01';
            }elseif($tmpM<10){
                $tmpM='0'.$tmpM;
            }
            $cDTemp[1]=$arReg[0].'.'.$tmpM.'.'.$tmpY;
        }
    }

}
$arResult["cMon"]=$rs_cMon;
$artistIDs = array();
foreach( $arResult["ITEMS"] as $arItem ){
	$artistIDs[] = $arItem["PROPERTIES"]["ARTIST"]["VALUE"];
}

$property_enums = CIBlockPropertyEnum::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "CODE"=>"CATEGORY"));
while($enum_fields = $property_enums->GetNext()){
	$arResult["CATEGORY"][$enum_fields["ID"]]=array( "NAME" => $enum_fields["VALUE"] );
}

$arResult["ARTISTS"] = array();
$arFilter = Array( "IBLOCK_ID"=>ARTISTS_IBLOCK_ID, 'ACTIVE'=>'Y', "ID"=>$artistIDs );
$dbList = CIBlockElement::GetList(array(), $arFilter, false, false, array("IBLOCK_ID","ID","NAME","PREVIEW_PICTURE"));
while($arItem = $dbList->GetNext()){
	$arResult["ARTISTS"][$arItem["ID"]]=$arItem;
}
?>