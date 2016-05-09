<?php
/* @var $this SolcotizacionController */
/* @var $data Solcotizacion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidesolpe')); ?>:</b>
	<?php echo CHtml::encode($data->hidesolpe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codpro')); ?>:</b>
	<?php echo CHtml::encode($data->codpro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preciounit')); ?>:</b>
	<?php echo CHtml::encode($data->preciounit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dispo')); ?>:</b>
	<?php echo CHtml::encode($data->dispo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iduser')); ?>:</b>
	<?php echo CHtml::encode($data->iduser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechacrea')); ?>:</b>
	<?php echo CHtml::encode($data->fechacrea); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('codmon')); ?>:</b>
	<?php echo CHtml::encode($data->codmon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('um')); ?>:</b>
	<?php echo CHtml::encode($data->um); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comentario')); ?>:</b>
	<?php echo CHtml::encode($data->comentario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('frespuesta')); ?>:</b>
	<?php echo CHtml::encode($data->frespuesta); ?>
	<br />

	*/ ?>

</div>