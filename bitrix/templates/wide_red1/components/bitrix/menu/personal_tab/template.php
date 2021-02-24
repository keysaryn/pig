<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
	<nav class="nav d-flex justify-content-between">
<?foreach($arResult as $arItem):?>
	<?if ($arItem["PERMISSION"] > "D"):?>
		<a <? if ($arItem["SELECTED"]):?> 
				class="p-2 link-secondary selected"
			<? else:?>
				class="p-2 link-secondary"
			<? endif; ?>
			href="<?=$arItem["LINK"]?>">
			<?=$arItem["TEXT"]?>
		</a>
	<?endif?>
<?endforeach?>
	</nav>
<?endif?>
