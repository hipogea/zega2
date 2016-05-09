<?php
/* @var $this ValorimpuestosController */
/* @var $data Valorimpuestos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hcodimpuesto')); ?>:</b>
	<?php echo CHtml::encode($data->hcodimpuesto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
	<?php echo CHtml::encode($data->valor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('finicio')); ?>:</b>
	<?php echo CHtml::encode($data->finicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ffinal')); ?>:</b>
	<?php echo CHtml::encode($data->ffinal); ?>
	<br />


</div>