<?php
/* @var $this InventarioController */
/* @var $data Inventario */
?>

<div class="view">

	
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codigoaf',
		'codigosap',
		'descripcion',
		'marca',
		'modelo',
		'serie',		
	),
)); ?>

</div>