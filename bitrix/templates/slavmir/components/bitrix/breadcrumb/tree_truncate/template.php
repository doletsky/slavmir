<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

$strReturn = '<ul><li><a href="/">Главная</a><span class="vert_line"></span></li>';
 
for($index = 0, $itemSize = count($arResult); $index < $itemSize; $index++)
{
 
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	if($arResult[$index]["LINK"] <> "" && $index<=$itemSize-2)
		$strReturn .= '<li><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a><span class="vert_line"></span></li>';
	else
		$strReturn .= '<li class="active"><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.TruncateText($title, 30).'</a></li>';
}
 
$strReturn .= '</ul>';
return $strReturn;