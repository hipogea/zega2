<?php
/* @var $this DireccionesController */
/* @var $data Direcciones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_direc')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->n_direc), array('view', 'id'=>$data->n_direc)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_hcod')); ?>:</b>
	<?php echo CHtml::encode($data->c_hcod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_direc')); ?>:</b>
	<?php echo CHtml::encode($data->c_direc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('l_vale')); ?>:</b>
	<?php echo CHtml::encode($data->l_vale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_nomlug')); ?>:</b>
	<?php echo CHtml::encode($data->c_nomlug); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_valor')); ?>:</b>
	<?php echo CHtml::encode($data->n_valor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_distrito')); ?>:</b>
	<?php echo CHtml::encode($data->c_distrito); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('c_prov')); ?>:</b>
	<?php echo CHtml::encode($data->c_prov); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_departam')); ?>:</b>
	<?php echo CHtml::encode($data->c_departam); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('socio')); ?>:</b>
	<?php echo CHtml::encode($data->socio); ?>
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

	*/ ?>

</div>