<?php
/* @var $this ReportepescaController */
/* @var $data Reportepesca */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codep')); ?>:</b>
	<?php echo CHtml::encode($data->codep); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('semana')); ?>:</b>
	<?php echo CHtml::encode($data->semana); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('harribo')); ?>:</b>
	<?php echo CHtml::encode($data->harribo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hzarpe')); ?>:</b>
	<?php echo CHtml::encode($data->hzarpe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codplantadestino')); ?>:</b>
	<?php echo CHtml::encode($data->codplantadestino); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('codplantazarpe')); ?>:</b>
	<?php echo CHtml::encode($data->codplantazarpe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('declarada')); ?>:</b>
	<?php echo CHtml::encode($data->declarada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descargada')); ?>:</b>
	<?php echo CHtml::encode($data->descargada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('d2')); ?>:</b>
	<?php echo CHtml::encode($data->d2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codzarpe')); ?>:</b>
	<?php echo CHtml::encode($data->codzarpe); ?>
	<br />

	*/ ?>

</div>