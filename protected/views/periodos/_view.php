<?php
/* @var $this PeriodosController */
/* @var $data Periodos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mes')); ?>:</b>
	<?php echo CHtml::encode($data->mes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('anno')); ?>:</b>
	<?php echo CHtml::encode($data->anno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inicio')); ?>:</b>
	<?php echo CHtml::encode($data->inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('final')); ?>:</b>
	<?php echo CHtml::encode($data->final); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('toleranciaatras')); ?>:</b>
	<?php echo CHtml::encode($data->toleranciaatras); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('toleranciadelante')); ?>:</b>
	<?php echo CHtml::encode($data->toleranciadelante); ?>
	<br />

	*/ ?>

</div>