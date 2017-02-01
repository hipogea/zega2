<?php

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-grid',
	'dataProvider'=>VwDetalleGuia::model()->search_por_guia($idcabecera),
	//'filter'=>$model,
	//'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'grid_mediano.css',  // your version of css file
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'summaryText'=>'',
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
	      array('name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'($data->c_estado=='.$this::CODIGO_ESTADO_DETALLE_ANULADO.')?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."tacho1.png"):""'),
		//'n_hguia',
		'c_itguia',
		'n_cangui',
		array('name'=>'um','header'=>'UM', 'type'=>'raw','value'=>'($data->desum)'),

		'c_codgui',
            
		//'c_edgui',	
		array('name'=>'c_descri','header'=>'Descripcion', 'type'=>'raw','value'=>'($data->c_estado=='.$this::CODIGO_ESTADO_DETALLE_ANULADO.')?CHtml::openTag("strike").$data->c_descri.CHtml::closeTag("strike"):$data->c_descri'),
                //array('name'=>'texto', 'type'=>'raw','header'=>'t','value'=>'(!empty($data->m_obs))?"x":""' ),
                 array('name'=>'texto', 'type'=>'raw','header'=>'t','value'=>'(!empty($data->m_obs))?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."texto.png","hola"):""' ),

		'c_codactivo',
			'nomep',
			'desmotivo',
		//'estado',
		
                
		array(
			'class'=>'CButtonColumn',
			 'buttons'=>array(
			 
			  'view'=>
                            array(
                            	   'visible'=>($eseditable=="disabled")?'false':'true',
                                    'url'=>'(strlen(trim($data->c_codactivo))>0)?$this->grid->controller->createUrl("/guia/Modificadetalleactivo/", array("id"=>$data->idtemp,"asDialog"=>1,"gridId"=>$this->grid->id,"ed"=>"no",)):$this->grid->controller->createUrl("/guia/Modificadetalle/", array("id"=>$data->idtemp,"asDialog"=>1,"gridId"=>$this->grid->id,"ed"=>"no",))',
                                    'click'=>('function(){ 
							    $("#cru-detalle").attr("src",$(this).attr("href")); 
							    $("#cru-dialogdetalle").dialog("open");  
							     return false;
							 }'),
								'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'view.png', 
								'label'=>'Actualizar Item', 
                                ),
                        'update'=>
                            array(
                            	   'visible'=>($eseditable=="disabled")?'false':'true',
								'url'=>'$this->grid->controller->createUrl("/guia/Modificadetalle/", array("id"=>$data->idtemp,"asDialog"=>1,"gridId"=>$this->grid->id,"ed"=>"no","tipo"=>$data->c_af))',
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

                            ),
		),
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
	),
)); ?>

