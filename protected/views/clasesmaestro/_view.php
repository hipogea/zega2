<?php
/* @var $this ClasesmaestroController */
/* @var $data Clasesmaestro */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codclasema')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codclasema), array('view', 'id'=>$data->codclasema)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nomclase')); ?>:</b>
	<?php echo CHtml::encode($data->nomclase); ?>
	<br />

	


</div>