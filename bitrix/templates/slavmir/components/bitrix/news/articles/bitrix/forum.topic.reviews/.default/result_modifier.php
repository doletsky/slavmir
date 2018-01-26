<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var CBitrixComponentTemplate $this */
$arParams["form_index"] = $this->randString(4);

$arParams["FORM_ID"] = "REPLIER".$arParams["form_index"];
$arParams["jsObjName"] = "oLHE";
$arParams["LheId"] = "idLHE".$arParams["form_index"];

$arParams["tabIndex"] = intVal(intval($arParams["TAB_INDEX"]) > 0 ? $arParams["TAB_INDEX"] : 10);


$arParams["EDITOR_CODE_DEFAULT"] = ($arParams["EDITOR_CODE_DEFAULT"] == "Y" ? "Y" : "N");
$arResult["QUESTIONS"] = (is_array($arResult["QUESTIONS"]) ? array_values($arResult["QUESTIONS"]) : array());

$arDel=array();
$arResult["MESSAGES_COUNT"]=count($arResult["MESSAGES"]);
foreach ($arResult["MESSAGES"] as $mid=>$res){
    if(substr_count($res["POST_MESSAGE"], "_::")==1){
        $arAns=explode("_::", $res["POST_MESSAGE"]);
        $res["POST_MESSAGE"]=$arAns[1];
        $arResult["MESSAGES"][$arAns[0]]['ANS'][]=$res;
        $arDel[]=$mid;
    }
}
foreach($arDel as $did) unset($arResult["MESSAGES"][$did]);

if ($arParams['AJAX_POST']=='Y' && ($_REQUEST["save_product_review"] == "Y"))
{
	ob_start();
}
?>
