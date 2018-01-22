<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);
?>
<?
#pre($arResult["PROPERTIES"]["AUDIO"]["VALUE"]);
?>
<div class="audio_playlist_item_wrap">
    <div class="tab_container index_music_container active">
        <?if( count( $arResult["AUDIOS"] ) ){?>
            <ul>
                <?$curNum=0;
                foreach( $arResult["AUDIOS"] as $arItem ){
                    $artistID = $arItem["PROPERTY_ARTIST_VALUE"];
                    $artist='';
                    if( $artistID ){
                        $artist = $arResult["ARTISTS"][$artistID];
                    }
                    $programID = $arItem["PROPERTY_PROGRAM_VALUE"];
                    $program = '';
                    if($programID){
                        $programs = $arResult["PROGRAM"][$programID];
                    }
                    $image = GetConfig("audio_default_image");
                    $playerImage = $image;
                    if($arItem["PREVIEW_PICTURE"]){
                        $image = MakeImage($arItem["PREVIEW_PICTURE"],array("w"=>42,"h"=>42,"zc"=>1));
                        $playerImage = MakeImage($arItem["PREVIEW_PICTURE"],array("w"=>125,"h"=>125,"zc"=>1));
                    }
                    $isNoAuth = false;
                    if( $arItem["PROPERTY_IS_NO_AUTH_ENUM_ID"]=="19" ) $isNoAuth = true;

                    $needBlock = false;
                    global $USER;
                    if( !$isNoAuth && !$USER->IsAuthorized() ){
                        $needBlock = true;
                        $arItem["PROPERTY_PATH_VALUE"] = '';
                    }
                    ?>
                    <li>
                        <div class="mus_wrap <?if(!$isNoAuth){?>subs<?}?>">
                            <div class="mus_img pl-audio-play <?if($needBlock){?>block<?}?>" style="background-image: url(<?=$image?>);" data-url="<?=$arItem["PROPERTY_PATH_VALUE"]?>" data-picture="<?=$playerImage?>">
                                <div class="play_btn"></div>
                            </div>
                            <div class="mus_info pl-playlist-play" data-pl-id="<?=$arResult["ID"]?>" data-cur-num="<?=$curNum?>">
                                <a class="mus_name" <?/*?>href="<?=$arItem["DETAIL_PAGE_URL"]?>"<?*/?>><?=$arItem["NAME"]?></a>
                                <div class="mus_group"><?if(strlen($programID)>0)echo $program["NAME"];elseif(strlen($artistID)>0) echo $artist["NAME"];?></div>
                                <div class="mus_bar">
                                    <div class="list_img"></div>
                                    <div class="likes"></div>
                                    <?if($needBlock){?><span class="download dn"></span><?}else{?><a href="<?=$arItem["PROPERTY_PATH_VALUE"]?>" download><span class="download"></span></a><?}?>
                                </div>
                                <div class="mus_time"><?if($arItem["PROPERTY_DURATION_VALUE"]){?><?=duration($arItem["PROPERTY_DURATION_VALUE"])?><?}?></div>
                                <?if(!$isNoAuth){?><div class="mus_subs_img"></div><?}?>
                            </div>
                        </div>
                    </li>
                <?$curNum++;}?>
            </ul>
        <?}?>
    </div><!-- index_music_container -->
</div>
