<div style="width:300px; float:left;" >
<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'Invegntario-grid',
	'dataProvider'=>$proveedor,
//	'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_celeste.css',
	'summaryText'=>'',
	//'filter'=>$model,
	'columns'=>array(
		array('name'=>'valor','header'=>'Valores','htmlOptions'=>array('width'=>45)),

	),
)); ?>

</div>