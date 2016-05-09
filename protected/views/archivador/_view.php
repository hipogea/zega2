<?php
/* @var $this ArchivadorController */
/* @var $data Archivador */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codocu')); ?>:</b>
	<?php echo CHtml::encode($data->codocu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desarchivo')); ?>:</b>
	<?php echo CHtml::encode($data->desarchivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('obsarchivo')); ?>:</b>
	<?php echo CHtml::encode($data->obsarchivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechasubida')); ?>:</b>
	<?php echo CHtml::encode($data->fechasubida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ndescargas')); ?>:</b>
	<?php echo CHtml::encode($data->ndescargas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('autor')); ?>:</b>
	<?php echo CHtml::encode($data->autor); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('peso')); ?>:</b>
	<?php echo CHtml::encode($data->peso); ?>
	<br />

	*/ ?>

</div>