<?php
/* @var $this IgvController */
/* @var $data Igv */
?>

<div class="view">

	

	<b> <?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
	<?php echo CHtml::encode($data->valor); ?>
	<br />


    <b>
	<?php 
	 echo CHtml::encode($data->getAttributeLabel('Descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->Descripcion); ?>
	<br />

	 ?>

</div>