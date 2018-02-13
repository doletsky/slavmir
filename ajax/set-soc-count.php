<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
$cntCur=COption::GetOptionInt("socialservices", $_REQUEST['name']);
if($cntCur>0){
    $cntCur++;
}else{
    $cntCur=1;
}
echo $cntCur;
COption::SetOptionInt("socialservices", $_REQUEST['name'], $cntCur);
?>