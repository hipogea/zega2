

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'temporadas-grid',
	'dataProvider'=>VwReportepescaPorDia::model()->search_por_temporada($model->idtemporada,$model->idespecie),
	//'dataProvider'=>$anchovetapro,
	//'filter'=>$model,
	//'cssFile' =>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemadetalle'].'grid_pequeno.css',
	'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'grid_mediano.css',  // your version of css file

	'summaryText'=>'',
	'columns'=>array(
	    array('name'=>'fecha','header'=>'Fecha','type'=>'raw','value'=>'CHtml::link(date("d/m/Y",strtotime($data->fecha))," ".Yii::app()->createurl(\'/reportepesca/gestionaparte\', array(\'fecha\'=> $data->fecha , \'idt\'=>$data->idtemporada  ))."")'),
	    'nomespecie',
		// 'idtemporada',
		 'sdeclarada',
		 'sdescargada',
		   ARRAY('name'=>'sfd','value'=>'$data->sfd."%"'  ),
		 'sd2',
		 'sct',
		  'horas',
		 'd2porhora',		
		  'bodega',
		 ARRAY('name'=>'eficienciabodega','value'=>'$data->eficienciabodega."%"'  ),		
		
		 
		
		
	),
)); ?>
