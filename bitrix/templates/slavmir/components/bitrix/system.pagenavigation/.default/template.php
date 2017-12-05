<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
 
if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false)) return;
 
$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
 
// prev
if( $arResult["NavPageNomer"] > 2 ){
  $hrefPrev=$arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]-1);
}
elseif( $arResult["NavPageNomer"] > 1){
  $hrefPrev=$arResult["sUrlPath"].$strNavQueryStringFull;
}
else{
  $hrefPrev=null;
}
// next
if($arResult["NavPageNomer"] < $arResult["NavPageCount"]){
  $hrefNext=$arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_1='.($arResult["NavPageNomer"]+1).'&AJAX=Y';
}
else{
  $hrefNext=null;
}


if($hrefNext){
	#echo $hrefNext;
	?>
	<span class="more" data-href="<?=$hrefNext?>">Загрузить еще</span>
	<?
}
?>