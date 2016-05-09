<span class="summary-icon2">
           <img src="<?php echo Yii::app()->theme->baseUrl ;?>/img/pareto.png" width="45" height="45" alt="">
</span>

<h1>Clasificacion ABC STOCK </h1>

<?php


$this->menu=array(
	array('label'=>'List Alinventario', 'url'=>array('index')),
	array('label'=>'Create Alinventario', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#pareto-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
$('#alinventario-grid2').yiiGridView('update', {
		data: $(this).serialize()
	});


	return false;
});
");
?>


<?php // echo CHtml::link('Filtrar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="">
	<?php $this->renderPartial('_searchpareto',array(
		'model'=>$model,
	)); ?>
</div><!-- search-form -->






<div class="division">

 <?php
	  	$proveedor=	$model->search();
	  
	  ?>


<?php $gridWidget=$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pareto-grid',
	'dataProvider'=>$proveedor,
	//'filter'=>$model,
	'columns'=>array(
		//'codart',
		'ranking',
		'codalm',
		'clase',
		array('name'=>'codart','type'=>'raw','value'=>'CHtml::link($data->codart,Yii::app()->createurl(\'/alinventario/update\', array(\'id\'=> $data->id ) ),array("target"=>"_blank") )'),
		'desum',
		//array('name'=>'codart','type'=>'raw','value'=>'CHtml::image("/recurso/materiales/".$data->codart.".JPG","HOLA",array("height"=>40,"width"=>"40"))'),
		'descripcion',
		'cantlibre',
        'punit',
		'ptlibre',
		'acumulado',
		'porcentaje',
		'porcentajeac',
	),
)); ?>

<?PHP
//Capture your CGridView widget on a variable
//$gridWidget=$this->widget('bootstrap.widgets.TbGridView', array( . . .
//$this->renderExportGridButton($gridWidget,'Exportar',array('class'=>''));
?>


</div>