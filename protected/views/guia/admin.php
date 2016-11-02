<?php


 //echo Tipozarpe::model()->findByPk('05')->cuentahoras;

$this->menu=array(
	//array('label'=>'List Inventario', 'url'=>array('index')),
	array('label'=>'Talleres Ext.', 'url'=>array('/vwpendientetaller')),
	//array('label'=>'Valores por defecto', 'url'=>$this->createUrl('Opcionescamposdocu/configurausuario',array('docu'=>$this->documento,'docuhijo'=>$this->documentohijo))),
	array('label'=>'Nueva ', 'url'=>array('/guia/creaDocumento')),
	array('label'=>'Valores por defecto', 'url'=>$this->createUrl('Opcionescamposdocu/configurausuario',array('docu'=>$this->documento,'docuhijo'=>$this->documentohijo))),

	//array('label'=>'Observaciones ', 'url'=>array('observaciones')),
	//array('label'=>'Confirmar movimientos', 'url'=>array('/vwloginventari')),
);
?>
<?PHP
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('guia-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<h1><?php echo CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'truck.png');  ?> Documentos de transporte</h1>


<?php //echo CHtml::link('Busqueda ','#',array('class'=>'search-button')); ?>
<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->









<?php $this->widget('ext.groupgridview.GroupGridView', array(
	'id'=>'guia-grid',
	'mergeColumns' => array('c_numgui','d_fectra','razondestinatario'),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
		'dataProvider'=>$proveedor,	
	//'filter'=>$model,
	'columns'=>array(
	    'c_serie',
		ARRAY('name'=>'c_numgui','header'=>'Numero','type'=>'raw','value'=>'CHTml::link($data->c_numgui,Yii::app()->createurl("guia/editadocumento", array("id"=> $data->id )) ,ARRAY("target"=>"_blank"))'),
		ARRAY('name'=>'c_numgui','header'=>'Numero','type'=>'raw','value'=>'CHTml::link(CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."find.png"),Yii::app()->createurl("guia/visualiza", array("id"=> $data->id)) ,array("target"=>"_blank") )','htmlOptions'=>array('width'=>'10')),

		//array('name'=>'c_numgui','type'=>'raw','value'=>'CHtml::link($data->c_numgui, Yii::app()->createurl(\'/guia/visualiza\', array(\'id\'=> $data->id ) ))'),
		array('name'=>'.','type'=>'html', 'value'=>'CHTml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."flag_blue.png")'),
		'c_trans',
		'razondestinatario',		
		array('name'=>'d_fectra', 'header'=>'F tr','value'=>'date("d/m/Y",strtotime($data->d_fectra))'),
		'n_cangui',
		'c_codgui',
		'c_descri',
            'nombreobjeto',
		//array('name'=>'nomep', 'header'=>'Ref','value'=>'$data->nomep'),
		'c_codactivo',
		//'desmotivo',

		
		//'usuario',
		//array('name'=>'inventario_codigoaf','header'=>'Plaquita','value'=>'$data->inventario->codigoaf'),
		//array('name'=>'inventario_codigoaf','header'=>'C. Sap','type'=>'raw','value'=>'CHtml::link($data->inventario->codigoaf,array("inventario/detalle","id"=>$data->inventario->idinventario))'),
		//array('name'=>'inventario_codigosap','header'=>'C. Sap','type'=>'raw','value'=>'CHtml::link($data->inventario->codigosap,array("inventario/detalle","id"=>$data->inventario->idinventario))'),		
		//'inventario.descripcion',
		//array('name'=>'inventario_descripcion','header'=>'Descripcion','value'=>'$data->inventario->descripcion'),
		//'inventario.barcoactual.nomep',
		//'inventario.documento.desdocu',
		//'fecha',
		//'descri',
		//'mobs',		
		//'id',
		//'hidinventario',
		//array('name'=>'estado_estado','header'=>'Estado','value'=>'$data->estado->estado'),
		
	),
)); ?>



