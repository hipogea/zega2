<?php
/* @var $this SistemasController */
/* @var $data Sistemas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codsistema')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codsistema), array('view', 'id'=>$data->codsistema)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sistema')); ?>:</b>
	<?php echo CHtml::encode($data->sistema); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codpadre')); ?>:</b>
	<?php echo CHtml::encode($data->codpadre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
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

	*/ ?>

</div>