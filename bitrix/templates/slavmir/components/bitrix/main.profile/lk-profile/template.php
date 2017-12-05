<?
/**
 * @global CMain $APPLICATION
 * @param array $arParams
 * @param array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
?>



<?ShowError($arResult["strProfileError"]);?>
<?
if ($arResult['DATA_SAVED'] == 'Y')
	ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>

<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data" class="data_info">
	<?=$arResult["BX_SESSION_CHECK"]?>
	<input type="hidden" name="lang" value="<?=LANG?>" />
	<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />


	<div class="lk_img_container">
		<?if (strlen($arResult["arUser"]["PERSONAL_PHOTO"])>0){?>
			<div class="photo_exist">
				<div class="lk_user_photo">
					<img src="<?=MakeImage( $arResult["arUser"]["PERSONAL_PHOTO"],array("w"=>147,"h"=>147,"zc"=>1) )?>" alt="Личное фото">
				</div>
				<?/*?><a href="#" class="change_photo">
					<span class="change_photo_img"></span>
					<span>Сменить фото</span>
				</a><?*/?>
				<label class="remove_photo">
					<input type="checkbox" name="PERSONAL_PHOTO_del" value="Y" id="PERSONAL_PHOTO_del"> 
					<?/*?><span class="remove_photo_img"></span><?*/?>
					<span>&nbsp;Удалить фото</span>
				</label>
			</div>
		<?}else{?>
			<span class="no_photo">
				<span class="no_photo_img"></span>
				<?=$arResult["arUser"]["PERSONAL_PHOTO_INPUT"]?>
				<span class="add-photo">Добавить фото</span>
			</span>
		<?}?>
	</div>
	<div class="data_info main_lk_form">
		<input type="text" name="NAME" required="true" placeholder="Имя" value="<?=$arResult["arUser"]["NAME"]?>">
		<input type="text" name="LAST_NAME" required="true" placeholder="Фамилия" value="<?=$arResult["arUser"]["LAST_NAME"]?>">
		<input type="text" name="LOGIN" required="true" placeholder="Логин" value="<?=$arResult["arUser"]["LOGIN"]?>">
		<input type="email" name="EMAIL" required="true" placeholder="E-mail" value="<?=$arResult["arUser"]["EMAIL"]?>">
		<input type="tel" name="PERSONAL_MOBILE" required="true" placeholder="Телефон" value="<?=$arResult["arUser"]["PERSONAL_MOBILE"]?>">
		<input type="password" name="NEW_PASSWORD" placeholder="Новый пароль" autocomplete="off">
		<input type="password" name="NEW_PASSWORD_CONFIRM" placeholder="Подтверждение пароля" autocomplete="off">
		
		<input type="submit" name="save" value="Сохранить" class="button">
	</div>
	<div class="change_pass">
		<?/*?><a href="#">Сменить пароль</a><?*/?>
	</div>
	<div class="clear"></div>
</form>



