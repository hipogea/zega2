<?php
/* @var $this TipoproductoController */
/* @var $data VentasTipoproducto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codtipo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codtipo), array('view', 'id'=>$data->codtipo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destipo')); ?>:</b>
	<?php echo CHtml::encode($data->destipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcutilidad')); ?>:</b>
	<?php echo CHtml::encode($data->porcutilidad); ?>
	<br />


</div>