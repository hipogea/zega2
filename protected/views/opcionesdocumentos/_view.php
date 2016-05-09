<?php
/* @var $this OpcionesdocumentosController */
/* @var $data Opcionesdocumentos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codparam')); ?>:</b>
	<?php echo CHtml::encode($data->codparam); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
	<?php echo CHtml::encode($data->valor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipodato')); ?>:</b>
	<?php echo CHtml::encode($data->tipodato); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seleccionador')); ?>:</b>
	<?php echo CHtml::encode($data->seleccionador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codocu')); ?>:</b>
	<?php echo CHtml::encode($data->codocu); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idusuario')); ?>:</b>
	<?php echo CHtml::encode($data->idusuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombrecampo')); ?>:</b>
	<?php echo CHtml::encode($data->nombrecampo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombretabla')); ?>:</b>
	<?php echo CHtml::encode($data->nombretabla); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idopdoc')); ?>:</b>
	<?php echo CHtml::encode($data->idopdoc); ?>
	<br />

	*/ ?>

</div>