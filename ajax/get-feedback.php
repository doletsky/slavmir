<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("form");
// ID ���-�����
$FORM_ID = $_REQUEST['WEB_FORM_ID'];

// ������ �������� �������
$arValues = array (
    "form_text_1"                 => $_REQUEST['form_text_1'],    // "�������, ���, ��������"
    "form_email_2"                 => $_REQUEST['form_email_2'],     // "���� ��������"
    "form_textarea_3"             => $_REQUEST['form_textarea_3']
);
$res['error']=array();
if(strlen($_REQUEST['form_text_1'])<=0){
    $res['error'][]='form_text_1';
}
if(strlen($_REQUEST['form_email_2'])<=0){
    $res['error'][]='form_email_2';
}
if(strlen($_REQUEST['form_textarea_3'])<=0){
    $res['error'][]='form_textarea_3';
}
if(count($res['error'])<=0){
    if ($RESULT_ID = CFormResult::Add($FORM_ID, $arValues))
    {
        $res['success']="WEB_FORM_ID=1&RESULT_ID=".$RESULT_ID."&formresult=addok";
    }
}
// �������� ����� ���������

echo json_encode($res);
