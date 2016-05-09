<?php
/* @var $this CargamasivaController */
/* @var $model Cargamasiva */

$this->breadcrumbs=array(
	'Cargamasivas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Cargamasiva', 'url'=>array('index')),
	array('label'=>'Create Cargamasiva', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cargamasiva-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Plantillas de carga de datos</h1>


<?php echo CHtml::link('Busqueda','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cargamasiva-grid',
	'dataProvider'=>$model->search(),
	//'cssFile' => '/motoristas/css/grid/grilla_naranja.css',

	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$model,
	'columns'=>array(
	array(
			'class'=>'CButtonColumn',
			'buttons'=>array(
				'delete'=>array(
						'visible'=>'true',
						'url'=>'$this->grid->controller->createUrl("/Cargamasiva/borracarga", array("id"=>$data->id))',
						'options' => array( 'ajax' => array('type' => 'GET','data'=>'Se borro el registro', 'success'=>'reloadGrid' ,'url'=>'js:$(this).attr("href")'),
							'onClick'=>'Loading.show();Loading.hide(); ',
						) ,
						'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'borrador.png',
						'label'=>'Ver detalle',
					),

				'view'=>array('visible'=>'false'),
			),),
			 array('name'=>'insercion', 'type'=>'raw','value'=>'CHtml::Checkbox("pio",($data->insercion=="1")?true:false,array("disabled"=>"disabled"))',),		
			'modelo',
	'descripcion',
		'id',
		
		array('name'=>'iduser','value'=> 'Yii::app()->user->um->loadUserById($data->iduser,false)->username'),
		'fechacreac',
		'fechaejec',
	
         	
		
	),
)); ?>
