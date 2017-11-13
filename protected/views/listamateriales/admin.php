<?php
/* @var $this ListamaterialesController */
/* @var $model Listamateriales */

$this->breadcrumbs=array(
	'Listamateriales'=>array('index'),
	'Manage',
);

$this->menu=array(

	array('label'=>'Crear', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#listamateriales-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Lista de Materiales</h1>



<?php echo CHtml::link('Filtrar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
$this->widget('ext.groupgridview.GroupGridView', array(
	'id'=>'listamateriales-grid',
     'itemsCssClass'=>'table table-striped table-bordered table-hover',
    'mergeColumns' => array('destipo'),
	'dataProvider'=>$model->search(),
	'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',

	'columns'=>array(
                   array('name'=>'destipo','value'=>'$data->tipolista->destipo','htmlOptions'=>array("width"=>200)),
		'nombrelista',
		'comentario',
		array('name'=>'codequipo','type'=>'raw','value'=>'CHTml::link($data->codequipo,yii::app()->createUrl("/masterequipo/",array("view"=>$data->codequipo)),array("target"=>"_blank"))'),
		array('name'=>'iduser','value'=>'strtoupper(Yii::app()->user->um->loadUserById($data->iduser,false)->username)'),
		//array('name'=>'compartida','value'=>'CHTml::CheckBox("nf",)'),

		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{view}',
		),
	),
)); ?>
