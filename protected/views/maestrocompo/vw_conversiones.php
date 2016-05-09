
<?php $proveedor= Alconversiones::model()->search_material($model->codigo);?>



	<?php MiFactoria::titulo('Conversiones ','package');?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'conversiones-grid',
	'dataProvider'=>$proveedor,
	//'dataProvider'=>Alconversiones::model()->search(),
	//'filter'=>$model,
	'columns'=>array(
		'numerador',
		'alconversiones_um1.desum',
		array('name'=>'st.','header'=>'=>', 'type'=>'raw','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."Conversion.png")'),
	   		'denominador',
		'alconversiones_um2.desum',
		array(
			'class'=>'CButtonColumn',
			 'buttons'=>array(
			 
			 
                        'update'=>
                            array(
                            	   'visible'=>'true',
                                    'url'=>'$this->grid->controller->createUrl("/Maestrocompo/Modificaconversion/",
										    array("id"=>$data->id,
                                                   "asDialog"=>1,
											"gridId"=>$this->grid->id,
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

                            ),
		),
			
			),
))); ?>



<?php 
        if ($habilitado=="") {
 				$createUrl = $this->createUrl('/maestrocompo/creaconversion',
										array(
										       "codigo"=>$model->codigo,
										       //"cest"=>$model->codestado,
											   //"id"=>$model->n_direc,
												"asDialog"=>1,
												"gridId"=>'detalle-conversion',
												//"idcabecera"=>Numeromaximo::numero_aleatorio(20,100000),
												
											)
							);

						echo CHtml::button("   +   ",array('title'=>"Agregar ",'onclick'=>" $('#cru-detalle').attr('src','$createUrl ');$('#cru-dialogdetalle').dialog('open');")); 


					
        }

?>


<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialogdetalle',
	'options'=>array(
		'title'=>'',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>400,
		'height'=>200,
	),
));
?>
<iframe id="cru-detalle" width="100%" height="100%"></iframe>
<?php

$this->endWidget();
//--------------------- end new code --------------------------
?>