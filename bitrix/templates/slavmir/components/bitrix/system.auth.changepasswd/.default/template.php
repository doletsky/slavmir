<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<section id="lk_section" class="<?/*?>alert<?*/?>">
	<div class="container">
		<div class="breadcrumbs dark">
			<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "tree", Array(
					"COMPONENT_TEMPLATE" => ".default",
					"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
					"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
					"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
				),
				false
			);?>
		</div>
		<h1 class="page_name">Смена пароля</h1>
		<form method="post" action="<?=$arResult["AUTH_FORM"]?>" name="bform" class="data_info">
			<?if (strlen($arResult["BACKURL"]) > 0): ?>
			<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
			<? endif ?>
			<input type="hidden" name="AUTH_FORM" value="Y">
			<input type="hidden" name="TYPE" value="CHANGE_PWD">

			<div class="lk_img_container">&nbsp;</div>
			<div class="data_info main_lk_form">
				<?ShowMessage($arParams["~AUTH_RESULT"]);?><br>
				<input type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["LAST_LOGIN"]?>" placeholder="<?=GetMessage("AUTH_LOGIN")?>*" />
				<input type="text" name="USER_CHECKWORD" maxlength="50" value="<?=$arResult["USER_CHECKWORD"]?>" class="bx-auth-input" placeholder="<?=GetMessage("AUTH_CHECKWORD")?>*" />
				<input type="password" name="USER_PASSWORD" maxlength="50" value="<?=$arResult["USER_PASSWORD"]?>" class="bx-auth-input" autocomplete="off" placeholder="<?=GetMessage("AUTH_NEW_PASSWORD_REQ")?>*" />
				<input type="password" name="USER_CONFIRM_PASSWORD" maxlength="50" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>" class="bx-auth-input" autocomplete="off" placeholder="<?=GetMessage("AUTH_NEW_PASSWORD_CONFIRM")?>*" />
				<input type="submit" name="change_pwd" value="Отправить" class="button">
				<p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>
				<p><span class="starrequired">*</span><?=GetMessage("AUTH_REQ")?></p>
			</div>
			<div class="clear"></div>
		</form>
	</div>
</section>
<section class="current_subs">
	<div class="container">
		<div class="clear"></div>
	</div>
</section>
<!--<script type="text/javascript">-->
<!--document.bform.USER_LOGIN.focus();-->
<!--</script>-->
