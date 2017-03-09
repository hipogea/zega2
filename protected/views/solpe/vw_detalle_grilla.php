<?php
$prove=Desolpe::model()->search_por_solpe($idcabecera);
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-grid',
	'dataProvider'=>$prove,
	//'filter'=>$model,
	//'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid.css',  // your version of css file
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

		array('name'=>'item', 'htmlOptions'=>array('width'=>1)),
			array('name'=>'tipimputacion','header'=>'I','htmlOptions'=>array('width'=>5)),
			array('name'=>'tipsolpe','header'=>'T','htmlOptions'=>array('width'=>5)),
			//'tipsolpe',
	       array('name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].$data->codocu.$data->est.".png")'),
	   
	      //array('name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'($data->est=="02")?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."tacho.jpg"):""'),
		//'n_hguia',
		//'c_itguia',
		array('name'=>'cant','header'=>'Cant'),
		array('name'=>'desolpe_um.desum','header'=>'Um','htmlOptions'=>array('width'=>5)),
		//array('name'=>'codart','header'=>'Cod.','htmlOptions'=>array('width'=>5)),
		array('name'=>'codart', 'type'=>'raw','value'=>'($data->codart==yii::app()->settings->get("materiales","materiales_codigoservicio"))?"":CHtml::link($data->codart,yii::app()->createUrl("/maestrocompo/ver/",array("id"=>$data->codart)) ,array("target"=>"_blank")  )','htmlOptions'=>array('width'=>5)),

		//'c_edgui',	
		array('name'=>'txtmaterial','header'=>'Descripcion','htmlOptions'=>array('width'=>600)),
		//array('name'=>'texto', 'type'=>'raw','header'=>'t','value'=>'(!empty($data->m_obs))?"x":""' ),
                 array('name'=>'textodetalle', 'type'=>'raw','header'=>'t','value'=>'(!empty($data->textodetalle))?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."texto.png","hola"):""' ),

		array('name'=>'imputacion','header'=>'Imp','htmlOptions'=>array('width'=>25)),
		array('name'=>'centro','header'=>'Cent','htmlOptions'=>array('width'=>5)),
		array('name'=>'codal','header'=>'Alm','htmlOptions'=>array('width'=>5)),
		array('name'=>'solicitanet','header'=>'Solic','htmlOptions'=>array('width'=>225)),
		/*array(
			'name'=>'fechacrea',
			'value'=>'date("d/m/Y", strtotime($data->fechacrea))',
		  ),*/
		array(
			'name'=>'fechaent',
			//array('name'=>'fechaent','header'=>'Para'),
			'header'=>'Para',
			//'value'=>'date("d/m/y", strtotime($data->fechaent))',
                       'value'=>'$data->fechaent',
			'htmlOptions'=>array('width'=>40),
		),
			'usuario',	
			'desolpe_estado.estado',	//'estado',

		array('name'=>'punitplan','header'=>'Plan','value'=>'MiFactoria::decimal($data->punitplan)','footer'=>MiFactoria::decimal(Desolpe::getTotal($prove)['plan'],2)),
		array('name'=>'punitreal','header'=>'Real','value'=>'MiFactoria::decimal($data->punitreal)','footer'=>MiFactoria::decimal(Desolpe::getTotal($prove)['real'],2)),
		//array('name'=>'punitreal','header'=>'Real','value'=>'MiFactoria::decimal($data->cc_gastos)'),
          //'punitreal',

		array(
			'htmlOptions'=>array('width'=>320),
			'class'=>'CButtonColumn',
			 'buttons'=>array(
			 
			 
                        'update'=>
                            array(
                            	   'visible'=>'true',
                                    'url'=>'$this->grid->controller->createUrl("/solpe/Modificadetalle/",
										    array("id"=>$data->id,
                                                                                         "asDialog"=>1,
											"gridId"=>$this->grid->id,
											"ed"=>"si",

											)
									    )',
                                    'click'=>('function(){ 

							    $("#cru-dialogdetalle").dialog("open");
										$("#cru-detalle").attr("src",$(this).attr("href"));
							     return false;
							 }'),
								'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'lapicito.png',
								'label'=>'Actualizar Item', 
                                ),


								'delete'=>

                             array(
                             	    'visible'=>'true',
                                    'url'=>'$this->grid->controller->createUrl("/Solpe/cargadetalle", array("identi"=>$data->id))',
							 'options' => array( 'ajax' => array('type' => 'GET', 'update'=>'#zona' ,'url'=>'js:$(this).attr("href")'),
							  'onClick'=>'Loading.show();Loading.hide(); ',
							 ) ,
						    'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'hand_point.png',
								'label'=>'Ver detalle',
                                ),	
							

                            


                               'view'=>
                            array(
                            	   'visible'=>'($data->est=="30" )?true:false',
                                    'url'=>'$this->grid->controller->createUrl("/solpe/Reservaitem/",
										    array("id"=>$data->id,
                                                                                         "asDialog"=>1,
											"gridId"=>$this->grid->id,
											"ed"=>"no",

											)
									    )',
                                    'click'=>('function(){ 
							    $("#cru-detalle").attr("src",$(this).attr("href")); 
							    $("#cru-dialogdetalle").dialog("open");  
							     return false;
							 }'),
								'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'box.png',
								'label'=>'Reservar', 
                                ),

                            ),
		),
	),
)); ?>
