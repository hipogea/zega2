<?php
/* @var $this CotiController */
/* @var $model Coti */

$this->breadcrumbs=array(
	'Cotis'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listado  Guia', 'url'=>array('admin')),
	array('label'=>'Crear Guia', 'url'=>array('create')),
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

<h1>Liberacion Masiva de Transporte</h1>



<?php echo CHtml::link('Buscar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_searchliberacion',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'coti-grid',
	'dataProvider'=>$model->search_(),
	'summaryText'=>'',
	//'filter'=>$model,
	'columns'=>array(
		'cod_cen',
		'ptopartida',
		'ptollegada',
		'd_fectra',
		'c_texto',
		'c_serie',
		'c_numgui',
		'razondestinatario',
		'items',
		 array('name'=>'subtotal','header'=>'Numero','type'=>'raw', 'value'=>'CHtml::link("".$data->c_numgui."","#",array(\'onclick\'=>\'$("#cru-frame2").attr("src","\'.Yii::app()->createurl(\'/guia/verdetalle\', array(\'id\'=> $data->n_guia,\'asDialog\'=>1,\'gridId\'=> $this->grid->id ) ).\'"); $("#cru-dialog2").dialog("open"); return false;\',))'),
		
			
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
																					array("id"=>$data->id,																					      
																						
																								
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