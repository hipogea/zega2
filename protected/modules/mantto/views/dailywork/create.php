<br><br><br>
<?php
/* @var $this DailyworkController */
/* @var $model Dailywork */

$this->breadcrumbs=array(
	'Dailyworks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dailywork', 'url'=>array('index')),
	array('label'=>'Manage Dailywork', 'url'=>array('admin')),
);
?>

<h1>Create Dailywork</h1>

<?php $this->renderPartial('_form', array('siguiente'=>null,'anterior'=>null,'model'=>$model,'criterio'=>$criterio)); ?>