<?php
/* @var $this PartesController */
/* @var $model Partes */

$this->breadcrumbs=array(
	'Partes'=>array('index'),
	'Manage',
);

	mt_srand (time());	
$numero=mt_rand(1000000,2000000);
$this->menu=array(
	//array('label'=>'Listado de  Partes', 'url'=>array('index')),
	//array('label'=>'Crear Parte', 'url'=>array('partes/create&aleatorio='.$numero)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('partes-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1> Partes de Motorista </h1>
<?php //echo CHtml::link('Buscar mas..','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php //$this->renderPartial('_search',array(
	//'model'=>$model,
//)); ?>
</div><!-- search-form -->

<?php 


$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'partes-grid',
	'dataProvider'=>($codep=='000')?$model->search():$model->search_barco($codep),
	'summaryText' => '',
	'filter'=>$model,
	'cssFile' => Resuelveruta::Arreglaruta(''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'style_gridpartes.css'),  // your version of css file
	
	'columns'=>array(
	     array(
            'class'=>'CButtonColumn',
            //--------------------- begin new code --------------------------
            'buttons'=>array(
                        'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("update", array("id"=>$data->primaryKey))',                                    
                                ),
							'delete'=>
                            array(
                                   'visible'=>'false',                                    
                                ),
								'view'=>
                            array(
                                   'visible'=>'false',                                    
                                ),
                            ),
				 ),	
	    array('name'=>'embarcaciones_nomep','header'=>'Embarcacion','value'=>'$data->embarcaciones->nomep'),
		array('name'=>'numero','header'=>'Numero'),
		array('name'=>'fecha','header'=>'Fecha doc','value'=>'date("d/m/Y",strtotime($data->fecha))'),
		//array('name'=>'d_fectra', 'value'=>'date("d/m/Y",strtotime($data->d_fectra))'),
		array('name'=>'puerto','visible'=>false ),
		array('name'=>'plantaorigen.desplanta','header'=>'Zarpe'),
		array('name'=>'puertode','visible'=>false ),
		array('name'=>'plantadestino.desplanta','header'=>'Arribo'),
		array('name'=>'horometro','header'=>'Horom. Zarpe'),
		array('name'=>'horometrodes','header'=>'Horom. arribo'),	
		array('name'=>'numerodecalas','header'=>'Calas'),	
		array('name'=>'horastrabajadas','header'=>'Horas','value'=>'$data->horometrodes-$data->horometro'),		
		array('name'=>'consumocombustible','type'=>'Text','header'=>'Consumo D2 (Gl./Hr)', 'value'=>'round(($data->d2_zarpe-$data->d2_arribo)/($data->horometrodes-$data->horometro),3)'),	
		//array('name'=>'horasdeaceitemotor', 'type'=>'raw','header'=>'Horas ac-motor', 'value'=>'$data->horometrodes-$data->acylu_horometroultimocambio'),
		//array('name'=>'horasdeaceitecaja', 'type'=>'Text','header'=>'Horas ac-caja', 'value'=>'$data->horometrodes-$data->acylu_horometroultimocambiocaja'),
		
		/*'id',
		*/
		
	),
)); ?>
