<?php
/* @var $this UsuariosfavoritosController */
/* @var $data Usuariosfavoritos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hiduser')); ?>:</b>
	<?php echo CHtml::encode($data->hiduser); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecharegistro')); ?>:</b>
	<?php echo CHtml::encode($data->fecharegistro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valido')); ?>:</b>
	<?php echo CHtml::encode($data->valido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('chapa')); ?>:</b>
	<?php echo CHtml::encode($data->chapa); ?>
	<br />


</div>