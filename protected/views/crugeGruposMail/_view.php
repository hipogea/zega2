<?php
/* @var $this CrugeGruposMailController */
/* @var $data CrugeGruposMail */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desgrupo')); ?>:</b>
	<?php echo CHtml::encode($data->desgrupo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deslarga')); ?>:</b>
	<?php echo CHtml::encode($data->deslarga); ?>
	<br />


</div>