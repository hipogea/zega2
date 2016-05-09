
<?php MiFactoria::titulo('Kardex del material '.$modelo->codart.' '.$modelo->maestro->descripcion,'Cast')  ?>

<?php $this->widget('ext.groupgridview.GroupGridView', array(
	'id'=>'alkardex-grid',
	'dataProvider'=>$proveedor,
		'mergeColumns' => array('numvale','movimiento'),
	//'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$model,
	'columns'=>array(
		array('name'=>'numvale','header'=>'Vale','type'=>'raw','value'=>'CHtml::link($data->numvale,Yii::app()->createurl(\'/almacendocs/update\', array(\'id\'=> $data->hidvale ) ))'),
		'movimiento',
        'codart',
        array('name'=>'.','header'=>'.','type'=>'raw','value'=>'($data->cant <0)?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."salida.png","hola"):CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."entrada.png","hola")'),

        array('name'=>'desum','htmlOptions' => array('width' => 10) ),
        'cant',
       /* array('name'=>'descripcion',
            'htmlOptions' => array('width' => 250)
        ),*/
		array(
			'name'=>'fecha',
			'header'=>'Fec',
			'value'=>'date("d.m.Y", strtotime($data->fecha))','htmlOptions'=>array('width'=>'50')
		),
		//'numdoc',
		//'movimiento',
		//'codmov',
		'codcentro',		
		'alemi',
       // array('name'=>'c_numgui','type'=>'raw','value'=>'CHtml::link($data->c_numgui, ($data->c_salida==\'1\')?Yii::app()->createurl(\'/guia/update\', array(\'id\'=> $data->id ) ) :  Yii::app()->createurl(\'/ne/update\', array(\'id\'=> $data->id ) )          )'),
        'desdocu',
		array('name'=>'numdocref','header'=>'Referencia','type'=>'raw','value'=>'$data->numdocref'),


    ),
)); ?>
