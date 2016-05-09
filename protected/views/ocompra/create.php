<?php
/* @var $this CotiController */
/* @var $model Coti */

$this->breadcrumbs=array(
	'Cotis'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Coti', 'url'=>array('index')),
	//array('label'=>'Create Coti', 'url'=>array('create')),
	//array('label'=>'Visualizar Oc', 'url'=>array('view', 'id'=>$model->idguia)),
	array('label'=>'Opciones Oc', 'url'=>array('configuraop')),
	array('label'=>'Listado Oc', 'url'=>array('admin')),
	//array('label'=>'Imprimir', 'url'=>array('imprimir', 'id'=>$model->idguia)),
);

?>

<?php echo $this->renderPartial('_form1', array('model'=>$model,'editable'=>true)); ?>