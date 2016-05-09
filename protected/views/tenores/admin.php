
<h1>Tenores de Documentos</h1>
<?php
$this->menu=array(

	array('label'=>'Crear Tenor', 'url'=>array('create')),
);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tenores-grid',
	'dataProvider'=>$model->search(),
	'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_celeste.css',
	'filter'=>$model,
	'columns'=>array(
		array('name'=>'activo','type'=>'raw','value'=>'CHtml::checkBox("hu",($data->activo=="1"),array("disabled"=>"disabled"))'),

		array('name'=>'coddocu',
			'type'=>'raw',
			'value'=>'$data->coddocu',
			'filter'=>CHtml::listData(Documentos::model()->findAll(),'coddocu','desdocu'  ),
			'htmlOptions'=>array('width'=>300),

		),

		'mensaje',
		'sociedad',
		'posicion',


		/*
		'creadopor',
		'activo',
		'logo',
		'id',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
		),
	),
)); ?>
