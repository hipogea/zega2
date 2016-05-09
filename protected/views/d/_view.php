<?php
/* @var $this DController */
/* @var $data Dcottipo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codtipo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codtipo), array('view', 'id'=>$data->codtipo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destipo')); ?>:</b>
	<?php echo CHtml::encode($data->destipo); ?>
	<br />


</div>