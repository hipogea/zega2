<?php
/* @var $this PlantasController */
/* @var $model Plantas */

$this->menu=array(
   //array('label'=>'List Plantas', 'url'=>array('index')),
	//array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Actualizar', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Plantas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Listado', 'url'=>array('admin')),
	//array('label'=>'List Plantas', 'url'=>array('index')),
	//array('label'=>'Manage Plantas', 'url'=>array('admin')),
);
?>

<h1>Crear una Planta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>