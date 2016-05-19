<?php


$this->menu=array(

	array('label'=>'Ver docs', 'url'=>array('admin')),
);
?>
<?php $prove=VwStockPorTipos::model()->search_por_almacen($model->codalm,$model->codcen);?>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'almacenes-grid',
	'dataProvider'=>$prove,
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'codcen',
		'codtipo',
		'destipo',
		'codmon',
		array('name'=>'stocklibre','value'=>'MiFactoria::decimal($data->stocklibre)','footer'=>Chtml::openTag("span", array("class"=>"label label-info")).MiFactoria::decimal(VwStockPorTipos::getTotal($prove)["libre"],2).CHTml::CloseTag("span")),
		//array('name'=>'despro','type'=>'raw','value'=>'CHTml::OpenTag("span",array("style"=>"color:#6B1A80;font-weight:bold;")).$data->despro.CHTml::CloseTag("span")'),
		array('name'=>'stockreservado','value'=>'MiFactoria::decimal($data->stockreservado)','footer'=>Chtml::openTag("span", array("class"=>"label label-info")).MiFactoria::decimal(VwStockPorTipos::getTotal($prove)["reservado"],2).CHTml::CloseTag("span")),
		array('name'=>'stocktransito','value'=>'MiFactoria::decimal($data->stocktransito)','footer'=>Chtml::openTag("span", array("class"=>"label label-info")).MiFactoria::decimal(VwStockPorTipos::getTotal($prove)["transito"],2).CHTml::CloseTag("span")),

		/*
		'creadoel',
		'modificadopor',
		'modificadoel',
		'codsoc',
		'tipovaloracion',
		'estructura',
		'id',
		*/

	),
)); ?>
