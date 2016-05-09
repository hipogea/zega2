<?php
/* @var $this MasterequipoController */
/* @var $data Masterequipo */
?>

<div class="view">



	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo')); ?>:</b>
	<?php echo CHtml::encode($data->codigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marca')); ?>:</b>
	<?php echo CHtml::encode($data->marca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modelo')); ?>:</b>
	<?php echo CHtml::encode($data->modelo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numeroparte')); ?>:</b>
	<?php echo CHtml::encode($data->numeroparte); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codart')); ?>:</b>
	<?php echo CHtml::encode($data->codart); ?>
	<br />


</div>