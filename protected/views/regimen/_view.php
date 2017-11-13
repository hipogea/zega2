<?php
/* @var $this RegimenController */
/* @var $data Regimen */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desregimen')); ?>:</b>
	<?php echo CHtml::encode($data->desregimen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dias')); ?>:</b>
	<?php echo CHtml::encode($data->dias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcextras')); ?>:</b>
	<?php echo CHtml::encode($data->porcextras); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcdom')); ?>:</b>
	<?php echo CHtml::encode($data->porcdom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcfer')); ?>:</b>
	<?php echo CHtml::encode($data->porcfer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horasdia')); ?>:</b>
	<?php echo CHtml::encode($data->horasdia); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('facdominical')); ?>:</b>
	<?php echo CHtml::encode($data->facdominical); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('frecpago')); ?>:</b>
	<?php echo CHtml::encode($data->frecpago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('turno')); ?>:</b>
	<?php echo CHtml::encode($data->turno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acumuladomingo')); ?>:</b>
	<?php echo CHtml::encode($data->acumuladomingo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tarifamensual')); ?>:</b>
	<?php echo CHtml::encode($data->tarifamensual); ?>
	<br />

	*/ ?>

</div>