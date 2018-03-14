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
<div class="pl_header"><h3>Композиции</h3><span class="pl_numb"></span></div>
<div class="left_audio_komp_box">
	<div class="left_audio_komp tabs all_tabs" id="left_audio_komp_tabs">
		<ul>
			<li data-id="all" class="active">Все <span class="item_numb"><?=$arResult["GENRE_COUNT"]["all"]?></span></li>
			<?foreach( $arResult["GENRE"] as $genreID => $arItem ){
				if( isset( $arResult["GENRE_COUNT"][$genreID] ) ){
					$count = $arResult["GENRE_COUNT"][$genreID];
				}
				else{
					$count = 0;
				}
				?>
				<li data-id="<?=$genreID?>"><?=$arItem["NAME"]?> <span class="item_numb"><?=$count?></span></li>
			<?}?>
		</ul>
	</div>
	<div class="audio_list_wrap">
		<div class="tab_container index_music_container active" data-attr="all" data-id="left_audio_komp_tabs">
			<h4>Все</h4>
			<div class="list audio_list scrolled">
                <ul>
				<?foreach( $arResult["ITEMS"] as $arItem ){
                    if(strlen($arItem["PROPERTIES"]["PATH"]["VALUE"])<=0) continue;
					$artistID = $arItem["PROPERTIES"]["ARTIST"]["VALUE"];
					$artistName = '';
					if(isset($arResult["ARTISTS"][$artistID])){
						$artistName = $arResult["ARTISTS"][$artistID]["NAME"];
					}
                    $programID = $arItem["PROPERTIES"]["PROGRAM"]["VALUE"];
                    $programName = '';
                    if(isset($arResult["PROGRAM"][$programID])){
                        $programName = $arResult["PROGRAM"][$programID]["NAME"];
                    }
					$image = GetConfig("audio_default_image");
					$playerImage = $image;
					if($arItem["PREVIEW_PICTURE"]["SRC"]){
						$image = MakeImage($arItem["PREVIEW_PICTURE"]["SRC"],array("w"=>42,"h"=>42,"zc"=>1));
						$playerImage = MakeImage($arItem["PREVIEW_PICTURE"]["SRC"],array("w"=>125,"h"=>125,"zc"=>1));
					}
                    global $USER, $cMon;
					$isNoAuth = false;
					if( $arItem["PROPERTIES"]["IS_NO_AUTH"]["VALUE_XML_ID"]=="Y"  || $arResult["cMon"]!=0 ) $isNoAuth = true;
					
					$needBlock = false;

					if( !$isNoAuth){
						$needBlock = true;
						$arItem["PROPERTIES"]["PATH"]["VALUE"] = '';
					}
					?>
                    <li>
					<div class="item mus_wrap <?if(!$isNoAuth){?>subs<?}?>">
						<div class="mus_img pl-audio-play <?if($needBlock){?>block<?}?>" style="background-image: url(<?=$image?>);" data-url="<?=$arItem["PROPERTIES"]["PATH"]["VALUE"]?>" data-picture="<?=$playerImage?>">
							<div class="play_btn"></div>
						</div>
						<div class="mus_info">
							<a class="mus_name" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
							<div class="mus_group"><?if(strlen($programName)>0)echo $programName;else echo $artistName;?></div>
							<div class="mus_bar">
								<div class="list_img"></div>
								<div class="likes"></div>
								<?if($needBlock){?><span class="download dn"></span><?}else{?><a href="<?=$arItem["PROPERTIES"]["PATH"]["VALUE"]?>" download><span class="download"></span></a><?}?>
							</div>
							<div class="mus_time"><?if($arItem["PROPERTIES"]["DURATION"]["VALUE"]){?><?=duration($arItem["PROPERTIES"]["DURATION"]["VALUE"])?><?}?></div>
                            <?if($arItem["PROPERTIES"]["IS_NO_AUTH"]["VALUE_XML_ID"]!="Y"){?><div class="mus_subs_img"></div><?}?>
						</div>
					</div>
                    </li>
				<?}?>
                </ul>
			</div>
		</div><!-- index_music_container -->
		<?foreach( $arResult["GENRE"] as $genreID => $arGItem ){?>
			<div class="tab_container index_music_container" data-attr="<?=$genreID?>" data-id="left_audio_komp_tabs">
				<h4><?=$arGItem["NAME"]?></h4>
				<div class="audio_list scrolled list clearfix">
                    <ul>
					<?foreach( $arResult["ITEMS"] as $arItem ){
						if( !in_array( $genreID, $arItem["PROPERTIES"]["GENRE"]["VALUE_ENUM_ID"] ) || strlen($arItem["PROPERTIES"]["PATH"]["VALUE"])<=0) continue;
						$artistID = $arItem["PROPERTIES"]["ARTIST"]["VALUE"];
						$artistName = '';
						if(isset($arResult["ARTISTS"][$artistID])){
							$artistName = $arResult["ARTISTS"][$artistID]["NAME"];
						}
                        $programID = $arItem["PROPERTIES"]["PROGRAM"]["VALUE"];
                        $programName = '';
                        if(isset($arResult["PROGRAM"][$programID])){
                            $programName = $arResult["PROGRAM"][$programID]["NAME"];
                        }
						$image = GetConfig("audio_default_image");
						$playerImage = $image;
						if($arItem["PREVIEW_PICTURE"]["SRC"]){
							$image = MakeImage($arItem["PREVIEW_PICTURE"]["SRC"],array("w"=>42,"h"=>42,"zc"=>1));
							$playerImage = MakeImage($arItem["PREVIEW_PICTURE"]["SRC"],array("w"=>125,"h"=>125,"zc"=>1));
						}
                        global $USER, $cMon;
						$isNoAuth = false;
						if( $arItem["PROPERTIES"]["IS_NO_AUTH"]["VALUE_XML_ID"]=="Y" || $arResult["cMon"]!=0 ) $isNoAuth = true;

						$needBlock = false;

						if( !$isNoAuth ){
							$needBlock = true;
							$arItem["PROPERTIES"]["PATH"]["VALUE"] = '';
						}
						?>
                        <li>
                            <div class="mus_wrap <?if(!$isNoAuth){?>subs<?}?>">
                                <div class="mus_img pl-audio-play" style="background-image: url(<?=$image?>);" data-url="<?=$arItem["PROPERTIES"]["PATH"]["VALUE"]?>" data-picture="<?=$playerImage?>">
                                    <div class="play_btn"></div>
                                </div>
                                <div class="mus_info">
                                    <a class="mus_name" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
                                    <div class="mus_group"><?if(strlen($programName)>0)echo $programName;else echo $artistName;?></div>
                                    <div class="mus_bar">
                                        <div class="list_img"></div>
                                        <div class="likes"></div>
                                        <?if($needBlock){?><span class="download dn"></span><?}else{?><a href="<?=$arItem["PROPERTIES"]["PATH"]["VALUE"]?>" download><span class="download"></span></a><?}?>
                                    </div>
                                    <div class="mus_time"><?if($arItem["PROPERTIES"]["DURATION"]["VALUE"]){?><?=duration($arItem["PROPERTIES"]["DURATION"]["VALUE"])?><?}?></div>
                                    <?if(!$isNoAuth){?><div class="mus_subs_img"></div><?}?>
                                </div>
                            </div>
                        </li>
                        <?if(0):?>
						<div class="item mus_wrap <?if(!$isNoAuth){?>subs<?}?>">
							<div class="mus_img pl-audio-play <?if($needBlock){?>block<?}?>" style="background-image: url(<?=$image?>);" data-url="<?=$arItem["PROPERTIES"]["PATH"]["VALUE"]?>" data-picture="<?=$playerImage?>">
								<div class="play_btn"></div>
							</div>
							<div class="mus_info">
								<a class="mus_name" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
								<div class="mus_group"><?=$artistName?></div>
								<div class="mus_bar">
									<div class="list_img"></div>
									<div class="likes"></div>
									<?if($needBlock){?><span class="download dn"></span><?}else{?><a href="<?=$arItem["PROPERTIES"]["PATH"]["VALUE"]?>" download><span class="download"></span></a><?}?>
								</div>
								<div class="mus_time"><?if($arItem["PROPERTIES"]["DURATION"]["VALUE"]){?><?=duration($arItem["PROPERTIES"]["DURATION"]["VALUE"])?><?}?></div>
							</div>
						</div>
                        <?endif?>
					<?}?>
                    </ul>
				</div>
			</div><!-- index_music_container -->
		<?}?>
		<div class="overlay_gradient"></div>
	</div>

</div><!-- left_audio_komp_box -->



<?/*?>
<section id="our_prog_list_box">
	<div class="container">
		<div class="tabs" id="our_prog_list">
			<ul>
				<li data-id="all">Все</li>
				<?
				$i=0;
				foreach( $arResult["CATEGORY"] as $ID => $arCategory ){?>
					<li <?if($i==0){?>class="active"<?}?> data-id="<?=$ID?>"><?=$arCategory["NAME"]?></li>
					<?$i++;?>
				<?}?>
			</ul>
		</div>
		<?#pre($arResult["ITEMS"])?>
		<div class="tab_container our_prog_list_container" data-attr="all" data-id="our_prog_list">
			<?foreach( $arResult["ITEMS"] as $arItem ){
				if( isset($arItem["PREVIEW_PICTURE"]["SRC"]) && $arItem["PREVIEW_PICTURE"]["SRC"] ){
					$image = MakeImage( $arItem["PREVIEW_PICTURE"]["SRC"], array("w"=>303,"h"=>225,"zc"=>1) );
				}
				else{
					$image = GetConfig("program_default_image");
				}
				?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="prog_item">
					<img src="<?=$image?>" alt="">
					<div class="prog_name"><?=$arItem["NAME"]?></div>
					<p class="prog_desc"><?=$arItem["PREVIEW_TEXT"]?></p>
					<?
					$artistID = $arItem["PROPERTIES"]["ARTIST"]["VALUE"];
					if($artistID && isset($arResult["ARTISTS"][$artistID])){?>
						<p class="ved">Ведущий: <?=$arResult["ARTISTS"][$artistID]["NAME"]?></p>
					<?}?>
					<?
					$screenwriterID = $arItem["PROPERTIES"]["SCREENWRITER"]["VALUE"];
					if($screenwriterID && isset($arResult["ARTISTS"][$screenwriterID])){?>
						<p class="ved">Сценарист: <?=$arResult["ARTISTS"][$screenwriterID]["NAME"]?></p>
					<?}?>
					<div class="prog_info">
						<?if($arItem["VIDEO_COUNT"]>0){?><img src="<?=SITE_TEMPLATE_PATH?>/images/prog_video.png" alt=""><span><?=$arItem["VIDEO_COUNT"]?> <?=morph($arItem["VIDEO_COUNT"],"видео-выпуск","видео-выпуска","видео-выпусков")?></span><?}?>
						<?if($arItem["AUDIO_COUNT"]>0){?><img src="<?=SITE_TEMPLATE_PATH?>/images/prog_mat.png" alt=""><span><?=$arItem["AUDIO_COUNT"]?> <?=morph($arItem["AUDIO_COUNT"],"аудио-выпуск","аудио-выпуска","аудио-выпусков")?></span><?}?>
					</div>
				</a>
			<?}?>
		</div>
		<?
		$i=0;
		foreach( $arResult["CATEGORY"] as $ID => $arCategory ){?>
		<div class="tab_container our_prog_list_container <?if($i==0){?>active<?}?>" data-attr="<?=$ID?>" data-id="our_prog_list">
			<?foreach( $arResult["ITEMS"] as $arItem ){
				if( in_array( $ID, $arItem["PROPERTIES"]["CATEGORY"]["VALUE_ENUM_ID"] ) ){
					if( isset($arItem["PREVIEW_PICTURE"]["SRC"]) && $arItem["PREVIEW_PICTURE"]["SRC"] ){
						$image = MakeImage( $arItem["PREVIEW_PICTURE"]["SRC"], array("w"=>303,"h"=>225,"zc"=>1) );
					}
					else{
						$image = GetConfig("program_default_image");
					}
				?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="prog_item">
					<img src="<?=$image?>" alt="">
					<div class="prog_name"><?=$arItem["NAME"]?></div>
					<p class="prog_desc"><?=$arItem["PREVIEW_TEXT"]?></p>
					<?
					$artistID = $arItem["PROPERTIES"]["ARTIST"]["VALUE"];
					if($artistID && isset($arResult["ARTISTS"][$artistID])){?>
						<p class="ved">Ведущий: <?=$arResult["ARTISTS"][$artistID]["NAME"]?></p>
					<?}?>
					<?
					$screenwriterID = $arItem["PROPERTIES"]["SCREENWRITER"]["VALUE"];
					if($screenwriterID && isset($arResult["ARTISTS"][$screenwriterID])){?>
						<p class="ved">Сценарист: <?=$arResult["ARTISTS"][$screenwriterID]["NAME"]?></p>
					<?}?>
					<div class="prog_info">
						<?if($arItem["VIDEO_COUNT"]>0){?><img src="<?=SITE_TEMPLATE_PATH?>/images/prog_video.png" alt=""><span><?=$arItem["VIDEO_COUNT"]?> <?=morph($arItem["VIDEO_COUNT"],"видео-выпуск","видео-выпуска","видео-выпусков")?></span><?}?>
						<?if($arItem["AUDIO_COUNT"]>0){?><img src="<?=SITE_TEMPLATE_PATH?>/images/prog_mat.png" alt=""><span><?=$arItem["AUDIO_COUNT"]?> <?=morph($arItem["AUDIO_COUNT"],"аудио-выпуск","аудио-выпуска","аудио-выпусков")?></span><?}?>
					</div>
				</a>
				<?}?>
			<?}?>
		</div>
		<?$i++;?>
		<?}?>
	</div>
</section>


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
<?*/?>