<?php
/* @var $this AlmacenesController */
/* @var $model Almacenes */

$this->breadcrumbs=array(
	'Almacenes'=>array('index'),
	'Manage',
);

$this->menu=array(

	array('label'=>'Ver docs', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#almacenes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $prove=$model->search();?>


<h1><?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."chart_bar.png");?> Almacenes</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'almacenes-grid',
	'dataProvider'=>$proveedor,
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'codcen',
		array('name'=>'codalm','type'=>'raw','value'=>'CHtml::link($data["codalm"],Yii::app()->createUrl("Almacenes/detalle",array("codalmacen"=>$data[\'codalm\'],"codcentro"=>$data[\'codcen\'])))'),
		//array('name'=>'codalm','value'=>'CHTml::link($data["codalm"],)'),
		'nomal',
		//'stock_cantlibre',
		//'stock_cantres',
		//'stock_canttran',
		//'stock_total',
		array('name'=>'Libre','value'=>'MiFactoria::decimal($data["stock_cantlibre"])','footer'=>Chtml::openTag("span", array("class"=>"label label-info")).MiFactoria::decimal($stocktotales['stock_cantlibre'],2).CHTml::CloseTag("span")),
		array('name'=>'Reservado','value'=>'MiFactoria::decimal($data["stock_cantres"])','footer'=>Chtml::openTag("span", array("class"=>"label label-info")).MiFactoria::decimal($stocktotales['stock_cantres'],2).CHTml::CloseTag("span")),
		array('name'=>'Transito','value'=>'MiFactoria::decimal($data["stock_canttran"])','footer'=>Chtml::openTag("span", array("class"=>"label label-info")).MiFactoria::decimal($stocktotales['stock_canttran'],2).CHTml::CloseTag("span")),
		array('name'=>'Total','value'=>'MiFactoria::decimal($data["stock_total"])','footer'=>Chtml::openTag("span", array("class"=>"label label-info")).MiFactoria::decimal($stocktotales['stock_total'],2).CHTml::CloseTag("span")),

	),
)); ?>
