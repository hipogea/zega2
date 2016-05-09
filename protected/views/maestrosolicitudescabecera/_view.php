<?php
/* @var $this MaestrosolicitudescabeceraController */
/* @var $data Maestrosolicitudescabecera */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codcentro')); ?>:</b>
	<?php echo CHtml::encode($data->codcentro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correlativo')); ?>:</b>
	<?php echo CHtml::encode($data->correlativo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creadopor')); ?>:</b>
	<?php echo CHtml::encode($data->creadopor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificadopor')); ?>:</b>
	<?php echo CHtml::encode($data->modificadopor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('solicitante')); ?>:</b>
	<?php echo CHtml::encode($data->solicitante); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('codigoestado')); ?>:</b>
	<?php echo CHtml::encode($data->codigoestado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coddocu')); ?>:</b>
	<?php echo CHtml::encode($data->coddocu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	*/ ?>

</div>