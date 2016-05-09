<?php
/* @var $this ImpuestosdocuController */
/* @var $data Impuestosdocu */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codocu')); ?>:</b>
	<?php echo CHtml::encode($data->codocu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codimpuesto')); ?>:</b>
	<?php echo CHtml::encode($data->codimpuesto); ?>
	<br />


</div>