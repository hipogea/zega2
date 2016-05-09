<?php
/* @var $this TrabajadoresController */
/* @var $data Trabajadores */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigotra')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codigotra), array('view', 'id'=>$data->codigotra)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ap')); ?>:</b>
	<?php echo CHtml::encode($data->ap); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('am')); ?>:</b>
	<?php echo CHtml::encode($data->am); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombres')); ?>:</b>
	<?php echo CHtml::encode($data->nombres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dni')); ?>:</b>
	<?php echo CHtml::encode($data->dni); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codpuesto')); ?>:</b>
	<?php echo CHtml::encode($data->codpuesto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creadopor')); ?>:</b>
	<?php echo CHtml::encode($data->creadopor); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('creadoel')); ?>:</b>
	<?php echo CHtml::encode($data->creadoel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificadopor')); ?>:</b>
	<?php echo CHtml::encode($data->modificadopor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificadoel')); ?>:</b>
	<?php echo CHtml::encode($data->modificadoel); ?>
	<br />

	*/ ?>

</div>