<?php
/* @var $this ObservacionesController */
/* @var $model Observaciones */

$this->breadcrumbs=array(
	'Observaciones'=>array('index'),
	'Manage',
);

?>

<h1><?php
	ECHO CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."camion.png",'',ARRAY('width'=>25,'height'=>25));?> <span class="label badge-warning">Observaciones efectuadas</span></h1>



<?PHP
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('observaciones-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php echo CHtml::link('Busqueda ','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->









<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'observaciones-grid',
	//'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'grid_pequeno.css',  // your version of css file
	'cssFile' => ''.Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',  // your version of css file

	'dataProvider'=>$model->search(),	
	//'filter'=>$model,
	'columns'=>array(
		'usuario',
		//array('name'=>'inventario_codigoaf','header'=>'Plaquita','value'=>'$data->inventario->codigoaf'),
		array('name'=>'codigoaf','header'=>'C. Sap','type'=>'raw','value'=>'CHtml::link($data->codigoaf,array("inventario/detalle","id"=>$data->idinventario))'),
		array('name'=>'codigosap','header'=>'C. Sap','type'=>'raw','value'=>'CHtml::link($data->codigosap,array("inventario/detalle","id"=>$data->idinventario))'),		
		//'inventario.descripcion',
		array(
			'name'=>'imagen',
			'type'=>'raw',
			'value'=>'(file_exists(Yii::getPathOfAlias(\'webroot.fotosinv\').DIRECTORY_SEPARATOR.$data->codpropietario.DIRECTORY_SEPARATOR.trim($data->idinventario).\'.JPG\'))?
						CHtml::image(Yii::app()->baseUrl.DIRECTORY_SEPARATOR.\'fotosinv\'.DIRECTORY_SEPARATOR.$data->codpropietario.DIRECTORY_SEPARATOR.trim($data->idinventario).\'.JPG\',$data->codigosap,array(\'width\'=>60,\'height\'=>50)):
						"--"'
		),
		array('name'=>'descripcion','header'=>'Descripcion','value'=>'$data->descripcion'),
		//'inventario.barcoactual.nomep',
		//'inventario.documento.desdocu',
		'codcentro',
		array('name'=>'fecha','header'=>'Fecha','value'=>'date("d/m/Y",strtotime($data->fecha))'),
		'descri',
		'mobs',		
		'id',
		'hidinventario',
		array('name'=>'estado','header'=>'Estado','value'=>'$data->estado'),
		
			),
)); ?>
