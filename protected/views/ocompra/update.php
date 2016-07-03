<?php
/* @var $this CotiController */
/* @var $model Coti */

$this->breadcrumbs=array(
	'Cotis'=>array('index'),
	$model->idguia=>array('view','id'=>$model->idguia),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Coti', 'url'=>array('index')),
	//array('label'=>'Create Coti', 'url'=>array('create')),
	array('label'=>'Visualizar Oc', 'url'=>array('view', 'id'=>$model->idguia)),
	//array('label'=>'Manage Coti', 'url'=>array('admin')),
		//array('label'=>'List Coti', 'url'=>array('index')),
	array('label'=>'Crear Oc', 'url'=>array('creadocumento')),
	array('label'=>'Opciones Oc', 'url'=>array('configuraop')),
	//array('label'=>'Actualizar Oc', 'url'=>array('update', 'id'=>$model->idguia)),
	//array('label'=>'Delete Coti', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idguia),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Listado Oc', 'url'=>array('admin')),
	array('label'=>'Imprimir', 'url'=>array('imprimir', 'id'=>$model->idguia)),
);
?>




<?php echo $this->renderPartial('_form1', array('model'=>$model,'editable'=>$editable)); ?>

