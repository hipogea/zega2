<?php
/* @var $this ImpuestosController */
/* @var $data Impuestos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codimpuesto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codimpuesto), array('view', 'id'=>$data->codimpuesto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('abreviatura')); ?>:</b>
	<?php echo CHtml::encode($data->abreviatura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codsunat')); ?>:</b>
	<?php echo CHtml::encode($data->codsunat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codune')); ?>:</b>
	<?php echo CHtml::encode($data->codune); ?>
	<br />


</div>