<?php
/* @var $this SeleccionableController */
/* @var $data Seleccionable */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codsel')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codsel), array('view', 'id'=>$data->codsel)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desel')); ?>:</b>
	<?php echo CHtml::encode($data->desel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo')); ?>:</b>
	<?php echo CHtml::encode($data->codigo); ?>
	<br />


</div>