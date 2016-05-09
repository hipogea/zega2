<?php
/* @var $this OficiosController */
/* @var $data Oficios */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codof')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codof), array('view', 'id'=>$data->codof)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oficio')); ?>:</b>
	<?php echo CHtml::encode($data->oficio); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('creadopor')); ?>:</b>
	<?php echo CHtml::encode($data->creadopor); ?>
	<br />


</div>