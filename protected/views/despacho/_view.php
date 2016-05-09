<?php
/* @var $this DespachoController */
/* @var $data Despacho */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidpunto')); ?>:</b>
	<?php echo CHtml::encode($data->hidpunto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidkardex')); ?>:</b>
	<?php echo CHtml::encode($data->hidkardex); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechacreac')); ?>:</b>
	<?php echo CHtml::encode($data->fechacreac); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaprog')); ?>:</b>
	<?php echo CHtml::encode($data->fechaprog); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('responsable')); ?>:</b>
	<?php echo CHtml::encode($data->responsable); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('iduser')); ?>:</b>
	<?php echo CHtml::encode($data->iduser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vigente')); ?>:</b>
	<?php echo CHtml::encode($data->vigente); ?>
	<br />

	*/ ?>

</div>