<?php
/* @var $this ObrasController */
/* @var $data Obras */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idobra')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idobra), array('view', 'id'=>$data->idobra)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descriobra')); ?>:</b>
	<?php echo CHtml::encode($data->descriobra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oi')); ?>:</b>
	<?php echo CHtml::encode($data->oi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idinventario')); ?>:</b>
	<?php echo CHtml::encode($data->idinventario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechasol')); ?>:</b>
	<?php echo CHtml::encode($data->fechasol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codep')); ?>:</b>
	<?php echo CHtml::encode($data->codep); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechacierre')); ?>:</b>
	<?php echo CHtml::encode($data->fechacierre); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cc')); ?>:</b>
	<?php echo CHtml::encode($data->cc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('om')); ?>:</b>
	<?php echo CHtml::encode($data->om); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('obs')); ?>:</b>
	<?php echo CHtml::encode($data->obs); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('centro')); ?>:</b>
	<?php echo CHtml::encode($data->centro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prefijo')); ?>:</b>
	<?php echo CHtml::encode($data->prefijo); ?>
	<br />

	*/ ?>

</div>