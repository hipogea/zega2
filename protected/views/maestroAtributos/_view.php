<?php
/* @var $this MaestroAtributosController */
/* @var $data MaestroAtributos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreat')); ?>:</b>
	<?php echo CHtml::encode($data->nombreat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hid')); ?>:</b>
	<?php echo CHtml::encode($data->hid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('abreviatura')); ?>:</b>
	<?php echo CHtml::encode($data->abreviatura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('padre')); ?>:</b>
	<?php echo CHtml::encode($data->padre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jerarquia')); ?>:</b>
	<?php echo CHtml::encode($data->jerarquia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('respaldo')); ?>:</b>
	<?php echo CHtml::encode($data->respaldo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('respaldo2')); ?>:</b>
	<?php echo CHtml::encode($data->respaldo2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('respaldo3')); ?>:</b>
	<?php echo CHtml::encode($data->respaldo3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('texto')); ?>:</b>
	<?php echo CHtml::encode($data->texto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tieneum')); ?>:</b>
	<?php echo CHtml::encode($data->tieneum); ?>
	<br />

	*/ ?>

</div>