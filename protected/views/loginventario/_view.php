<?php
/* @var $this LoginventarioController */
/* @var $data Loginventario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idlog')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idlog), array('view', 'id'=>$data->idlog)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidinventario')); ?>:</b>
	<?php echo CHtml::encode($data->hidinventario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c_estado')); ?>:</b>
	<?php echo CHtml::encode($data->c_estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codep')); ?>:</b>
	<?php echo CHtml::encode($data->codep); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comentario')); ?>:</b>
	<?php echo CHtml::encode($data->comentario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coddocu')); ?>:</b>
	<?php echo CHtml::encode($data->coddocu); ?>
	<br />

	<?php /*
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('codlugar')); ?>:</b>
	<?php echo CHtml::encode($data->codlugar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigopadre')); ?>:</b>
	<?php echo CHtml::encode($data->codigopadre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numerodocumento')); ?>:</b>
	<?php echo CHtml::encode($data->numerodocumento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adicional')); ?>:</b>
	<?php echo CHtml::encode($data->adicional); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codestado')); ?>:</b>
	<?php echo CHtml::encode($data->codestado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codepanterior')); ?>:</b>
	<?php echo CHtml::encode($data->codepanterior); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codlugarant')); ?>:</b>
	<?php echo CHtml::encode($data->codlugarant); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iddocu')); ?>:</b>
	<?php echo CHtml::encode($data->iddocu); ?>
	<br />

	*/ ?>

</div>