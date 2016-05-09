<?php
/* @var $this CentrosController */
/* @var $data Centros */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codcen')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codcen), array('view', 'id'=>$data->codcen)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codsoc')); ?>:</b>
	<?php echo CHtml::encode($data->codsoc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomcen')); ?>:</b>
	<?php echo CHtml::encode($data->nomcen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descricen')); ?>:</b>
	<?php echo CHtml::encode($data->descricen); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('modificadoel')); ?>:</b>
	<?php echo CHtml::encode($data->modificadoel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_dir')); ?>:</b>
	<?php echo CHtml::encode($data->n_dir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_planta')); ?>:</b>
	<?php echo CHtml::encode($data->c_planta); ?>
	<br />

	*/ ?>

</div>