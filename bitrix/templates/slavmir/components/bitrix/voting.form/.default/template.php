<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<section id="opros_page">
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
		<?
		if (!empty($arResult["ERROR_MESSAGE"])): 
		?>
		<div class="vote-note-box vote-note-error" style="position: absolute;left: 23%;top: 10%;">
			<div class="vote-note-box-text"><?=ShowError($arResult["ERROR_MESSAGE"])?></div>
		</div>
		<?
		endif;

		if (!empty($arResult["OK_MESSAGE"])): 
		?>
		<div class="vote-note-box vote-note-note">
			<div class="vote-note-box-text"><?=ShowNote($arResult["OK_MESSAGE"])?></div>
		</div>
		<?
		endif;
		?>
		<h1 class="page_name"><?=$arResult["VOTE"]["TITLE"]?></h1>
		<?
		#pre($arResult["VOTE"]);


		if (empty($arResult["VOTE"])):
			return false;
		elseif (empty($arResult["QUESTIONS"])):
			return true;
		endif;

		?>
		<div class="voting-form-box">
		<form action="<?=POST_FORM_ACTION_URI?>" method="post" class="vote-form opros_form">
			<input type="hidden" name="vote" value="Y">
			<input type="hidden" name="PUBLIC_VOTE_ID" value="<?=$arResult["VOTE"]["ID"]?>">
			<input type="hidden" name="VOTE_ID" value="<?=$arResult["VOTE"]["ID"]?>">
			<?=bitrix_sessid_post()?>
			
		
			<?
			$iCount = 0;
			foreach ($arResult["QUESTIONS"] as $arQuestion){
				$iCount++;

				?>
				<div class="ask_block vote-item-vote <?=($iCount == 1 ? "vote-item-vote-first " : "")?><?
							?><?=($iCount == count($arResult["QUESTIONS"]) ? "vote-item-vote-last " : "")?><?
							?><?=($iCount%2 == 1 ? "vote-item-vote-odd " : "vote-item-vote-even ")?><?
							?>">
					<p class="ask_text"><?=$iCount?>. <?=$arQuestion["QUESTION"]?><?if($arQuestion["REQUIRED"]=="Y"){echo "<span class='starrequired'>*</span>";}?></p>
					<?/*?>
					<label class="own">
						<input type="radio" name="answer">
						<span></span>
						<span>А у меня свой ответ:</span>
						<input type="text">
					</label>
					<?*/?>
				
					<ol class="vote-items-list vote-answers-list">
					<?
					$iCountAnswers = 0;
					foreach ($arQuestion["ANSWERS"] as $arAnswer):
						$iCountAnswers++;
						?>
						<li class="vote-item-vote <?=($iCountAnswers == 1 ? "vote-item-vote-first " : "")?><?
							?><?=($iCountAnswers == count($arQuestion["ANSWERS"]) ? "vote-item-vote-last " : "")?><?
							?><?=($iCountAnswers%2 == 1 ? "vote-item-vote-odd " : "vote-item-vote-even ")?>">
							<?
							switch ($arAnswer["FIELD_TYPE"]):
								case 0://radio
									$value=(isset($_REQUEST['vote_radio_'.$arAnswer["QUESTION_ID"]]) && 
										$_REQUEST['vote_radio_'.$arAnswer["QUESTION_ID"]] == $arAnswer["ID"]) ? 'checked="checked"' : '';
								break;
								case 1://checkbox
									$value=(isset($_REQUEST['vote_checkbox_'.$arAnswer["QUESTION_ID"]]) && 
										array_search($arAnswer["ID"],$_REQUEST['vote_checkbox_'.$arAnswer["QUESTION_ID"]])!==false) ? 'checked="checked"' : '';
								break;
								case 2://select
									$value=(isset($_REQUEST['vote_dropdown_'.$arAnswer["QUESTION_ID"]])) ? $_REQUEST['vote_dropdown_'.$arAnswer["QUESTION_ID"]] : false;
								break;
								case 3://multiselect
									$value=(isset($_REQUEST['vote_multiselect_'.$arAnswer["QUESTION_ID"]])) ? $_REQUEST['vote_multiselect_'.$arAnswer["QUESTION_ID"]] : array();
								break;
								case 4://text field
									$value = isset($_REQUEST['vote_field_'.$arAnswer["ID"]]) ? htmlspecialcharsbx($_REQUEST['vote_field_'.$arAnswer["ID"]]) : '';
								break;
								case 5://memo
									$value = isset($_REQUEST['vote_memo_'.$arAnswer["ID"]]) ?  htmlspecialcharsbx($_REQUEST['vote_memo_'.$arAnswer["ID"]]) : '';
								break;
							endswitch;
							?>
							<?
							switch ($arAnswer["FIELD_TYPE"]):
								case 0://radio
									?>
									<label for="vote_radio_<?=$arAnswer["QUESTION_ID"]?>_<?=$arAnswer["ID"]?>">
										<input type="radio" <?=$value?> name="vote_radio_<?=$arAnswer["QUESTION_ID"]?>" <?
											?>id="vote_radio_<?=$arAnswer["QUESTION_ID"]?>_<?=$arAnswer["ID"]?>" <?
											?>value="<?=$arAnswer["ID"]?>" <?=$arAnswer["~FIELD_PARAM"]?> />
										<span></span>
										<span><?=$arAnswer["MESSAGE"]?></span>
									</label>
									<?
								break;
								case 1://checkbox?>
									<span class="vote-answer-item vote-answer-item-checkbox">
										<input <?=$value?> type="checkbox" name="vote_checkbox_<?=$arAnswer["QUESTION_ID"]?>[]" value="<?=$arAnswer["ID"]?>" <?
											?> id="vote_checkbox_<?=$arAnswer["QUESTION_ID"]?>_<?=$arAnswer["ID"]?>" <?=$arAnswer["~FIELD_PARAM"]?> />
										<label for="vote_checkbox_<?=$arAnswer["QUESTION_ID"]?>_<?=$arAnswer["ID"]?>"><?=$arAnswer["MESSAGE"]?></label>
									</span>
								<?break?>

								<?case 2://dropdown?>
									<span class="vote-answer-item vote-answer-item-dropdown">
										<select name="vote_dropdown_<?=$arAnswer["QUESTION_ID"]?>" <?=$arAnswer["~FIELD_PARAM"]?>>
										<?foreach ($arAnswer["DROPDOWN"] as $arDropDown):?>
											<option value="<?=$arDropDown["ID"]?>" <?=($arDropDown["ID"] === $value)?'selected="selected"':''?>><?=$arDropDown["MESSAGE"]?></option>
										<?endforeach?>
										</select>
									</span>
								<?break?>

								<?case 3://multiselect?>
									<span class="vote-answer-item vote-answer-item-multiselect">
										<select name="vote_multiselect_<?=$arAnswer["QUESTION_ID"]?>[]" <?=$arAnswer["~FIELD_PARAM"]?> multiple="multiple">
										<?foreach ($arAnswer["MULTISELECT"] as $arMultiSelect):?>
											<option value="<?=$arMultiSelect["ID"]?>" <?=(array_search($arMultiSelect["ID"], $value)!==false)?'selected="selected"':''?>><?=$arMultiSelect["MESSAGE"]?></option>
										<?endforeach?>
										</select>
									</span>
								<?break?>

								<?case 4://text field?>
									<label for="vote_field_<?=$arAnswer["ID"]?>" class="own">
										<span><?=$arAnswer["MESSAGE"]?>:</span>
										<input type="text" name="vote_field_<?=$arAnswer["ID"]?>" id="vote_field_<?=$arAnswer["ID"]?>" <?
											?>value="<?=$value?>" size="<?=$arAnswer["FIELD_WIDTH"]?>" <?=$arAnswer["~FIELD_PARAM"]?> />
									</label>
								<?break?>

								<?case 5://memo?>
									<label for="vote_memo_<?=$arAnswer["ID"]?>" class="own">
										<span><?=$arAnswer["MESSAGE"]?>:</span>
										<textarea name="vote_memo_<?=$arAnswer["ID"]?>" id="vote_memo_<?=$arAnswer["ID"]?>" <?
											?><?=$arAnswer["~FIELD_PARAM"]?> cols="<?=$arAnswer["FIELD_WIDTH"]?>" <?
										?>rows="<?=$arAnswer["FIELD_HEIGHT"]?>"><?=$value?></textarea>
									</label>
								<?break;
							endswitch;
							?>
						</li>
						<?
					endforeach
					?>
					</ol>
				</div>
				<?
			}
			?>
			

		<? if (isset($arResult["CAPTCHA_CODE"])):  ?>
		<div class="vote-item-header">
			<div class="vote-item-title vote-item-question"><?=GetMessage("F_CAPTCHA_TITLE")?></div>
			<div class="vote-clear-float"></div>
		</div>
		<div class="vote-form-captcha">
			<input type="hidden" name="captcha_code" value="<?=$arResult["CAPTCHA_CODE"]?>"/>
			<div class="vote-reply-field-captcha-image">
				<img src="/bitrix/tools/captcha.php?captcha_code=<?=$arResult["CAPTCHA_CODE"]?>" alt="<?=GetMessage("F_CAPTCHA_TITLE")?>" />
			</div>
			<div class="vote-reply-field-captcha-label">
				<label for="captcha_word"><?=GetMessage("F_CAPTCHA_PROMT")?><span class='starrequired'>*</span></label><br />
				<input type="text" size="20" name="captcha_word" />
			</div>
		</div>
		<? endif // CAPTCHA_CODE ?>

		<div class="vote-form-box-buttons vote-vote-footer">
			<span class="vote-form-box-button vote-form-box-button-first"><input onclick="$('.tnx_popup_container.opros').css('display','block');return false;" type="submit" name="vote" value="<?=GetMessage("VOTE_SUBMIT_BUTTON")?>" class="send_opros" /></span>
			<?/*?><span class="vote-form-box-button vote-form-box-button-last">
				<a name="show_result" <?
					?>href="<?=$arResult["URL"]["RESULT"]?>"><?=GetMessage("VOTE_RESULTS")?></a>
			</span><?*/?>
		</div>
            <input type="text" id="for_bots" hidden="">
		</form>
		</div>
	</div>
</section>