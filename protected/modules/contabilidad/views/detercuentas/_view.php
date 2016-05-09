<?php
/* @var $this DetercuentasController */
/* @var $data Detercuentas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codcatval')); ?>:</b>
	<?php echo CHtml::encode($data->codcatval); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codop')); ?>:</b>
	<?php echo CHtml::encode($data->codop); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cuentadebe')); ?>:</b>
	<?php echo CHtml::encode($data->cuentadebe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cuentahaber')); ?>:</b>
	<?php echo CHtml::encode($data->cuentahaber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hcodmov')); ?>:</b>
	<?php echo CHtml::encode($data->hcodmov); ?>
	<br />


</div>