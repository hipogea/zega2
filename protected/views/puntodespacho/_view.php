<?php
/* @var $this PuntodespachoController */
/* @var $data Puntodespacho */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hcodcanal')); ?>:</b>
	<?php echo CHtml::encode($data->hcodcanal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombrepunto')); ?>:</b>
	<?php echo CHtml::encode($data->nombrepunto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pesaje')); ?>:</b>
	<?php echo CHtml::encode($data->pesaje); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codcen')); ?>:</b>
	<?php echo CHtml::encode($data->codcen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('maxhorasespera')); ?>:</b>
	<?php echo CHtml::encode($data->maxhorasespera); ?>
	<br />


</div>