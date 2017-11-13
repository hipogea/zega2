<?php
/* @var $this DailyworkController */
/* @var $model Dailywork */

$this->breadcrumbs=array(
	'Dailyworks'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Dailywork', 'url'=>array('index')),
	array('label'=>'New Dailywork', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#dailywork-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo "Daily Work Sheets " ?></h1>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('ext.groupgridview.GroupGridView', array(
      'id' => 'dailywork-grid',
      'dataProvider'=>$model->search(),
    //'filter'=>$model,
      'mergeColumns' => array('codcen','codproyecto','nombreobjeto','hidturno','numero','fecha','codtipo','codigoaf'),
     'itemsCssClass'=>'table table-striped table-bordered table-hover',
	
	'columns'=>array(
           // 'codresponsable',
              'codcen',
            'codproyecto',
           // 'nombreobjeto',
            'hidturno',
            //'desregimen',
           array('name'=>'fecha','type'=>'html','value'=>'CHtml::link($data->fecha,yii::app()->createUrl("/mantto/dailywork/daily/",array("day"=>$data->dia,"month"=>$data->mes,"year"=>$data->anno,"level"=>"byequipo")),array("target"=>"_blank"))','htmlOptions'=>array('width'=>400) ),
	   array('name'=>'numero','type'=>'html','value'=>'CHtml::link($data->numero,yii::app()->createUrl("/mantto/dailywork/update/",array("id"=>$data->hidparte)),array("target"=>"_blank"))','htmlOptions'=>array('width'=>400) ),
	   'codtipo',
            array('name'=>'codigoaf','type'=>'html','value'=>'CHtml::link($data->codigoaf,yii::app()->createUrl("inventario/detalle",array("id"=>$data->hidequipo)),array("target"=>"_blank"))','htmlOptions'=>array('width'=>400) ),
            'hmi',
            'hmf',
            'hpi',
            'hpf',
	      'dispo',
            'util',
		/*
		'codocu',
		'codestado',
		*/
		
	),
)); ?>
