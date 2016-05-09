<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-grid',	
	'dataProvider'=>VwKardex::model()->search_porvale($idcabecera),
	//'filter'=>$model,
	//'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'grid_mediano.css',  // your version of css file
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'summaryText'=>'',
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

		array(
			'name'=>'.',
			'type'=>'raw',
			'value'=>'($data->codestado=="98")?CHtml::Image("'.Yii::app()->getTheme()->baseUrl.'/img/tacho1.png"):""',
		),
			//'item',
			//array('name'=>'tipimputacion','header'=>'I'),
		//	array('name'=>'tipsolpe','header'=>'T'),
			//'tipsolpe',
	     // array('name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'($data->est=="02")?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."tacho.jpg"):""'),
		//'n_hguia',
		//'c_itguia',
		'cant',
                'um',
		'codart',
		//'c_edgui',	
		'txtmaterial',
                //array('name'=>'texto', 'type'=>'raw','header'=>'t','value'=>'(!empty($data->m_obs))?"x":""' ),
                 array('name'=>'comentario', 'type'=>'raw','header'=>'t','value'=>'(!empty($data->comentario))?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."texto.png","hola"):""' ),

		//'centro',
		//	'codal',
			//'fechacrea',
			//'fechaent',
			//'usuario',		//'estado',
		
                
		array(
			'class'=>'CButtonColumn',
			 'buttons'=>array(
			 
			 
                        'update'=>
                            array(
                            	   'visible'=>($eseditable=="disabled")?'false':'true',
                                    'url'=>'$this->grid->controller->createUrl("/almacendocs/Modificadetalle/",
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
								'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'update.png', 
								'label'=>'Actualizar Item', 
                                ),
								'delete'=>
                              array(
                                   
								'visible'=>'false',
                                ),
                               'view'=>
                            array(
                            	   'visible'=>'false',
                                    'url'=>'$this->grid->controller->createUrl("/solpe/Modificadetalle/",
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
								'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'check1.png', 
								'label'=>'Aprobado...', 
                                ),

                            ),
		),
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
	),
)); ?>
