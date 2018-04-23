<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?
ShowMessage($arParams["~AUTH_RESULT"]);
ShowMessage($arResult['ERROR_MESSAGE']);
?>



<form name="form_auth" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">

		<input type="hidden" name="AUTH_FORM" value="Y" />
		<input type="hidden" name="TYPE" value="AUTH" />
		<?if (strlen($arResult["BACKURL"]) > 0):?>
		<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
		<?endif?>
		<?foreach ($arResult["POST"] as $key => $value):?>
		<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
		<?endforeach?>


		<input type="text" name="USER_LOGIN" placeholder="Логин" required="true" maxlength="255" value="<?=$arResult["LAST_LOGIN"]?>">
		<input type="password" name="USER_PASSWORD" placeholder="Пароль" required="true" maxlength="255" autocomplete="off">
						
		<div class="remember_box">
			<label>
				<input type="checkbox" id="USER_REMEMBER" name="USER_REMEMBER" value="Y" />
				<span></span>
				<span>запомнить меня</span>
			</label>
		</div>
		<button class="login_btn">Войти</button>
		<div class="clear"></div>
		<div class="unreg">
			<div class="unreg_img"></div>
			<span class="auth-registr-form">Зарегистрироватся</span>
		</div>
		<div class="lost_pass">
			<a href="/lichnoe/?vosstanovlenie_parolya=da<?#=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>">Забыли пароль?</a>
		</div>
		<div class="clear"></div>
</form>

