<?php
/* @var $this DetcargosController */
/* @var $data Detcargos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('iddetcargo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->iddetcargo), array('view', 'id'=>$data->iddetcargo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidcargo')); ?>:</b>
	<?php echo CHtml::encode($data->hidcargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coditem')); ?>:</b>
	<?php echo CHtml::encode($data->coditem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codmaterial')); ?>:</b>
	<?php echo CHtml::encode($data->codmaterial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('m_detcargo')); ?>:</b>
	<?php echo CHtml::encode($data->m_detcargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_esdetcargo')); ?>:</b>
	<?php echo CHtml::encode($data->c_esdetcargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descrip')); ?>:</b>
	<?php echo CHtml::encode($data->descrip); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('coddocudetallecargo')); ?>:</b>
	<?php echo CHtml::encode($data->coddocudetallecargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantcargo')); ?>:</b>
	<?php echo CHtml::encode($data->cantcargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('esactivo')); ?>:</b>
	<?php echo CHtml::encode($data->esactivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('esusado')); ?>:</b>
	<?php echo CHtml::encode($data->esusado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('umedida')); ?>:</b>
	<?php echo CHtml::encode($data->umedida); ?>
	<br />

	*/ ?>

</div>