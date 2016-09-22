<?php
/* @var $this GuiaController */
/* @var $model Guia */


?>

<?php

//construyendo el array de las opciones del menu en base al array de los eventos segun el estado actual del dccumento

$this->menu=array(
	//array('label'=>'List Embarcaciones', 'url'=>array('index')),
	array('label'=>'Nueva guia', 'url'=>array('creadocumento')),
	array('label'=>'Imprimir', 'url'=>array('imprimir','id'=>$model->id)),
	//array('label'=>'Editar', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Embarcaciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codep),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Listado', 'url'=>array('admin')),


);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>