<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach($arResult['ORDERS'] as $order){
    $pay=$order['ORDER']['PAYED'];
    $day=$order['ORDER']['DATE_INSERT']->format("d.m.Y");
    $hms=$order['ORDER']['DATE_INSERT']->format("H:i:s");;
    $sum=$order['ORDER']['PRICE'];
    $ps=$order['PAYMENT'][0]['PAY_SYSTEM_NAME'];
    if($pay=="Y")
    $arResult['VIEW'][]=array(
        "DAY" => $day,
        "TIME" => $hms,
        "SUM" => intval($sum),
        "PAY_NAME" => $ps
    );
}
