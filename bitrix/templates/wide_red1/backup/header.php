<div id="header">
			<div class="top-menu">

			</div>
			<h2 id="site-name"><?$APPLICATION->IncludeFile(
				SITE_TEMPLATE_PATH."/include_areas/site_name.php",
				Array(),
				Array("MODE"=>"html")
			);?></h2>		
		</div>
		<div id="search-layer">
			<?if($APPLICATION->GetCurPage(true) == SITE_DIR."index.php"):?>
			<a href="<?=SITE_DIR?>rss/" id="rss-link"><?=GetMessage("TMPL_RSS")?></a>
			<?endif?>
			<div id="search">
			<?$APPLICATION->IncludeComponent("bitrix:search.form", "personal", Array(
						"PAGE"	=>	SITE_DIR."search.php"
						)
				);?>
			</div>
		</div>
		<div id="content-wrapper">
			<div id="content">
				<div id="work-area">
					<?if($APPLICATION->GetCurPage(true) != SITE_DIR."index.php")
					{
						echo "<h1>";
						$APPLICATION->ShowTitle(false);
						echo "</h1>";
					}
					?>	