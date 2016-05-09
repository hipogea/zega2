<?php
/* @var $this ValoracionController */
/* @var $data Catvaloracion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codcatval')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codcatval), array('view', 'id'=>$data->codcatval)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descat')); ?>:</b>
	<?php echo CHtml::encode($data->descat); ?>
	<br />


</div>