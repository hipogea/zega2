<?php
/* @var $this AlconversionesController */
/* @var $data Alconversiones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('um1')); ?>:</b>
	<?php echo CHtml::encode($data->um1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('um2')); ?>:</b>
	<?php echo CHtml::encode($data->um2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numerador')); ?>:</b>
	<?php echo CHtml::encode($data->numerador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('denominador')); ?>:</b>
	<?php echo CHtml::encode($data->denominador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codart')); ?>:</b>
	<?php echo CHtml::encode($data->codart); ?>
	<br />


</div>