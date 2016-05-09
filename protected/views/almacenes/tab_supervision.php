<?php


$this->menu=array(

	array('label'=>'Ver docs', 'url'=>array('admin')),
);
?>
<?php $prove=VwStockSupervision::model()->search_por_almacen($model->codalm,$model->codcen);?>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'supervision-grid',
	'dataProvider'=>$prove,
	//'filter'=>$model,
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		//'codart',
		array('name'=>'codart','type'=>'raw','value'=>'CHtml::link($data->codart,Yii::app()->CreateUrl("/alinventario/update",array("id"=>$data->idinventario)))'),
		'codcentro',
		'codal',
		'desum',
		'canteconomica',
		'cantreposic',
		'cantreorden',
		'descripcion',
		'cantres',
		'cantlibre',
		'canttran',
		'punit',
		array('name'=>'Reloj','type'=>'raw','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl."/img/reloj".$data->colorstatus().".png","")'),
	),
)); ?>
