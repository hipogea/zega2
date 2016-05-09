<h1> Reporte de pesca embarcacion   <?php echo $matrices['nombrebarco'];  ?></h1>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'temporadas-grid',
	'dataProvider'=>VwPescaEmbarcacionesParametros::model()->search_parametros ($id,$idespecie,$codep),
	//'filter'=>$model,
	'summaryText'=>'',
	'columns'=>array(
		'nomep',
		array('name'=>'fecha',
		'type'=>'raw',
		'value'=>'CHtml::link(
				"".$data->fecha."",
				 array("/reportepesca/gestionaparte", 
				 "fecha"=>$data->fecha, 
				 "idt"=>$data->idtemporada )
				 )'),
		'motivozarpe',
		'sdeclarada',
		'sdescargada',
		'sd2',
		'sct',
		'sfd',
		'eficienciabodega',
		'd2porhora',
		'horasta',
		
		
	),
)); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'temporadas-grid',
	'dataProvider'=>VwPescaEmbarcaciones::model()->search_barco_temporada($id,$idespecie,$codep),
	//'filter'=>$model,
	'summaryText'=>'',
	
	'columns'=>array(
		array('name'=>'nomep','header'=>'nomep'),	
		array('name'=>'fecha','header'=>'fecha',
		'type'=>'raw',
		'value'=>'"-----------"'),
		array('name'=>'motivozarpe','header'=>'Motivozarpe',
		'type'=>'raw',
		'value'=>'"-----------------"'),
		
		array('name'=>'sdeclarada','header'=>'sdeclarada'),
		array('name'=>'sdescargada','header'=>'sdescargada'),
		'sd2',
		'sct',
		'sfd',
		array('name'=>'eficienciabodega','header'=>'eficienciabodega'),
		'd2porhora',
		'horasta',
		
		
	),
)); ?>