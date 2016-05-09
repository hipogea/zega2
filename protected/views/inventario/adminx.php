<?php
/* @var $this InventarioController */
/* @var $model Inventario */

$this->breadcrumbs=array(
	'Inventarios'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Inventario', 'url'=>array('index')),
	array('label'=>'Crear Activo', 'url'=>array('create')),
	array('label'=>'Observaciones ', 'url'=>array('observaciones')),	
	array('label'=>'Confirmar movimientos', 'url'=>array('/VwLoginventari')),
	array('label'=>'Ver procesos', 'url'=>array('controlactivos/admin')),
	array('label'=>'Ver carteres', 'url'=>array('partes/muestracarteres')),
);
//echo Yii::app()->user->email;
 //Yii::app()->crugemailer->NotificarStockMercancia(Yii::app()->user,"asunto");

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('inventario-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<?php echo CHtml::link('Busqueda ','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search_',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $this->beginWidget('application.extensions.thumbnailer.Thumbnailer', array(
 
        'thumbsDir' => 'tu/',
        'thumbWidth' => 50,
        'thumbHeight' => 45, // Optional
    )
); ?>
 <?php
 //echo CHtml::image('/recurso/frua232.jpg');
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'inventario-grid',
	//'filter'=>$model,
	//'hideHeader'=>true,
	'dataProvider'=>$model->search(),	
	//'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'style_original.css',  // your version of css file
	'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid.css',  // your version of css file

	'columns'=>array(
	    array('name'=>'idinventario','visible'=>false),
	      array('name'=>'dst.','header'=>'dst', 'type'=>'html','value'=>'($data->rocoto=="1")?CHtml::image(Yii::app()->params[\'rutaabsfotosinventario\']."camion.png",$data->codigosap,array("height"=>20,"width"=>30)):""'),
	
	   
	      //array('name'=>'barcooriginal','header'=>'Origen',
		array('name'=>'nomep','header'=>'Actual'),
		array('name'=>'codigosap','header'=>'C. Sap','type'=>'raw','value'=>'CHtml::link($data->codigosap,array("inventario/detalle","id"=>$data->idinventario))'), 
		 array(
            'name'=>'imagen',
            'type'=>'raw',
            'value'=>'(file_exists(Yii::app()->params[\'rutaabsfotosinventario\'].trim($data->idinventario).".JPG"))?
						CHtml::image(Yii::app()->params[\'rutaabsfotosinventario\'].trim($data->idinventario).".JPG",$data->codigosap):
						"--"'),
			
						//'value'=>'(file_exists(Yii::app()->request->baseUrl."/assets/fotos/nodisponible.JPG")))'),		
			array('name'=>'codigoaf','header'=>'Plaquita','type'=>'raw','value'=>'CHtml::link($data->codigoaf,array("inventario/update","id"=>$data->idinventario))'), 
		
		array('name'=>'descripcion','header'=>'Descripcion del activo      '),
		//'marca',
		//'modelo',
		//'serie',
		array('name'=>'nombreeporiginal','header'=>'Origen'),
		array('name'=>'codlugar','visible'=>false),
		//'lugares.deslugar',
		array('name'=>'deslugar','header'=>'Lugar','value'=>'$data->deslugar'),
		//'posicion',
		'desdocu',
		//'estado.estado',
		array('name'=>'fecha','value'=>'date("d/m/Y",strtotime($data->fecha))'),
		array('name'=>'numerodocumento','type'=>'raw','value'=>'CHtml::link($data->numerodocumento, Yii::app()->createurl(\'/\'.($data->coddocu=="001")?"guia":"ne".\'/update\', array(\'update\'=> $data->iddocu ) ))'),
		//'area',
		/*  motoristas\assets\FOTOS
		'coddocu',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'codlugar',		
		'descripcion',
		'marca',
		'modelo',
		'serie',
		'clasefoto',
		'codigopadre',
		'numerodocumento',
		'adicional',
		'codigoafant',
		'posicion',
		'codcentro',
		'codcentrooriginal',
		'codeporiginal',
		'rocoto',
		'codepanterior',
		'codcentroanterior',
		'clase',
		'baja',
		'n_direc',
		*/		
		
		
	),
)); 
?>
<?php $this->endWidget(); ?>

<?php


?>
<?php
// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
//mail("hipogea@hotmail.com","habla enano",$msg);
?> 