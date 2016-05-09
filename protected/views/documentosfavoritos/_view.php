<?php
/* @var $this DocumentosfavoritosController */
/* @var $data Documentosfavoritos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codocu')); ?>:</b>
	<?php echo CHtml::encode($data->codocu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidocu')); ?>:</b>
	<?php echo CHtml::encode($data->hidocu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iduser')); ?>:</b>
	<?php echo CHtml::encode($data->iduser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('texto')); ?>:</b>
	<?php echo CHtml::encode($data->texto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('column_7')); ?>:</b>
	<?php echo CHtml::encode($data->column_7); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('compartido')); ?>:</b>
	<?php echo CHtml::encode($data->compartido); ?>
	<br />

	*/ ?>

</div>