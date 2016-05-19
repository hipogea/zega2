<?php
/* @var $this SolpeController */
/* @var $model Solpe */



$this->menu=array(
	//array('label'=>'List Solpe', 'url'=>array('index')),
	array('label'=>'Crear solicitud', 'url'=>array('create')),
	array('label'=>'Valores por defecto', 'url'=>$this->createUrl('Opcionescamposdocu/configurausuario',array('docu'=>CODIGO_DOC_SOLPE,'docuhijo'=>CODIGO_DOC_DESOLPE))),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#solpe-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<?php MiFactoria::titulo('Solicitudes de recursos','clipboard_sign'); ?>



<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<div class="division">
<?php $gridWidget= $this->widget('ext.groupgridview.GroupGridView', array(
	'id'=>'solpe-grid',
	'dataProvider'=>$model->search(),
	'mergeColumns' => array('numsolpe','centro','codal','imputacion'),
	//'filter'=>$model,
	//'cssFile' => ''.Yii::app()->getTheme()->baseUrl.'/css/style-grid.css',  // your version of css file
	'itemsCssClass'=>'table table-striped table-bordered table-hover',

	//'itemsCssClass'=>'table table-striped table-bordered table-hover',
			//'dataProvider'=>$gridDataProvider,
			//'template'=>"{items}",
	'columns'=>array(
		array('name'=>'numsolpe','type'=>'raw','value'=>'CHtml::link($data->numsolpe,Yii::app()->createurl(\'/solpe/update\', array(\'id\'=> $data->identidad ) ) )'),
		'tipsolpe',
		array('name'=>'.','type'=>'raw','value'=>'($data->tipsolpe=="S")?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."hammer.png"):""'),

		//'numsolpe',
		'item',
		'cant',
		'desum',
		array('name'=>'codart','type'=>'raw','value'=>'($data->tipsolpe=="M")?CHtml::link($data->codart,Yii::app()->createurl(\'/maestrocompo/ver\', array(\'id\'=> $data->codart ) ),array("target"=>"_blank") ):""'),
			'imputacion',
		array('name'=>'txtmaterial','type'=>'raw','value'=>'$data->txtmaterial','htmlOptions'=>array('width'=>'300')),
			array(
			'name'=>'fechacrea',
			'value'=>'date("d/m/y", strtotime($data->fechacrea))','htmlOptions'=>array('width'=>'50')
		),
		array(
			'name'=>'fechaent',
			'value'=>'date("d/m/y", strtotime($data->fechaent))','htmlOptions'=>array('width'=>'50')
		),
		//array('name'=>'codal','type'=>'raw','value'=>'CHtml::link($data->codal,Yii::app()->createurl(\'/almacendocs/atiendesolpe\', array(\'id\'=> $data->hidsolpe ) ) )'),
		array('name'=>'codal','type'=>'raw','value'=>'($data->est <>"30")?CHtml::link($data->codal,"#" , array(\'onclick\'=>\'$("#cru-detalle").attr("src","\'.Yii::app()->createurl(\'/solpe/reservaitem\', array(\'id\'=> $data->id, \'asDialog\'=>1,\'gridId\'=> $this->grid->id   ) ).\'"); $("#cru-dialogdetalle").dialog("open"); return false;\',)):$data->codal'),
		'centro',
		'usuario',
		'est',

	),
)); ?>


</div>

<?PHP
    //Capture your CGridView widget on a variable
    //$gridWidget=$this->widget('bootstrap.widgets.TbGridView', array( . . .
    $this->renderExportGridButton($gridWidget,'Exportar',array('class'=>'btn btn-info pull-right'));
?>

<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialogdetalle',
    'options'=>array(
        'title'=>'Crear item',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>800,
        'height'=>500,
		'show'=>'Transform',
    ),
    ));
?>
<iframe id="cru-detalle" frameborder="0"  width="100%" height="100%" ></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>

