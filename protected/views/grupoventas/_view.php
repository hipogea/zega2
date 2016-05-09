<?php
/* @var $this GrupoventasController */
/* @var $data Grupoventas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codgrupo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codgrupo), array('view', 'id'=>$data->codgrupo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codalm')); ?>:</b>
	<?php echo CHtml::encode($data->codalm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomgru')); ?>:</b>
	<?php echo CHtml::encode($data->nomgru); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desgru')); ?>:</b>
	<?php echo CHtml::encode($data->desgru); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('modificadoel')); ?>:</b>
	<?php echo CHtml::encode($data->modificadoel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codsociedad')); ?>:</b>
	<?php echo CHtml::encode($data->codsociedad); ?>
	<br />

	*/ ?>

</div>