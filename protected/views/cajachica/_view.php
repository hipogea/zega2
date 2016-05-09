<?php
/* @var $this CajachicaController */
/* @var $data Cajachica */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidperiodo')); ?>:</b>
	<?php echo CHtml::encode($data->hidperiodo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaini')); ?>:</b>
	<?php echo CHtml::encode($data->fechaini); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechafin')); ?>:</b>
	<?php echo CHtml::encode($data->fechafin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codtra')); ?>:</b>
	<?php echo CHtml::encode($data->codtra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codcen')); ?>:</b>
	<?php echo CHtml::encode($data->codcen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iduser')); ?>:</b>
	<?php echo CHtml::encode($data->iduser); ?>
	<br />


</div>