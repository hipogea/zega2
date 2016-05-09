<?php
/* @var $this CotiController */
/* @var $data Coti */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idguia')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idguia), array('view', 'id'=>$data->idguia)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numcot')); ?>:</b>
	<?php echo CHtml::encode($data->numcot); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codpro')); ?>:</b>
	<?php echo CHtml::encode($data->codpro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecdoc')); ?>:</b>
	<?php echo CHtml::encode($data->fecdoc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codcon')); ?>:</b>
	<?php echo CHtml::encode($data->codcon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codestado')); ?>:</b>
	<?php echo CHtml::encode($data->codestado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('texto')); ?>:</b>
	<?php echo CHtml::encode($data->texto); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('textolargo')); ?>:</b>
	<?php echo CHtml::encode($data->textolargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipologia')); ?>:</b>
	<?php echo CHtml::encode($data->tipologia); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coddocu')); ?>:</b>
	<?php echo CHtml::encode($data->coddocu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creado')); ?>:</b>
	<?php echo CHtml::encode($data->creado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificado')); ?>:</b>
	<?php echo CHtml::encode($data->modificado); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('codtipofac')); ?>:</b>
	<?php echo CHtml::encode($data->codtipofac); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codsociedad')); ?>:</b>
	<?php echo CHtml::encode($data->codsociedad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codgrupoventas')); ?>:</b>
	<?php echo CHtml::encode($data->codgrupoventas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codtipocotizacion')); ?>:</b>
	<?php echo CHtml::encode($data->codtipocotizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('validez')); ?>:</b>
	<?php echo CHtml::encode($data->validez); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codcentro')); ?>:</b>
	<?php echo CHtml::encode($data->codcentro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nigv')); ?>:</b>
	<?php echo CHtml::encode($data->nigv); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('tenorsup')); ?>:</b>
	<?php echo CHtml::encode($data->tenorsup); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tenorinf')); ?>:</b>
	<?php echo CHtml::encode($data->tenorinf); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('montototal')); ?>:</b>
	<?php echo CHtml::encode($data->montototal); ?>
	<br />

	*/ ?>

</div>