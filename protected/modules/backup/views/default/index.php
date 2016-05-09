<?php
$this->breadcrumbs=array(
	'Manage'=>array('index'),
);?>

<h1><?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'Backup.png');  ?> Administrar Backup Base de datos</h1>


<div class="division">
<?php $this->renderPartial('_list', array(
		'dataProvider'=>$dataProvider,
));
?>

</div>
