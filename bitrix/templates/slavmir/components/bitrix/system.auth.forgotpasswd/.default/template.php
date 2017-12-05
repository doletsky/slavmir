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
		<h1 class="page_name">Восстановление пароля</h1>

		<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>" class="data_info">
			<?
			if (strlen($arResult["BACKURL"]) > 0)
			{
			?>
				<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
			<?
			}
			?>
			<input type="hidden" name="AUTH_FORM" value="Y">
			<input type="hidden" name="TYPE" value="SEND_PWD">
			<div class="lk_img_container">&nbsp;</div>
			<div class="data_info main_lk_form">
				<?ShowMessage($arParams["~AUTH_RESULT"]);?><br>
				<p><?=GetMessage("AUTH_FORGOT_PASSWORD_1")?></p>
				<p>&nbsp;</p>
				<p><b><?=GetMessage("AUTH_GET_CHECK_STRING")?></b></p>
				<input type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["LAST_LOGIN"]?>" placeholder="логин" />
				<input type="text" name="USER_EMAIL" maxlength="255" placeholder="e-mail" />
				<input type="submit" name="send_account_info" value="Отправить" class="button">

				
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

<script type="text/javascript">
document.bform.USER_LOGIN.focus();
</script>