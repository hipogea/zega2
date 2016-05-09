<?php
/* @var $this CliproController */
/* @var $data Clipro */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codpro')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codpro), array('view', 'id'=>$data->codpro)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('despro')); ?>:</b>
	<?php echo CHtml::encode($data->despro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rucpro')); ?>:</b>
	<?php echo CHtml::encode($data->rucpro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telpro')); ?>:</b>
	<?php echo CHtml::encode($data->telpro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('emailpro')); ?>:</b>
	<?php echo CHtml::encode($data->emailpro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creadopor')); ?>:</b>
	<?php echo CHtml::encode($data->creadopor); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('modificadopor')); ?>:</b>
	<?php echo CHtml::encode($data->modificadopor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creadoel')); ?>:</b>
	<?php echo CHtml::encode($data->creadoel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificadoel')); ?>:</b>
	<?php echo CHtml::encode($data->modificadoel); ?>
	<br />

	*/ ?>

</div>