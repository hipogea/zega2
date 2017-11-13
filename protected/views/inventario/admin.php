<?php
/* @var $this InventarioController */
/* @var $model Inventario */

$this->breadcrumbs=array(
	'Inventarios'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Inventario', 'url'=>array('index')),
	array('label'=>'Crear Equipo', 'url'=>array('createBasic')),
	//array('label'=>'Observaciones ', 'url'=>array('observaciones')),
	//array('label'=>'Confirmar movimientos', 'url'=>array('/vwloginventari')),
	//array('label'=>'Inventario Fisico', 'url'=>array('/admin')),
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

<DIV STYLE="float:right;">
 <?php $provedo=$model->search();
/* print_r($provedo->getKeys());
 yii::app()->end();*/
  //$rutaimagenesx=Yii::getPathOfAlias('webroot.fotosinv').DIRECTORY_SEPARATOR;
  //$baserutacorta=substr($rutaimagenesx,strpos($rutaimagenesx,yii::app()->baseUrl));



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
		//array('name'=>'barcoactual.nomep','header'=>'Actual','value'=>'$data->barcoactual->nomep'),
		array('name'=>'.','header'=>'.','type'=>'raw','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."estado".$data->codestado.".png","",array("width"=>30,"height"=>30))'),
		//array('name'=>'codigosap','header'=>'C. Sap','type'=>'raw','value'=>'CHtml::link($data->codigosap,array("inventario/detalle","id"=>$data->idinventario),array("onClick"=>"Loading.show(); return true;"))'), 
		 array(
            'name'=>'imagen',
            'type'=>'html',
          'value'=>'(is_file($data->fotoprimera()["absoluto"]))?
						CHtml::image($data->fotoprimera()["relativo"],$data->codigosap,array(\'width\'=>120,\'height\'=>160)):
						"--"'
                     //'value'=>'$data->fotoprimera()["absoluto"]',
		           ),
		array('name'=>'codigoaf','header'=>'Cod','type'=>'raw','value'=>'CHtml::link($data->codigoaf,array("inventario/basicupdate","id"=>$data->idinventario),array("onClick"=>"Loading.show(); return true;"))'), 
		array('name'=>'idinventario','header'=>'Id','type'=>'raw','value'=>'CHtml::link($data->idinventario,array("inventario/basicupdate","id"=>$data->idinventario),array("onClick"=>"Loading.show(); return true;"))'), 
		
		array('name'=>'descripcion','header'=>'Descripcion','value'=>'$data->descripcion'),
		'marca',
		'modelo',
		'serie',
		//array('name'=>'.','header'=>'.','type'=>'raw','value'=>'(!$data->rocoto=="1")?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."ancla.png","",array("width"=>15,"height"=>15)):CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."truck.png","",array("width"=>25,"height"=>25))','htmlOptions'=>array('width'=>'30')),
		//array('name'=>'lugares_lugar','header'=>'Lugar','value'=>'$data->lugares->deslugar'),
            array('name'=>'imagen2','header'=>'Ubicac','value'=>'$data->lugares->empresa->despro'),
             array('name'=>'direcci','header'=>'Pto Dir','value'=>'$data->lugares->direcciones->c_direc'),
		array('name'=>'fecha','value'=>'date("d/m/Y",strtotime($data->fecha))'),
            // array('name'=>'numerodocumento','header'=>'N° Docum','value'=>'$data->numerodocumento'),
		
	),
)); 
?>
<?php //$this->endWidget(); ?>
</DIV>
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
							'itemsCssClass'=>'table table-striped table-bordered table-hover',
                                                            'columns'=>array(
							array('name'=>'estado'),
	   
								array('name'=>'.','header'=>'.','type'=>'raw','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."estado".$data->codestado.".png","",array("width"=>15,"height"=>15))'),
			
									),
								)); 
								?>
					
				</div>	
 </div>

