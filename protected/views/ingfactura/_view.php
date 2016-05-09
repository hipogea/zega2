<?php
/* @var $this IngfacturaController */
/* @var $data Ingfactura */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codpro')); ?>:</b>
	<?php echo CHtml::encode($data->codpro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechadoc')); ?>:</b>
	<?php echo CHtml::encode($data->fechadoc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numerodoc')); ?>:</b>
	<?php echo CHtml::encode($data->numerodoc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seriedoc')); ?>:</b>
	<?php echo CHtml::encode($data->seriedoc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numrecepcion')); ?>:</b>
	<?php echo CHtml::encode($data->numrecepcion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iduser')); ?>:</b>
	<?php echo CHtml::encode($data->iduser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('frechacrea')); ?>:</b>
	<?php echo CHtml::encode($data->frechacrea); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codcentro')); ?>:</b>
	<?php echo CHtml::encode($data->codcentro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numocompra')); ?>:</b>
	<?php echo CHtml::encode($data->numocompra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idgarita')); ?>:</b>
	<?php echo CHtml::encode($data->idgarita); ?>
	<br />

	*/ ?>

</div>