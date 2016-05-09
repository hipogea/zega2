<?php
/* @var $this DcajachicaController */
/* @var $data Dcajachica */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidcaja')); ?>:</b>
	<?php echo CHtml::encode($data->hidcaja); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('glosa')); ?>:</b>
	<?php echo CHtml::encode($data->glosa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('referencia')); ?>:</b>
	<?php echo CHtml::encode($data->referencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('debe')); ?>:</b>
	<?php echo CHtml::encode($data->debe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('haber')); ?>:</b>
	<?php echo CHtml::encode($data->haber); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('monedahaber')); ?>:</b>
	<?php echo CHtml::encode($data->monedahaber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('saldo')); ?>:</b>
	<?php echo CHtml::encode($data->saldo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codtra')); ?>:</b>
	<?php echo CHtml::encode($data->codtra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ceco')); ?>:</b>
	<?php echo CHtml::encode($data->ceco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechacre')); ?>:</b>
	<?php echo CHtml::encode($data->fechacre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iduser')); ?>:</b>
	<?php echo CHtml::encode($data->iduser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codocu')); ?>:</b>
	<?php echo CHtml::encode($data->codocu); ?>
	<br />

	*/ ?>

</div>