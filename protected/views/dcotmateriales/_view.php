<?php
/* @var $this DcotmaterialesController */
/* @var $data Dcotmateriales */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numcot')); ?>:</b>
	<?php echo CHtml::encode($data->numcot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codart')); ?>:</b>
	<?php echo CHtml::encode($data->codart); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disp')); ?>:</b>
	<?php echo CHtml::encode($data->disp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cant')); ?>:</b>
	<?php echo CHtml::encode($data->cant); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('punit')); ?>:</b>
	<?php echo CHtml::encode($data->punit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item')); ?>:</b>
	<?php echo CHtml::encode($data->item); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('descri')); ?>:</b>
	<?php echo CHtml::encode($data->descri); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('stock')); ?>:</b>
	<?php echo CHtml::encode($data->stock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipoitem')); ?>:</b>
	<?php echo CHtml::encode($data->tipoitem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estadodetalle')); ?>:</b>
	<?php echo CHtml::encode($data->estadodetalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coddocu')); ?>:</b>
	<?php echo CHtml::encode($data->coddocu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('um')); ?>:</b>
	<?php echo CHtml::encode($data->um); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidguia')); ?>:</b>
	<?php echo CHtml::encode($data->hidguia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codservicio')); ?>:</b>
	<?php echo CHtml::encode($data->codservicio); ?>
	<br />

	*/ ?>

</div>