<?php
/* @var $this CarterescambioController */
/* @var $data Carterescambio */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idequipo')); ?>:</b>
	<?php echo CHtml::encode($data->idequipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('capacidad')); ?>:</b>
	<?php echo CHtml::encode($data->capacidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipoaceite')); ?>:</b>
	<?php echo CHtml::encode($data->tipoaceite); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horascambio')); ?>:</b>
	<?php echo CHtml::encode($data->horascambio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipocarter')); ?>:</b>
	<?php echo CHtml::encode($data->tipocarter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('haceite')); ?>:</b>
	<?php echo CHtml::encode($data->haceite); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('hmuestra')); ?>:</b>
	<?php echo CHtml::encode($data->hmuestra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nummuestras')); ?>:</b>
	<?php echo CHtml::encode($data->nummuestras); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('fulectura')); ?>:</b>
	<?php echo CHtml::encode($data->fulectura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fumuestra')); ?>:</b>
	<?php echo CHtml::encode($data->fumuestra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fucambio')); ?>:</b>
	<?php echo CHtml::encode($data->fucambio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horometro')); ?>:</b>
	<?php echo CHtml::encode($data->horometro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo')); ?>:</b>
	<?php echo CHtml::encode($data->codigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activo')); ?>:</b>
	<?php echo CHtml::encode($data->activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hucambio')); ?>:</b>
	<?php echo CHtml::encode($data->hucambio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('casco')); ?>:</b>
	<?php echo CHtml::encode($data->casco); ?>
	<br />

	*/ ?>

</div>