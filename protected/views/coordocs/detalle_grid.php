<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'coordreporte-grid',
	'dataProvider'=>$regi->search_por_hidreporte($idcabeza),
	'filter'=>$regi,
	'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',

	'columns'=>array(
		'id',
		'visiblecampo',
		'codocu',
		'left_',
		'top',
		'font_size',
		'font_family',
		'aliascampo',
		'longitudcampo',
		'esdetalle',
		//'nombre_campo',
		array('name'=>'nombre_campo','type'=>'raw','value'=>'CHtml::link($data->nombre_campo,Yii::app()->createurl(\'/coordreporte/update\', array(\'id\'=> $data->id ) ) )'),

		'tipodato',
		/*
		'font_weight',
		'font_color',
		'nombre_campo',
		'lbl_left',
		'lbl_top',
		'lbl_font_size',
		'lbl_font_weight',
		'lbl_font_family',
		'lbl_font_color',
		'visiblelabel',
		'visiblecampo',
		*/

		array(
			'htmlOptions'=>array('width'=>20),
			'class'=>'CButtonColumn',
			'template'=>'{update}',
			'buttons'=>array(


				'update'=>
					array(
						'visible'=>'true',
						'url'=>'$this->grid->controller->createUrl("/coordreporte/update/",
										    array("id"=>$data->id,
                                                                                         "asDialog"=>1,
											"gridId"=>$this->grid->id,
											"ed"=>"si",

											)
									    )',
						'click'=>('function(){
							    $("#cru-detalle").attr("src",$(this).attr("href"));
							    $("#cru-dialogdetalle").dialog("open");
							     return false;
							 }'),
						'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'lapicito.png',
						'label'=>'Actualizar Item',
					),




			),
		),
	),
)); ?>
