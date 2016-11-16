<?php
/* @var $this InventarioController */
/* @var $model Inventario */

$this->breadcrumbs=array(
	'Inventarios'=>array('index'),
	$model->idinventario,
);

$this->menu=array(
	
	array('label'=>'Crear Activo', 'url'=>array('create')),
	array('label'=>'Modificar', 'url'=>array('update', 'id'=>$model->idinventario)),
	//array('label'=>'Modificar', 'url'=>array('update', 'id'=>$model->idinventario)),
	array('label'=>'Subir fotos', 'url'=>array('Subearchivo', 'id'=>$model->idinventario)),
	//array('label'=>'Delete Inventario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idinventario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Ver activos', 'url'=>array('admin')),
	array('label'=>'Administrar este activo', 'url'=>array('updatetotal', 'id'=>$model->idinventario)),
	array('label'=>'Procesar', 'url'=>array('/controlactivos/create', 'id'=>$model->idinventario)),
);
?>
<div class="division">
<div  style="float: left; width:100%;"> 
   <div style="float: left; width:250px;">
   <?php 
    /* if(isset($_SESSION['sesion_Inventario_busqueda'])) {
		 $arreglo=$_SESSION['sesion_Inventario_busqueda'];
    $item_count =count($arreglo);
	$page_size =1;
	$pages =new CPagination($item_count);
	$pages->setPageSize($page_size);
	$end =($pages->offset+$pages->limit <= $item_count ? $pages->offset+$pages->limit : $item_count);
	$sample =range($pages->offset+1, $end);
	/*$this->renderpartial('basic_pager', array('item_count'=>$item_count,
	'page_size'=>$page_size,
	'items_count'=>$item_count,
	'pages'=>$pages,
	'sample'=>$sample,),true);*/
	
	/*$this->widget('CLinkPager', array('pages'=>$pages,));*/
	
	 /*}*/

 ?>
   
   
   
		<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'cssFile' =>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemadetalle'].'styles.css',
	'attributes'=>array(		
		//'codigo',
		//	'tipo',
		'barcoactual.nomep',
		'codigosap',
		'codigoaf',
		'descripcion',
		'marca',
		'modelo',
		'serie',		
		//'comentario',
		'fecha',
		//'documentox.desdocu',
		'lugares.deslugar',
				'posicion',
				'estado.estado',
		'codigopadre',
		'numerodocumento',
		'adicional',
		//'codigoafant',		
	),
)); ?>


   </div>
		<div style="float: left; clear:right; width:410;">
		
				<?php 
				    $rutaicono=Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'camara.png';
					Yii::app()->clientScript->registerScript('cambiaim',"function cambiarimg(nombreimagen) { 
									var i=1;
									if (i == 1){ 
									       document.images['gatito'].src=nombreimagen;
										   document.getElementById('fnsal').innerHTML='atecnio';
										   i=2;} 
										   } ");
				           $fotoprinc=(count($fotos)==0)?Yii::app()->params['imagenes'].'nodisponible.png':$fotos[0];
							   //$fotos[]=Yii::app()->params['imagenes'].'nodisponible.png';
							echo CHtml::image( $fotoprinc,'',array('id'=>'gatito','border'=>0,'width'=>400,'height'=>300))."<br>";
								
								/*$i=1;
								foreach ($fotos as $valor) {		     
									echo CHtml::image($rutaicono);
									echo CHtml::link("(".$i.")","#",array('onmouseover'=>"document.images['gatito'].src='".$ruta.$valor."';document.getElementById('fnsal').innerHTML='atecnio';"));
									//echo CHtml::link("(".$i.")","#",array('onmouseover'=>"cambiarimg('".$ruta.$valor."')"));
									
									$i=$i+1;
								}
								//echo CHtml::link("Administar fotos",array("/inventario/gestionafotos","fotos"=>$fotos));
								//ECHO CHtml::link("Administar fotos","#",array('onclick'=>'$("#cru-frame").attr("src",'.Yii::app()->createurl("/reportepesca/updatehoras", array("id"=> 23,"asDialog"=>1,"gridId"=> "HPOLA"   ) ).'); $("#cru-dialog").dialog("open"); return false;'));
													$createUrl = $this->createUrl('/inventario/gestionafotos',
																		array(										       
																				"fotos"=>$fotos,
																				"asDialog"=>1,
																				"gridId"=>'grt',												
																			)
																			);
																$mensaje="Para hacer esto debes de inicar sesion primero";
																echo CHtml::link(CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'tacho.png','',array('width'=>15, 'height'=>15)),'#',array('onclick'=>(!(Yii::app()->user->isGuest))?"$('#cru-frame4').attr('src','$createUrl'); $('#cru-dialog4').dialog('open');":"alert('$mensaje')"));
																
																//echo CHtml::link('Administar fotos',$createUrl);

								


										echo "<br>";
										*/
								?> 
								
<?php	
//print_r($fotos);
  $this->widget('ext.galeria.Galeria',array(
			'images'=>$fotos,
			'rutaimagenes'=>'',
	         'rutaborra'=>'Inventario/borrafoto',
			'idimagen'=>'gatito',//ID del a miagen para e intercambiar
	));
?>

<?php 
/*
$this->widget('ext.imagegallery1.ImageGallery1',array(
    'images'=>$misfotosgaleria,
    'action'=>array('/site/myaction4wsww'),  
    'modelId'=>'article12',     // $model->primarykey (as an example)
    'selectedImageId'=>'120',   // the ID for your image...any unique ID
    'onSuccess'=>'function(data){ 
					$("#mayor").attr("src","$misfotosgaleria[0]")

	}',
    'onError'=>'function(e){ alert(e);  }',
));
*/
//print_r($misfotosgaleria);
?>

<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog4',
    'options'=>array(
        'title'=>'Administrar fotografias',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>600,
    ),
    ));
?>
<iframe id="cru-frame4" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>

<!--
<iframe id="mayor" width="100%" height="100%"></iframe>
	!-->							
								
   </div>
  </div>  
			<div style="float: left; width:100%;">
			<?php 
	            $this->renderpartial('vw_detalles',array('model'=>$model,'modelolog'=>$modelolog,'canica'=>$model->idinventario,'proveedorlog'=>$proveedorlog,'proveedorobs'=>$proveedorobs));
				?>  
			</div>

 
</div>