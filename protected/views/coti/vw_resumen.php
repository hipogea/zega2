
<DIV style="float:right; width:350px;">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'resumen-grid',
	'dataProvider'=>VwCotisubtotal::model()->search($id),
	//'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'style_original.css',  // your version of css file

	//'filter'=>$model,
	'summaryText'=>'',
	'columns'=>array(
		
		array('name'=>'subtotal','header'=>'Sub'),
		'destotal',
		'subtotaldes',
		'impuesto',
		'total'

	),
)); ?>
</division>