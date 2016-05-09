<?php
/* @var $this MaestroValoresController */
/* @var $data MaestroValores */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombrevalor')); ?>:</b>
	<?php echo CHtml::encode($data->nombrevalor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidat')); ?>:</b>
	<?php echo CHtml::encode($data->hidat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('abreviatura')); ?>:</b>
	<?php echo CHtml::encode($data->abreviatura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('texto')); ?>:</b>
	<?php echo CHtml::encode($data->texto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('respaldo1')); ?>:</b>
	<?php echo CHtml::encode($data->respaldo1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('respaldo2')); ?>:</b>
	<?php echo CHtml::encode($data->respaldo2); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('respaldo3')); ?>:</b>
	<?php echo CHtml::encode($data->respaldo3); ?>
	<br />

	*/ ?>

</div>