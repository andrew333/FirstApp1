<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>
<head>

<?if(is_404()):?>
	<title><?$APPLICATION->ShowTitle()?></title>
</head>
<body>
<?else:?>	

<?$APPLICATION->ShowHead()?>

<title><?=GetMessage(CUR_UP_LANG."_SITE_TITLE")?><?//$APPLICATION->ShowTitle()?></title>
<?show_facebook_meta();?>
<?show_preload_image();?>
<script type="text/javascript"> 
	window.is_main_page = <?= MAIN_PAGE ? 'true' : 'false' ?>;
	window.is_topsection_page = <?= (isset($_REQUEST["TOP_SECTION"]) && !isset($_REQUEST["BOTTOM_SECTION"]) )? 'true' : 'false' ?>;
	window.is_bottomsection_page = <?= isset($_REQUEST["BOTTOM_SECTION"]) ? 'true' : 'false' ?>;
	window.is_project_page = <?= PROJECT_PAGE ? 'true' : 'false' ?>;		
</script>

<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/77777777common.js"></script>

<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/scrollpane/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/scrollpane/jquery.mousewheel.js"></script>

<!-- cycle -->
<!--script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.cycle.all.min.js"></script-->
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/cycle.js"></script>
<!-- / cycle -->

<!-- functions -->
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/functions.js"></script>
<!-- / functions -->

<!--[if lt IE 7]><script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/unitpngfix.js"></script><![endif]-->

</head>

<body>

<?/** ?>  <div id="panel"><?$APPLICATION->ShowPanel();?></div>  <? */ ?>
    
<div id="site_outer" class="site_outer">

<!-- general content -->
<div id="main_wrapper" class="main_wrapper">

	<!--div class="top_left_navy_wrapper">
        <ul class="top_left_navy">
            <li><a id="interior_link" class="top_with_text" rel="interior" href="#" >interior design</a></li>
            <li class="spacer">&nbsp;+&nbsp;</li>
            <li><a id="arch_link" class="top_with_text" rel="arch" href="#" >architecture</a></li>
        </ul>
    </div-->
 
    <?$APPLICATION->IncludeComponent(
    	"custom:top_menu",
    	"",
    	Array( "IBLOCK_ID" => PROJECT_IB_ID, "CACHE_TYPE" => "A", "CACHE_TIME" => "3600",
    		   "LANG" => CUR_LANG,
               "TOP_SECTION" => $_REQUEST["TOP_SECTION"]
        ),
        false
    );?>
  
	<? # Если находимся на главной странице - показываем языковое меню ?>
	<?if(empty( $_REQUEST["TOP_SECTION"] )):?>

		<div class="bottom_right_navy_wrapper">
			<ul class="bottom_right_navy">
				<? $i = 1; $was_one_menu_item = false; ?>
				<?foreach( $GLOBALS["AR_LANGS"] as $lang => $arLang ):?>
					<?if( CUR_LANG == $lang ):?>
						<?continue;?>
					<?else:?>
						<li><a href="<?=$arLang["dir"]?>"><?=$arLang["name"]?></a></li>
						
						<?if( !$was_one_menu_item ):?>
							<li class="spacer">&nbsp;|&nbsp;</li>
							<?$was_one_menu_item = true;?>
						<?endif;?>
						
					<?endif;?>
						
					<? $i++; ?>	
				<?endforeach;?>
	        </ul>
	    </div> <!--  bottom_right_navy_wrapper -->
	<?endif; // end - bottom_menu ?>
    
    <?$APPLICATION->IncludeComponent(
    	"custom:bottom_menu",
    	"",
    	Array( "IBLOCK_ID" => PROJECT_IB_ID, "CACHE_TYPE" => "A", "CACHE_TIME" => "3600",
    		   "LANG" => CUR_LANG,
               "TOP_SECTION" => $_REQUEST["TOP_SECTION"],
               "BOTTOM_SECTION" => $_REQUEST["BOTTOM_SECTION"],
               "PROJECT_ID" => $_REQUEST["PROJECT_ID"],   
               "SHOW_MENU" => (!empty( $_REQUEST["TOP_SECTION"]) ? "Y" : "N")             
        ),
        false
    );?> 
    
    <!-- 1 ДИЗАЙН ИНТЕРЬЕРА   --> 
    <div id="interior_outer" class="info_outer"> 
  	   	<div id="interior_panel" class="info_wrapper">
			<div class="text_title"> <?=$GLOBALS["AR_TOP_MENU"]["interior"]["NAME"]?> </div>
			<div class="cb"></div> 
			<div id="interior_pane" class="info_text scroll-pane">
                <?=$GLOBALS["AR_TOP_MENU"]["interior"]["DESCRIPTION"]?>
			</div>
			<div class="fr but_scroll_up_wrapper"><img  class="but_scroll_up" src="/bitrix/templates/main/images/up_white.png" width="10" height="5" alt="up" /></div>
			<div class="fr but_scroll_down_wrapper"><img  class="but_scroll_down" src="/bitrix/templates/main/images/down_white.png"  width="10" height="5" alt="down"  /></div>
			<!-- / down_white.png -->
		</div>
    </div>  <!-- / id="interior_outer" --> 
    
    
    <!-- 3 О НАС  --> 
    <div id="aboutus_outer" class="info_outer"> 
  	   	<div id="aboutus_panel" class="info_wrapper">
			
			<div class="text_title"><?=GetMessage(CUR_UP_LANG."_INFOPANEL_ABOUTUS_NAME")?></div> 
			<div class="cb"></div> 
			<div id="aboutus_pane" class="info_text scroll-pane">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include", "",	
					Array(
						"AREA_FILE_SHOW" => "sect",
						"AREA_FILE_SUFFIX" => "aboutus",
						"AREA_FILE_RECURSIVE" => "Y",
						"EDIT_TEMPLATE" => "")
					);
				?>
  			</div>
			<div class="fr but_scroll_up_wrapper"><img  class="but_scroll_up" src="/bitrix/templates/main/images/up_white.png" width="10" height="5" alt="up" /></div>
			<div class="fr but_scroll_down_wrapper"><img  class="but_scroll_down" src="/bitrix/templates/main/images/down_white.png"  width="10" height="5" alt="down"  /></div>
			<!-- / down_white.png -->
			
			<div class="cb"></div>
			
			<div class="fr aboutus_address">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include", "",	
					Array(
						"AREA_FILE_SHOW" => "sect",
						"AREA_FILE_SUFFIX" => "aboutus_address",
						"AREA_FILE_RECURSIVE" => "Y",
						"EDIT_TEMPLATE" => "")
					);
				?>
			</div>
			
		</div>
    </div>  <!-- / id="info_aboutus"  --> 
    
        
<?
//------------------------  START SECTION TEXT ----------------------------//


$act_top_sec_code = "interior";
if(!empty( $_REQUEST["TOP_SECTION"] )):
   if(strstr($_REQUEST["TOP_SECTION"], "arch")):
        $act_top_sec_code = "arch";
   endif;   
endif;

$aboutus_name = GetMessage(CUR_UP_LANG."_INFOPANEL_ABOUTUS_NAME");
# Текст - О нас


ob_start();


    $APPLICATION->IncludeComponent(
        "bitrix:main.include", "",	
        Array(
        	"AREA_FILE_SHOW" => "secti-------------",
        	"AREA_FILE_SUFFIX" => "aboutus",
        	"AREA_FILE_RECURSIVE" => "Y",
        	"EDIT_TEMPLATE" => "")
    );
    
    
$aboutus_text = ob_get_contents();
ob_end_clean();

# Адрес - О нас
ob_start();
    $APPLICATION->IncludeComponent(
        "bitrix:main.include", "",	
        Array(
        	"AREA_FILE_SHOW" => "sect",
        	"AREA_FILE_SUFFIX" => "aboutus_address",
        	"AREA_FILE_RECURSIVE" => "Y",
        	"EDIT_TEMPLATE" => "")
    );
$aboutus_address = ob_get_contents();
ob_end_cl___________ean();

$sec_block_name = "";
$sec_block_text = "";


# Если на сранице проекта -  есть  PROJECT_ID - проверяем его description
if(!empty( $_REQUEST["PROJECT_ID"] )):
	$res_project = CIBlockElement::GetByID($_REQUEST["PROJECT_ID"]);
    $arProgectDescr = $res_project->Fetch();
    $GLOBALS["AR_PROJECT_DESCR"] = $arProgectDescr;
    
    # Если заполнено поле описания проекта - выводим его
    if(strlen(trim($arProgectDescr["DETAIL_TEXT"])) > 0):
        $sec_block_name = $arProgectDescr["NAME"];
        $sec_block_text = $arProgectDescr["DETAIL_TEXT"];
        
    # Если есть описание подраздела BOTTOM_SECTION - выводим его
    elseif(!empty($GLOBALS["AR_BOTTOM_MENU"]["BOTTOM_SECTION_DESCR"])): 
        $sec_block_name = $GLOBALS["AR_BOTTOM_MENU"]["BOTTOM_SECTION_DESCR"]["NAME"];
        $sec_block_text = $GLOBALS["AR_BOTTOM_MENU"]["BOTTOM_SECTION_DESCR"]["TEXT"];
        
    # Выводим описание interior или arch
    else:
        $sec_block_name = $GLOBALS["AR_TOP_MENU"][$act_top_sec_code]["NAME"];
        $sec_block_text = $GLOBALS["AR_TOP_MENU"][$act_top_sec_code]["DESCRIPTION"];
    endif;
    


# Если в разделе TOP_SECTION - interior или arch
elseif(!empty( $_REQUEST["TOP_SECTION"] )):
   $sec_block_name = $GLOBALS["AR_TOP_MENU"][$act_top_sec_code]["NAME"];
   $sec_block_text = $GLOBALS["AR_TOP_MENU"][$act_top_sec_code]["DESCRIPTION"];
endif;

//------------------------  END SECTION TEXT ----------------------------//

?>        
    
    <!-- 4 SECTION   --> 
    <div id="section_outer" class="info_outer"> 
  	   	<div id="section_panel" class="info_wrapper">      

        <?if(!empty( $sec_block_name )):?>
			<div class="text_title"><?=$sec_block_name?></div>
			<div class="cb"></div> 
			<div id="section_pane" class="info_text scroll-pane">
                <?=$sec_block_text?>
			</div>
        <?else:?>    
            <div class="text_title"><?=$aboutus_name?></div>
			<div class="cb"></div> 
			<div id="section_pane" class="info_text scroll-pane">
                <?=$aboutus_text?>
			</div>
        <?endif;?> 
           
			<div class="fr but_scroll_up_wrapper"><img  class="but_scroll_up" src="/bitrix/templates/main/images/up_white.png" width="10" height="5" alt="up" /></div>
			<div class="fr but_scroll_down_wrapper"><img  class="but_scroll_down" src="/bitrix/templates/main/images/down_white.png"  width="10" height="5" alt="down"  /></div>
			<!-- / down_white.png -->
			
			
    		<? # Если заполнено поле описания проекта - выводим его ?>
			<?if(strlen(trim($arProgectDescr["DETAIL_TEXT"])) > 0):?>
				<div class="cb"></div>
				<div class="fr aboutus_address">	
					<?$page_url = $APPLICATION->GetCurPageParam("", array("TOP_SECTION", "BOTTOM_SECTION", "PROJECT_ID")); ?>
					<div class="social_icons_wrapper">
						<div class="fr twitter"><a href="http://twitter.com/home/?status=<?= urlencode($arProgectDescr["NAME"].' '. 'http://'. $_SERVER['HTTP_HOST'] .$page_url)?>" target="_blank">&nbsp;</a></div>
						<div class="fr facebook"><a href="http://www.facebook.com/sharer.php?u=<?=urlencode('http://'. $_SERVER['HTTP_HOST'] .$page_url)?>&t=<?=urlencode($arProgectDescr["NAME"])?>" target="_blank">&nbsp;</a></div>
					</div>	
				</div>	
					
			<?elseif(empty( $sec_block_name )):?>
				<div class="cb"></div>
				<div class="fr aboutus_address">	
					<?=$aboutus_address?> 
				</div>		
			<?endif;?> 
			
			
		</div>
    </div>  <!-- / id="section_outer" --> 
    
   
    
    <div class="firm_name_outer shadow">
    

		<span>хорхе тофало архитекторы</span>		
	</div>     

<?endif;// is_404()?>	
