<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @var CMain $APPLICATION
 * @var CUser $USER
 */
?>
<script>
    function rmPostForm(el){
        var ans=$('.my_answer').html();
        var ansId=$(el).data('id');
        $('#what_you_think_ans').remove();
        $(el).parent('p').parent('div').parent('div').append('<div id="what_you_think_ans" data-id="'+ansId+'" class="my_answer">'+ans+'</div>');
        $('#what_you_think_ans #REVIEW_TEXT').removeAttr('onfocus');
        $('#what_you_think_ans form').addClass('active');
        $('.comments_body form:first').removeClass('active');
    }
    function sbmForm(){
        if($('form.active').parent('div').attr('id')=='what_you_think_ans'){
            var msgText=$('form.active #REVIEW_TEXT').val();
            $('form.active .phony').val(msgText);
            var prtMsgId=$('#what_you_think_ans').data('id');
            var nVal=prtMsgId+'_::'+msgText;
            prtMsgId='';
            $('form.active #REVIEW_TEXT').val(nVal);
            $('form.active #REVIEW_TEXT').attr('type','hidden');
            $('form.active .phony').attr('type','text');
            console.log($('form.active #REVIEW_TEXT').val());

        }
        $('form#<?=$arParams["FORM_ID"]?>.active').removeAttr('onsubmit');
        $('form#<?=$arParams["FORM_ID"]?>.active').submit();
    }
</script>
<div class="container">
    <div class="head">
        <h3>Обсуджение</h3>
        <div class="comments"><?=$arResult["MESSAGES_COUNT"]?></div>
        <div class="clear"></div>
    </div>
    <div class="comments_body">
        <div class="my_answer">
            <div class="my_img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/rel_auth1.png);"></div>
            <form class="my_comment active" name="<?=$arParams["FORM_ID"] ?>" id="<?=$arParams["FORM_ID"]?>" action="<?=POST_FORM_ACTION_URI?>#postform" method="POST" enctype="multipart/form-data" onsubmit="sbmForm();return false;">
                <input type="hidden" name="index" value="<?=htmlspecialcharsbx($arParams["form_index"])?>" />
                <input type="hidden" name="back_page" value="<?=$arResult["CURRENT_PAGE"]?>" />
                <input type="hidden" name="ELEMENT_ID" value="<?=$arParams["ELEMENT_ID"]?>" />
                <input type="hidden" name="SECTION_ID" value="<?=$arResult["ELEMENT_REAL"]["IBLOCK_SECTION_ID"]?>" />
                <input type="hidden" name="save_product_review" value="Y" />
                <input type="hidden" name="preview_comment" value="N" />
                <input type="hidden" name="AJAX_POST" value="<?=$arParams["AJAX_POST"]?>" />
                <?=bitrix_sessid_post()?>
                <input type="hidden" class="phony">
                <input required="" type="text" placeholder="Что вы думаете?" name="REVIEW_TEXT" id="REVIEW_TEXT" onfocus="$('#what_you_think_ans').remove();$(this).parent('form').addClass('active');">
                <button type="submit">Написать</button>
            </form>
        </div>
        <?
        if (!empty($arResult["MESSAGES"])):
            $iCount = 0;
            foreach ($arResult["MESSAGES"] as $res):
                ?>
                <div class="answer"><a name="message<?=$res['ID']?>"></a>
                    <div class="img_box">
                        <div class="name"><?=$res["AUTHOR_NAME"]?></div>
                        <div class="user_img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/rel_auth1.png);"></div>
                    </div>
                    <div class="answer_text">
                        <p><?=$res["POST_MESSAGE"]?> <a data-id="<?=$res["ID"]?>" href="#" onclick="rmPostForm(this);return false;">Ответить</a></p>
                        <div class="date_box"><span class="time"><?=ConvertDateTime($res["~POST_DATE"], "HH:MI")?></span><span class="date"><?=$res["POST_DATE"]?></span></div>
                    </div>
                    <div class="clear"></div>
                </div><!-- answer -->
                <?if(!empty($res['ANS'])):?>
                <?foreach($res['ANS'] as $ans):?>

                    <div class="answer sub"><a name="message<?=$res['ID']?>"></a>
                        <div class="img_box">
                            <div class="name"><?=$ans["AUTHOR_NAME"]?></div>
                            <div class="user_img" style="background-image: url(<?=SITE_TEMPLATE_PATH?>/images/rel_auth1.png);"></div>
                        </div>
                        <div class="answer_text">
                            <p><?=$ans["POST_MESSAGE"]?> </p>
                            <div class="date_box"><span class="time"><?=ConvertDateTime($ans["~POST_DATE"], "HH:MI")?></span><span class="date"><?=$ans["POST_DATE"]?></span></div>
                        </div>
                        <div class="clear"></div>
                    </div><!-- answer -->

                <?endforeach?>
            <?endif?>
            <?endforeach;
        endif;?>

    </div>
</div>