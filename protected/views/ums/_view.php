<?php
/* @var $this UmsController */
/* @var $data Ums */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('um')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->um), array('view', 'id'=>$data->um)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desum')); ?>:</b>
	<?php echo CHtml::encode($data->desum); ?>
	<br />

	

</div>