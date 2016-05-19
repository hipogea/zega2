<?php
/* @var $this InventariofisicopadreController */
/* @var $data Inventariofisicopadre */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ano')); ?>:</b>
	<?php echo CHtml::encode($data->ano); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mes')); ?>:</b>
	<?php echo CHtml::encode($data->mes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('esciego')); ?>:</b>
	<?php echo CHtml::encode($data->esciego); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codocu')); ?>:</b>
	<?php echo CHtml::encode($data->codocu); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaprog')); ?>:</b>
	<?php echo CHtml::encode($data->fechaprog); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechacre')); ?>:</b>
	<?php echo CHtml::encode($data->fechacre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codresponsable')); ?>:</b>
	<?php echo CHtml::encode($data->codresponsable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codestado')); ?>:</b>
	<?php echo CHtml::encode($data->codestado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codcen')); ?>:</b>
	<?php echo CHtml::encode($data->codcen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codal')); ?>:</b>
	<?php echo CHtml::encode($data->codal); ?>
	<br />

	*/ ?>

</div>