<?php
$this->menu=array(
	//array('label'=>'Do', 'url'=>array('index')),
	//array('label'=>'Create Alkardex', 'url'=>array('create')),
);
Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#confogrid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php MiFactoria::titulo('Conformidades de Servicio','Cast')  ?>
<div class="search-form" style="">
<?php $this->renderPartial('_searchconformidades',array(
	'model'=>$model,
)); ?>
</DIV>
<div class="division">

<?php $this->widget('ext.groupgridview.GroupGridView', array(
	'id'=>'confogrid',
	'dataProvider'=>$model->search_servicios(),
		'mergeColumns' => array('numcot','item','despro'),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$model,
	'columns'=>array(
		array('name'=>'numvale','header'=>'Documento','type'=>'raw','value'=>'CHtml::link($data->numvale,Yii::app()->createurl(\'/maestroservicios/ver\', array(\'id\'=> $data->hidvale ) ),array("target"=>"_blank") )'),
		array('name'=>'numcot','header'=>'O Compra','type'=>'raw','value'=>'CHtml::link($data->numcot,Yii::app()->createurl(\'/ocompra/verDocumento\', array(\'id\'=> $data->idguia ) ) ,array("target"=>"_blank") )'),
		'item',
		'despro',
		//'movimiento',
       // 'codart',
        array('name'=>'.','header'=>'.','type'=>'raw','value'=>'($data->cant <0)?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."salida.png","hola"):CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."entrada.png","hola")'),
        array('name'=>'desum','htmlOptions' => array('width' => 10) ),
        'cant',
       /* array('name'=>'comentario',
            'htmlOptions' => array('width' => 250)
        ),*/
		'descri',
		array(
			'name'=>'fecha',
			'header'=>'Fec',
			'value'=>'date("d.m.Y", strtotime($data->fecha))','htmlOptions'=>array('width'=>'50')
		),
		//'numdoc',
		//'movimiento',
		//'codmov',
		'codcentro',
		array('name'=>'preciounit','header'=>'Plan','value'=>'MiFactoria::decimal($data->preciounit,3)'),
		array('name'=>'montomovido','header'=>'Plan','value'=>'MiFactoria::decimal($data->montomovido,3)'),
			'codmoneda',
		//'alemi',
       // array('name'=>'c_numgui','type'=>'raw','value'=>'CHtml::link($data->c_numgui, ($data->c_salida==\'1\')?Yii::app()->createurl(\'/guia/update\', array(\'id\'=> $data->id ) ) :  Yii::app()->createurl(\'/ne/update\', array(\'id\'=> $data->id ) )          )'),
        //'desdocu',
		//array('name'=>'numdocref','header'=>'O. Compra','type'=>'raw','value'=>'CHtml::link($data->numdocref,Yii::app()->createurl(\'/ocompra/verdetoc\', array(\'id\'=> $data->idref ) ),array("target"=>"_blank"))'),


    ),
)); ?>
</div>