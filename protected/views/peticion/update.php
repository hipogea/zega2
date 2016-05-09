<?php
/* @var $this PeticionController */
/* @var $model Peticion */

$this->breadcrumbs=array(
	'Peticions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Peticion', 'url'=>array('index')),
	array('label'=>'Crear oferta', 'url'=>array('create')),
	//array('label'=>'View Peticion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Ofertas', 'url'=>array('admin')),
);
?>

<h1><?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'money.png');  ?>Actualizar Oferta <?php echo $modelotemporal->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>