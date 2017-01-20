<?php
/* @var $this PeriodosController */
/* @var $model Periodos */

$this->breadcrumbs=array(
	'Periodoses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Periodos', 'url'=>array('index')),
	array('label'=>'Create Periodos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#periodos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Periodoses</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'periodos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
     'itemsCssClass'=>'table table-striped table-bordered table-hover',
	
	'columns'=>array(
		'id',
		'mes',
		'anno',
            'desperiodo',
		array(
			'name'=>'inicio',
			'value'=>'date("d/m/y", strtotime($data->inicio))','htmlOptions'=>array('width'=>'50')
		),
            array(
			'name'=>'final',
			'value'=>'date("d/m/y", strtotime($data->final))','htmlOptions'=>array('width'=>'50')
		),
		//'final',
		//'activo',
		/*
		'toleranciaatras',
		'toleranciadelante',
		*/
             array(
        'header'=>'Status',
        'type'=>'raw',
        'value'=>'CHtml::CheckBox("$data->activo",
                                   $data->activo,
                                   array(
                                    
                                        "style"=>"width:50px;"
                                        )
                                    )',
            'htmlOptions'=>array("width"=>"50px"),
    ),   
             
		  array(
	   'htmlOptions'=>array('width'=>80),
	   'class'=>'CButtonColumn',
		   'template'=>'{update}{delete}{view}',
	   'buttons'=>array(
	   
               'update'=>array(
	   'visible'=>'true',
	   'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'lapicito.png',
	   'label'=>'Actualizar Item',
	   ),


	   'delete'=>

	   array(
	   'visible'=>'false',
	   
	   ),
             'view'=>  array(
	   'visible'=>'true',
	   'url'=>'$this->grid->controller->createUrl("periodos/ajaxdesactiva", array("id"=>$data->id))',
	   'options' => array( 'ajax' => array('type' => 'GET', 'success'=>'js:function() { $.fn.yiiGridView.update("periodos-grid");}' ,'url'=>'js:$(this).attr("href")'),
	   
	   ) ,
	   'imageUrl'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."check16.png",
	   'label'=>'Ver detalle',
	   ),
               
	   ),
	   ),
	),
)); ?>
