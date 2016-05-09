<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="de" />
 
    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getTheme()->baseUrl; ?>/css/print.css" media="print" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getTheme()->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->
 
	    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getTheme()->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getTheme()->baseUrl; ?>/css/form.css" />
    
</head>
<body>
<div id="page">
    <?php echo $content; ?>
</body>
</html>