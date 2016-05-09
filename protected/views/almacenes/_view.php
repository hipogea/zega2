<?php
/* @var $this AlmacenesController */
/* @var $data Almacenes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codalm')); ?>:</b>
	<?php echo CHtml::encode($data->codalm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomal')); ?>:</b>
	<?php echo CHtml::encode($data->nomal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desalm')); ?>:</b>
	<?php echo CHtml::encode($data->desalm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codcen')); ?>:</b>
	<?php echo CHtml::encode($data->codcen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creadopor')); ?>:</b>
	<?php echo CHtml::encode($data->creadopor); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('creadoel')); ?>:</b>
	<?php echo CHtml::encode($data->creadoel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificadopor')); ?>:</b>
	<?php echo CHtml::encode($data->modificadopor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificadoel')); ?>:</b>
	<?php echo CHtml::encode($data->modificadoel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codsoc')); ?>:</b>
	<?php echo CHtml::encode($data->codsoc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipovaloracion')); ?>:</b>
	<?php echo CHtml::encode($data->tipovaloracion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estructura')); ?>:</b>
	<?php echo CHtml::encode($data->estructura); ?>
	<br />

	*/ ?>

</div>