<?php


$this->menu=array(
	//array('label'=>'Liberacion masiva', 'url'=>array('libmasiva')),
	array('label'=>'Crear Parametro', 'url'=>array('Create')),
	//array('label'=>'Valores por defecto', 'url'=>$this->createUrl('Opcionescamposdocu/configurausuario',array('docu'=>$this->documento,'docuhijo'=>$this->documentohijo))),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#grid-sunatmaster').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php MiFactoria::titulo('Administrar Parametros Sunat','basket1');?>






<div class="search-form" >
	<div class="division">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
</DIV>


<?PHP
 $this->widget('ext.groupgridview.GroupGridView', array(
      'id' => 'grid-sunatmaster',
      'dataProvider'=>$model->search(),
      'mergeColumns' => array('codsunat'),
	 'itemsCssClass'=>'table table-striped table-bordered table-hover',
	 //'extraRowColumns' => array('numcot'),
/* 'extraRowTotals' => function($data, $row, &$totals) {
		 if(!isset($totals['sum_totalneto'])) $totals['sum_totalneto'] = 0;
		 $totals['sum_totalneto']+=$data['totalneto'];

	 },*/
	// 'extraRowExpression' => '"<span style=\"font-weight: bold;color: orangered;font-size:13px;\"> Total Oc : ".MiFactoria::decimal($totals["sum_totalneto"],2)." </span>"',
	 //'extraRowPos'=>'below',
      'columns' => array(
		  ARRAY('name'=>'codsunat','header'=>'Tabla','type'=>'raw','value'=>'$data->codsunat'),
                ARRAY('name'=>'codigo','header'=>'Codigo','type'=>'raw','value'=>'$data->codigo'),
		 ARRAY('name'=>'descorta','header'=>'Descripcion','type'=>'raw','value'=>'$data->descorta','htmlOptions'=>array('width'=>'600')),
                ARRAY('name'=>'descripcion','header'=>'Texto','type'=>'raw','value'=>'$data->descripcion','htmlOptions'=>array('width'=>'400')),
array(
			'class'=>'CButtonColumn',
		),
		
                        )
     )
         );

?>

<?php /*$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'coti-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		ARRAY('name'=>'numcot','header'=>'OC','type'=>'raw','value'=>'CHtml::link($data->numcot,array("ocompra/update/".$data->idguia))'),
		'despro',
		'fecdoc',
		'texto',
		ARRAY('name'=>'tipoimputacion','header'=>'.','value'=>'$data->tipoimputacion'),
		'codart',
		'cant',
		'um',
		'descri',
		ARRAY('name'=>'simbolo','header'=>'.','value'=>'$data->simbolo'),
		'punit',
		'subto',
        //'docompra_estado.estadeedeo',
		//'codestado',
		//'texto',s
		/*
		'textolargo',
		'tipologia',
		'moneda',
		'orcli',
		'descuento',
		'usuario',
		'coddocu',
		'creado',
		'modificado',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'codtipofac',
		'codsociedad',
		'codgrupoventas',
		'codtipocotizacion',
		'validez',
		'codcentro',
		'nigv',
		'codobjeto',
		'fechapresentacion',
		'fechanominal',
		'idguia',
		'tenorsup',
		'tenorinf',
		'montototal',
		*/
		/*array(
			'class'=>'CButtonColumn',
		),*/
	/*),
)); */ ?>