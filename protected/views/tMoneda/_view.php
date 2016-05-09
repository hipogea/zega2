<?php
/* @var $this TMonedaController */
/* @var $data TMoneda */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codmoneda')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codmoneda), array('view', 'id'=>$data->codmoneda)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('simbolo')); ?>:</b>
	<?php echo CHtml::encode($data->simbolo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desmon')); ?>:</b>
	<?php echo CHtml::encode($data->desmon); ?>
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


</div>