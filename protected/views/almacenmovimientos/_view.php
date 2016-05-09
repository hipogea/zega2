<?php
/* @var $this AlmacenmovimientosController */
/* @var $data Almacenmovimientos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codmov')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codmov), array('view', 'id'=>$data->codmov)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('movimiento')); ?>:</b>
	<?php echo CHtml::encode($data->movimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('signo')); ?>:</b>
	<?php echo CHtml::encode($data->signo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_objeto')); ?>:</b>
	<?php echo CHtml::encode($data->codigo_objeto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ingreso')); ?>:</b>
	<?php echo CHtml::encode($data->ingreso); ?>
	<br />


</div>