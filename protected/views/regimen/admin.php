<?php
/* @var $this RegimenController */
/* @var $model Regimen */

$this->breadcrumbs=array(
	'Regimens'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Regimen', 'url'=>array('index')),
	array('label'=>'Create Regimen', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#regimen-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Regimens</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'regimen-grid',
	'dataProvider'=>$model->search(),
      'itemsCssClass' => 'table table-striped table-bordered table-hover',
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'desregimen',
		
            array(
                'name' => 'activo',
                //'id' => 'selectedIds',
                'type'=>'raw',
        'value'=>'CHtml::CheckBox("$data->activo",
                                   $data->activo,
                                   array(
                                    
                                    "disabled"=>"disabled",
                                        "style"=>"width:50px;"
                                        )
                                    )',
            'htmlOptions'=>array("width"=>"50px"),
            ),
            'hinicio',
            array('value'=>'date("H:i",strtotime($data->getLimiteSuperior(date("Y-m-d"))))'),
            'horasdia',/*
		'porcdomingo',
            'tarifamensual',
            'acumuladomingo',
		'porcfer',
            'comentario',*/
		/*
		'horasdia',
		'facdominical',
		'frecpago',
		'turno',
		'acumuladomingo',
		'tarifamensual',
		*/
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{update}{view}'
		),
	),
)); ?>
