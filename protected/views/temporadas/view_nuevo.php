 <?php
$this->menu=array(
	
//array('label'=>'Crear Temporada', 'url'=>array('create')),
	array('label'=>'Crear Parte', 'url'=>array('/reportepesca/crearparte','idtemporada'=>$model->id)),
	array('label'=>'Modificar temporada', 'url'=>array('update', 'id'=>$model->id)),
    array('label'=>'Ver temporadas', 'url'=>array('temporadas/admin'),
	array('label'=>'Crear Parte', 'url'=>array('/reportepesca/crearparte','idtemporada'=>$model->id)),
	//array('label'=>'Ver temporadas', 'url'=>array('admin')),
));
?>
 
 
 <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
	 //	'id',
		'destemporada',
		'inicio',
		'termino',
		'cuota_anchoveta',
		'cuota_global_anchoveta',
		//'eficienciabodega',
	       ),
        )); ?>	