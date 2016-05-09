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
);
?>

<div> 
   <div style="float: left; width:400px;">
		<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(		
		//'codigo',
		//	'tipo',
		'codigosap',
		'codigoaf',
		'descripcion',
		'marca',
		'modelo',
		'serie',
		'barcoactual.nomep',
		'comentario',
		'fecha',
		'documento.desdocu',		
		'lugares.deslugar',
		
		'posicion',
		'codigopadre',
		'numerodocumento',
		'adicional',
		//'codigoafant',		
	),
)); ?>
   </div>
		<div style="float: left; clear:right; width:400px;">
				<?php 
					Yii::app()->clientScript->registerScript('cambiaim',"function cambiar(nombreimagen) { var i=1;if (i == 1){ document.images['gatito'].src=nombreimagen; i=2;} } ");
							echo CHtml::image($ruta.$fotos[0],'yu',array('id'=>'gatito','border'=>0,'width'=>400,'height'=>300));
								$i=1;
								foreach ($fotos as $valor) {		     
									echo CHtml::link(" << Imagen ".$i." >> ","#",array('onmouseover'=>"document.images['gatito'].src='".$ruta.$valor."';"));
									$i=$i+1;
								}
								?>  
   </div>
   
			
 </div>
 <div>  
 
</div>
