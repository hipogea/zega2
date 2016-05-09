<?php
/* @var $this TipofacturacionController */
/* @var $data Tipofacturacion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codtipofac')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codtipofac), array('view', 'id'=>$data->codtipofac)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipofacturacion')); ?>:</b>
	<?php echo CHtml::encode($data->tipofacturacion); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('creadopor')); ?>:</b>
	<?php echo CHtml::encode($data->creadopor); ?>
	<br />


</div>