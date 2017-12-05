<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<?
if ($arResult["isFormNote"] == "Y"){
?>
<?=$arResult["FORM_NOTE"]?>
<?
}
else{
?>
<?=str_replace('<form ','<form class="contacts_form" ',$arResult["FORM_HEADER"])?>
	<input type="text" name="form_text_1" placeholder="Имя" required value="<?=$arResult["arrVALUES"]["form_text_1"]?>">
	<input type="email" name="form_email_2" placeholder="Почта" required value="<?=$arResult["arrVALUES"]["form_email_2"]?>">
	<textarea name="form_textarea_3" placeholder="Сообщение" required><?=$arResult["arrVALUES"]["form_textarea_3"]?></textarea>
	<input type="hidden" name="web_form_apply" value="Y" />
	<button>Отправить</button>
<?=$arResult["FORM_FOOTER"]?>

<?
/*
if($arResult["isUseCaptcha"] == "Y")
{
?>
		<tr>
			<th colspan="2"><b><?=GetMessage("FORM_CAPTCHA_TABLE_TITLE")?></b></th>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" /></td>
		</tr>
		<tr>
			<td><?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?><?=$arResult["REQUIRED_SIGN"];?></td>
			<td><input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" /></td>
		</tr>
<?
} // isUseCaptcha
*/
?>
<?
} //endif (isFormNote)
?>