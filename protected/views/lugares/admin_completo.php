<?php
$this->widget('zii.widgets.grid.CGridView', array(
	//'id'=>'detgui-grid',
	'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'grid_chevere.css',
	
	'summaryText'=>'',
	'dataProvider'=>$prove,
	//'filter'=>$model,
	'columns'=>array(       	
	   array('name'=>'deslugar','header'=>'Lugares registrados en esta direccion:'),
		
	),
)); ?>
