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
if (LANGUAGE_ID == 'ru'):
	$path = str_replace(array("\\", "//"), "/", dirname(__FILE__)."/ru/script.php");
	include($path);
endif;
// *************************/Input params***************************************************************

?>
<script>
    function rmPostForm(el){
        var ans=$('.what_you_think').html();
        $('#what_you_think_ans').remove();
        $(el).parent('p').parent('div').children('.disscus_user').children('.answer').prepend('<div id="what_you_think_ans" class="what_you_think">'+ans+'</div>');
    }
    function sbmForm(){
        if($('form.active').parent('div').parent('div').parent('.what_you_think').parent('div').hasClass('answer')){
            var msgText=$('form.active #REVIEW_TEXT').val();
            var prtMsgId=$('form.active').parent('div').parent('div').parent('.what_you_think').parent('div').attr('id');
            var nVal=prtMsgId+'_::'+msgText;
            prtMsgId='';
            $('form.active #REVIEW_TEXT').val(nVal);
            $('form.active #REVIEW_TEXT').attr('type','hidden');
            console.log($('form.active #REVIEW_TEXT').val());
            $('form#<?=$arParams["FORM_ID"]?>.active').removeAttr('onsubmit');
            $('form#<?=$arParams["FORM_ID"]?>.active').submit();
        }
    }
</script>
    <div class="discussion_box">
    <h4>Обсуждение <span><?=$arResult["MESSAGES_COUNT"]?></span></h4>
    <?
if (!empty($arResult["MESSAGES"])):
    $iCount = 0;
    foreach ($arResult["MESSAGES"] as $res):
    ?>

        <div class="dis_item"><a name="message<?=$res['ID']?>"></a>
            <p><?=$res["POST_MESSAGE"]?> <a href="#" onclick="rmPostForm(this);return false;">Ответить</a></p>
            <div class="disscus_user">
                <div class="disscus_user_img">
                    <img src="<?=SITE_TEMPLATE_PATH?>/images/rel_auth1.png" alt="disscus_user">
                </div>
                <p><a href="#"><?=$res["AUTHOR_NAME"]?></a><span class="time"><?=ConvertDateTime($res["~POST_DATE"], "HH:MI")?></span><span class="date"><?=$res["POST_DATE"]?></span></p>
                <div id="<?=$res['ID']?>" class="answer">
                    <?if(!empty($res['ANS'])):?>
                        <?foreach($res['ANS'] as $ans):?>

                            <div class="disscus_user">
                                <p><?=$ans["POST_MESSAGE"]?></p>
                                <div class="disscus_user_img">
                                    <img src="<?=SITE_TEMPLATE_PATH?>/images/rel_auth1.png" alt="disscus_user">
                                </div>
                                <p><a href="#"><?=$ans["AUTHOR_NAME"]?></a><span class="time"><?=ConvertDateTime($ans["~POST_DATE"], "HH:MI")?></span><span class="date"><?=$ans["POST_DATE"]?></span></p>
                            </div>

                        <?endforeach?>
                    <?endif?>
                </div>
            </div>
        </div>

     <?endforeach;
endif;?>


    </div>
    <div class="what_you_think" onclick="$('#what_you_think_ans').remove();">
        <div class="cur_user">
            <div class="cur_user_img">
                <img src="<?=SITE_TEMPLATE_PATH?>/images/rel_auth1.png" alt="disscus_user">
            </div>

            <div class="cur_user_info">
                <p><?=$res["AUTHOR_NAME"]?></p>
                <form name="<?=$arParams["FORM_ID"] ?>" id="<?=$arParams["FORM_ID"]?>" action="<?=POST_FORM_ACTION_URI?>#postform" method="POST" enctype="multipart/form-data" onsubmit="sbmForm();return false;">
                    <input type="hidden" name="index" value="<?=htmlspecialcharsbx($arParams["form_index"])?>" />
                    <input type="hidden" name="back_page" value="<?=$arResult["CURRENT_PAGE"]?>" />
                    <input type="hidden" name="ELEMENT_ID" value="<?=$arParams["ELEMENT_ID"]?>" />
                    <input type="hidden" name="SECTION_ID" value="<?=$arResult["ELEMENT_REAL"]["IBLOCK_SECTION_ID"]?>" />
                    <input type="hidden" name="save_product_review" value="Y" />
                    <input type="hidden" name="preview_comment" value="N" />
                    <input type="hidden" name="AJAX_POST" value="<?=$arParams["AJAX_POST"]?>" />
                    <?=bitrix_sessid_post()?>
                    <input type="text" placeholder="Что вы думаете?" name="REVIEW_TEXT" id="REVIEW_TEXT" onfocus="$('form.active').removeClass('active');$(this).parent('form').addClass('active');">
                </form>
            </div>
            <!--                    <input name="send_button" type="submit" value="--><?//=GetMessage("OPINIONS_SEND")?><!--" tabindex="" onclick="this.form.preview_comment.value = 'N';" />-->

            <div class="clear"></div>
        </div>
    </div>

