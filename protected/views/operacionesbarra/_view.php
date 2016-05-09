<?php
/* @var $this OperacionesbarraController */
/* @var $data Operacionesbarra */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nameop')); ?>:</b>
	<?php echo CHtml::encode($data->nameop); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('action')); ?>:</b>
	<?php echo CHtml::encode($data->action); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('paramid')); ?>:</b>
	<?php echo CHtml::encode($data->paramid); ?>
	<br />


</div>