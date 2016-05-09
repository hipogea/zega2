<?php
/* @var $this CuentasController */
/* @var $data Cuentas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codcuenta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codcuenta), array('view', 'id'=>$data->codcuenta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descuenta')); ?>:</b>
	<?php echo CHtml::encode($data->descuenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clase')); ?>:</b>
	<?php echo CHtml::encode($data->clase); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contrapartida')); ?>:</b>
	<?php echo CHtml::encode($data->contrapartida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grupo')); ?>:</b>
	<?php echo CHtml::encode($data->grupo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo')); ?>:</b>
	<?php echo CHtml::encode($data->codigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n2')); ?>:</b>
	<?php echo CHtml::encode($data->n2); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('n3')); ?>:</b>
	<?php echo CHtml::encode($data->n3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registro')); ?>:</b>
	<?php echo CHtml::encode($data->registro); ?>
	<br />

	*/ ?>

</div>