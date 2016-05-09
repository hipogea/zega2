<?php
/* @var $this CargamasivaController */
/* @var $data Cargamasiva */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modelo')); ?>:</b>
	<?php echo CHtml::encode($data->modelo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iduser')); ?>:</b>
	<?php echo CHtml::encode($data->iduser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechacreac')); ?>:</b>
	<?php echo CHtml::encode($data->fechacreac); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaejec')); ?>:</b>
	<?php echo CHtml::encode($data->fechaejec); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('insercion')); ?>:</b>
	<?php echo CHtml::encode($data->insercion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>