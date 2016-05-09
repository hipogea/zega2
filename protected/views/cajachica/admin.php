<?php
/* @var $this CajachicaController */
/* @var $model Cajachica */

$this->breadcrumbs=array(
	'Cajachicas'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Cajachica', 'url'=>array('index')),
	array('label'=>'Aperturar Caja', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cajachica-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Caja Menor</h1>



<?php echo CHtml::link('Filtrar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cajachica-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',
	'columns'=>array(
		//'id',
		'fondo.desfondo',
		'descripcion',
		'fechaini',
		'fechafin',
		'fondo.codcen',
		'trabajadores.ap',

		/*
		'iduser',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog3',
	'options'=>array(
		'title'=>'Item',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>800,
		'height'=>500,
		'show'=>'Transform',
	),
));
?>
<iframe id="cru-frame3" frameborder="0"  width="100%" height="100%" ></iframe>
<?php
$this->endWidget();	//--------------------- end new code --------------------------
?>
