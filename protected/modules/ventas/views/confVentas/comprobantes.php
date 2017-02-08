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

<?php MiFactoria::titulo('Comprobantes a emitir','basket1');?>








<?PHP
 $this->widget('ext.groupgridview.GroupGridView', array(
      'id' => 'grid-comprobantes',
      'dataProvider'=>$model->search_por_comprobantes($this::CODIGO_TABLA_COMPROBANTES),
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
		//  ARRAY('name'=>'codsunat','header'=>'Tabla','type'=>'raw','value'=>'$data->codsunat'),
                ARRAY('name'=>'codigo','header'=>'Codigo','type'=>'raw','value'=>'$data->codigo'),
		 ARRAY('name'=>'descorta','header'=>'Descripcion','type'=>'raw','value'=>'$data->descorta','htmlOptions'=>array('width'=>'600')),
                ARRAY('name'=>'descripcion','header'=>'Texto','type'=>'raw','value'=>'$data->descripcion','htmlOptions'=>array('width'=>'400')),
                array(
                    'name'=>'seguir',
                   // 'filter'=>ARRAY('1'=>'Habilitado',''=>'deshabilitado'),
        'header'=>'Seguimiento',
        'type'=>'raw',
        'value'=>'CHtml::CheckBox("$data->seguir",
                                   $data->seguir,
                                   array(
                                    
                                        "style"=>"width:50px;"
                                        )
                                    )',
            'htmlOptions'=>array("width"=>"50px"),
    ),   
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{view}',
			'buttons'=>array(
                            
                            'view'=>  array(
	   'visible'=>'true',
	   'url'=>'$this->grid->controller->createUrl("TMoneda/activalog", array("id"=>$data->id))',
	   'options' => array( 'ajax' => array('type' => 'GET', 'success'=>'js:function() { $.fn.yiiGridView.update("tmoneda-grid");}' ,'url'=>'js:$(this).attr("href")'),
	   
	   ) ,'imageUrl'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."check16.png",
	   'label'=>'Activar log',
	   ),
                            
                            
                            
                            
                            'update'=>
				array(
					'url'=>'$this->grid->controller->createUrl("/TMoneda/actualizacambio/",
										    array("moneda1"=>$data->codmon1,"moneda2"=>$data->codmon2)
									    )',
					'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'coins.png',
					'label'=>'Reservar',
				),
			),

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