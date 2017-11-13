<?php
/* @var $this LibroobraController */
/* @var $data Libroobra */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidot')); ?>:</b>
	<?php echo CHtml::encode($data->hidot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('texto')); ?>:</b>
	<?php echo CHtml::encode($data->texto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hinicio')); ?>:</b>
	<?php echo CHtml::encode($data->hinicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hfinal')); ?>:</b>
	<?php echo CHtml::encode($data->hfinal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('temperatura')); ?>:</b>
	<?php echo CHtml::encode($data->temperatura); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('hr')); ?>:</b>
	<?php echo CHtml::encode($data->hr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lluvias')); ?>:</b>
	<?php echo CHtml::encode($data->lluvias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('viento')); ?>:</b>
	<?php echo CHtml::encode($data->viento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hiddireccion')); ?>:</b>
	<?php echo CHtml::encode($data->hiddireccion); ?>
	<br />

	*/ ?>

</div>