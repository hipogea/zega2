<?php
/* @var $this ReportepescaCoorController */
/* @var $data ReportepescaCoor */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidreporte')); ?>:</b>
	<?php echo CHtml::encode($data->hidreporte); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('latitud')); ?>:</b>
	<?php echo CHtml::encode($data->latitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meridiano')); ?>:</b>
	<?php echo CHtml::encode($data->meridiano); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aliaszona')); ?>:</b>
	<?php echo CHtml::encode($data->aliaszona); ?>
	<br />


</div>