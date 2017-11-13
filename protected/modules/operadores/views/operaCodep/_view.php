<?php
/* @var $this OperaCodepController */
/* @var $data OperaCodep */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codep')); ?>:</b>
	<?php echo CHtml::encode($data->codep); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codtra')); ?>:</b>
	<?php echo CHtml::encode($data->codtra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('finicio')); ?>:</b>
	<?php echo CHtml::encode($data->finicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codof')); ?>:</b>
	<?php echo CHtml::encode($data->codof); ?>
	<br />


</div>