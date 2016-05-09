<?php
/* @var $this CmotivoController */
/* @var $data CMotivo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codmotivo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codmotivo), array('view', 'id'=>$data->codmotivo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desmotivo')); ?>:</b>
	<?php echo CHtml::encode($data->desmotivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creadopor')); ?>:</b>
	<?php echo CHtml::encode($data->creadopor); ?>
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


</div>