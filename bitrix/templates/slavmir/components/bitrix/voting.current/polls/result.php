<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if ($arParams["SHOW_RESULTS"] == "Y")
{
	$this->IncludeLangFile("result.php");
}else{
    if($_POST['PLAYER_AJAX']=='Y'){
        ?><script>$('.logo a:visible').click();</script><?
    }
    else{
        LocalRedirect("/");
    }
}
?>