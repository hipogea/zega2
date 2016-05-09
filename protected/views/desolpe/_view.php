<?php
/* @var $this DesolpeController */
/* @var $data Desolpe */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('posicion')); ?>:</b>
	<?php echo CHtml::encode($data->posicion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipimputacion')); ?>:</b>
	<?php echo CHtml::encode($data->tipimputacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('centro')); ?>:</b>
	<?php echo CHtml::encode($data->centro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codal')); ?>:</b>
	<?php echo CHtml::encode($data->codal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codart')); ?>:</b>
	<?php echo CHtml::encode($data->codart); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('txtmaterial')); ?>:</b>
	<?php echo CHtml::encode($data->txtmaterial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grupocompras')); ?>:</b>
	<?php echo CHtml::encode($data->grupocompras); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modificado')); ?>:</b>
	<?php echo CHtml::encode($data->modificado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('textodetalle')); ?>:</b>
	<?php echo CHtml::encode($data->textodetalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechacrea')); ?>:</b>
	<?php echo CHtml::encode($data->fechacrea); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaent')); ?>:</b>
	<?php echo CHtml::encode($data->fechaent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechalib')); ?>:</b>
	<?php echo CHtml::encode($data->fechalib); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estadolib')); ?>:</b>
	<?php echo CHtml::encode($data->estadolib); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imputacion')); ?>:</b>
	<?php echo CHtml::encode($data->imputacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('solicitanet')); ?>:</b>
	<?php echo CHtml::encode($data->solicitanet); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hidsolpe')); ?>:</b>
	<?php echo CHtml::encode($data->hidsolpe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creado')); ?>:</b>
	<?php echo CHtml::encode($data->creado); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('codocu')); ?>:</b>
	<?php echo CHtml::encode($data->codocu); ?>
	<br />

	*/ ?>

</div>