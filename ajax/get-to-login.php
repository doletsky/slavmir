<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$unreg=true;
if( !$isAuthorized ) {
    $res = $USER->Login(strip_tags($_POST['USER_LOGIN']), strip_tags($_POST['USER_PASSWORD']));
    if (empty($res['MESSAGE'])) $unreg = false;
}else{
    if($_POST['logout']=='yes'){
        $USER->Logout();
    }
}

    if($unreg){
    ?>
    <div class="unreg_container" data-control="ajax">
        <div class="to_login">
            <?$APPLICATION->IncludeComponent("bitrix:system.auth.authorize","",array(
                "PROFILE_URL"=>"/lichnoe/",
                "SHOW_ERRORS" => "Y"
            ),false);?>
            <div class="close_login_form">
                <img src="<?=SITE_TEMPLATE_PATH?>/images/close_login_form.png" alt="close_login_form">
            </div>
        </div>
        <div class="unreg unreg_main">
            <div class="unreg_link">
                <div class="unreg_img"></div>
                <span>Зарегистрироватся</span>
            </div>
            <a href="/tarify/" class="tarif">Тарифы</a>
        </div>
        <div class="login_box">
            <div class="log_in"></div>
            <span>Войти</span>
        </div>
    </div>
<?}else{?>
    <div class="reg_bar">
        <div class="reg">
					<span class="user_img">
						<?
                        $rsUser = CUser::GetByID( $USER->GetID() );
                        $arUser = $rsUser->Fetch();
                        #pre($arUser);
                        $photo = GetConfig("default_image");
                        if( $arUser["PERSONAL_PHOTO"] ) $photo = MakeImage( $arUser["PERSONAL_PHOTO"], array("w"=>34,"h"=>34,"zc"=>1) );
                        ?>
                        <img src="<?=$photo?>" alt="user_img.png">
					</span>
            <span class="user_name"><?=$USER->GetFullName()?></span>
        </div>
        <div class="settings_logged_bar">
            <div class="settings_container">
                <div class="settings">
                    <div class="settings_img"></div>
                    <span>Настройки</span>
                </div>
                <div class="settings_list">
                    <a href="">Тариф не выбран</a>
                    <a href="/tarify/" class="prodlenie active">Тарифы и продление</a>
                    <a href="/lichnoe/" class="pers_data">Персональные данные</a>
                    <a href="/?logout=yes" class="logOut">Выйти</a>
                </div>
            </div>

        </div>
        <?/*?><div class="login_box" onclick="location.href='?logout=yes'">
                    <span>Выйти</span>
                </div><?*/?>
    </div><!-- reg_bar -->
<?}?>