<h1>Ajustes de Solicitud de pedido  <?php  echo "    - ".Yii::app()->user->name;  ?></h1>



  <div style="width:300px; ">
<?php

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-grid2',
	'dataProvider'=>$proveedor,
	//'filter'=>$model,
	//'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'grid_mediano.css',  // your version of css file

	'summaryText'=>'',
	'columns'=>array(
		'desdocu',
                'idusuario',
		'campo',
		'nombrecampo',
		'valor',
                
		array(
			'class'=>'CButtonColumn',
			 'buttons'=>array(
			 
			  'view'=>
                            array(
                                   
								'visible'=>'false',
                                ),
						 
                        'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("/Opcionesdocumentos/Update/",
										    array("id"=>$data->id,
                                                                                         "asDialog"=>1,
											"gridId"=>$this->grid->id
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

                            ),
		),
                                
	),
)); ?>
       </div> 








<div style="width:300px; ">
<?php

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-grid',
	'dataProvider'=>$proveedor1,
	//'filter'=>$model,
	//'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'grid_mediano.css',  // your version of css file

	'summaryText'=>'',
	'columns'=>array(
		'desdocu',
                'idusuario',
		'campo',
		'nombrecampo',
		'valor',
                
		array(
			'class'=>'CButtonColumn',
			 'buttons'=>array(
			 
			  'view'=>
                            array(
                                   
								'visible'=>'false',
                                ),
						 
                        'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("/Opcionesdocumentos/Update/",
										    array("id"=>$data->id,
                                                                                         "asDialog"=>1,
											"gridId"=>$this->grid->id
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

                            ),
		),
                                
	),
)); ?>
          

          <div class="division">

 <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'solpe-form',
	'enableAjaxValidation'=>false,
)); ?>
   	

   			<?php  echo CHtml::label('mensajs','yh',array());   ?>
   	 

   		
 			<?php  echo CHtml::Checkbox('mensaje',true,array());   ?>
    
 				<?php  echo CHtml::ajaxsubmitbutton('Confirmar','Solpe/confirmamensajes');   ?>

<?php $this->endWidget(); ?>

</div>       
     	
        
      </div>
        
     


        
<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialogdetalle',
    'options'=>array(
        'title'=>'Ingresar valor',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>200,
        'height'=>250,
		'show'=>'Transform',
    ),
    ));
?>








<iframe id="cru-detalle" frameborder="0"  width="100%" height="100%" ></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>
          
                
                
       </div>         
                
                
                
                
                
                
                
                
                

