<?php
/* @var $this FondofijoController */
/* @var $data Fondofijo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desfondo')); ?>:</b>
	<?php echo CHtml::encode($data->desfondo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codtra')); ?>:</b>
	<?php echo CHtml::encode($data->codtra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codcen')); ?>:</b>
	<?php echo CHtml::encode($data->codcen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iduser')); ?>:</b>
	<?php echo CHtml::encode($data->iduser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fondo')); ?>:</b>
	<?php echo CHtml::encode($data->fondo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codmon')); ?>:</b>
	<?php echo CHtml::encode($data->codmon); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('numerodias')); ?>:</b>
	<?php echo CHtml::encode($data->numerodias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gastomax')); ?>:</b>
	<?php echo CHtml::encode($data->gastomax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rojo')); ?>:</b>
	<?php echo CHtml::encode($data->rojo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('naranja')); ?>:</b>
	<?php echo CHtml::encode($data->naranja); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('azul')); ?>:</b>
	<?php echo CHtml::encode($data->azul); ?>
	<br />

	*/ ?>

</div>