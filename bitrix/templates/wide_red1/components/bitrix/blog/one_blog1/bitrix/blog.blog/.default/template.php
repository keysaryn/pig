<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
// if (!$this->__component->__parent || empty($this->__component->__parent->__name) || $this->__component->__parent->__name != "bitrix:blog"):
// 	$GLOBALS['APPLICATION']->SetAdditionalCSS('/bitrix/components/bitrix/blog/templates/.default/style.css');
// 	$GLOBALS['APPLICATION']->SetAdditionalCSS('/bitrix/components/bitrix/blog/templates/.default/themes/blue/style.css');
// endif;
?>
<?CUtil::InitJSCore(array("image"));?>

<?
if(!empty($arResult["OK_MESSAGE"]))
{
	?>
<div class="blog-notes blog-note-box">
    <div class="blog-note-text">
        <ul>
            <?
				foreach($arResult["OK_MESSAGE"] as $v)
				{
					?>
            <li><?=$v?></li>
            <?
				}
				?>
        </ul>
    </div>
</div>
<?
}
if(!empty($arResult["MESSAGE"]))
{
	?>
<div class="blog-textinfo blog-note-box">
    <div class="blog-textinfo-text">
        <ul>
            <?
				foreach($arResult["MESSAGE"] as $v)
				{
					?>
            <li><?=$v?></li>
            <?
				}
				?>
        </ul>
    </div>
</div>
<?
}
if(!empty($arResult["ERROR_MESSAGE"]))
{
	?>
<div class="blog-errors blog-note-box blog-note-error">
    <div class="blog-error-text">
        <ul>
            <?
				foreach($arResult["ERROR_MESSAGE"] as $v)
				{
					?>
            <li><?=$v?></li>
            <?
				}
				?>
        </ul>
    </div>
</div>
<?
}

if(count($arResult["POST"])>0)
{
	foreach($arResult["POST"] as $ind => $CurPost)
	{
		$className = "blog-post";
		if($ind == 0)
			$className .= " blog-post-first";
		elseif(($ind+1) == count($arResult["POST"]))
			$className .= " blog-post-last";
		if($ind%2 == 0)
			$className .= " blog-post-alt";
		$className .= " blog-post-year-".$CurPost["DATE_PUBLISH_Y"];
		$className .= " blog-post-month-".intval($CurPost["DATE_PUBLISH_M"]);
		$className .= " blog-post-day-".intval($CurPost["DATE_PUBLISH_D"]);
		?>
<script>
BX.viewImageBind(
    'blg-post-<?=$CurPost["ID"]?>', {
        showTitle: false
    }, {
        tag: 'IMG',
        attr: 'data-bx-image'
    }
);
</script>
<? //var_dump($CurPost); ?>
<article class="<?=$className?>" id="blg-post-<?=$CurPost["ID"]?>">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <!-- <strong class="d-inline-block mb-2 text-primary">World</strong> -->
            <h3 class="mb-0"><a href="" title="<?=$CurPost["TITLE"]?>"><?=$CurPost["TITLE"]?></a></h3>
            <div class="mb-1 text-muted">Nov 12</div>
            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to
                additional content.</p>
            <a href="<?=$CurPost["urlToPost"]?>" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
			<?php if (!empty($CurPost["arImages"])): ?>
				<? foreach($CurPost["arImages"] as $val): ?>
					<a href=""></a><img src="<?=$val["full"]?>" alt="" border="0" data-bx-image="<?=$val["full"]?>">
					<? break; ?>
				<? endforeach; ?>
			<?php else: ?>
				<svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img"
					aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
					<title>картинки нет</title>
					<rect width="100%" height="100%" fill="#55595c"></rect>
					<text x="50%" y="50%" fill="#eceeef"
						dy=".3em">Thumbnail</text>
				</svg>
			<?php endif; ?>

        </div>
    </div>

</article>
<?
	}
	if($arResult["NAV_STRING"] <> '')
		echo $arResult["NAV_STRING"];
}
elseif(!empty($arResult["BLOG"]))
	echo GetMessage("BLOG_BLOG_BLOG_NO_AVAIBLE_MES");
?>

</div>