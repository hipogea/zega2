<?php
/* @var $this PlantasController */
/* @var $data Plantas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codplanta')); ?>:</b>
	<?php echo CHtml::encode($data->codplanta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desplanta')); ?>:</b>
	<?php echo CHtml::encode($data->desplanta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigozona')); ?>:</b>
	<?php echo CHtml::encode($data->codigozona); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('capacidad')); ?>:</b>
	<?php echo CHtml::encode($data->capacidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('factor')); ?>:</b>
	<?php echo CHtml::encode($data->factor); ?>
	<br />


</div>