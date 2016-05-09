<?php
/* @var $this AlinventarioController */
/* @var $data Alinventario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codalm')); ?>:</b>
	<?php echo CHtml::encode($data->codalm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creadopor')); ?>:</b>
	<?php echo CHtml::encode($data->creadopor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creadoel')); ?>:</b>
	<?php echo CHtml::encode($data->creadoel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificadopor')); ?>:</b>
	<?php echo CHtml::encode($data->modificadopor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificadoel')); ?>:</b>
	<?php echo CHtml::encode($data->modificadoel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechainicio')); ?>:</b>
	<?php echo CHtml::encode($data->fechainicio); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fechafin')); ?>:</b>
	<?php echo CHtml::encode($data->fechafin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periodocontable')); ?>:</b>
	<?php echo CHtml::encode($data->periodocontable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codresponsable')); ?>:</b>
	<?php echo CHtml::encode($data->codresponsable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codart')); ?>:</b>
	<?php echo CHtml::encode($data->codart); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codcen')); ?>:</b>
	<?php echo CHtml::encode($data->codcen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('um')); ?>:</b>
	<?php echo CHtml::encode($data->um); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantlibre')); ?>:</b>
	<?php echo CHtml::encode($data->cantlibre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('canttran')); ?>:</b>
	<?php echo CHtml::encode($data->canttran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantres')); ?>:</b>
	<?php echo CHtml::encode($data->cantres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ubicacion')); ?>:</b>
	<?php echo CHtml::encode($data->ubicacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lote')); ?>:</b>
	<?php echo CHtml::encode($data->lote); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('siid')); ?>:</b>
	<?php echo CHtml::encode($data->siid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ssiduser')); ?>:</b>
	<?php echo CHtml::encode($data->ssiduser); ?>
	<br />

	*/ ?>

</div>