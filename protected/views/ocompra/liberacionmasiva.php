<?php
/* @var $this CotiController */
/* @var $model Coti */

$this->breadcrumbs=array(
	'Cotis'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listado Oc', 'url'=>array('admin')),
	array('label'=>'Crear Oc', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#coti-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Liberacion Masiva de compras</h1>



<?php echo CHtml::link('Buscar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_searchliberacion',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'coti-grid',
	'dataProvider'=>$model->search(),
	'summaryText'=>'',
	//'filter'=>$model,
	'columns'=>array(
		'numcot',
		'despro',
		'fecdoc',
		'texto',
		//'descuento' ,
			//'simbolo' ,
			//'subtotal',
			//'destotal',
			//'subtotaldes' ,
			//'impuesto',
		 array('name'=>'subtotal','header'=>'Subtotal','type'=>'raw', 'value'=>'CHtml::link("".$data->subtotal."","#",array(\'onclick\'=>\'$("#cru-frame2").attr("src","\'.Yii::app()->createurl(\'/ocompra/verdetalle\', array(\'id\'=> $data->idguia,\'asDialog\'=>1,\'gridId\'=> $this->grid->id ) ).\'"); $("#cru-dialog2").dialog("open"); return false;\',))'),
		
			'total',
		//	array('name'=>'total','header'=>'total','type'=>'raw', 'value'=>'CHtml::link("".$data->total."","#",array(\'onclick\'=>\'$("#cru-frame2").attr("src","\'.Yii::app()->createurl(\'/ocompra/verdetalle\', array(\'id\'=> $data->idguia,\'asDialog\'=>1,\'gridId\'=> $this->grid->id ) ).\'"); $("#cru-dialog2").dialog("open"); return false;\',))'),
		
		//ARRAY('name'=>'tipoimputacion','header'=>'.','value'=>'$data->tipoimputacion'),
		//'codart',
		//'cant',
		//'um',
		//'descri',
		//ARRAY('name'=>'simbolo','header'=>'.','value'=>'$data->simbolo'),
		//'punit',
		//'subto',
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
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}{aprobar}',
			'buttons'=>array(
				    		 
               'update'=>
                            array(
                                   'visible'=>'false',

                                    
                                ),
				'delete'=>
                            array(
                                    'visible'=>'false',

									
                                ),
				    



					'aprobar'=>
                             array(
                                    'url'=>'$this->grid->controller->createUrl("/ocompra/Aprobaroc",
																					array("id"=>$data->idguia,																					      
																						
																								
																							)
																				)',
							 'options' => array( 'ajax' => array('type' => 'get', 'url'=>'js:$(this).attr("href")', 'success' => 'js:function(data) { $.fn.yiiGridView.update("coti-grid")}')) ,        
						    'imageUrl'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].'check.png', 
								'label'=>'Aprobar', 
                                ),	
							
				),
		),
	),
)); ?>


<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog2',
    'options'=>array(
        'title'=>'Detalle de Items',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>300,
    ),
    ));
?>
<iframe id="cru-frame2" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>