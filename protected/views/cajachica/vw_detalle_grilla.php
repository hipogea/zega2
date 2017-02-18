<?php
$prove=Dcajachica::model()->search_por_caja($idcabecera);
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-grid',
	'dataProvider'=>$prove,
	//'filter'=>$model,
	'itemsCssClass'=>'table table-striped table-bordered table-hover',

	'summaryText'=>'->',
	'columns'=>array(
			

			array(
           'class'=>'CCheckBoxColumn',
		    'selectableRows' => 20,
		    'value'=>'$data->id',
			'checkBoxHtmlOptions' => array(                
				'name' => 'cajita[]',
				//'enabled'=>'(($data->coddocu=="001") and ($data->codpro <> "R00001"))?"false":"true"',
                 //'disabled'=>'true',

		   ),
           // 'id'=>'cajita' // the columnID for getChecked
       ),

		//array('name'=>'item', 'htmlOptions'=>array('width'=>1)),
			//array('name'=>'fecha','header'=>'fecha','htmlOptions'=>array('width'=>5)),
		array(
			'name'=>'fecha',
			//array('name'=>'fechaent','header'=>'Para'),
			'header'=>'Fecha',
			'value'=>'date("d.m.y", strtotime($data->fecha))',
			'htmlOptions'=>array('width'=>50),
		),
		array('name'=>'tipoflujo','header'=>'Tipo','value'=>'$data->flujos->destipo','htmlOptions'=>array('width'=>140)),
		array('name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'($data->tipoflujo=="102")?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."rojo.png"):""'),

		array('name'=>'glosa','header'=>'Glosa','htmlOptions'=>array('width'=>205)),
		//array('name'=>'codocu','header'=>'Documento','value'=>'$data->documentos->desdocu','htmlOptions'=>array('width'=>200)),
		array('name'=>'referencia','header'=>'Ref.','htmlOptions'=>array('width'=>205)),
		array('name'=>'moneda','header'=>'Moneda','value'=>'$data->monedahaber','htmlOptions'=>array('width'=>5)),
		array('name'=>'debe','header'=>'Cargo','footer'=>MiFactoria::decimal(Dcajachica::getMonto($prove)),'htmlOptions'=>array('width'=>5)),
		array('name'=>'monto','header'=>'Monto','value'=>'MiFactoria::decimal($data->monto)','htmlOptions'=>array('width'=>5)),
		array('name'=>'rendido','header'=>'Rendido','value'=>'$data->rendido','htmlOptions'=>array('width'=>50)),
		array('name'=>'codtra','header'=>'Responsable','value'=>'$data->trabajadores->ap."-".$data->trabajadores->am."-".$data->trabajadores->nombres','htmlOptions'=>array('width'=>405)),
		array('name'=>'Ceco','header'=>'Cc','value'=>'$data->ceco','htmlOptions'=>array('width'=>10)),
	//	array('name'=>'Imput','header'=>'Imput','value'=>'$data->cco->desceco','htmlOptions'=>array('width'=>140)),
		array('name'=>'estado','header'=>'Estado','value'=>'$data->estado->estado','htmlOptions'=>array('width'=>140)),



		//array('name'=>'saldo','header'=>'Plan','value'=>'round($data->punitplan,2)','footer'=>round(Desolpe::getTotal($prove)['plan'],2)),
		//array('name'=>'punitreal','header'=>'Real','value'=>'round($data->alkardex_gastos,2)','footer'=>round(Desolpe::getTotal($prove)['real'],2)),


		array(
			'htmlOptions'=>array('width'=>400),
			'class'=>'CButtonColumn',
			 'buttons'=>array(
			 
			 
                        'update'=>
                            array(
                            	   'visible'=>'true',
                                    'url'=>'$this->grid->controller->createUrl("/cajachica/actualizadetalle/",
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


				 'delete'=> array(
					 'visible'=>'false',

				 ),





				 'view'=> array(
					 'visible'=>'true',
					 'url'=>'$this->grid->controller->createUrl("/Cajachica/aprobaritem", array("id"=>$data->id))',
					 'options' => array(
						 'ajax' => array(
							 'type' => 'GET',
							 'success'=>"function(data) {
							 $.fn.yiiGridView.update('detalle-grid');  $.growlUI('Growl Notification', data,2400); return false;
                                                                       }",

							 'url'=>'js:$(this).attr("href")'


						 ),

					 ) ,
					 'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'ok.png',
					 'label'=>'Aorbar',
				 ),
































			 ),
		),
	),
)); ?>