<?php
/* @var $this TemporadasController */
/* @var $data Temporadas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destemporada')); ?>:</b>
	<?php echo CHtml::encode($data->destemporada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inicio')); ?>:</b>
	<?php echo CHtml::encode($data->inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('termino')); ?>:</b>
	<?php echo CHtml::encode($data->termino); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cuota_anchoveta')); ?>:</b>
	<?php echo CHtml::encode($data->cuota_anchoveta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cuota_jurel')); ?>:</b>
	<?php echo CHtml::encode($data->cuota_jurel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cuota_global_anchoveta')); ?>:</b>
	<?php echo CHtml::encode($data->cuota_global_anchoveta); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('zonalitoral')); ?>:</b>
	<?php echo CHtml::encode($data->zonalitoral); ?>
	<br />

	*/ ?>

</div>