<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
?>
<?$APPLICATION->IncludeComponent("bitrix:sale.order.payment.receive","",Array(
    "PAY_SYSTEM_ID_NEW" => "2"
));?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>