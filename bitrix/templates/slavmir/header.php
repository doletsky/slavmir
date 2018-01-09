<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);

use Bitrix\Main\Page\Asset;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="desciption" content="<?if(strlen($APPLICATION->ShowProperty("description"))>0)echo $APPLICATION->ShowProperty("description");else echo 'Портал Славянскiй Мiръ - это всё богатство традиций славянского мира на одном сайте.';?>">
    <meta property="og:title" content="<?=$APPLICATION->ShowTitle();?>"/>
    <meta property="og:description" content="<?if(strlen($APPLICATION->ShowProperty("description"))>0)echo $APPLICATION->ShowProperty("description");else echo 'Портал Славянскiй Мiръ - это всё богатство традиций славянского мира на одном сайте.';?>"/>
    <meta property="og:image" content="http://<?=$_SERVER['HTTP_HOST']?>/favicon_og.png"/>
    <meta property="og:site_name" content="http://<?=$_SERVER['HTTP_HOST']?>"/>
	<title><?$APPLICATION->ShowTitle()?></title>
	<link rel="shortcut icon" href="/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i&subset=cyrillic" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Serif:400,400i&subset=cyrillic" rel="stylesheet">
	<?
	Asset::getInstance()->addCss( SITE_TEMPLATE_PATH."/css/reset.css" );
	Asset::getInstance()->addCss( SITE_TEMPLATE_PATH."/css/slick.css" );
	Asset::getInstance()->addCss( SITE_TEMPLATE_PATH."/css/jquery-ui.min.css" );
	Asset::getInstance()->addCss( SITE_TEMPLATE_PATH."/css/perfect-scrollbar.min.css" );
	Asset::getInstance()->addCss( SITE_TEMPLATE_PATH."/css/flipclock.css" );
	#Asset::getInstance()->addCss( SITE_TEMPLATE_PATH."/css/style.css" );
	Asset::getInstance()->addCss( SITE_TEMPLATE_PATH."/css/player.css" );
	#Asset::getInstance()->addCss( SITE_TEMPLATE_PATH."/css/sv.css" );
	?>
	
	<?$APPLICATION->ShowHead();?>
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/style.css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/sv.css">
</head>
<body class="<?/*?>pay_notice<?*/?>">
<?//$APPLICATION->ShowPanel();?>
<div id="player-wrap" class="hidden"><div id="player-container"></div></div>
<div class="remember_toPay">
	<p>Вот незадача! До конца оплаченного периода осталось всего 15 дней. <a href="#">Продли подписку</a> на особых условиях.</p>
</div>
<header>
	<div class="container">
		<div class="logo">
			<a href="/" class="logo_mobile"><img src="<?=SITE_TEMPLATE_PATH?>/images/logo_mobile.png" alt="logo_mobile.png"></a>
			<a href="/" class="logo_desktop"><img src="<?=SITE_TEMPLATE_PATH?>/images/logo.png" alt="logo"></a>
		</div>
		<?
		global $USER;
		$isAuthorized = $USER->IsAuthorized();
		?>
		<div id="header_bar" class="header_bar <?if( $isAuthorized ){?>logged<?}?>">
			<?if( !$isAuthorized ){?>
			<div class="unreg_container">
				<div class="to_login">
					<?$APPLICATION->IncludeComponent("bitrix:system.auth.authorize","",array(
						"PROFILE_URL"=>"/personal/",
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
					<a href="/rates/" class="tarif">Тарифы</a>
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
					<?/*?>
					<div class="likes_container">
						<div class="likes">
							<div class="like_img"></div>
							<span>Моя музыка</span>
							<div class="likes_num">14</div>
						</div>
						<div class="likes_list">
							<ul>
								<li>
									<div class="likes_img" style="background-image: url(images/verbovoy.png);">
										<div class="play_btn"></div>
									</div>
									<div class="likes_mus_info">
										<div class="likes_mus_name">Вербовой</div>
										<div class="likes_mus_group">Русская доблесть</div>
										<div class="likes_mus_bar">
											<a href="#"><span class="likes_list_img likes_list_img"></span></a>
											<a href="#"><span class="likes_list_img likes_like"></span></a>
											<a href="#"><span class="likes_list_img likes_download"></span></a>
										</div>
										<div class="likes_mus_time">4:30</div>
									</div>
									<div class="clear"></div>
								</li>
								<li>
									<div class="likes_img" style="background-image: url(images/verbovoy.png);">
										<div class="play_btn"></div>
									</div>
									<div class="likes_mus_info">
										<div class="likes_mus_name">Вербовой</div>
										<div class="likes_mus_group">Русская доблесть</div>
										<div class="likes_mus_bar">
											<a href="#"><span class="likes_list_img likes_list_img"></span></a>
											<a href="#"><span class="likes_list_img likes_like"></span></a>
											<a href="#"><span class="likes_list_img likes_download"></span></a>
										</div>
										<div class="likes_mus_time">4:30</div>
									</div>
									<div class="clear"></div>
								</li>
								<li>
									<div class="likes_img" style="background-image: url(images/verbovoy.png);">
										<div class="play_btn"></div>
									</div>
									<div class="likes_mus_info">
										<div class="likes_mus_name">Вербовой</div>
										<div class="likes_mus_group">Русская доблесть</div>
										<div class="likes_mus_bar">
											<a href="#"><span class="likes_list_img likes_list_img"></span></a>
											<a href="#"><span class="likes_list_img likes_like"></span></a>
											<a href="#"><span class="likes_list_img likes_download"></span></a>
										</div>
										<div class="likes_mus_time">4:30</div>
									</div>
									<div class="clear"></div>
								</li>
								<li>
									<div class="likes_img" style="background-image: url(images/verbovoy.png);">
										<div class="play_btn"></div>
									</div>
									<div class="likes_mus_info">
										<div class="likes_mus_name">Вербовой</div>
										<div class="likes_mus_group">Русская доблесть</div>
										<div class="likes_mus_bar">
											<a href="#"><span class="likes_list_img likes_list_img"></span></a>
											<a href="#"><span class="likes_list_img likes_like"></span></a>
											<a href="#"><span class="likes_list_img likes_download"></span></a>
										</div>
										<div class="likes_mus_time">4:30</div>
									</div>
									<div class="clear"></div>
								</li>
								<li>
									<div class="likes_img" style="background-image: url(images/verbovoy.png);">
										<div class="play_btn"></div>
									</div>
									<div class="likes_mus_info">
										<div class="likes_mus_name">Вербовой</div>
										<div class="likes_mus_group">Русская доблесть</div>
										<div class="likes_mus_bar">
											<a href="#"><span class="likes_list_img likes_list_img"></span></a>
											<a href="#"><span class="likes_list_img likes_like"></span></a>
											<a href="#"><span class="likes_list_img likes_download"></span></a>
										</div>
										<div class="likes_mus_time">4:30</div>
									</div>
									<div class="clear"></div>
								</li>
								<li>
									<div class="likes_img" style="background-image: url(images/verbovoy.png);">
										<div class="play_btn"></div>
									</div>
									<div class="likes_mus_info">
										<div class="likes_mus_name">Вербовой</div>
										<div class="likes_mus_group">Русская доблесть</div>
										<div class="likes_mus_bar">
											<a href="#"><span class="likes_list_img likes_list_img"></span></a>
											<a href="#"><span class="likes_list_img likes_like"></span></a>
											<a href="#"><span class="likes_list_img likes_download"></span></a>
										</div>
										<div class="likes_mus_time">4:30</div>
									</div>
									<div class="clear"></div>
								</li>
								<li>
									<div class="likes_img" style="background-image: url(images/verbovoy.png);">
										<div class="play_btn"></div>
									</div>
									<div class="likes_mus_info">
										<div class="likes_mus_name">Вербовой</div>
										<div class="likes_mus_group">Русская доблесть</div>
										<div class="likes_mus_bar">
											<a href="#"><span class="likes_list_img likes_list_img"></span></a>
											<a href="#"><span class="likes_list_img likes_like"></span></a>
											<a href="#"><span class="likes_list_img likes_download"></span></a>
										</div>
										<div class="likes_mus_time">4:30</div>
									</div>
									<div class="clear"></div>
								</li>
								<li>
									<div class="likes_img" style="background-image: url(images/verbovoy.png);">
										<div class="play_btn"></div>
									</div>
									<div class="likes_mus_info">
										<div class="likes_mus_name">Вербовой</div>
										<div class="likes_mus_group">Русская доблесть</div>
										<div class="likes_mus_bar">
											<a href="#"><span class="likes_list_img likes_list_img"></span></a>
											<a href="#"><span class="likes_list_img likes_like"></span></a>
											<a href="#"><span class="likes_list_img likes_download"></span></a>
										</div>
										<div class="likes_mus_time">4:30</div>
									</div>
									<div class="clear"></div>
								</li>
								<li>
									<div class="likes_img" style="background-image: url(images/verbovoy.png);">
										<div class="play_btn"></div>
									</div>
									<div class="likes_mus_info">
										<div class="likes_mus_name">Вербовой</div>
										<div class="likes_mus_group">Русская доблесть</div>
										<div class="likes_mus_bar">
											<a href="#"><span class="likes_list_img likes_list_img"></span></a>
											<a href="#"><span class="likes_list_img likes_like"></span></a>
											<a href="#"><span class="likes_list_img likes_download"></span></a>
										</div>
										<div class="likes_mus_time">4:30</div>
									</div>
									<div class="clear"></div>
								</li>
								<li>
									<div class="likes_img" style="background-image: url(images/verbovoy.png);">
										<div class="play_btn"></div>
									</div>
									<div class="likes_mus_info">
										<div class="likes_mus_name">Вербовой</div>
										<div class="likes_mus_group">Русская доблесть</div>
										<div class="likes_mus_bar">
											<a href="#"><span class="likes_list_img likes_list_img"></span></a>
											<a href="#"><span class="likes_list_img likes_like"></span></a>
											<a href="#"><span class="likes_list_img likes_download"></span></a>
										</div>
										<div class="likes_mus_time">4:30</div>
									</div>
									<div class="clear"></div>
								</li>
							</ul>
						</div>
					</div>
					<?*/?>
					<div class="settings_container">
						<div class="settings">
							<div class="settings_img"></div>
							<span>Настройки</span>
						</div>
						<div class="settings_list">
							<a href="">Тариф не выбран</a>
							<a href="/rates/" class="prodlenie active">Тарифы и продление</a>
							<a href="/personal/" class="pers_data">Персональные данные</a>
							<a href="/?logout=yes" class="logOut">Выйти</a>
						</div>
					</div>
					
				</div>
			</div><!-- reg_bar -->
			<?}?>

			<div class="search">
				<form action="/search/" method="get" class="search_form">
					<input type="search" name="q" required="true" value="<?=htmlspecialchars($_REQUEST["q"])?>">
					<button></button>
				</form>
				<div class="search_img"></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="header_top_menu">
			<div class="burger">
				<img src="<?=SITE_TEMPLATE_PATH?>/images/burger.png" alt="burger">
				<img src="<?=SITE_TEMPLATE_PATH?>/images/burger_active.png" alt="burger" class="active">
				
			</div>
			<div class="mobile_menu">
				<?$APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
						"COMPONENT_TEMPLATE" => ".default",
						"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
						"MENU_CACHE_TYPE" => "A",	// Тип кеширования
						"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
						"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
						"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
						"MAX_LEVEL" => "1",	// Уровень вложенности меню
						"CHILD_MENU_TYPE" => "top",	// Тип меню для остальных уровней
						"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
						"DELAY" => "N",	// Откладывать выполнение шаблона меню
						"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
					),
					false
				);?>
				<form action="/search/" method="get" class="mobile_search">
					<input type="text" name="q" required>
					<button></button>
				</form>
				<?if( $isAuthorized ){?>
				<div class="logged_bar">
					<span class="user_img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>images/mobile_menu_user.png);"></span>
					<span class="user_name"><?=$USER->GetFullName()?></span>
					<span class="likes dn">14</span>
					<a class="settings" href="/personal/"></a>
					<span class="clear"></span>
				</div>
				<?}?>
			</div>
			<nav>
				<?$APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
						"COMPONENT_TEMPLATE" => ".default",
						"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
						"MENU_CACHE_TYPE" => "A",	// Тип кеширования
						"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
						"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
						"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
						"MAX_LEVEL" => "1",	// Уровень вложенности меню
						"CHILD_MENU_TYPE" => "top",	// Тип меню для остальных уровней
						"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
						"DELAY" => "N",	// Откладывать выполнение шаблона меню
						"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
					),
					false
				);?>
			</nav>
			<form action="." method="post" class="mobile_menu_form">
				<input type="text">
			</form>
		</div>
		<div class="clear"></div>
	</div>
</header>


<? include( dirname(__FILE__).'/music_bar.php' );?>
    <div class="right_soc">
        <ul>
            <a target="_blank" href="https://connect.ok.ru/offer?url=http://<?=$_SERVER['SERVER_NAME']?><?=$APPLICATION->GetCurPage()?>">
                <li>
                    <span class="soc_img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/ok_r_dark.png);"></span><span class="numb">6</span>
                </li>
            </a>
            <a href="#" style="display: none">
                <li>
                    <span class="soc_img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/twit_r_dark.png);"></span><span class="numb">3</span>
                </li>
            </a>
            <a target="_blank" href="http://www.facebook.com/sharer.php?u=http://<?=$_SERVER['SERVER_NAME']?><?=$APPLICATION->GetCurPage()?>">
                <li>
                    <span class="soc_img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/fb_r_dark.png);"></span><span class="numb">136</span>
                </li>
            </a>
            <a target="_blank" href="https://vk.com/share.php?url=http://<?=$_SERVER['SERVER_NAME']?><?=$APPLICATION->GetCurPage()?>">
                <li>
                    <span class="soc_img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/vk_r_dark.png);"></span><span class="numb">41</span>
                </li>
            </a>
        </ul>
    </div>
    <!-- right_soc -->

<?if( $APPLICATION->GetCurPage() != '/' ){
	$bg = $APPLICATION->GetPageProperty("header_bg");
	if($bg) $APPLICATION->SetPageProperty("bg_dop",' style="background-image:url('.$bg.')" ');

	$class = "page_name";
	if( CSite::inDir("/about/") ) $class = "";
	if( CSite::inDir("/audio-playlist/") ) $class = "";

	// section
	$showSection = true;
	if( CSite::inDir('/audio/') ) $showSection = false;
	if( CSite::inDir("/articles/") && $APPLICATION->GetCurPage()!='/articles/' ) $showSection=false;
	if( CSite::inDir("/news/") && $APPLICATION->GetCurPage()!='/news/' ) $showSection=false;
	if( CSite::inDir("/video/") ) $showSection=false;
	if( CSite::inDir("/polls/") ) $showSection=false;
	if( CSite::inDir("/rates/") ) $showSection=false;
	if( CSite::inDir("/personal/") ) $showSection=false;

	// h1
	$isShowH1=true;
	if( CSite::inDir("/programs/") && $APPLICATION->GetCurPage()!='/programs/' ) $isShowH1=false;


	if( $showSection ){
	?>
	<section id="<?$APPLICATION->ShowProperty("header_id","about_page_top")?>" class="<?$APPLICATION->ShowProperty("header_class","page_top_bg")?>" <?if($bg){?>style="background-image:url(<?=$bg?>)"<?}?>>
		<div class="container">
			<div class="breadcrumbs">
				<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "tree", Array(
						"COMPONENT_TEMPLATE" => ".default",
						"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
						"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
						"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
					),
					false
				);?>
			</div>
			<?if( $isShowH1 ){?><h1 class="<?=$class?>"><?$APPLICATION->ShowTitle(false)?></h1><?}?>
		</div>
	</section>
	<?}?>
<?}?>