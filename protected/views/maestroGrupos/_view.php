<?php
/* @var $this MaestrogruposController */
/* @var $data Maestrogrupos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codgrupo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codgrupo), array('view', 'id'=>$data->codgrupo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descri1')); ?>:</b>
	<?php echo CHtml::encode($data->descri1); ?>
	<br />


</div>