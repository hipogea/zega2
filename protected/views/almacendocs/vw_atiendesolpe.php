<h1> Reservar solicitud  -  <?php echo $modelo->numero; ?>  </h1>
<div class="division">
<div class="wide form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'almacendocs-form',
	'enableAjaxValidation'=>false,
)); ?>


<div class="row">
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'atiende-solpe-grid',
	'dataProvider'=>Desolpe::model()->search_por_solpe_mas($modelo->id),
	'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid-pequeno.css',
	//'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$model,
	//'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'grid_mediano.css',  // your version of css file

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
			'item',
			array('name'=>'tipimputacion','header'=>'I'),
			array('name'=>'tipsolpe','header'=>'T'),
			//'tipsolpe',
	       array('name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].$data->codocu.$data->est.".png")'),
	   
	      //array('name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'($data->est=="02")?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."tacho.jpg"):""'),
		//'n_hguia',
		//'c_itguia',
		'cant',
                array('name'=>'um','value'=>'$data->desolpe_um->desum'),
		'codart',
		//'c_edgui',	
		'txtmaterial',
                //array('name'=>'texto', 'type'=>'raw','header'=>'t','value'=>'(!empty($data->m_obs))?"x":""' ),
                 array('name'=>'textodetalle', 'type'=>'raw','header'=>'t','value'=>'(!empty($data->textodetalle))?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."texto.png","hola"):""' ),

		'centro',
			'codal',
			//'fechacrea',
			//'fechaent',
			'usuario',		//'estado',
			array('name'=>'Stock','value'=>'$data->desolpe_alinventario->cantlibre','type'=>'raw'),
			array('name'=>'Reservado','value'=>'$data->desolpe_alinventario->cantres','type'=>'raw'),
		 array( //TextBox --- Displays quantity
        'header'=>'Reservar',
         'value'=>'CHTML::TextField("cantreserva".$data->id,$data->cant,array(\'size\'=>\'4\'))',
        'type'=>'raw',
        'htmlOptions'=>array('width'=>'10px'),
      ),
		  array( //TextBox --- Displays quantity
        'header'=>'Tomar',
        'value'=>'CHTML::TextField("cantcompra".$data->id,0,array(\'size\'=>\'4\'))',
        'type'=>'raw',
        'htmlOptions'=>array('width'=>'10px'),
      ),

  array('name'=>'holas', 'type'=>'raw', 'value'=> '($data->est=="03")?CHtml::ajaxSubmitButton("Ok",
																				array("almacendocs/reservar"),
																				array("type"=>"POST",
																					"data"=>array(
																						"vcantreserva"=>"js:cantreserva".$data->id.".value",
																						"vhidesolpe"=>$data->hidsolpe,
																						"vcantcompra"=>"js:cantcompra".$data->id.".value",
																						"vidsolpe"=>$data->id),																																														
																					"success"=>"js:function(data) { $.fn.yiiGridView.update(\'atiende-solpe-grid\')}"
																					)
																			):$data->desolpe_estado->estado'
																							),



                
		array(
			'class'=>'CButtonColumn',
			 'buttons'=>array(
			 
                          'update'=>
                             array(
                                    'url'=>'$this->grid->controller->createUrl("/almacendocs/reservar",
																					array("id"=>$data->id,																					      
																						
																								
																							)
																				)',
						     
						   // 'imageUrl'=>''.Resuelveruta::ArreglaRuta(Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid']).'hint.png', 
								'label'=>'Aprobar', 
                                ),
								'delete'=>
                              array(
                                   
								'visible'=>'false',
                                ),
                               'view'=>
                            array(
                            	   'visible'=>'($data->est=="03")?true:false',
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

<?php $this->endWidget(); ?>
</div>

</div>

</div>


<div id="zonaer">
	

</div>