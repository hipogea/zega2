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
	array('label'=>'Notificar general', 'url'=>array('notifica')),
);

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
<?php $this->renderPartial('_search2',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php $this->beginWidget('application.extensions.thumbnailer.Thumbnailer', array(
 
        'thumbsDir' => 'assets/thumbs',
        'thumbWidth' => 100,
        'thumbHeight' => 90, // Optional
    )
); ?>
 <?php
  //$ruta1=$this->createurl('/observaciones/create',	array("idinventario"=>$canica,"asDialog"=>1,"gridId"=>'inventario-grid',));
 ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'inventario-grid',
	//'filter'=>$model,
	'dataProvider'=>$model->search2($codep),	
	//'ajaxUpdate' => false,  // This is it.
		'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'style_original.css',  // your version of css file
	
	'columns'=>array(
	    array('name'=>'idinventario','visible'=>false),
	      //array('name'=>'barcooriginal','header'=>'Origen',
		//array('name'=>'barcoactual.nomep','header'=>'Actual'),
		array('name'=>'codigosap','header'=>'C. Sap','type'=>'raw','value'=>'CHtml::link($data->codigosap,array("inventario/detalle","id"=>$data->idinventario))'), 
		 array(
            'name'=>'imagen',
            'type'=>'raw',
            'value'=>'(file_exists("D:/web/motoristas/assets/FOTOS/".trim($data->codigosap).".JPG"))?
						CHtml::image("D:/web/motoristas/assets/fotos/".trim($data->codigosap).".jpg",$data->codigosap):
						"--"'),
			
						//'value'=>'(file_exists(Yii::app()->request->baseUrl."/assets/fotos/nodisponible.JPG")))'),		
			array('name'=>'codigoaf','header'=>'Plaquita','type'=>'raw','value'=>'CHtml::link($data->codigoaf,array("inventario/update","id"=>$data->idinventario))'), 
		
		array('name'=>'descripcion','header'=>'Descripcion del activo      '),
		'marca',
		'modelo',
		'serie',
		//array('name'=>'barcooriginal.nomep','header'=>'Origen'),
		'documento.desdocu',
		array('name'=>'fecha','value'=>'date("d/m/Y",strtotime($data->fecha))'),
		'numerodocumento',
		array('name'=>'Reclamo','header'=>'Reclamo','type'=>'raw','value'=>'CHtml::link("No estoy de acuerdo","#",array(\'onclick\'=>\'$("#cru-frame").attr("src","\'.Yii::app()->createurl(\'/observaciones/create\', array(\'idinventario\'=>$data->idinventario ,\'asDialog\'=>1 ,  \'gridId\'=>$this->grid->id   )).\'"); $("#cru-dialog").dialog("open"); return false;\',))'),
		
		//'lugar.deslugar',
		//'documento.desdocu',
		//'fecha',
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
		//array(
			//'class'=>'CButtonColumn',
		//),
	),
)); 
?>
<?php $this->endWidget(); ?>

<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog',
    'options'=>array(
        'title'=>'Observaciones',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>500,
    ),
    ));
?>
<iframe id="cru-frame" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>