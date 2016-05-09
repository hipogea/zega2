

<h1>Verificar disponibilidad</h1>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'solpe-grid',
	'dataProvider'=>VwSolpeatencion::model()->search($idcabeza),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'summaryText'=>'',
	//'filter'=>$model,
	'columns'=>array(
		'item',
		'codart',
		'codal',
		'centro',
		'txtmaterial',
		'desum',
		'cant',
		//'cantlibre',
		array('name'=>'', 'type'=>'raw', 'value'=>
			'CHtml::image(

									 ($data->umbase <> $data->um)?
									   Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].((round($data->cantlibre/Alconversiones::convierte($data->codart,$data->um),3) >=$data->cant)?"semaforo-verde.png":"semaforo-rojo.png"):
									   Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].(($data->cantlibre >= $data->cant)?"semaforo-verde.png":"semaforo-rojo.png")
			              )'
		       ),
		
		array('name'=>'sto','header'=>'Stock libre', 'type'=>'raw', 'value'=>'($data->umbase <> $data->um)?round($data->cantlibre/Alconversiones::convierte($data->codart,$data->um),3):$data->cantlibre'),

		//'cantlibre',
		//'umbase',
		//'cantres',
		)));

?>
