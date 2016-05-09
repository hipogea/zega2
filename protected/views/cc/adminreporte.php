<?php
/* @var $this CcController */
/* @var $model Cc */

$this->breadcrumbs=array(
	'Ccs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listado', 'url'=>array('index')),
	array('label'=>'Crear centro de costo', 'url'=>array('create')),
);
?>


<div class="division">




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cc-grid',
	'dataProvider'=>$proveedor,
	//'filter'=>$model,
	'columns'=>array(
		//'idcc',
		'codc',
		//'cc',
		//'centro',
		'desceco',

		/*
		'modificadopor',
		'modificadoel',
		*/
		array('name'=>'monti','header'=>'Total','value'=>'Yii::app()->numberFormatter->format("#,##0.00",$data["monti"],null)','htmlOptions'=>array('width'=>145),),

	),
)); ?>


</div>