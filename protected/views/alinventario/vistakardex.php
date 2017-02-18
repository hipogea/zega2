<?php

/*echo "centro  ".$model->codcen."\n";
echo "almacen  ".$model->codalm."\n";
echo "material  ".$model->codart."\n";*/


 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'alkardex-gridXX',
	'dataProvider'=>$proveedor,
	// 'dataProvider'=>VwKardex::model()->search(),
	 'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$model,
	'columns'=>array(
		//'numkardex',
        'codart',
        array('name'=>'.','header'=>'.','type'=>'raw','value'=>'($data->cant <0)?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."salida.png","hola"):CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."entrada.png","hola")'),

        array('name'=>'desum','htmlOptions' => array('width' => 10) ),
        'cant',

		'fecha',
		//'numdoc',
		'movimiento',
		'codmov',
		'codcentro',		
		'alemi',
		'desdocu',
        array('name'=>'numvale','header'=>'Vale','type'=>'raw','value'=>'CHtml::link($data->numvale,Yii::app()->createurl(\'/almacendocs/update\', array(\'id\'=> $data->hidvale ) ),array("target"=>"_blank"))'),
       // array('name'=>'c_numgui','type'=>'raw','value'=>'CHtml::link($data->c_numgui, ($data->c_salida==\'1\')?Yii::app()->createurl(\'/guia/update\', array(\'id\'=> $data->id ) ) :  Yii::app()->createurl(\'/ne/update\', array(\'id\'=> $data->id ) )          )'),
        array('name'=>'numdocref','header'=>'Referencia','type'=>'raw','value'=>'$data->numdocref'),


    ),
)); ?>
