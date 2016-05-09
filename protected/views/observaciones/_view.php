<?php
/* @var $this ObservacionesController */
/* @var $data Observaciones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidinventario')); ?>:</b>
	<?php echo CHtml::encode($data->hidinventario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descri')); ?>:</b>
	<?php echo CHtml::encode($data->descri); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobs')); ?>:</b>
	<?php echo CHtml::encode($data->mobs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />


</div>