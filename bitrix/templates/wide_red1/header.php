<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$APPLICATION->SetPageProperty("title", "Cвинная рулька");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">

<head>
    <link rel="shortcut icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/favicon_089.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <?$APPLICATION->ShowMeta("robots")?>
    <?$APPLICATION->ShowMeta("keywords")?>
    <?$APPLICATION->ShowMeta("description")?>
    <title>
        <?$APPLICATION->ShowTitle("title");?>
    </title>
    <?$APPLICATION->ShowHead();?>
	<?IncludeTemplateLangFile(__FILE__);?>

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/test_1/assets/dist/css/bootstrap.min.css" />


    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/test_1/blog/blog.css" />

    <?if(LANGUAGE_ID != "ru"):?>

    <!--<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/colors_<?=LANGUAGE_ID?>.css" />-->
    <link rel="stylesheet" type="text/css"
        href="<?=SITE_TEMPLATE_PATH?>/test_1/assets/dist/css/bootstrap.min_<?=LANGUAGE_ID?>.css" />

    <?endif;?>
    <link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH?>/print.css" media="print" />

      <title></title> 
      <script src='playerjs.js' type='text/javascript'></script>

</head>

<body>
    <div id="panel">
        <?$APPLICATION->ShowPanel();?>
    </div>
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <!-- <a class="link-secondary" href="#">Subscribe</a> -->
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark" href="#">
                        <?$APPLICATION->ShowTitle();?>
                    </a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="link-secondary" href="#" aria-label="Search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            class="mx-3" role="img" viewBox="0 0 24 24">
                            <title>Search</title>
                            <circle cx="10.5" cy="10.5" r="7.5" />
                            <path d="M21 21l-5.2-5.2" />
                        </svg>
                    </a>
                    <a class="btn btn-sm btn-outline-secondary" href="/auth.php">Sign up</a>
                </div>
            </div>
        </header>
        <div class="nav-scroller py-1 mb-2">
            <?$APPLICATION->IncludeComponent(
				"bitrix:menu", 
				"personal_tab", 
				array(
					"ROOT_MENU_TYPE" => "top",
					"MAX_LEVEL" => "1",
					"USE_EXT" => "N",
					"COMPONENT_TEMPLATE" => "personal_tab",
					"MENU_CACHE_TYPE" => "N",
					"MENU_CACHE_TIME" => "3600",
					"MENU_CACHE_USE_GROUPS" => "Y",
					"MENU_CACHE_GET_VARS" => array(
					),
					"CHILD_MENU_TYPE" => "left",
					"DELAY" => "N",
					"ALLOW_MULTI_SELECT" => "N"
				),
				false
			);?>
        </div>
    </div>

    <main class="container">
       