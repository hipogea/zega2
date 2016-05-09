<?php
/* @var $this LugaresController */
/* @var $data Lugares */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codlugar')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codlugar), array('view', 'id'=>$data->codlugar)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deslugar')); ?>:</b>
	<?php echo CHtml::encode($data->deslugar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('provincia')); ?>:</b>
	<?php echo CHtml::encode($data->provincia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('claselugar')); ?>:</b>
	<?php echo CHtml::encode($data->claselugar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codpro')); ?>:</b>
	<?php echo CHtml::encode($data->codpro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('n_direc')); ?>:</b>
	<?php echo CHtml::encode($data->n_direc); ?>
	<br />


</div>