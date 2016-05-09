<?php
/* @var $this ObjetosClienteController */
/* @var $data ObjetosCliente */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codpro')); ?>:</b>
	<?php echo CHtml::encode($data->codpro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codobjeto')); ?>:</b>
	<?php echo CHtml::encode($data->codobjeto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreobjeto')); ?>:</b>
	<?php echo CHtml::encode($data->nombreobjeto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcionobjeto')); ?>:</b>
	<?php echo CHtml::encode($data->descripcionobjeto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipoobjeto')); ?>:</b>
	<?php echo CHtml::encode($data->tipoobjeto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('creadopor')); ?>:</b>
	<?php echo CHtml::encode($data->creadopor); ?>
	<br />

	*/ ?>

</div>