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
<div class="news-line">
    <?foreach($arResult["ITEMS"] as $arItem):?>
    <?
	
	$res = CIBlockElement::GetByID($arItem["ID"]);
	if($ar_res = $res->GetNext())
		echo $ar_res['NAME'];



	//  var_dump($arItem);

		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
    <img src="<?echo $arItem['PREVIEW_PICTURE']?>">
    <small id="<?=$this->GetEditAreaId($arItem['ID']);?>"><span class="news-date-time">
            <?echo $arItem["DISPLAY_ACTIVE_FROM"]?>&nbsp;&nbsp;
        </span><a href="<?echo $arItem[" DETAIL_PAGE_URL"]?>">
            <?echo $arItem["NAME"]?>
        </a><br /></small>
    <?endforeach;?>
</div>