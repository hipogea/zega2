<?php
/* @var $this CargosController */
/* @var $data Cargos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cnumcargo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cnumcargo), array('view', 'id'=>$data->cnumcargo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigocentro')); ?>:</b>
	<?php echo CHtml::encode($data->codigocentro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descargo')); ?>:</b>
	<?php echo CHtml::encode($data->descargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('m_cargo')); ?>:</b>
	<?php echo CHtml::encode($data->m_cargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codjefe')); ?>:</b>
	<?php echo CHtml::encode($data->codjefe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codentrega')); ?>:</b>
	<?php echo CHtml::encode($data->codentrega); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codrecibe')); ?>:</b>
	<?php echo CHtml::encode($data->codrecibe); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecdocumento')); ?>:</b>
	<?php echo CHtml::encode($data->fecdocumento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecentrega')); ?>:</b>
	<?php echo CHtml::encode($data->fecentrega); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codtipocargo')); ?>:</b>
	<?php echo CHtml::encode($data->codtipocargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigoestadocargo')); ?>:</b>
	<?php echo CHtml::encode($data->codigoestadocargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coddocucargo')); ?>:</b>
	<?php echo CHtml::encode($data->coddocucargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creadopor')); ?>:</b>
	<?php echo CHtml::encode($data->creadopor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creadoel')); ?>:</b>
	<?php echo CHtml::encode($data->creadoel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificadoel')); ?>:</b>
	<?php echo CHtml::encode($data->modificadoel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificadopor')); ?>:</b>
	<?php echo CHtml::encode($data->modificadopor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcargo')); ?>:</b>
	<?php echo CHtml::encode($data->idcargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('avisarvencimiento')); ?>:</b>
	<?php echo CHtml::encode($data->avisarvencimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechavencimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fechavencimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('esalmacen')); ?>:</b>
	<?php echo CHtml::encode($data->esalmacen); ?>
	<br />

	*/ ?>

</div>