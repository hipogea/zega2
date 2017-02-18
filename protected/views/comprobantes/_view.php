<?php
/* @var $this ComprobantesController */
/* @var $data Comprobantes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('femision')); ?>:</b>
	<?php echo CHtml::encode($data->femision); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fvencimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fvencimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serie')); ?>:</b>
	<?php echo CHtml::encode($data->serie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipodocid')); ?>:</b>
	<?php echo CHtml::encode($data->tipodocid); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('numdocid')); ?>:</b>
	<?php echo CHtml::encode($data->numdocid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('razon')); ?>:</b>
	<?php echo CHtml::encode($data->razon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto')); ?>:</b>
	<?php echo CHtml::encode($data->monto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codmon')); ?>:</b>
	<?php echo CHtml::encode($data->codmon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('flag')); ?>:</b>
	<?php echo CHtml::encode($data->flag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iduser')); ?>:</b>
	<?php echo CHtml::encode($data->iduser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('esservicio')); ?>:</b>
	<?php echo CHtml::encode($data->esservicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('internacional')); ?>:</b>
	<?php echo CHtml::encode($data->internacional); ?>
	<br />

	*/ ?>

</div>