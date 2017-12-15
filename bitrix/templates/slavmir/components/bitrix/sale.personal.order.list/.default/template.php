<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="history_list">
    <?foreach($arResult['VIEW'] as $pay):?>
    <div class="item">
        <div class="date"><?=$pay['DAY']?></div>
        <div class="time"><?=$pay['TIME']?></div>
        <div class="price"><?=$pay['SUM']?> ₽</div>
        <div class="pay_sys">Электронный платеж <?=$pay['PAY_NAME']?></div>
    </div>
    <?endforeach?>
</div>
