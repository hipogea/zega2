<?php
/* @var $this LugaresController */
/* @var $model Lugares */

$this->breadcrumbs=array(
	'Lugares'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Lugares', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('lugares-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Lugares</h1>



<?php echo CHtml::link('Buscar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('ext.groupgridview.GroupGridView', array(
	'id'=>'lugares-grid',
	'mergeColumns' => array('despro','departamento','provincia','distrito','c_direc'),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	//'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',
	//'filter'=>$model,
	'columns'=>array(
            array('name'=>'codlugar','header'=>'Codigo','type'=>'raw','value'=>'CHtml::link($data->codlugar,array("lugares/update","id"=>$data->codlugar),array())'), 
		array('name'=>'numeroactivos', 'type'=>'raw','value'=>'($data->numeroactivos>0)?CHtml::link(CHtml::openTag("span",array("class"=>"badge badge-important")).$data->numeroactivos.CHtml::closeTag("span").CHtml::image(Yii::app()->getTheme()->baseUrl."/img/bricks.png"),"#", array("onclick"=>\'$("#cru-frame2").attr("src","\'.Yii::app()->createurl(\'/lugares/muestractivos\', array(\'id\'=> $data->id ) ).\'");$("#cru-dialog2").dialog("open"); return false;\' ) ):""'),
		
		'codpro',
		'despro',
		'departamento',
		'provincia',
		'distrito',
		'c_direc',
		'deslugar',
		//array('name'=>'numeroactivos', ),
		//ARRAY('name'=>'id','type'=>'raw','value'=>'CHtml::link(CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."Cast.png"),"#", array("onclick"=>\'$("#cru-frame2").attr("src","\'.Yii::app()->createurl(\'/alinventario/muestrakardex\', array(\'id\'=> $data->id ) ).\'");$("#cru-dialog2").dialog("open"); return false;\' ) )'),

		//'centrito.nomcen',
		//'provincia',
		//'claselugar',



		//'n_direc',
		
	),
)); ?>


<?php

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog2',
	'options'=>array(
		'title'=>'Activos ',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>750,
		'height'=>600,
	),
));
?>
	<iframe id="cru-frame2" width="100%" height="100%"></iframe>
<?php
$this->endWidget();
?>