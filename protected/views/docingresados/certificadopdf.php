
<?php $archivo=$model->getLastFile();
    $ruta=yii::app()->getBaseUrl(true). $archivo['rutacorta'].$archivo['nombre'].'.'.$archivo['extension']; ?>
<?php //echo $ruta; ?>

  <iframe src="<?php echo $ruta; ?>" style="width:100%; height:100%;" frameborder="0"></iframe>
           





