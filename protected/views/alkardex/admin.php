<?php
/* @var $this AlkardexController */
/* @var $model Alkardex */

$this->breadcrumbs=array(
	'Alkardexes'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'Do', 'url'=>array('index')),
	//array('label'=>'Create Alkardex', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#alkardex-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>
<?php MiFactoria::titulo('Documentos de Material','Cast')  ?>



<div class="search-form" >

<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>

</div>
<div class="division">







<?php $this->widget('ext.groupgridview.GroupGridView', array(
	'id'=>'alkardex-grid',
	'dataProvider'=>$model->search(),
		'mergeColumns' => array('numvale','movimiento'),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$model,
	'columns'=>array(
		array('name'=>'numvale','header'=>'Vale','type'=>'raw','value'=>'CHtml::link($data->numvale,Yii::app()->createurl(\'/almacendocs/editar\', array(\'id\'=> $data->hidvale ) ))',"htmlOptions"=>array("target"=>"_blank")),
		'movimiento',
        'codart',
        array('name'=>'.','header'=>'.','type'=>'raw','value'=>'($data->cant <0)?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."salida.png","hola"):CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."entrada.png","hola")'),

        array('name'=>'desum','htmlOptions' => array('width' => 10) ),
        'cant',
        array('name'=>'descripcion',
            'htmlOptions' => array('width' => 250)
        ),
		array(
			'name'=>'fr',
			'type'=>'raw',
			'value'=>'($data->checki=="1")?CHtml::Image("'.Yii::app()->getTheme()->baseUrl.'/img/accept.png").CHtml::Image("'.Yii::app()->getTheme()->baseUrl.'/img/delivery.png"):""',
                     'htmlOptions' => array('width' => 20)
		),
            array(
			'name'=>'fecha',
			'header'=>'Fec',
			'value'=>'date("d.m.Y", strtotime($data->fecha))','htmlOptions'=>array('width'=>'50'),
                
		),
		//'numdoc',
		//'movimiento',
		//'codmov',
		'codcentro',		
		'alemi',
       // array('name'=>'c_numgui','type'=>'raw','value'=>'CHtml::link($data->c_numgui, ($data->c_salida==\'1\')?Yii::app()->createurl(\'/guia/update\', array(\'id\'=> $data->id ) ) :  Yii::app()->createurl(\'/ne/update\', array(\'id\'=> $data->id ) )          )'),
        'desdocu',
		array('name'=>'numdocref','header'=>'Referencia','type'=>'raw','value'=>'$data->numdocref'),


    ),
)); ?>
</div>