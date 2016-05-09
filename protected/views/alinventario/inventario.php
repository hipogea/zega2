<?php
/* @var $this AlinventarioController */
/* @var $model Alinventario */

$this->breadcrumbs=array(
	'Alinventarios'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Alinventario', 'url'=>array('index')),
	array('label'=>'Create Alinventario', 'url'=>array('create')),
);


?>

<h1>Inventario</h1>
<?php  ?>






<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'alinventario-grid',
	        'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'dataProvider'=>$proveedor,
	//'filter'=>$model,
	'columns'=>array(
		//'codart',
		array('name'=>'codart','type'=>'raw','value'=>'CHtml::link($data->codart,Yii::app()->createurl(\'/alinventario/update\', array(\'id\'=> $data->id ) ) )'),
		'um',
		array('name'=>'codart','type'=>'raw','value'=>'CHtml::image("/recurso/materiales/".$data->codart.".JPG","HOLA",array("height"=>60,"width"=>"60"))'),
		'cantlibre',
		'descripcion',
		//'punit',
		array('name'=>'punit','value'=>'$data->punit'),
			array('name'=>'ptlibre','value'=>'$data->ptlibre'),
															
		'cantres',
		'codmon',
		'codalm',
		'codcen',
		//'creadopor',
		
		
		
	),
)); ?>
