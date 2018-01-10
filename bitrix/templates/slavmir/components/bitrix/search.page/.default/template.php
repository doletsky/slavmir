<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
?>
<?if($_GET["AJAX"]!="Y"):?>
    <section id="new_articles">
        <div class="container">
    <form action="" method="get" class="data_info" id="search_form">
        <input type="text" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" size="40" placeholder="Введите строку поиска" />
        <button onclick="$('form.data_info').submit();"><?=GetMessage("SEARCH_GO")?></button>
        <input type="hidden" name="how" value="<?echo $arResult["REQUEST"]["HOW"]=="d"? "d": "r"?>" />
    </form><br />

    <?if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])):
        ?>
        <div class="search-language-guess">
            <?echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))?>
        </div><br /><?
    endif;?>
<?endif?>
<?if($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false):?>
<?elseif($arResult["ERROR_CODE"]!=0):?>
	<p><?=GetMessage("SEARCH_ERROR")?></p>
	<?ShowError($arResult["ERROR_TEXT"]);?>
	<p><?=GetMessage("SEARCH_CORRECT_AND_CONTINUE")?></p>
	<br /><br />
	<p><?=GetMessage("SEARCH_SINTAX")?><br /><b><?=GetMessage("SEARCH_LOGIC")?></b></p>
	<table border="0" cellpadding="5">
		<tr>
			<td align="center" valign="top"><?=GetMessage("SEARCH_OPERATOR")?></td><td valign="top"><?=GetMessage("SEARCH_SYNONIM")?></td>
			<td><?=GetMessage("SEARCH_DESCRIPTION")?></td>
		</tr>
		<tr>
			<td align="center" valign="top"><?=GetMessage("SEARCH_AND")?></td><td valign="top">and, &amp;, +</td>
			<td><?=GetMessage("SEARCH_AND_ALT")?></td>
		</tr>
		<tr>
			<td align="center" valign="top"><?=GetMessage("SEARCH_OR")?></td><td valign="top">or, |</td>
			<td><?=GetMessage("SEARCH_OR_ALT")?></td>
		</tr>
		<tr>
			<td align="center" valign="top"><?=GetMessage("SEARCH_NOT")?></td><td valign="top">not, ~</td>
			<td><?=GetMessage("SEARCH_NOT_ALT")?></td>
		</tr>
		<tr>
			<td align="center" valign="top">( )</td>
			<td valign="top">&nbsp;</td>
			<td><?=GetMessage("SEARCH_BRACKETS_ALT")?></td>
		</tr>
	</table>
<?elseif(count($arResult["SEARCH"])>0):?>
    <div class="left_col">
        <div class="tab_container new_articles_list active">
            <?foreach($arResult["SEARCH"] as $arItem):?>
                <div class="new_article" style="margin-bottom: 100px">
                    <div class="new_article_text">
                        <a href="<?=$arItem["URL"]?>">
                            <span class="article_name"><?=$arItem["TITLE_FORMATED"]?> <?if( $arItem["PROPERTIES"]["IS_NO_AUTH"]["VALUE_XML_ID"]!="Y" ){?><span class="subs_read_only"></span><?}?></span>
                            <span class="article_text"><?=$arItem["BODY_FORMATED"]?> <span class="read_art">Читать</span></span>
                        </a>
                        <!--            --><?//if( $arItem["PROPERTIES"]["AUTHOR"]["VALUE"] ){
                        //                $authorID = $arItem["PROPERTIES"]["AUTHOR"]["VALUE"];
                        //                $author = $arResult["AUTHORS"][$authorID];
                        //                ?>
                        <!--                <p class="new_art_auth">Автор: <a href="">--><?//=$author["NAME"]?><!--</a></p>-->
                        <!--            --><?//}?>
                    </div>
                    <?
                    $image = GetConfig( "default_image" );
                    if( isset($arItem["PREVIEW_PICTURE"]["SRC"]) && $arItem["PREVIEW_PICTURE"]["SRC"] ) $image = MakeImage( $arItem["PREVIEW_PICTURE"]["SRC"], array("w"=>171,"h"=>171,"zc"=>1) );
                    ?>
                    <div class="new_article_img" style="margin-top: 15px">
                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$image?>" alt="new_art_img.png"></a>
                    </div>
                    <div class="clear"></div>
                </div><!-- new_article -->
                <!--            <a href="--><?//echo $arItem["URL"]?><!--">--><?//echo $arItem["TITLE_FORMATED"]?><!--</a>-->
                <!--            <p>--><?//echo $arItem["BODY_FORMATED"]?><!--</p>-->
                <!--            --><?//if (
//                $arParams["SHOW_RATING"] == "Y"
//                && strlen($arItem["RATING_TYPE_ID"]) > 0
//                && $arItem["RATING_ENTITY_ID"] > 0
//            ):?>
                <!--                <div class="search-item-rate">--><?//
//                    $APPLICATION->IncludeComponent(
//                        "bitrix:rating.vote", $arParams["RATING_TYPE"],
//                        Array(
//                            "ENTITY_TYPE_ID" => $arItem["RATING_TYPE_ID"],
//                            "ENTITY_ID" => $arItem["RATING_ENTITY_ID"],
//                            "OWNER_ID" => $arItem["USER_ID"],
//                            "USER_VOTE" => $arItem["RATING_USER_VOTE_VALUE"],
//                            "USER_HAS_VOTED" => $arItem["RATING_USER_VOTE_VALUE"] == 0? 'N': 'Y',
//                            "TOTAL_VOTES" => $arItem["RATING_TOTAL_VOTES"],
//                            "TOTAL_POSITIVE_VOTES" => $arItem["RATING_TOTAL_POSITIVE_VOTES"],
//                            "TOTAL_NEGATIVE_VOTES" => $arItem["RATING_TOTAL_NEGATIVE_VOTES"],
//                            "TOTAL_VALUE" => $arItem["RATING_TOTAL_VALUE"],
//                            "PATH_TO_USER_PROFILE" => $arParams["~PATH_TO_USER_PROFILE"],
//                        ),
//                        $component,
//                        array("HIDE_ICONS" => "Y")
//                    );?>
                <!--                </div>-->
                <!--            --><?//endif;?>
                <!--            <small>--><?//=GetMessage("SEARCH_MODIFIED")?><!-- --><?//=$arItem["DATE_CHANGE"]?><!--</small><br />--><?//
//            if($arItem["CHAIN_PATH"]):?>
                <!--                <small>--><?//=GetMessage("SEARCH_PATH")?><!--&nbsp;--><?//=$arItem["CHAIN_PATH"]?><!--</small>--><?//
//            endif;
//            ?><!--<hr />-->
            <?endforeach;?>
        </div>

        <?if($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"]?>
    </div>
    <div class="clear"></div>
    <?if($_GET["AJAX"]!="Y"):?>
        <br />
        <p>
            <?if($arResult["REQUEST"]["HOW"]=="d"):?>
                <a href="<?=$arResult["URL"]?>&amp;how=r<?echo $arResult["REQUEST"]["FROM"]? '&amp;from='.$arResult["REQUEST"]["FROM"]: ''?><?echo $arResult["REQUEST"]["TO"]? '&amp;to='.$arResult["REQUEST"]["TO"]: ''?>"><?=GetMessage("SEARCH_SORT_BY_RANK")?></a>&nbsp;|&nbsp;<b><?=GetMessage("SEARCH_SORTED_BY_DATE")?></b>
            <?else:?>
                <b><?=GetMessage("SEARCH_SORTED_BY_RANK")?></b>&nbsp;|&nbsp;<a href="<?=$arResult["URL"]?>&amp;how=d<?echo $arResult["REQUEST"]["FROM"]? '&amp;from='.$arResult["REQUEST"]["FROM"]: ''?><?echo $arResult["REQUEST"]["TO"]? '&amp;to='.$arResult["REQUEST"]["TO"]: ''?>"><?=GetMessage("SEARCH_SORT_BY_DATE")?></a>
            <?endif;?>
        </p>
    <?endif?>

<?else:?>
	<?ShowNote(GetMessage("SEARCH_NOTHING_TO_FOUND"));?>
<?endif;?>
<?if($_GET["AJAX"]!="Y"):?>
        </div>
    </section>
<?endif?>