<?php
/* @var $this EmbarcacionesController */
/* @var $data Embarcaciones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codep')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codep), array('view', 'id'=>$data->codep)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomep')); ?>:</b>
	<?php echo CHtml::encode($data->nomep); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('matricula')); ?>:</b>
	<?php echo CHtml::encode($data->matricula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cbodega')); ?>:</b>
	<?php echo CHtml::encode($data->cbodega); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activa')); ?>:</b>
	<?php echo CHtml::encode($data->activa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codsap')); ?>:</b>
	<?php echo CHtml::encode($data->codsap); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('codcentro')); ?>:</b>
	<?php echo CHtml::encode($data->codcentro); ?>
	<br />

	*/ ?>

</div>