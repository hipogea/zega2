<?php
/* @var $this CoordocsController */
/* @var $data Coordocs */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('xgeneral')); ?>:</b>
	<?php echo CHtml::encode($data->xgeneral); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ygeneral')); ?>:</b>
	<?php echo CHtml::encode($data->ygeneral); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('xlogo')); ?>:</b>
	<?php echo CHtml::encode($data->xlogo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ylogo')); ?>:</b>
	<?php echo CHtml::encode($data->ylogo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codocu')); ?>:</b>
	<?php echo CHtml::encode($data->codocu); ?>
	<br />


</div>