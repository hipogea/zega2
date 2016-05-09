<?php
/* @var $this GrupoccController */
/* @var $data Grupocc */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codgrupo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codgrupo), array('view', 'id'=>$data->codgrupo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desgrupo')); ?>:</b>
	<?php echo CHtml::encode($data->desgrupo); ?>
	<br />


</div>