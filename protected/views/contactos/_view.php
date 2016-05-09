<?php
/* @var $this ContactosController */
/* @var $data Contactos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_hcod')); ?>:</b>
	<?php echo CHtml::encode($data->c_hcod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_nombre')); ?>:</b>
	<?php echo CHtml::encode($data->c_nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_cargo')); ?>:</b>
	<?php echo CHtml::encode($data->c_cargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_tel')); ?>:</b>
	<?php echo CHtml::encode($data->c_tel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_mail')); ?>:</b>
	<?php echo CHtml::encode($data->c_mail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creadopor')); ?>:</b>
	<?php echo CHtml::encode($data->creadopor); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('creadoel')); ?>:</b>
	<?php echo CHtml::encode($data->creadoel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificadopor')); ?>:</b>
	<?php echo CHtml::encode($data->modificadopor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificadoel')); ?>:</b>
	<?php echo CHtml::encode($data->modificadoel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correlativo')); ?>:</b>
	<?php echo CHtml::encode($data->correlativo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecnacimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fecnacimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('calificacion')); ?>:</b>
	<?php echo CHtml::encode($data->calificacion); ?>
	<br />

	*/ ?>

</div>