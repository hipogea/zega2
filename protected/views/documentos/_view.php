<?php
/* @var $this DocumentosController */
/* @var $data Documentos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('coddocu')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->coddocu), array('view', 'id'=>$data->coddocu)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desdocu')); ?>:</b>
	<?php echo CHtml::encode($data->desdocu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clase')); ?>:</b>
	<?php echo CHtml::encode($data->clase); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />


	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('modificadoel')); ?>:</b>
	<?php echo CHtml::encode($data->modificadoel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coddocupadre')); ?>:</b>
	<?php echo CHtml::encode($data->coddocupadre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tabla')); ?>:</b>
	<?php echo CHtml::encode($data->tabla); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('anuladesde')); ?>:</b>
	<?php echo CHtml::encode($data->anuladesde); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cactivo')); ?>:</b>
	<?php echo CHtml::encode($data->cactivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('abreviatura')); ?>:</b>
	<?php echo CHtml::encode($data->abreviatura); ?>
	<br />

	*/ ?>

</div>