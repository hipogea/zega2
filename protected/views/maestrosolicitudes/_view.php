<?php
/* @var $this MaestrosolicitudesController */
/* @var $data Maestrosolicitudes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcioncorta')); ?>:</b>
	<?php echo CHtml::encode($data->descripcioncorta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marca')); ?>:</b>
	<?php echo CHtml::encode($data->marca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modelo')); ?>:</b>
	<?php echo CHtml::encode($data->modelo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numeroparte')); ?>:</b>
	<?php echo CHtml::encode($data->numeroparte); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('um')); ?>:</b>
	<?php echo CHtml::encode($data->um); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('codclase')); ?>:</b>
	<?php echo CHtml::encode($data->codclase); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codgrupo')); ?>:</b>
	<?php echo CHtml::encode($data->codgrupo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codsector')); ?>:</b>
	<?php echo CHtml::encode($data->codsector); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('textolargo')); ?>:</b>
	<?php echo CHtml::encode($data->textolargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigoestado')); ?>:</b>
	<?php echo CHtml::encode($data->codigoestado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigodoc')); ?>:</b>
	<?php echo CHtml::encode($data->codigodoc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigocreado')); ?>:</b>
	<?php echo CHtml::encode($data->codigocreado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcionfinal')); ?>:</b>
	<?php echo CHtml::encode($data->descripcionfinal); ?>
	<br />

	*/ ?>

</div>