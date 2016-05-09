<?php
/* @var $this OpcontablesController */
/* @var $data Opcontables */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codop')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codop), array('view', 'id'=>$data->codop)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desop')); ?>:</b>
	<?php echo CHtml::encode($data->desop); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hcodmov')); ?>:</b>
	<?php echo CHtml::encode($data->hcodmov); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('texto')); ?>:</b>
	<?php echo CHtml::encode($data->texto); ?>
	<br />


</div>