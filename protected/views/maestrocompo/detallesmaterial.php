

<?php
/* @var $this MaestrocompoController */
/* @var $model Maestrocompo */



$this->menu=array(
	//array('label'=>'List Maestrocompo', 'url'=>array('index')),
	array('label'=>'Crear material', 'url'=>array('create')),
    array('label'=>'Listado', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#maestrocompo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Maestro de materiales</h1>





<div class="search-form" >
<?php $this->renderPartial('_searchdetalle',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $gridWidget=$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'maestrocompo-grid',
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
   // 'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid.css',  // your version of css file
    'dataProvider'=>$model->search(),
   // 'filter'=>$model,
    'columns'=>array(
        array('name'=>'codigo','header'=>'codigo','type'=>'raw','value'=>'CHtml::openTag("span",array("style"=>"color:red; font-weight:bold;")).CHtml::link($data->codigo,Yii::app()->createurl(\'/maestrocompo/editarmaterial\', array(\'id\'=> $data->codigo ) ) ,array("target"=>"_blank")).CHtml::closeTag("span")'),
        ARRAY('name'=>'codigo','header'=>'Ver','type'=>'raw','value'=>'CHTml::link(CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."find.png"),Yii::app()->createurl("Maestrocompo/ver", array("id"=> $data->codigo)) ,array("target"=>"_blank") )','htmlOptions'=>array('width'=>'10')),
        array('name'=>'codigo','header'=>'Imagen','type'=>'raw','value'=>'Numeromaximo::Pintaimagen("/materiales/".$data->codigo.".JPG","/materiales/NODISPONIBLE.JPG",40,40)'),
        'codcentro',
        'codal',
        'desum',
        'descripcion',
        'marca',
       // 'modelo',
        'nparte',
      //  'codpadre',
        array('name'=>'esrotativo','type'=>'raw','value'=>'CHTml::checkbox("hdjs",($data->esrotativo=="1")?true:false,array("disabled"=>"disabled"))'),
        'controlprecio',
        array('name'=>'sujetolote','type'=>'raw','value'=>'CHTml::checkbox("hdjs",($data->sujetolote=="1")?true:false,array("disabled"=>"disabled"))'),
        array('name'=>'supervisionautomatica','type'=>'raw','value'=>'CHTml::checkbox("hdjs",($data->supervisionautomatica=="1")?true:false,array("disabled"=>"disabled"))'),

        'catval',
        'canaldist',


    ),
)); ?>



<?PHP
//Capture your CGridView widget on a variable
//$gridWidget=$this->widget('bootstrap.widgets.TbGridView', array( . . .
$this->renderExportGridButton($gridWidget,'Exportar',array('class'=>''));
?>