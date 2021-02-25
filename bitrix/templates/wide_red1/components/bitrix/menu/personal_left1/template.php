<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<? 
// достаем категории из инфоблока
$category = CIBlockSection::GetList(array(), array(
	'IBLOCK_ID' => 2
), false, array('ID', 'NAME', 'PERMISSION') );

// собираем категории в единый массив
while ($categoryEl = $category->fetch()) {
	$categoryArr[] = $categoryEl;
}

?>
<ul id="user-menu">
    <?foreach($categoryArr as $arItem):?>
    <?//if ($arItem["PERMISSION"] > "D"):?>
    <li<?if ($arItem["SELECTED"]):?> class="selected"
        <?endif?>><a href="<?=$arItem["ID"]?>"><?=$arItem["NAME"]?></a></li>
        <?//endif?>
        <?endforeach?>

</ul>
<?endif?>