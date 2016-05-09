<?php
/* @var $this AlmacendocsController */
/* @var $data Almacendocs */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechavale')); ?>:</b>
	<?php echo CHtml::encode($data->fechavale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creadopor')); ?>:</b>
	<?php echo CHtml::encode($data->creadopor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificadopor')); ?>:</b>
	<?php echo CHtml::encode($data->modificadopor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creadoel')); ?>:</b>
	<?php echo CHtml::encode($data->creadoel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificadoel')); ?>:</b>
	<?php echo CHtml::encode($data->modificadoel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codmovimiento')); ?>:</b>
	<?php echo CHtml::encode($data->codmovimiento); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('numvale')); ?>:</b>
	<?php echo CHtml::encode($data->numvale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codtipovale')); ?>:</b>
	<?php echo CHtml::encode($data->codtipovale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codtrabajador')); ?>:</b>
	<?php echo CHtml::encode($data->codtrabajador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codalmacen')); ?>:</b>
	<?php echo CHtml::encode($data->codalmacen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codcentro')); ?>:</b>
	<?php echo CHtml::encode($data->codcentro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cestadovale')); ?>:</b>
	<?php echo CHtml::encode($data->cestadovale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correlativo')); ?>:</b>
	<?php echo CHtml::encode($data->correlativo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codocu')); ?>:</b>
	<?php echo CHtml::encode($data->codocu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechacont')); ?>:</b>
	<?php echo CHtml::encode($data->fechacont); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechacre')); ?>:</b>
	<?php echo CHtml::encode($data->fechacre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numdocref')); ?>:</b>
	<?php echo CHtml::encode($data->numdocref); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('posic')); ?>:</b>
	<?php echo CHtml::encode($data->posic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codocuref')); ?>:</b>
	<?php echo CHtml::encode($data->codocuref); ?>
	<br />

	*/ ?>

</div>