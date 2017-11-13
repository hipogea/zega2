<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="de" />
    <?php
    $baseUrl = Yii::app()->theme->baseUrl;
    $cs = Yii::app()->getClientScript();
    Yii::app()->clientScript->registerCoreScript('jquery');
    
       
    $cs->scriptMap=array(
        'jquery-ui.css' => $baseUrl.'/css/jquery-ui.css',
       /* 'jquery.ui.accordion.css' => $baseUrl.'/css/jquery.ui.accordion.css',
        'jquery.ui.autocomplete.css' =>  $baseUrl.'/css/jquery.ui.autocomplete.css',
        'jquery.ui.button.css' =>  $baseUrl.'/css/jquery.ui.button.css',
        'jquery.ui.core.css' =>  $baseUrl.'/css/jquery.ui.core.css',
        'jquery.ui.datepicker.css' =>  $baseUrl.'/css/jquery.ui.datepicker.css',
        'jquery.ui.dialog.css' => $baseUrl.'/css/jquery.ui.dialog.css',
        'jquery.ui.menu.css' =>  $baseUrl.'/css/jquery.ui.menu.css',
        'jquery.ui.progressbar.css' =>  $baseUrl.'/css/jquery.ui.progressbar.css',
        'jquery.ui.resizable.css' => $baseUrl.'/css/jquery.ui.resizable.css',
        'jquery.ui.selectable.css' =>  $baseUrl.'/css/jquery.ui.selectable.css',
        'jquery.ui.slider.css' =>  $baseUrl.'/css/jquery.ui.slider.css',
        'jquery.ui.spinner.css' => $baseUrl.'/css/jquery.ui.spinner.css' ,
        'jquery.ui.tabs.css' =>  $baseUrl.'/css/jquery.ui.tabs.css',
        'jquery.ui.theme.css' =>  $baseUrl.'/css/jquery.ui.theme.css',
        'jquery.ui.tooltip.css' =>  $baseUrl.'/css/jquery.ui.tooltip.css',*/
                 );
    
	  $cs->registerCssFile($baseUrl.'/css/bootstrap-responsive.min.css');
	 $cs->registerCssFile($baseUrl.'/css/abound.css');
          $cs->registerCssFile($baseUrl.'/css/iconosfuentes.css'); 
         $cs->registerCssFile($baseUrl.'/css/miestilo.css');        
            $cs->scriptMap=array(
                     'jquery-ui.css' => $baseUrl.'/css/jquery-ui.css',
                    'styles.css' => $baseUrl.'/css/styles.css',
                    'pager.css' => $baseUrl.'/css/pager.css',
                                 );
          
      $cs->registerCssFile($baseUrl.'/css/bootstrap.min.css');
    
    

    ?>
</head>
<body>
    
<?php /*echo CHtml::script("
$(document).ajaxStart(function () {
 $.blockUI(
        {
        message:'Procesando...',
fadeIn: 700,
            fadeOut: 700,
            timeout: 2000,
            showOverlay: false,
            centerY: true,
            css: {
                width: '350px',
                top: '200px',
                left: '10px',
                right: '',
                border: 'none',
                padding: '5px',
                backgroundColor: '#ccc',
                '-webkit-border-radius': '20px',
                '-moz-border-radius': '20px',
                opacity: .9,
                color: '#fff'
            }
        }
 );
}).ajaxStop($.unblockUI);
");*/  ?>
<div id="page">
    <?php
   // if(count(yii::app()->tipocambio->cambiospasados())>0){MiFactoria::mensaje('notice','El tipo de cambio no se ha actualizado');}
    $flashMessages = Yii::app()->user->getFlashes(false);if ($flashMessages) { $this->widget('ext.flashes.Flashes', array() );   }
    ?>
    <?php echo $content; ?>
</body>
</html>