<?php
/* @var $this ParametrosController */
/* @var $data Parametros */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codparam')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codparam), array('view', 'id'=>$data->codparam)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desparam')); ?>:</b>
	<?php echo CHtml::encode($data->desparam); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('explicacion')); ?>:</b>
	<?php echo CHtml::encode($data->explicacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipodato')); ?>:</b>
	<?php echo CHtml::encode($data->tipodato); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('longitud')); ?>:</b>
	<?php echo CHtml::encode($data->longitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lista')); ?>:</b>
	<?php echo CHtml::encode($data->lista); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />


</div>