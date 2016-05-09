<?php
/* @var $this NovedadesController */
/* @var $data Novedades */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idnovedad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idnovedad), array('view', 'id'=>$data->idnovedad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidparte')); ?>:</b>
	<?php echo CHtml::encode($data->hidparte); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codsistema')); ?>:</b>
	<?php echo CHtml::encode($data->codsistema); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigosap')); ?>:</b>
	<?php echo CHtml::encode($data->codigosap); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigoaf')); ?>:</b>
	<?php echo CHtml::encode($data->codigoaf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descri')); ?>:</b>
	<?php echo CHtml::encode($data->descri); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descridetalle')); ?>:</b>
	<?php echo CHtml::encode($data->descridetalle); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('criticidad')); ?>:</b>
	<?php echo CHtml::encode($data->criticidad); ?>
	<br />

	*/ ?>

</div>