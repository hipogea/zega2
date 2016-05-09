

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'temporadas-grid',
	'dataProvider'=>VwReportepescaTemporada::model()->search_por_temporada($model->id),
	//'filter'=>$model,
	'columns'=>array(
	    'sdeclarada',
		 'sdescargada',		 
		 'sd2',
		 'sct',
		 'sfd',
		 'bodega',
		 'eficienciabodega',
		 'horas',
		 'd2porhora',
'horasta'	,
 'cumplimiento',	 
		
		
	),
)); ?>
