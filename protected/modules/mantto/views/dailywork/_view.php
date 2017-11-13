<?php
/* @var $this DailyworkController */
/* @var $data Dailywork */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codresponsable')); ?>:</b>
	<?php echo CHtml::encode($data->codresponsable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codturno')); ?>:</b>
	<?php echo CHtml::encode($data->codturno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horacierre')); ?>:</b>
	<?php echo CHtml::encode($data->horacierre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codproyecto')); ?>:</b>
	<?php echo CHtml::encode($data->codproyecto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codocu')); ?>:</b>
	<?php echo CHtml::encode($data->codocu); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('codestado')); ?>:</b>
	<?php echo CHtml::encode($data->codestado); ?>
	<br />

	*/ ?>

</div>