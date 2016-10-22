<?php
/* @var $this TenenciasController */
/* @var $data Tenencias */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codte')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codte), array('view', 'id'=>$data->codte)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deste')); ?>:</b>
	<?php echo CHtml::encode($data->deste); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codcen')); ?>:</b>
	<?php echo CHtml::encode($data->codcen); ?>
	<br />


</div>