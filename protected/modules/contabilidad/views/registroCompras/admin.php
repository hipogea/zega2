<?php


$this->menu=array(
	//array('label'=>'Liberacion masiva', 'url'=>array('libmasiva')),
	array('label'=>'Nuevo Reg Material', 'url'=>array('Crear')),
        array('label'=>'Nuevo Reg Servicio', 'url'=>array('Creaservicio')),
	array('label'=>'Valores por defecto', 'url'=>$this->createUrl('/Opcionescamposdocu/configurausuario',array('docu'=>$model->documento))),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#grid1').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php MiFactoria::titulo('Administrar Registro de Compras','basket1');?>






<div class="search-form" >
	<div class="division">
<?php $this->renderPartial('_search',array('model'=>$model)); ?>
</div><!-- search-form -->
</DIV>


<?PHP
 $this->widget('ext.groupgridview.GroupGridView', array(
      'id' => 'grid1',
      'dataProvider'=>$model->search(),
      'mergeColumns' => array('femision','tipo'),
	 'itemsCssClass'=>'table table-striped table-bordered table-hover',
	/* 'extraRowColumns' => array('numcot'),
	 'extraRowTotals' => function($data, $row, &$totals) {
		 if(!isset($totals['sum_totalneto'])) $totals['sum_totalneto'] = 0;
		 $totals['sum_totalneto']+=$data['totalneto'];

	 },
	 'extraRowExpression' => '"<span style=\"font-weight: bold;color: orangered;font-size:13px;\"> Total Oc : ".MiFactoria::decimal($totals["sum_totalneto"],2)." </span>"',
	 'extraRowPos'=>'below',*/
     
 /* @property string $codaduana
 * @property string $annodua
 * @property string $numerocomprobante
 * @property string $tipodocid
 * @property string $numerodocid
 * @property string $razpronombre
 * @property double $expobaseimpgrav
 * @property double $expigvgrav
 * @property double $expbaseimpnograv
 * @property double $expigvnograv
 * @property double $baseimpnograv
 * @property double $igvnograv
 * @property double $isc
 * @property double $otrostributos
 * @property double $importetotal
 * @property string $numerodocnodomiciliado
 * @property string $numconstdetraccion
 * @property string $fechaemidetra
 * @property double $tipocambio
 * @property string $reffechaorigen
 * @property string $reftipo
 * @property string $refserie
 * @property string $refnumero
 * @property string $fechacre
 * @property string $socio
 * @property integer $hidperiodo*/
     
     
      'columns' => array(
                       ARRAY('name'=>'id','header'=>'Id','type'=>'raw','value'=>'$data->id','htmlOptions'=>array('width'=>'5')),
		 
		  //ARRAY('name'=>'femision','header'=>'F. emi','type'=>'raw','value'=>'CHTml::link($data->numcot,Yii::app()->createurl("ocompra/editadocumento", array("id"=> $data->idguia )) ,ARRAY("target"=>"_blank"))'),
		 //ARRAY('name'=>'numcot','header'=>'Numero','type'=>'raw','value'=>'CHTml::link(CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."find.png"),Yii::app()->createurl("ocompra/verdocumento", array("id"=> $data->idguia)) ,array("target"=>"_blank") )','htmlOptions'=>array('width'=>'10')),
                  ARRAY('name'=>'femision','header'=>'F. emi','type'=>'raw','value'=>'$data->femision','htmlOptions'=>array('width'=>'15')),
		 //ARRAY('name'=>'fvencimiento','header'=>'F. emi','type'=>'raw','value'=>'date("d.m.y", strtotime($data->fvencimiento))','htmlOptions'=>array('width'=>'15')),
		 ARRAY('name'=>'tipo','header'=>'Tipo','type'=>'raw','value'=>'$data->tipo','htmlOptions'=>array('width'=>'5')),
		  ARRAY('name'=>'numerocomprobante','header'=>'Num','type'=>'raw','value'=>'$data->numerocomprobante','htmlOptions'=>array('width'=>'40')),
		// ARRAY('name'=>'numerocomprobante','header'=>'Num','type'=>'raw','value'=>'$data->numerocomprobante','htmlOptions'=>array('width'=>'40')),
		ARRAY('name'=>'tipo','header'=>'Tipo Doc','type'=>'raw','value'=>'$data->valorsunat($data->tipo,"010")','htmlOptions'=>array('width'=>'40')),
		ARRAY('name'=>'Nombre','header'=>'Razon Soc/Nombre','type'=>'raw','value'=>'$data->razpronombre','htmlOptions'=>array('width'=>'200')),
		ARRAY('name'=>'expobaseimpgrav','header'=>'Base A','type'=>'raw','value'=>'$data->razpronombre','htmlOptions'=>array('width'=>'200')),
		
          
          /*
		  array(
			  'name'=>'fechanominal',
			  'header'=>'Fec',
			  'value'=>'date("d.m.y", strtotime($data->fechanominal))','htmlOptions'=>array('width'=>'50')
		  ),
		  array('name'=>'despro','value'=>'$data->despro','htmlOptions'=>array('width'=>'40')),
        array('name'=>'codart','value'=>'($data->codart==yii::app()->settings->get("materiales","materiales_codigoservicio"))?"":$data->codart'),
        'cant',
		  array('name'=>'desum','value'=>'$data->desum','htmlOptions'=>array('width'=>10)),
        'descri',
		  array('name'=>'numsolpe','value'=>'$data->numsolpe','htmlOptions'=>array('width'=>10)),
		  ARRAY('name'=>'entregado','type'=>'html','header'=>'Entr.','value'=>'($data->entregado>0)?round($data->entregado,3).CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."Cast.png"):""','htmlOptions'=>array("width"=>25)),
        ARRAY('name'=>'simbolo','header'=>'.','value'=>'$data->simbolo'),
		  ARRAY('name'=>'punit','header'=>'P.unit','value'=>'MiFactoria::decimal($data->punit,2)'),
		  ARRAY('name'=>'subto','header'=>'Subtotal','value'=>'MiFactoria::decimal($data->subto,2)'),
		  ARRAY('name'=>'descontado','header'=>'Dcto','value'=>'MiFactoria::decimal($data->descontado,2)'),
		  ARRAY('name'=>'totalneto','header'=>'Neto','value'=>'MiFactoria::decimal($data->totalneto,2)'),
		    */ 
          array(
			'class'=>'CButtonColumn',
		)
          ),
    ));

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
		
	/*),
)); */ ?>