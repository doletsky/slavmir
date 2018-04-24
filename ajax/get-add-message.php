<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("forum");
CModule::IncludeModule("iblock");
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CForumAutosave $arParams["AUTOSAVE"]
 * @var CBitrixComponent $this
 * @var CMain $APPLICATION
 * @var CUser $USER
 */
$res = CIBlockElement::GetByID($_REQUEST['ELEMENT_ID']);
$ar_res = $res->GetNext();
$ELEMENT_ID=$_REQUEST['ELEMENT_ID'];
$PRODUCT_IBLOCK_ID=$ar_res["IBLOCK_ID"];
$elPathe = $_POST['obr_put'];
$q=$_POST['back_page'];
$idtem="0";
$itog_res=array();
$prom_res=array();
$arFdsG= Array();
$newtems="0";
//если отзыв написан
    $otz_post=$_POST['REVIEW_TEXT'];
    $otz_post=stripslashes($otz_post);
    $otz_post = html_entity_decode($otz_post);
    $otz_post = strip_tags($otz_post);
    $res = CIBlockElement::GetByID($_REQUEST['ELEMENT_ID']);
    $ar_res = $res->GetNext();
    $ELEMENT_ID=$_REQUEST['ELEMENT_ID'];
    $PRODUCT_IBLOCK_ID=$ar_res["IBLOCK_ID"];
    $db_props = CIBlockElement::GetProperty($PRODUCT_IBLOCK_ID, $_REQUEST['ELEMENT_ID'], array("sort" => "asc"), Array("CODE"=>"FORUM_TOPIC_ID"));
    if($ar_props = $db_props->Fetch()){
        $idtem = IntVal($ar_props["VALUE"]);
        $MESSAGE_TYPE='REPLY';
    }

    $avtname=$USER->GetFirstName();   //если имя автора есть
//    $itog_res = CForumTopic::GetList(array(), array());//ищем id темы по названию
//    while ($prom_res = $itog_res->Fetch())
//    {
//        if($prom_res["TITLE"]==$q)$idtem=$prom_res["ID"];
//
//    }

    if($idtem>"0")//если тема существует, то добавляем сообщение
    {
        $arFdsG= Array("POST_MESSAGE"=> $otz_post, "AUTHOR_NAME"=> $avtname, "ICON_ID"=> "N", "USE_SMILES"=> "N");
        $newpost=ForumAddMessage("REPLY", "1", $idtem, "0",$arFdsG ,$qwe ,$jkm);
    }
    else//если нет, то создаем новую
    {
        $arFdsGs= Array("POST_MESSAGE"=>$otz_post,"TITLE"=>$q,"STATE"=>"Y","USER_START_NAME"=>$avtname,"DESCRIPTION" =>"","ICON_ID"=>"N","USE_SMILES"=>"N","FORUM_ID"=>"1","APPROVED"=>"Y", "AUTHOR_NAME"=> $avtname,);
        $newtems=ForumAddMessage("NEW", "1", "0", "0",$arFdsGs ,$qwe ,$jkm);
        $itog_res = CForumTopic::GetList(array(), array());
        while ($prom_res = $itog_res->Fetch())
        {
            if($prom_res["TITLE"]==$q)$idtem=$prom_res["ID"];

        }
        CIBlockElement::SetPropertyValueCode($ELEMENT_ID, "FORUM_TOPIC_ID", $idtem);
    }
//echo $qwe."<br>".$jkm;
$props = CIBlockElement::GetProperty($PRODUCT_IBLOCK_ID, $_REQUEST['ELEMENT_ID'], array("sort" => "asc"), Array("CODE"=>"FORUM_MESSAGE_CNT"));
if($arProps = $props->Fetch()){
    $cnt = IntVal($arProps["VALUE"]);
}
else{
    $cnt = 0;
}
$cnt++;
CIBlockElement::SetPropertyValueCode($ELEMENT_ID, "FORUM_MESSAGE_CNT", $cnt);

