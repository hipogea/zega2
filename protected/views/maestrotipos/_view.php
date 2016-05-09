<?php
/* @var $this MaestrotiposController */
/* @var $data Maestrotipos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codtipo')); ?>:</b>
	<?php echo CHtml::encode($data->codtipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destipo')); ?>:</b>
	<?php echo CHtml::encode($data->destipo); ?>
	<br />


</div>