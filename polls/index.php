<?
if($_POST["PLAYER_AJAX"]=="Y"):
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
    ?><script>
    var pageTitle='Опросы';
    var headerBg='';
</script><?
else:
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Опросы");
endif;
?>
<?/*?>
<div class="opros_welcome">
	<div class="close_welcome"></div>
	<div class="clear"></div>
	<p class="main_text">Добро пожаловать в удивительный Славянский Миръ!</p>
	<p class="more">Помоги нам стать лучше, прими участие в опросе. Твое мнение нам очень важно!</p>
	<a class="take_part" href="/polls/">Участвовать в опросе</a>
</div>
<?*/?>
<?$APPLICATION->IncludeComponent(
	"bitrix:voting.current", 
	"polls", 
	array(
		"COMPONENT_TEMPLATE" => "polls",
		"CHANNEL_SID" => "MAIN",
		"VOTE_ID" => "",
		"VOTE_ALL_RESULTS" => "N",
        "SHOW_RESULTS" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600"
	),
	false
);?>
<?if($_POST["PLAYER_AJAX"]!="Y")require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>