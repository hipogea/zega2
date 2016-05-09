

<?php

$prove=VwAtencionessolpe::model()->search_por_solpe($model->id);
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'movimientos-grid',
	'dataProvider'=>$prove,
		'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid.css',  // your version of css file

		//'filter'=>$model,
	//'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid.css',  // your version of css file
	'summaryText'=>'->',
	'columns'=>array(
		'item',
		'cantdesolpe',
		'fecha',
		'movimiento',
		'numvale' ,
		'cant',
		'desumkardex' ,
		'codart',
		'txtmaterial',
		array('name'=>'preciounit','value'=>'Yii::app()->numberFormatter->format("#,##0.00",$data->preciounit+0,null)','footer'=>'Total :'),
		//'preciounit',
		array('name'=>'monto','value'=>'Yii::app()->numberFormatter->format("#,##0.00",$data->monto+0,null)','footer'=>Yii::app()->numberFormatter->format("#,##0.00",VwAtencionessolpe::getTotal($prove)['real'])),
		//'monto',
		'ceco',
		'usuario',
	    ),
              )
           );
?>


