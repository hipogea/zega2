<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-grid',	
	'dataProvider'=>Tempalkardex::model()->search_por_vale($idcabecera),
	//'filter'=>$model,
	//'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'grid_mediano.css',  // your version of css file
	//'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid.css',  // your version of css file
	//'summaryText'=>'',
	'itemsCssClass'=>'table table-striped table-bordered table-hover',

	'columns'=>array(
			

			array(
           'class'=>'CCheckBoxColumn',
		    'selectableRows' => 20,
		    'value'=>'$data->idtemp',
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
	      //array('name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'($data->est=="02")?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."tacho.jpg"):""'),
		//'n_hguia',
		//'c_itguia',
		'cant',
		//'um',
		array('name'=>'um','header'=>'Um.','value'=>'$data->unidades->desum','htmlOptions'=>array('width'=>5)),
		'codart',
		//'c_edgui',	
		'maestro.descripcion',
             array(
			'name'=>'fr',
			'type'=>'raw',
			'value'=>'($data->checki=="1")?CHtml::Image("'.Yii::app()->getTheme()->baseUrl.'/img/delivery.png"):""',
                     'htmlOptions' => array('width' => 30)
		),
                //array('name'=>'texto', 'type'=>'raw','header'=>'t','value'=>'(!empty($data->m_obs))?"x":""' ),
                 array('name'=>'comentario', 'type'=>'raw','header'=>'t','value'=>'(!empty($data->textolargo))?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."texto.png","hola"):""' ),

		//'centro',
		//	'codal',
			//'fechacrea',
			//'fechaent',
			//'usuario',		//'estado',
		
                
		array(
			'class'=>'CButtonColumn',
			'htmlOptions'=>array('width'=>100),
			'template'=>'{update}',
			 'buttons'=>array(

			 
                        'update'=>
                            array(
                            	   'visible'=>'true',
                                    'url'=>'$this->grid->controller->createUrl("/almacendocs/Modificadetalle/",
										    array("id"=>$data->idtemp,
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
						 'visible'=>'true',
						 'url'=>'$this->grid->controller->createUrl("/almacendocs/borraitem", array("id"=>$data->idtemp))',
						 'options' => array( 'ajax' => array('type' => 'GET',  'success' => "js:function() { $.fn.yiiGridView.update('detalle-grid'); }" ,'url'=>'js:$(this).attr("href")'),
							 'onClick'=>'Loading.show();Loading.hide(); ',
						 ) ,
						 'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'hand_point.png',
						 'label'=>'Ver detalle',
					 ),
				 'view'=>
                            array(
                            	   'visible'=>'true',
                                    'url'=>'$this->grid->controller->createUrl("/Almacendocs/Borraitem/",
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
								'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'borrador.png',
								'label'=>'Borrar...',
                                ),

                            ),
		),
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
	),
)); ?>
