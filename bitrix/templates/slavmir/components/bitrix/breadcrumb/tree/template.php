<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;
$prevPath=explode($_SERVER['HTTP_HOST'],$_SERVER['HTTP_REFERER']);
    if(array_key_exists($prevPath[1],$_SESSION['PROG_NAME']) && substr_count($arResult[0]['LINK'], '/audio/')==1){
        $arResultNew=array(
            array( 'TITLE' => 'Наши программы', 'LINK' => '/programmy/' ),
            array( 'TITLE' => $_SESSION['PROG_NAME'][$prevPath[1]], 'LINK' => $prevPath[1] ),
            $arResult[1]
        );
        unset($_SESSION['PROG_NAME']);
        $arResult=$arResultNew;
    }elseif(substr_count($arResult[0]['LINK'], '/o-nas/')==1){
        $arResult=array(
            array(
                'TITLE'=> 'О нас',
                'LINK' => ''
            )

        );
    }elseif(substr_count($_SERVER['SCRIPT_URL'], '/kontakty/')==1){
        $arResult=array(
            array(
                'TITLE'=> 'О нас',
                'LINK' => ''
            )

        );
    }

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
		$strReturn .= '<li class="active"><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a></li>';
}
 
$strReturn .= '</ul>';
return $strReturn;