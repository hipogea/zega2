<?php
/* @var $this OpcionescamposdocuController */
/* @var $data Opcionescamposdocu */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codocu')); ?>:</b>
	<?php echo CHtml::encode($data->codocu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('campo')); ?>:</b>
	<?php echo CHtml::encode($data->campo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombrecampo')); ?>:</b>
	<?php echo CHtml::encode($data->nombrecampo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipodato')); ?>:</b>
	<?php echo CHtml::encode($data->tipodato); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('longitud')); ?>:</b>
	<?php echo CHtml::encode($data->longitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombredelmodelo')); ?>:</b>
	<?php echo CHtml::encode($data->nombredelmodelo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('primercampolista')); ?>:</b>
	<?php echo CHtml::encode($data->primercampolista); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('segundocampolista')); ?>:</b>
	<?php echo CHtml::encode($data->segundocampolista); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seleccionable')); ?>:</b>
	<?php echo CHtml::encode($data->seleccionable); ?>
	<br />

	*/ ?>

</div>