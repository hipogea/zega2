<!DOCTYPE html><html lang="es">  <head>    <meta charset="utf-8">    <title>Nautilus-Solver</title>   <meta name="description" content="Logistica, desarrollo software, gestion materiales, SAP, inventarios">    <meta name="author" content=" NEOTEGNIA CONSULTORES SAC">	<?php	  $baseUrl = Yii::app()->theme->baseUrl;	  $cs = Yii::app()->getClientScript();          //$cs->registerScriptFile($baseUrl.'/js/loading.js',CClientScript::POS_HEAD);		  Yii::app()->clientScript->registerCoreScript('jquery');	?>    <link rel="shortcut icon" href="<?php echo $baseUrl;?>/img/icons/logi.png">	<?php	 $cs->registerCssFile($baseUrl.'/css/bootstrap.min.css');	  $cs->registerCssFile($baseUrl.'/css/bootstrap-responsive.min.css');	 $cs->registerCssFile($baseUrl.'/css/abound.css');    $cs->registerCssFile($baseUrl.'/css/miestilo.css');        ?>       <?php	 // $cs->registerScriptFile($baseUrl.'/js/bootstrap.min.js');	 // $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.sparkline.js');	  //$cs->registerScriptFile($baseUrl.'/js/plugins/jquery.flot.min.js');	  //$cs->registerScriptFile($baseUrl.'/js/plugins/jquery.flot.pie.min.js');	  //$cs->registerScriptFile($baseUrl.'/js/charts.js');	 // $cs->registerScriptFile($baseUrl.'/js/plugins/jquery.knob.js');	  //$cs->registerScriptFile($baseUrl.'/js/plugins/jquery.masonry.min.js');	  //$cs->registerScriptFile($baseUrl.'/js/styleswitcher.js');	?>    <?php // $cs=Yii::app()->clientScript;    $cs->scriptMap=array(        'jquery-ui.css' => $baseUrl.'/css/jquery-ui.css',         'styles.css' => $baseUrl.'/css/styles.css',         'pager.css' => $baseUrl.'/css/pager.css',              /* 'jquery.ui.accordion.css' => $baseUrl.'/css/jquery.ui.accordion.css',        'jquery.ui.autocomplete.css' =>  $baseUrl.'/css/jquery.ui.autocomplete.css',        'jquery.ui.button.css' =>  $baseUrl.'/css/jquery.ui.button.css',        'jquery.ui.core.css' =>  $baseUrl.'/css/jquery.ui.core.css',        'jquery.ui.datepicker.css' =>  $baseUrl.'/css/jquery.ui.datepicker.css',        'jquery.ui.dialog.css' => $baseUrl.'/css/jquery.ui.dialog.css',        'jquery.ui.menu.css' =>  $baseUrl.'/css/jquery.ui.menu.css',        'jquery.ui.progressbar.css' =>  $baseUrl.'/css/jquery.ui.progressbar.css',        'jquery.ui.resizable.css' => $baseUrl.'/css/jquery.ui.resizable.css',        'jquery.ui.selectable.css' =>  $baseUrl.'/css/jquery.ui.selectable.css',        'jquery.ui.slider.css' =>  $baseUrl.'/css/jquery.ui.slider.css',        'jquery.ui.spinner.css' => $baseUrl.'/css/jquery.ui.spinner.css' ,        'jquery.ui.tabs.css' =>  $baseUrl.'/css/jquery.ui.tabs.css',        'jquery.ui.theme.css' =>  $baseUrl.'/css/jquery.ui.theme.css',        'jquery.ui.tooltip.css' =>  $baseUrl.'/css/jquery.ui.tooltip.css',*/                 );    $cs->registerScriptFile($baseUrl.'/css/jquery-ui.css',CClientScript::POS_HEAD);   // $cs->registerScriptFile($baseUrl.'/js/plugins/blockuiplugin.js',CClientScript::POS_HEAD);   /* $cs->registerScriptFile($baseUrl.'/css/jquery.ui.accordion.css',CClientScript::POS_HEAD);    $cs->registerScriptFile($baseUrl.'/css/jquery.ui.autocomplete.css',CClientScript::POS_HEAD);    $cs->registerScriptFile($baseUrl.'/css/jquery.ui.button.css',CClientScript::POS_HEAD);    $cs->registerScriptFile($baseUrl.'/css/jquery.ui.core.css',CClientScript::POS_HEAD);    $cs->registerScriptFile($baseUrl.'/css/jquery.ui.datepicker.css',CClientScript::POS_HEAD);    $cs->registerScriptFile($baseUrl.'/css/jquery.ui.dialog.css',CClientScript::POS_HEAD);    $cs->registerScriptFile($baseUrl.'/css/jquery.ui.menu.css',CClientScript::POS_HEAD);    $cs->registerScriptFile($baseUrl.'/css/jquery.ui.progressbar.css',CClientScript::POS_HEAD);    $cs->registerScriptFile($baseUrl.'/css/jquery.ui.resizable.css',CClientScript::POS_HEAD);    $cs->registerScriptFile($baseUrl.'/css/jquery.ui.selectable.css',CClientScript::POS_HEAD);    $cs->registerScriptFile($baseUrl.'/css/jquery.ui.slider.css',CClientScript::POS_HEAD);    $cs->registerScriptFile($baseUrl.'/css/jquery.ui.spinner.css',CClientScript::POS_HEAD);    $cs->registerScriptFile($baseUrl.'/css/jquery.ui.tabs.css',CClientScript::POS_HEAD);    $cs->registerScriptFile($baseUrl.'/css/jquery.ui.theme.css',CClientScript::POS_HEAD);    $cs->registerScriptFile($baseUrl.'/css/jquery.ui.tooltip.css',CClientScript::POS_HEAD);   */    ?>  </head><body >   <?php //echo  //Yii::app()->user->ui->displayErrorConsole(); ?><?php  echo CHtml::script("$(document).ajaxStart(function () { $.blockUI(        {message: 'Procesando..., por favor espere',                     fadeIn: 700,            fadeOut: 700,            timeout: 0,            theme:false,            showOverlay: false,            centerX: true,            centerY: true,                    }         );}).ajaxStop($.unblockUI);");   ?><section id="navigation-main"><?php   require_once('tpl_navigation.php')?></section><!-- /#navigation-main --><section class="main-body">    <div class="container-fluid">            <?php echo $content; ?>    </div></section><?php require_once('tpl_footer.php')?>  </body></html>