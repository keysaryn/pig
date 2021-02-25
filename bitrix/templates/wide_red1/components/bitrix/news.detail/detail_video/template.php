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
$rs = CIBlockElement::GetList(
	array("active_from" => "desc"), 
	array(
		"ACTIVE"=>"Y", 
		"IBLOCK_ID"=>$arResult["IBLOCK_ID"]
	),
	false, 
	array(
		"nElementID"=>$arResult["ID"], 
		"nPageSize"=>1
	),
	array("ID"));
while($ar=$rs->GetNext())
{ $page[] = $ar["ID"]; }
?>

<div class="news-detail">
    <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
    <img class="detail_picture" border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
        width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
        alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>" title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>" />
    <?endif?>
    <?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
    <span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
    <?endif;?>
    <?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
    <h3><?=$arResult["NAME"]?></h3>
    <?endif;?>
    <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
    <p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
    <?endif;?>
    <?if($arResult["NAV_RESULT"]):?>
    <?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br />
    <?endif;?>
    <?echo $arResult["NAV_TEXT"];?>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>
    <?elseif($arResult["DETAIL_TEXT"] <> ''):?>
    <?echo $arResult["DETAIL_TEXT"];?>
    <?else:?>
    <?echo $arResult["PREVIEW_TEXT"];?>
    <?endif?>
    <div style="clear:both"></div>
    <br />

    <div class="row">
        <div class="col-sm-2">
            <?if ((count($page) == 2 && $arResult["ID"] == $page[0]) || (count($page) == 3)):?>
            <a href="/videos/detail.php?id=<?=$page[1]?>">Предыдущее видео</a>
            <?endif;?>
        </div>
        <div class="col-sm-8">

            <?foreach($arResult["FIELDS"] as $code=>$value):
                if ('PREVIEW_PICTURE' == $code || 'DETAIL_PICTURE' == $code)
                {
                    ?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;
            <?
                    if (!empty($value) && is_array($value))
                    {
                        ?><img border="0" src="<?=$value["SRC"]?>" width="<?=$value["WIDTH"]?>"
                height="<?=$value["HEIGHT"]?>">
            <?
                    }
                }
                else
                {
                    ?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?>
            <?
                }
                ?><br />
            <?endforeach;
            foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>

            <?=$arProperty["NAME"]?>:&nbsp;
            <?if(is_array($arProperty["DISPLAY_VALUE"])):?>
            <?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
            <?else:?>
            <?=$arProperty["DISPLAY_VALUE"];?>
            <?endif?>
            <br />
            <?endforeach; ?>
        </div>
        <div class="col-sm-2">
            <?if ((count($page) == 2 && $arResult["ID"] == $page[1]) || (count($page) == 3)):?>
            <a href="/videos/detail.php?id=<?=$page[0]?>">Следующее видео</a>
            <?endif;?>
        </div>
    </div>

    <? if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>


    <div class="news-detail-share">
        <noindex>
            <?
			$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
        </noindex>

    </div>
    <?
	}
	?>
    <div class="row">
        <div class="col-sm-12">
            <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"bootstrap_v4", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "/videos/detail.php?id=#ID#",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "videos",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MEDIA_PROPERTY" => "",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "Y",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "bootstrap_v4",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => $arResult['IBLOCK_SECTION_ID'],
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SEARCH_PAGE" => "/search/",
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SLIDER_PROPERTY" => "",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"TEMPLATE_THEME" => "blue",
		"USE_RATING" => "N",
		"USE_SHARE" => "N",
		"COMPONENT_TEMPLATE" => "bootstrap_v4",
		"PAGER_BASE_LINK" => "/news.php",
		"PAGER_PARAMS_NAME" => "arrPager"
	),
	false
);?>
        </div>
    </div>

    <!-- $rs = CIBlockElement::GetList(
            array("active_from" => "desc"), 
            array(
                "ACTIVE"=>"Y", 
                "IBLOCK_ID"=>$arResult["IBLOCK_ID"]
            ),
            false, 
            array(
                "nElementID"=>$arResult["ID"], 
                "nPageSize"=>1
            ),
            array("ID"));
        while($ar=$rs->GetNext())
        { $page[] = $ar["ID"]; } -->

    <?//if (count($page) == 2 && $arResult["ID"] == $page[0]):?>
    <!-- <a href="/videos/detail.php?id=<?//=$page[1]?>">Предыдущая</a> -->

    <?//elseif (count($page) == 3):?>
    <!-- <a href="/videos/detail.php?id=<?//=$page[0]?>">Следующая</a> -->

    <!-- <a href="/videos/detail.php?id=<?//=$page[2]?>">Предыдущая</a> -->

    <?//elseif (count($page) == 2 && $arResult["ID"] == $page[1]):?>
    <!-- <a href="/videos/detail.php?id=<?//=$page[0]?>">Следующая</a> -->
    <?//endif;?>
</div>