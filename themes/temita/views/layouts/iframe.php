<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="de" />
    <?php
    $baseUrl = Yii::app()->theme->baseUrl;
    $cs = Yii::app()->getClientScript();
    Yii::app()->clientScript->registerCoreScript('jquery');
    ?>
    <?php
    $cs->registerCssFile($baseUrl.'/css/bootstrap.min.css');
    //->registerCssFile($baseUrl.'/css/ma.css');
    $cs->registerCssFile($baseUrl.'/css/bootstrap-responsive.min.css');
    $cs->registerCssFile($baseUrl.'/css/abound.css');
    $cs->registerCssFile($baseUrl.'/css/miestilo.css'); ///sas
    $cs->registerScriptFile($baseUrl.'/js/plugins/blockuiplugin.js',CClientScript::POS_HEAD);
    ?>
</head>
<body >
<?php  echo CHtml::script("
$(document).ajaxStart(function () {
 $.blockUI(
        {fadeIn: 700,
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
");  ?>
<div id="page">
    <?php
   // if(count(yii::app()->tipocambio->cambiospasados())>0){MiFactoria::mensaje('notice','El tipo de cambio no se ha actualizado');}
    $flashMessages = Yii::app()->user->getFlashes(false);if ($flashMessages) { $this->widget('ext.flashes.Flashes', array() );   }
    ?>
    <?php echo $content; ?>
</body>
</html>