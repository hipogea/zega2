<?php
/* @var $this PartesController */
/* @var $data Partes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('puerto')); ?>:</b>
	<?php echo CHtml::encode($data->plantaorigen->desplanta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('puertodes')); ?>:</b>
	<?php echo CHtml::encode($data->plantadestino->desplanta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horometro')); ?>:</b>
	<?php echo CHtml::encode($data->horometro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horometrodes')); ?>:</b>
	<?php echo CHtml::encode($data->horometrodes); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('numerodecalas')); ?>:</b>
	<?php echo CHtml::encode($data->numerodecalas); ?>
	<br />

	*/ ?>

</div>