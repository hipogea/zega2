<?php
/* @var $this CanalesController */
/* @var $data Canales */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codcanal')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codcanal), array('view', 'id'=>$data->codcanal)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('canal')); ?>:</b>
	<?php echo CHtml::encode($data->canal); ?>
	<br />


</div>