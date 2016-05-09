<?php
/* @var $this DocingresadosController */
/* @var $model Docingresados */


$this->menu=array(
	//array('label'=>'List Docingresados', 'url'=>array('index')),
	array('label'=>'Nuevo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('docingresados-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
    <span class="summary-icon2">
           <img src="<?php echo Yii::app()->theme->baseUrl ;?>/img/folder_page.png" width="25" height="25" alt="">
</span>

<h1>Ingreso de Documentos</h1>



<?php echo CHtml::link('Busqueda','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'docingresados-grid',
	'dataProvider'=>$model->search(),
	'cssFile' => ''.Yii::app()->getTheme()->baseUrl.'grid_pyy.css',  // your version of css file
	
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		
		'correlativo',
		'desdocu',
		'numero',
		'moneda',
		'monto',
		//'codprov',
		'despro',			
		'nomep',
		
		
		'fecha',
		'fechain',	
		'docref',	
		
		'responsable',
		'apoderado',
		'estado',
	
		/*
		'moneda',
		'descorta',
		'codepv',
		'monto',
		'codgrupo',
		'codresponsable',
		'creadopor',
		'creadoel',
		'texv',
		'docref',
		*/
		array(
			'class'=>'CButtonColumn',
			
			 'buttons'=>array(
			 
			  'view'=>
                            array(
                                   
								'visible'=>'false',
                                ),
						 
                        'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("/Docingresados/update",
																					array("id"=>$data->id,																					      
																							"asDialog"=>1,
																								"gridId"=>$this->grid->id
																							)
																				)',
                                    'click'=>(!(Yii::app()->user->isGuest))?'function(){ 
									                     $("#cru-frame1").attr("src",$(this).attr("href")); 
									                     $("#cru-dialog1").dialog("open");  
														 return false;
														 }':'function() {alert("Debes de inicar sesion primero")}',
								//'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'mas.png', 
								'label'=>'Modificar', 
                                ),
								'delete'=>
                            array(
                                   
								'visible'=>'false',
                            ),
			
				),
			),
))); ?>

<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog1',
    'options'=>array(
        'title'=>'Actualizar Ingreso',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>750,
        'height'=>510,
    ),
    ));
?>
<iframe id="cru-frame1" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>