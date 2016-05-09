<?php
/* @var $this PescatercerosController */
/* @var $data Pescaterceros */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codplanta')); ?>:</b>
	<?php echo CHtml::encode($data->codplanta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pesca')); ?>:</b>
	<?php echo CHtml::encode($data->pesca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numeroep')); ?>:</b>
	<?php echo CHtml::encode($data->numeroep); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('factor')); ?>:</b>
	<?php echo CHtml::encode($data->factor); ?>
	<br />


</div>