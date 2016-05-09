<?php
/* @var $this AlreservaController */
/* @var $data Alreserva */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidesolpe')); ?>:</b>
	<?php echo CHtml::encode($data->hidesolpe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estadoreserva')); ?>:</b>
	<?php echo CHtml::encode($data->estadoreserva); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechares')); ?>:</b>
	<?php echo CHtml::encode($data->fechares); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cant')); ?>:</b>
	<?php echo CHtml::encode($data->cant); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codocu')); ?>:</b>
	<?php echo CHtml::encode($data->codocu); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('numreserva')); ?>:</b>
	<?php echo CHtml::encode($data->numreserva); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('flag')); ?>:</b>
	<?php echo CHtml::encode($data->flag); ?>
	<br />

	*/ ?>

</div>