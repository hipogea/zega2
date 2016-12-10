<?php
/* @var $this DocingresadosController */
/* @var $model Docingresados */

 
$opcionesajax=ARRAY(
    "type"=>"GET",
    "url"=>yii::app()->createUrl($this->id."/indicadores"),
    "update"=>"#zonita"
);
echo CHtml::ajaxLink("presionar aqui",yii::app()->createUrl($this->id."/indicadores"),$opcionesajax);
?>
<div id="zonita">hola</div>

<?PHP
$this->breadcrumbs=array(
	'Docingresadoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'List Docingresados', 'url'=>array('index')),
	array('label'=>'Ingresar', 'url'=>array('create')),
	array('label'=>'Modificar', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Docingresados', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Ver listado', 'url'=>array('admin')),
);
?>

<h1> Documento <?php echo $model->correlativo; ?>   Ingresado</h1>
<?php //echo CHTml::ajaxLink('limpiar','ffdfd',array())  ?> 
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codprov',
		'fecha',
		'fechain',
		'correlativo',
		'tipodoc',
		'moneda',
		'descorta',
		'codepv',
		'monto',
		'codgrupo',
		'codresponsable',
		'creadopor',
		'creadoel',
		'texv',
		array('name'=>'jo','value'=>''.gettype($model->conservarvalor).' '),
		'docref',
	),
)); ?>
