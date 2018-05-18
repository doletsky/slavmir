<?
$prefix=str_replace("/","_",$APPLICATION->GetCurDir());
?>
<?$APPLICATION->IncludeFile("/include/seo_texts/".$prefix."-seo.php", Array(), Array(
    "MODE"      => "html",
    "NAME"      => "Редактирование SEO-текстов",
    "TEMPLATE"  => "seo.php"
));
?>
<footer>
    <div class="container">
        <div class="footer_left_col">
            <div class="footer_logo">
                <a href="/"><img src="<?=SITE_TEMPLATE_PATH?>/images/favicon.png" alt="favicon"></a>
            </div>
            <nav class="footer_nav_left">
                <?$APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
                    "COMPONENT_TEMPLATE" => ".default",
                    "ROOT_MENU_TYPE" => "foot1",	// Тип меню для первого уровня
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
            <nav class="footer_nav_right">
                <?$APPLICATION->IncludeComponent("bitrix:menu", "top", Array(
                    "COMPONENT_TEMPLATE" => ".default",
                    "ROOT_MENU_TYPE" => "foot2",	// Тип меню для первого уровня
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
            <div class="clear"></div>
            <div class="copy">
                <p>© Славянский МIРЪ</p>
            </div>
        </div><!-- footer_left_col -->
        <div class="footer_right_col">
            <p>Мы в соцсетях:</p>
            <ul class="soc">
                <li><a target="blank" title="facebook" href="https://ru-ru.facebook.com/slavmir.tv" class="social-menu-link is-facebook"></a></li>
                <li><a target="blank" title="YouTube" href="https://www.youtube.com/channel/UCqwMwPPSgWk73kK4QjGxpoQ/videos" class="social-menu-link is-youtube"></a></li>
                <li><a target="blank" title="Вk" href="https://vk.com/slavmirtv" class="social-menu-link is-vk"></a></li>
                <li><a target="blank" title="Instagram" href="https://www.instagram.com/slavmir.tv/" class="social-menu-link is-instagram"></a></li>
                <li><a target="blank" title="Ok" href="https://ok.ru/group/53435314405595" class="social-menu-link is-odnoklassniki"></a></li>
                <?/*?><li><a target="blank" title="Telegram" href="#" class="social-menu-link is-t_me"></a></li><?*/?>
            </ul>
            <p>Помогите нам стать лучше:</p>
            <div class="opros">
                <a href="/polls/">Принять участие в опросе</a>
            </div>
        </div>
        <div class="roskom">
            <?$APPLICATION->IncludeFile("/include/disclamer.php", Array(), Array(
                "MODE" => "html",
                "NAME" => "Редактирование текстового блока",
            ));
            ?>
        </div>
        <div class="mobile_copy">
            <p>© Славянский МIРЪ</p>
        </div>
        <div class="clear"></div>
    </div>
</footer>
<!--<div class="count_down_box">-->
<!--    <div class="container">-->
<!--        <div class="count_text">-->
<!--            <p><b>Телеканал «Славянскiй Мiръ»</b> начнёт вещание через</p>-->
<!--            <div class="clock"></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<?$APPLICATION->IncludeComponent("bitrix:main.register",
    "",
    array(
        "SHOW_FIELDS" => Array("NAME", "PERSONAL_MOBILE"),
        "AUTH" => "Y",
        "SET_TITLE" => "N"
    ),
    false);?>
<div class="subs_popup_container">
    <div class="subs_container">
        <!--		<div class="close_popup"></div>-->
        <div class="close_popup s_opros"></div>
        <img src="<?=SITE_TEMPLATE_PATH?>/images/subs_popup_img.png" alt="subs_popup_img.png" class="top_img">
        <h3>Этот материал доступен только по подписке</h3>
        <p class="main_text">Зарегистрированным друзьям Славянского Мира доступны тысячи материалов, ежедневные обновления. Вы будете первым узнавать обо всех мероприятиях, станете нашим особым гостем.</p>
        <a href="#" class="subscribe">Подписатся на <b>Славянск<small>i</small>й Мiр<small>ъ</small></b></a>
        <h4>Стоимость подписки 99 ₽ в месяц</h4>
        <p class="license">Данное предложение не является публичной офертой. Лицензия СМИ 12278172</p>
    </div>
</div>

<div class="tnx_popup_container opros">
    <div class="tnx_container">
        <div class="close_popup"></div>
        <div class="popup_bg"></div>
        <h4>Благодарим за ваше мнение!</h4>
        <p>Нам очень важны ваши мысли по поводу развития проекта. <br>Мы постараемся учесть ваши пожелания и, при необходимости, свяжемся с вами!</p>
        <!--		<div class="close_tnx_popup">-->
        <div class="close_tnx_popup s_opros">
            <img src="<?=SITE_TEMPLATE_PATH?>/images/close_popup.png" alt="close_popup"><span>Закрыть</span>
        </div>
    </div>
</div>
<?if($USER->IsAuthorized()):?>
    <div class="paylk_popup_container">
        <div class="paylk_container">
            <div class="close_popup"></div>
            <?$APPLICATION->IncludeComponent("bitrix:sale.account.pay",
                "",
                Array(
                    "ELIMINATED_PAY_SYSTEMS" => array("1"),
                    "PATH_TO_BASKET" => "/personal/cart",
                    "PATH_TO_PAYMENT" => "/personal/order/payment",
                    "PERSON_TYPE" => "1",
                    "REFRESHED_COMPONENT_MODE" => "Y",
                    "SELL_CURRENCY" => "RUB",
                    "SELL_SHOW_FIXED_VALUES" => "Y",
                    "SELL_TOTAL" => array("100","200","500","1000","5000",""),
                    "SELL_USER_INPUT" => "Y",
                    "SELL_VALUES_FROM_VAR" => "N",
                    "SET_TITLE" => "N"
                )
            );?>

        </div>
    </div>
    <?if($_REQUEST['failPay']==1):?>
        <div class="failpay_popup_container" style="display: block;">
            <div class="failpay_container">
                <div class="close_popup"></div>
                <h3>Ошибка платежа</h3>
                <p class="main_text">При оплате произошла ошибка. Баланс не пополнен!</p>
            </div>
        </div>
    <?endif?>
<?endif;?>
<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery-2.2.3.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.3/jquery.fancybox.min.js"></script>
<!--<script src="https://content.jwplatform.com/libraries/abYwhQ0o.js"></script>-->
<!--<script data-version="7" src="https://content.jwplatform.com/libraries/PLYp0Up4.js"></script>-->
<script data-version="8" src="//content.jwplatform.com/libraries/isafOMFt.js"></script>


<!--<script src="--><?//=SITE_TEMPLATE_PATH?><!--/js/isafOMFt.js"></script>-->

<script type="text/javascript" charset="utf-8" src="//cdn.jsdelivr.net/clappr/latest/clappr.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/clappr-youtube-plugin.min.js"></script>

<script src="<?=SITE_TEMPLATE_PATH?>/js/perfect-scrollbar.jquery.min.js?014225"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery-ui.min.js?014225"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/slick.min.js?014225"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/flipclock.min.js?014225"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.tmpl.min.js?014225"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/detect.min.js?014225"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/player5.js?014225"></script>
<!-- <script src="<?//=SITE_TEMPLATE_PATH?>/js/intlTelInput.min.js"></script>
<script src="<?//=SITE_TEMPLATE_PATH?>/js/util.js"></script> -->
<script src="<?=SITE_TEMPLATE_PATH?>/js/main5.js?014225"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/sv.js?014225"></script>
<? include( dirname(__FILE__).'/jq-templates.php' );?>

<?
global $ShowPopUp, $interval;
if($ShowPopUp === true){ ?>
    <?=$GLOBALS['days']?>

    <?php
    $str_podpiska = "";
    switch ($GLOBALS['days']) {
        case 0: $str_podpiska = 'Ваша подписка истекла.'; break;
        case 1: $str_podpiska = 'До окончания вашей подписки остался 1 день'; break;
        default: $str_podpiska = 'До окончания вашей подписки осталось '.$GLOBALS['days'].' дня';
    }
    ?>
    <style>
        div#label.popup-window.popup-window-dark {
            position: fixed !important;
            background-color: #f47b22 !important;
            border-radius: 15px;
            font-style: italic !important;
            font-size: 30px;
            height: auto !important;
            width: auto !important;
        }
    </style>
    <script>
        // window.BXDEBUG = true;
        BX.ready(function(){
            var popup = BX.PopupWindowManager.create("label", null, {
                content: '<div><?echo $str_podpiska?>   <a style="color: white;" class="add_balance" href="#">Продлить</a></div>',
                darkMode: true,
                autoHide: true
            });

            popup.show();
        });
    </script>
<?}?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter40475790 = new Ya.Metrika({
                    id:40475790,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true,
                    trackHash:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/40475790" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-86345661-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-86345661-1');
</script>
<!-- Rating@Mail.ru counter -->
<script type="text/javascript">
var _tmr = window._tmr || (window._tmr = []);
_tmr.push({id: "3030284", type: "pageView", start: (new Date()).getTime()});
(function (d, w, id) {
  if (d.getElementById(id)) return;
  var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
  ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js";
  var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
  if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
})(document, window, "topmailru-code");
</script><noscript><div>
<img src="//top-fwz1.mail.ru/counter?id=3030284;js=na" style="border:0;position:absolute;left:-9999px;" alt="" />
</div></noscript>
<!-- //Rating@Mail.ru counter -->

<!-- Rating@Mail.ru counter dynamic remarketing appendix -->
<script type="text/javascript">
var _tmr = _tmr || [];
_tmr.push({
    type: 'itemView',
    productid: 'VALUE',
    pagetype: 'VALUE',
    list: 'VALUE',
    totalvalue: 'VALUE'
});
</script>
<!-- // Rating@Mail.ru counter dynamic remarketing appendix -->
</body>
</html>