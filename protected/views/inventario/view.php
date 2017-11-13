<?php
/* @var $this InventarioController */
/* @var $model Inventario */

$this->breadcrumbs=array(
	'Inventarios'=>array('index'),
	$model->idinventario,
);

$this->menu=array(
	
	array('label'=>'Crear Equipo', 'url'=>array('create')),
	array('label'=>'Modificar', 'url'=>array('basicupdate', 'id'=>$model->idinventario)),
	//array('label'=>'Modificar', 'url'=>array('update', 'id'=>$model->idinventario)),
	//array('label'=>'Subir fotos', 'url'=>array('Subearchivo', 'id'=>$model->idinventario)),
	//array('label'=>'Delete Inventario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idinventario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Ver Equipos', 'url'=>array('admin')),
	//array('label'=>'Administrar este activo', 'url'=>array('updatetotal', 'id'=>$model->idinventario)),
	//array('label'=>'Procesar', 'url'=>array('/controlactivos/create', 'id'=>$model->idinventario)),
);
?>
<div class="division">
<div  style="float: left; width:100%;"> 
   <div style="float: left; width:30%;">
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
		//'documentos.desdocu',
		'lugares.deslugar',
				'posicion',
				'estado.estado',
		'codigopadre',
             //'documentos.desdocu',
		'numerodocumento',
           
		'adicional',
		//'codigoafant',		
	),
)); ?>


   </div>
		<div style="float: left; clear:right; width:60%;">
		
	
      <?php
      $comportamiento=new TomaFotosBehavior();
        $comportamiento->_codocu='390';
         $comportamiento->_ruta=yii::app()->settings->get('general','general_directorioimg');
         $comportamiento->_numerofotosporcarpeta=yii::app()->settings->get('general','general_nregistrosporcarpeta')+0;
          $comportamiento->_extensionatrabajar='jpg';
           $comportamiento->_id=$model->idinventario; 
           $model->attachbehavior('adjuntador',$comportamiento );  
      $this->widget(
    'application.components.booster.widgets.TbCarousel',
     $model->getCarrusel($model->idinventario,'390')
      );
      
      
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
	            $this->renderpartial('vw_detalles',
                            array('model'=>$model,
                                'modelolog'=>$modelolog,
                                'canica'=>$model->idinventario,
                                'proveedorlog'=>$proveedorlog,
                                'proveedorobs'=>$proveedorobs
                                )
                            );
				 ?>  
			</div>

 
</div>