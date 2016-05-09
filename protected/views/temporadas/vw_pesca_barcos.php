


<h1>Reporte por embarcaciones  </h1>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reportepesca-grid',
	'dataProvider'=>$proveedor,
	//'filter'=>$model,
	// 'enablePagination' => false,
	'columns'=>array(
		
		
				//'codep' => 'Codep',
			array('name'=>'nomep','header'=>'Embarcacion','type'=>'raw', 'value'=>'CHtml::link("".$data->nomep."",array("/temporadas/seriebarcos", "id"=>$data->idtemporada , "codep"=>$data->codep , "idespecie"=>$data->idespecie    ))'),
	
			'nomep',// => 'Embarcacion',
			//'idespecie' => 'Idespecie',
			//'idtemporada' => 'Idtemporada',
			'sdeclarada',// => 'Declarada (TN)',
			'sdescargada' ,//=> 'Descargada (TN)',
			'horasta',// => 'Hora tot',
			'sd2' ,//=> 'Diesel',
			'sct',// => 'GL/Tn',
			'd2porhora',// => 'GL/Hr',
			'sfd' ,//=> 'Factor Descarga',
			'nomespecie',// => 'Especie',
			'bodega',// => 'Bodega',
			'eficienciabodega',// => 'Ef Bodeg',
			'jornadas',
			//'horas' => 'Horas',
		
	),
)); ?>
