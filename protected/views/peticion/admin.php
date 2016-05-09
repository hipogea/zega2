<?php
/* @var $this PeticionController */
/* @var $model Peticion */

$this->breadcrumbs=array(
	'Peticions'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Peticion', 'url'=>array('index')),
	array('label'=>'Crear oferta', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#peticion-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'money.png');  ?>Gestion de oferta</h1>


<?php echo CHtml::link('Filtro','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $gridWidget= $this->widget('ext.groupgridview.GroupGridView', array(
	'id'=>'peticion-grid',
	'dataProvider'=>$model->search(),
	//'mergeColumns' => array('numsolpe','centro','codal','imputacion'),
	//'filter'=>$model,
	//'cssFile' => ''.Yii::app()->getTheme()->baseUrl.'/css/style-grid.css',  // your version of css file
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		'id',

		'numero',
		'fecha',
		'codpro',
		'peticion_clipro.despro',
		'textocorto',
		'usuario',
		'fechacreac',
		/*
		'comentario',
		'textocorto',
		'idcontacto',
		'iduser',
		'codocu',
		'codestado',
		'correlativo',
		'prefijo',
		'codmon',
		'descuento',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
