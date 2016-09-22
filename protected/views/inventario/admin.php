<?php
/* @var $this InventarioController */
/* @var $model Inventario */

$this->breadcrumbs=array(
	'Inventarios'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Inventario', 'url'=>array('index')),
	array('label'=>'Crear Activo', 'url'=>array('create')),
	array('label'=>'Observaciones ', 'url'=>array('observaciones')),
	array('label'=>'Confirmar movimientos', 'url'=>array('/vwloginventari')),
	array('label'=>'Inventario Fisico', 'url'=>array('/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('inventario-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="division">
<?php echo CHtml::link('Busqueda ','#',array('class'=>'search-button')); ?>
<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php /*$this->beginWidget('application.extensions.thumbnailer.Thumbnailer', array(
 
        'thumbsDir' => 'assets/thumbs',
        'thumbWidth' => 100,
        'thumbHeight' => 90, // Optional
    )
); */?>
 <div id="mina"></div>
 
 <?php $provedo=$model->search();
/* print_r($provedo->getKeys());
 yii::app()->end();*/
  $rutaimagenesx=Yii::getPathOfAlias('webroot.fotosinv').DIRECTORY_SEPARATOR;
  $baserutacorta=substr($rutaimagenesx,strpos($rutaimagenesx,yii::app()->baseUrl));



				$_SESSION['sesion_Inventario_busqueda']=$provedo->getKeys();	
	
 ?>

 
<?php $gridWidget=$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'inventario-grid',
	//'filter'=>$model,
	'dataProvider'=>$provedo,
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
	  //'idinventario',
	    //array('name'=>'idinventario','visible'=>false),
		/*array('name'=>'.','header'=>'.','type'=>'raw','value'=>'CHTml::ajaxlink(
		                                             CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."seleccionar.png",$data->idinventario,array("width"=>15,"height"=>15,"id"=>$data->idinventario,"onClick"=>"document.getElementById({$data->idinventario}).src=\'".Yii::app()->getTheme()->baseUrl.Yii::app()->params[\'rutatemaimagenes\']."ok.png\'")),
													 Yii::app()->createUrl("Inventario/seleccionaactivo",array("idinventario"=>$data->idinventario)),
													  array(
															
															"type"      => "GET",
														     "data"      => array("cguito"=>$data->idinventario),
																)
																	)'						
			 ),*/
		
		/*array('name'=>'.','header'=>'.','type'=>'raw','value'=>'CHTml::ajaxlink(
		                                              "selecc",
													Yii::app()->createUrl("Inventario/seleccionaactivo",array("idinventario"=>$data->idinventario)),
													  array(
															
															"type"      => "GET",
														     "data"      => array("codiguito"=>$data->idinventario),
																)
																	)'						
			 ),*/
		/* array('name'=>'.','header'=>'.','type'=>'raw','value'=>'CHTml::ajaxbutton(
		                                             "escoger",
													 Yii::app()->createUrl("Inventario/seleccionaactivo",array("idinventario"=>$data->idinventario)),
													  array(
															
															"type"      => "POST",
														     "data"      => array("codiguito"=>$data->idinventario),
																)
																	)'						
			 ),*/
		//array('name'=>'barcooriginal','header'=>'Origen',
		array('name'=>'barcoactual.nomep','header'=>'Actual','value'=>'$data->barcoactual->nomep'),
		array('name'=>'.','header'=>'.','type'=>'raw','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."estado".$data->codestado.".png","",array("width"=>15,"height"=>15))'),
		array('name'=>'codigosap','header'=>'C. Sap','type'=>'raw','value'=>'CHtml::link($data->codigosap,array("inventario/detalle","id"=>$data->idinventario),array("onClick"=>"Loading.show(); return true;"))'), 
		 array(
            'name'=>'imagen',
            'type'=>'raw',
          'value'=>'(file_exists(Yii::getPathOfAlias(\'webroot.fotosinv\').DIRECTORY_SEPARATOR.$data->codpropietario.DIRECTORY_SEPARATOR.trim($data->idinventario).\'.JPG\'))?
						CHtml::image(Yii::app()->baseUrl.DIRECTORY_SEPARATOR.\'fotosinv\'.DIRECTORY_SEPARATOR.$data->codpropietario.DIRECTORY_SEPARATOR.trim($data->idinventario).\'.JPG\',$data->codigosap,array(\'width\'=>110,\'height\'=>100)):
						"--"'
		           ),
		array('name'=>'codigoaf','header'=>'Plaquita','type'=>'raw','value'=>'CHtml::link($data->codigoaf,array("inventario/update","id"=>$data->idinventario),array("onClick"=>"Loading.show(); return true;"))'), 
		
		array('name'=>'descripcion','header'=>'Descripcion del activo','value'=>'$data->descripcion'),
		/*'marca',
		'modelo',
		'serie',*/
		array('name'=>'.','header'=>'.','type'=>'raw','value'=>'(!$data->rocoto=="1")?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."ancla.png","",array("width"=>15,"height"=>15)):CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."truck.png","",array("width"=>15,"height"=>15))','htmlOptions'=>array('width'=>'50')),
		array('name'=>'lugares_lugar','header'=>'Lugar','value'=>'$data->lugares->deslugar'),
		//'documentox.desdocu',
		array('name'=>'fecha','value'=>'date("d/m/Y",strtotime($data->fecha))'),
		'numerodocumento',
		
		
	),
)); 
?>
<?php //$this->endWidget(); ?>

<?php
//Capture your CGridView widget on a variable
//$gridWidget=$this->widget('bootstrap.widgets.TbGridView', array( . . .
$this->renderExportGridButton($gridWidget,'Exportar resultados',array('class'=>'btn btn-info pull-right'));
 ?>
 
 <div style="float:left; width=200px height=200px ; border 1px #000 solid;">
							<?php $gridWidget=$this->widget('zii.widgets.grid.CGridView', array(
							'id'=>'estados-grid',
							'summaryText'=>'',
								//'filter'=>$model,
							'dataProvider'=>Estado::model()->search_por_docu('390'),
							'cssFile' => '/motoristas/css/grid/grilla_natanja.css', 
							'columns'=>array(
							array('name'=>'estado'),
	   
								array('name'=>'.','header'=>'.','type'=>'raw','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."estado".$data->codestado.".png","",array("width"=>15,"height"=>15))'),
			
									),
								)); 
								?>
					
				</div>	
 </div>

