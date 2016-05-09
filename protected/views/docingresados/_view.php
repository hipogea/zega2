<?php
/* @var $this DocingresadosController */
/* @var $data Docingresados */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codprov')); ?>:</b>
	<?php echo CHtml::encode($data->codprov); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechain')); ?>:</b>
	<?php echo CHtml::encode($data->fechain); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correlativo')); ?>:</b>
	<?php echo CHtml::encode($data->correlativo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipodoc')); ?>:</b>
	<?php echo CHtml::encode($data->tipodoc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('moneda')); ?>:</b>
	<?php echo CHtml::encode($data->moneda); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('descorta')); ?>:</b>
	<?php echo CHtml::encode($data->descorta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codepv')); ?>:</b>
	<?php echo CHtml::encode($data->codepv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto')); ?>:</b>
	<?php echo CHtml::encode($data->monto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codgrupo')); ?>:</b>
	<?php echo CHtml::encode($data->codgrupo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codresponsable')); ?>:</b>
	<?php echo CHtml::encode($data->codresponsable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creadopor')); ?>:</b>
	<?php echo CHtml::encode($data->creadopor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creadoel')); ?>:</b>
	<?php echo CHtml::encode($data->creadoel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('texv')); ?>:</b>
	<?php echo CHtml::encode($data->texv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('docref')); ?>:</b>
	<?php echo CHtml::encode($data->docref); ?>
	<br />

	*/ ?>

</div>