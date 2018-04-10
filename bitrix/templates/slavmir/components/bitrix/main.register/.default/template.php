<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();
?>


<?if($USER->IsAuthorized()):?>
    <div class="tnx_popup_container reg" <?if(count($_POST) && isset($_POST["register_submit_button"])){?>style="display:block;"<?}?>>
    <div class="tnx_container">
    <div class="tnx_container">
        <div class="close_popup" onclick="location.href='<?=$APPLICATION->GetCurDir()?>'"></div>
        <div class="popup_bg"></div>
        <h4>Ваша регистрация прошла успешно!</h4>
        <p>Мы вышлем подтверждение регистрации на указанный адрес почты.</p>
        <div class="close_tnx_popup" onclick="location.href='<?=$APPLICATION->GetCurDir()?>'">
            <img src="<?=SITE_TEMPLATE_PATH?>/images/close_popup.png" alt="close_popup"><span>Закрыть</span>
        </div>
    </div>
    </div>
    </div>


<!--<p>--><?//echo GetMessage("MAIN_REGISTER_AUTH")?><!--</p>-->
<!--<p>&nbsp;</p>-->
<!--<div class="have_reg">-->
<!--	<p>Пожалуйста, переходите в свой <a href="/lichnoe/">личный кабинет</a></p>-->
<!--</div>-->

<?else:?>
    <div class="register_popup_container" <?if(count($_POST) && isset($_POST["register_submit_button"])){?>style="display:block;"<?}?>>
<div class="register_popup">
<div class="register_popup_scroll" style="position: initial;">
<div class="close_popup"></div>
<h5>Регистрация в Славянском Мире</h5>
	<div class="have_reg">
		<p>У меня уже есть регистрация. <a href="/lichnoe/" class="register-enter">Войти</a></p>
	</div>
	<p class="reg_info">Зарегистрированным друзьям Славянского Мира доступны тысячи материалов, ежедневные обновления. Вы будете первым узнавать обо всех мероприятиях, станете нашим особым гостем.</p>



<?
if (count($arResult["ERRORS"]) > 0):
	foreach ($arResult["ERRORS"] as $key => $error)
		if (intval($key) == 0 && $key !== 0) 
			$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);

	ShowError(implode("<br />", $arResult["ERRORS"]));

elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
?>
<p><?echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?></p>
<?endif?>
<div class="errortext"></div>
<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data" class="data_info">
<?
if($arResult["BACKURL"] <> ''):
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
endif;
?>
<?/*?>
<table>
	<thead>
		<tr>
			<td colspan="2"><b><?=GetMessage("AUTH_REGISTER")?></b></td>
		</tr>
	</thead>
	<tbody><?*/?>
<?#pre($arResult["SHOW_FIELDS"]);?>
<?
$arResult["SHOW_FIELDS"]=array(
	"NAME",
	"PERSONAL_MOBILE",
	"EMAIL",
	"LOGIN",
	"PASSWORD",
	"CONFIRM_PASSWORD"
);
?>
<?foreach ($arResult["SHOW_FIELDS"] as $FIELD):?>
	<?if($FIELD == "AUTO_TIME_ZONE" && $arResult["TIME_ZONE_ENABLED"] == true):?>
		<?/*?><tr>
			<td><?echo GetMessage("main_profile_time_zones_auto")?><?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?><span class="starrequired">*</span><?endif?></td>
			<td><?*/?>
				<select name="REGISTER[AUTO_TIME_ZONE]" onchange="this.form.elements['REGISTER[TIME_ZONE]'].disabled=(this.value != 'N')">
					<option value=""><?echo GetMessage("main_profile_time_zones_auto_def")?></option>
					<option value="Y"<?=$arResult["VALUES"][$FIELD] == "Y" ? " selected=\"selected\"" : ""?>><?echo GetMessage("main_profile_time_zones_auto_yes")?></option>
					<option value="N"<?=$arResult["VALUES"][$FIELD] == "N" ? " selected=\"selected\"" : ""?>><?echo GetMessage("main_profile_time_zones_auto_no")?></option>
				</select>
			<?/*?></td>
		</tr>
		<tr>
			<td><?echo GetMessage("main_profile_time_zones_zones")?></td>
			<td><?*/?>
				<select name="REGISTER[TIME_ZONE]"<?if(!isset($_REQUEST["REGISTER"]["TIME_ZONE"])) echo 'disabled="disabled"'?>>
		<?foreach($arResult["TIME_ZONE_LIST"] as $tz=>$tz_name):?>
					<option value="<?=htmlspecialcharsbx($tz)?>"<?=$arResult["VALUES"]["TIME_ZONE"] == $tz ? " selected=\"selected\"" : ""?>><?=htmlspecialcharsbx($tz_name)?></option>
		<?endforeach?>
				</select>
			<?/*?></td>
		</tr><?*/?>
	<?else:?>
		<?/*?><tr>
			<td><?=GetMessage("REGISTER_FIELD_".$FIELD)?>:<?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?><span class="starrequired">*</span><?endif?></td>
			<td><?*/?><?
	switch ($FIELD)
	{
		case "PASSWORD":
			?><input size="30" type="password" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" autocomplete="off" class="bx-auth-input" placeholder="<?=GetMessage("REGISTER_FIELD_".$FIELD)?>" />
<?if($arResult["SECURE_AUTH"]):?>
				<span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
					<div class="bx-auth-secure-icon"></div>
				</span>
				<noscript>
				<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
					<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
				</span>
				</noscript>
<script type="text/javascript">
document.getElementById('bx_auth_secure').style.display = 'inline-block';
</script>
<?endif?>
<?
			break;
		case "CONFIRM_PASSWORD":
			?><input placeholder="<?=GetMessage("REGISTER_FIELD_".$FIELD)?>" size="30" type="password" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" autocomplete="off" /><?
			break;

		case "PERSONAL_GENDER":
			?><select name="REGISTER[<?=$FIELD?>]">
				<option value=""><?=GetMessage("USER_DONT_KNOW")?></option>
				<option value="M"<?=$arResult["VALUES"][$FIELD] == "M" ? " selected=\"selected\"" : ""?>><?=GetMessage("USER_MALE")?></option>
				<option value="F"<?=$arResult["VALUES"][$FIELD] == "F" ? " selected=\"selected\"" : ""?>><?=GetMessage("USER_FEMALE")?></option>
			</select><?
			break;

		case "PERSONAL_COUNTRY":
		case "WORK_COUNTRY":
			?><select placeholder="<?=GetMessage("REGISTER_FIELD_".$FIELD)?>" name="REGISTER[<?=$FIELD?>]"><?
			foreach ($arResult["COUNTRIES"]["reference_id"] as $key => $value)
			{
				?><option value="<?=$value?>"<?if ($value == $arResult["VALUES"][$FIELD]):?> selected="selected"<?endif?>><?=$arResult["COUNTRIES"]["reference"][$key]?></option>
			<?
			}
			?></select><?
			break;

		case "PERSONAL_PHOTO":
		case "WORK_LOGO":
			?><input size="30" type="file" name="REGISTER_FILES_<?=$FIELD?>" /><?
			break;

		case "PERSONAL_NOTES":
		case "WORK_NOTES":
			?><textarea placeholder="<?=GetMessage("REGISTER_FIELD_".$FIELD)?>" cols="30" rows="5" name="REGISTER[<?=$FIELD?>]"><?=$arResult["VALUES"][$FIELD]?></textarea><?
			break;
		default:
			if ($FIELD == "PERSONAL_BIRTHDAY"):?><small><?=$arResult["DATE_FORMAT"]?></small><br /><?endif;
			?><input placeholder="<?=GetMessage("REGISTER_FIELD_".$FIELD)?>" size="30" type="<?if($FIELD=='EMAIL') echo 'email'; else echo 'text';?>" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" required="true" <?if($FIELD=='EMAIL'):?>oninvalid="this.setCustomValidity('Введите корректный адрес электронной почты')"<?else:?>oninvalid="this.setCustomValidity('Пожалуйста, заполните это поле')"<?endif?> oninput="this.setCustomValidity('')" /><?
				if ($FIELD == "PERSONAL_BIRTHDAY")
					$APPLICATION->IncludeComponent(
						'bitrix:main.calendar',
						'',
						array(
							'SHOW_INPUT' => 'N',
							'FORM_NAME' => 'regform',
							'INPUT_NAME' => 'REGISTER[PERSONAL_BIRTHDAY]',
							'SHOW_TIME' => 'N'
						),
						null,
						array("HIDE_ICONS"=>"Y")
					);
				?><?
	}?><?/*?></td>
		</tr><?*/?>
	<?endif?>
<?endforeach?>
<?// ********************* User properties ***************************************************?>
<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
	<tr><td colspan="2"><?=strlen(trim($arParams["USER_PROPERTY_NAME"])) > 0 ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB")?></td></tr>
	<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
	<tr><td><?=$arUserField["EDIT_FORM_LABEL"]?>:<?if ($arUserField["MANDATORY"]=="Y"):?><span class="starrequired">*</span><?endif;?></td><td>
			<?$APPLICATION->IncludeComponent(
				"bitrix:system.field.edit",
				$arUserField["USER_TYPE"]["USER_TYPE_ID"],
				array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField, "form_name" => "regform"), null, array("HIDE_ICONS"=>"Y"));?></td></tr>
	<?endforeach;?>
<?endif;?>
<?// ******************** /User properties ***************************************************?>
<?
/* CAPTCHA */
if ($arResult["USE_CAPTCHA"] == "Y")
{
	?>
		<tr>
			<td colspan="2"><b><?=GetMessage("REGISTER_CAPTCHA_TITLE")?></b></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
				<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
			</td>
		</tr>
		<tr>
			<td><?=GetMessage("REGISTER_CAPTCHA_PROMT")?>:<span class="starrequired">*</span></td>
			<td><input type="text" name="captcha_word" maxlength="50" value="" /></td>
		</tr>
	<?
}
/* !CAPTCHA */
?>
<?/*?>
	</tbody>
	<tfoot>
		<tr>
			<td></td>
			<td></td>
		</tr>
	</tfoot>
</table>
<?*/?>

<p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>
<p><span class="starrequired">*</span><?=GetMessage("AUTH_REQ")?></p>

<div class="reg_privacy">
    <input onload="this.setCustomValidity('Для продолжения вы должны принять условия Пользовательского соглашения');" type="checkbox" required="required" title="Для продолжения вы должны принять условия Пользовательского соглашения">
    <p>Я принимаю условия <a href="/include/users.pdf" target="_blank">Пользовательского соглашения</a> (о порядке пользования интернет-сайтом «Славянский мир») и даю своё согласие ООО «Славянский мир» на обработку моей персональной информации на условиях, определенных <a href="/include/politice.pdf" target="_blank">Политикой&nbsp;конфиденциальности</a>.</p>
</div>

	<div class="reg_btns_wrap">
		<div class="reg_btn reg_free">
			<button><b>Получить бесплатно</b><br>месяц тестового периода</button>
			<input type="hidden" name="register_submit_button" value="<?=GetMessage("AUTH_REGISTER")?>" />
            <input type="text" id="for_bots" hidden="">
            <?/*?>
			<div class="reg_limited">
				<p>Ограниченный доступ <br> к порталу.</p>
			</div>
            <?*/?>
		</div>
		<?/*?>
        <div class="reg_btn reg_pay">
			<button><b>Оформить <br> платную подписку</b></button>
			<div class="reg_tarifs">
				<a href="/tarify/" target="_blank">Тарифы и условия</a>
				<p>Всего за 99 ₽ в месяц вы получите полный доступ ко всем <br> материалам сайта, включая <br> ТВ-канал, музыку и видео.</p>
			</div>
		</div>
        <?*/?>
	</div>

</form>
</div>
</div>
    </div>
<?endif?>