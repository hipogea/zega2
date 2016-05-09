<?php
/* @var $this FacturController */
/* @var $data Factur */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codpro')); ?>:</b>
	<?php echo CHtml::encode($data->codpro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codproadqui')); ?>:</b>
	<?php echo CHtml::encode($data->codproadqui); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaemision')); ?>:</b>
	<?php echo CHtml::encode($data->fechaemision); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('versionubl')); ?>:</b>
	<?php echo CHtml::encode($data->versionubl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('versionestruc')); ?>:</b>
	<?php echo CHtml::encode($data->versionestruc); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaconsumo')); ?>:</b>
	<?php echo CHtml::encode($data->fechaconsumo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codestado')); ?>:</b>
	<?php echo CHtml::encode($data->codestado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('texto')); ?>:</b>
	<?php echo CHtml::encode($data->texto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('textolargo')); ?>:</b>
	<?php echo CHtml::encode($data->textolargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipodocumento')); ?>:</b>
	<?php echo CHtml::encode($data->tipodocumento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('moneda')); ?>:</b>
	<?php echo CHtml::encode($data->moneda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orcli')); ?>:</b>
	<?php echo CHtml::encode($data->orcli); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descuento')); ?>:</b>
	<?php echo CHtml::encode($data->descuento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coddocu')); ?>:</b>
	<?php echo CHtml::encode($data->coddocu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codtipofac')); ?>:</b>
	<?php echo CHtml::encode($data->codtipofac); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codsociedad')); ?>:</b>
	<?php echo CHtml::encode($data->codsociedad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codgrupoventas')); ?>:</b>
	<?php echo CHtml::encode($data->codgrupoventas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ordenventa')); ?>:</b>
	<?php echo CHtml::encode($data->ordenventa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codcentro')); ?>:</b>
	<?php echo CHtml::encode($data->codcentro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codobjeto')); ?>:</b>
	<?php echo CHtml::encode($data->codobjeto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechapresentacion')); ?>:</b>
	<?php echo CHtml::encode($data->fechapresentacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechanominal')); ?>:</b>
	<?php echo CHtml::encode($data->fechanominal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechacancelacion')); ?>:</b>
	<?php echo CHtml::encode($data->fechacancelacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tenorsup')); ?>:</b>
	<?php echo CHtml::encode($data->tenorsup); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tenorinf')); ?>:</b>
	<?php echo CHtml::encode($data->tenorinf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numerocheque')); ?>:</b>
	<?php echo CHtml::encode($data->numerocheque); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firmadigital')); ?>:</b>
	<?php echo CHtml::encode($data->firmadigital); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipodocadqui')); ?>:</b>
	<?php echo CHtml::encode($data->tipodocadqui); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codleyenda')); ?>:</b>
	<?php echo CHtml::encode($data->codleyenda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codal')); ?>:</b>
	<?php echo CHtml::encode($data->codal); ?>
	<br />

	*/ ?>

</div>