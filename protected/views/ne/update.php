<?php
/* @var $this GuiaController */
/* @var $model Guia */


?>

<?php
$this->menu=array(
	//array('label'=>'List Embarcaciones', 'url'=>array('index')),
	array('label'=>'Nuevo ingreso', 'url'=>array('creadocumento')),
	array('label'=>'Imprimir', 'url'=>array('imprimir','id'=>$model->id)),
	//array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Embarcaciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codep),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Listado', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>