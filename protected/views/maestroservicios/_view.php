<?php
/* @var $this MaestroserviciosController */
/* @var $data Maestroservicios */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codserv')); ?>:</b>
	<?php echo CHtml::encode($data->codserv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('catval')); ?>:</b>
	<?php echo CHtml::encode($data->catval); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DECRIPCION')); ?>:</b>
	<?php echo CHtml::encode($data->DECRIPCION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>