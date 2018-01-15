<?
$APPLICATION->SetPageProperty("header_id","prog_item_top");
$APPLICATION->SetPageProperty("header_class","");
unset($_SESSION['PROG_NAME']);
$_SESSION['PROG_NAME'][$APPLICATION->GetCurDir()]=$arResult["NAME"];
?>