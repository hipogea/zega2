<?php
/* @var $this SociedadesController */
/* @var $data Sociedades */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('socio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->socio), array('view', 'id'=>$data->socio)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dsocio')); ?>:</b>
	<?php echo CHtml::encode($data->dsocio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rucsoc')); ?>:</b>
	<?php echo CHtml::encode($data->rucsoc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creadopor')); ?>:</b>
	<?php echo CHtml::encode($data->creadopor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creadoel')); ?>:</b>
	<?php echo CHtml::encode($data->creadoel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificadopor')); ?>:</b>
	<?php echo CHtml::encode($data->modificadopor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificadoel')); ?>:</b>
	<?php echo CHtml::encode($data->modificadoel); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	*/ ?>

</div>