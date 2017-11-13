<?php
/* @var $this AlinventarioController */
/* @var $model Alinventario */

$this->breadcrumbs=array(
	'Alinventarios'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Alinventario', 'url'=>array('index')),
	array('label'=>'Create Alinventario', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#alinventario-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
$('#alinventario-grid2').yiiGridView('update', {
		data: $(this).serialize()
	});


	return false;
});
");
?>

<?php MiFactoria::titulo('Existencias','package')  ?>





<?php // echo CHtml::link('Filtrar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


 <?php
	  	$proveedor=	$model->search();
	  
	  ?>
<div id="zona_reserva"></div>
<div class="division">
	<?php $gridWidget=$this->widget('ext.groupgridview.GroupGridView', array(
	'id' => 'alinventario-grid',
	'dataProvider'=>$proveedor,
	'mergeColumns' => array('codart','cantlibre','cantres','canttran','punit','pttotal'),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',

	'columns'=>array(
		//'codart',
		ARRAY('name'=>'id','type'=>'raw','value'=>'CHtml::link(CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."Cast.png"),"#", array("onclick"=>\'$("#cru-frame2").attr("src","\'.Yii::app()->createurl(\'/alinventario/muestrakardex\', array(\'id\'=> $data->id ) ).\'");$("#cru-dialog2").dialog("open"); return false;\' ) )'),

		//array('name'=>'embarcacion.nomep','header'=>'EP','type'=>'raw', 'value'=>'CHtml::link("".$data->embarcacion->nomep."","#",array(\'onclick\'=>\'$("#cru-frame2").attr("src","\'.Yii::app()->createurl(\'/reportepesca/update\', array(\'id\'=> $data->id ) ).\'"); $("#cru-dialog2").dialog("open"); return false;\',))'),
		'codalm',
		'codcen',
		array('name'=>'codart','type'=>'raw','value'=>'CHtml::link($data->codart,Yii::app()->createurl(\'/alinventario/update\', array(\'id\'=> $data->id ) ) )'),
		ARRAY('name'=>'idx','type'=>'raw','value'=>'($data->cantlote > 0)?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."quimica.png"):""'),
		'cantlote',
		//'cantlibre',
		//'cantres',
		array('name'=>'cantlibre','type'=>'raw','value'=>'($data->cantlibre>0)?CHtml::openTag("span",array("class"=>"badge badge-success")).$data->cantlibre.CHtml::closeTag("span"):""'),
		array('name'=>'cantres','type'=>'raw','value'=>'($data->cantres>0)?CHtml::Link(CHtml::openTag("span",array("class"=>"badge badge-warning")).$data->cantres.CHtml::closeTag("span"),"#", array("onclick"=>\'$("#cru-frame5").attr("src","\'.Yii::app()->createurl(\'/alinventario/pintareservas\', array(\'idinventario\'=> $data->id ) ).\'");$("#cru-dialog5").dialog("open"); return false;\' ) ):""'),
		array('name'=>'canttran','type'=>'raw','value'=>'($data->canttran>0)?CHtml::openTag("span",array("class"=>"badge badge-important")).$data->canttran.CHtml::closeTag("span"):""'),

		'desum',

		'ubicacion',

		'descripcion',
		array('name'=>'codart','header'=>'Imagen','type'=>'raw','value'=>'Numeromaximo::Pintaimagen("/materiales/".$data->codart.".JPG","/materiales/NODISPONIBLE.JPG",40,40)'),

		//'punit',
		array('name'=>'punit','value'=>'MiFactoria::decimal($data->punit)'),
		//	array('name'=>'pttotal','value'=>'round($data->pttotal,3)','footer'=>round($model->getTotal($model->search()),2)),
		array('name'=>'pttotal','value'=>'MiFactoria::decimal($data->pttotal)','footer'=>MiFactoria::decimal($model->getTotal($model->search()))),
		
		'codmon',

		
                
		//'creadopor',
		
		
		
	),
)); ?>

<?PHP
//Capture your CGridView widget on a variable
//$gridWidget=$this->widget('bootstrap.widgets.TbGridView', array( . . .
//$this->renderExportGridButton($gridWidget,'Exportar',array('class'=>''));
?>

</div>

<?php
//Capture your CGridView widget on a variable
//$gridWidget=$this->widget('bootstrap.widgets.TbGridView', array( . . .
$this->renderExportGridButton($gridWidget,'Exportar resultados',array('class'=>'btn btn-info pull-right'));
?>

<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog2',
	'options'=>array(
		'title'=>'Kardex',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>700,
		'height'=>500,
	),
));
?>
<iframe id="cru-frame2" width="100%" height="100%"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>


<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog5',
	'options'=>array(
		'title'=>'Reservas pendientes',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>750,
		'height'=>600,
	),
));
?>
<iframe id="cru-frame5" width="100%" height="100%"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>

