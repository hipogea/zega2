<?php

 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'alkardex-griggdXX',
	'dataProvider'=>Lotes::model()->search_por_inventario($model->id),
	// 'dataProvider'=>VwKardex::model()->search(),
	 'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$model,
	'columns'=>array(
		//'numkardex',
		'id',
        'numlote',
		'fechafabri',
        array('name'=>'.','header'=>'.','type'=>'raw','value'=>'($data->cant <0)?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."salida.png","hola"):CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."entrada.png","hola")'),
        'cant',
		'inventario.maestro.maestro_ums.desum',
		'fechaingreso',
		'fechavenc',
		'punit',

    ),
)); ?>
