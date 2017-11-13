	<?php 
	Yii::app()->clientScript->registerScript('grabPageNo', "
    $('.bolsita').on('click', function(event){  
											//	alert(event.target.id);
												 $.ajax({	   
      url: '/recurso/index.php?r=observaciones/cambiaestado',  
		type: 'GET',
	  data: {   colo: event.target.id		 
				} ,
       datatype: 'html',	  
        success: function(datos){
								alert( datos); 
								$.fn.yiiGridView.update('animax-grid');
								
								}
								
								});
												
												}
					);
					
											");


?>	

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'animax-grid',
	//'filter'=>$model,
	'dataProvider'=>$proveedorobs,	
	'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css', 
	'columns'=>array(
	  //  array('name'=>'hidinventario','visible'=>true),
	  //  array('name'=>'id','header'=>''),
		//array('name'=>'hidinventario','value'=>$canica ),
		array('name'=>'fecha','header'=>'Fecha','value'=>'date("d/m/Y",strtotime($data->fecha))'),
		array('name'=>'descri','header'=>'Descripcion                      '),
		array('name'=>'mobs','header'=>'Observacion                                                                        '),
		array('name'=>'usuario','header'=>'Autor'),
		array('name'=>'estado','header'=>'Estado'),		
		 array('name'=>'ni', 'type'=>'raw', 'value'=>(!(Yii::app()->user->isGuest))?'CHtml::Button("Cerrar",array("id"=>$data->id,"class"=>"bolsita")) ': 'CHtml::Button("Cerrar",array("id"=>$data->id,"class"=>"bolsita", "disabled"=>"disabled")) '),
		//array('name'=>'numerodocumento','header'=>'Comentario'),
		//CHtml::Button('Cancel',array('submit'=>'index.php?r=user/cancel'));
		
		array(
			'class'=>'CButtonColumn',
			 'buttons'=>array(
			 
			  'view'=>
                            array(
                                   
								'visible'=>'false',
                                ),
						 
                        'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("/observacionesdetalle/create",
																					array("idobservacion"=>$data->id,																					      
																							"asDialog"=>1,
																								"gridId"=>$this->grid->id
																							)
																				)',
                                    'click'=>(!(Yii::app()->user->isGuest))?'function(){ 
									                     $("#cru-frame1").attr("src",$(this).attr("href")); 
									                     $("#cru-dialog1").dialog("open");  
														 return false;
														 }':'function() {alert("Debes de inicar sesion primero")}',
								'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'mas.png', 
								'label'=>'Agregar comentario a la observacion', 
                                ),
								'delete'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("/observacionesdetalle/admin",
																					array("idobservacion"=>$data->id,																					      
																							"asDialog"=>1,
																								"gridId"=>$this->grid->id
																							)
																				)',
                                    'click'=>'function(){ 
									                     $("#cru-frame2").attr("src",$(this).attr("href")); 
									                     $("#cru-dialog2").dialog("open");  
														 return false;
														 }',
								'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'eye.png', 
								'label'=>'Ver los comentarios', 
									
                                ),

                            ),
		),
		//array('name'=>'nada','type'=>'raw','header'=>'Notificar','value'=>'CHtml::link("Responder","#",array("onclick"=>$(#cru-frame1).attr("src",""); $(#cru-dialog1).dialog("open");))' ),
		
	),
)); 

?>


<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog',
    'options'=>array(
        'title'=>'Observaciones',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>500,
    ),
    ));
?>
<iframe id="cru-frame" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>




<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog2',
    'options'=>array(
        'title'=>'Lista de comentarios',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>500,
    ),
    ));
?>
<iframe id="cru-frame2" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>


























<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog1',
    'options'=>array(
        'title'=>'',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>300,
    ),
    ));
?>
<iframe id="cru-frame1" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>

<?php

 $createUrl = $this->createUrl('/observaciones/create',
										array(										       
												"idinventario"=>$canica,
												"asDialog"=>1,
												"gridId"=>'animax-grid',												
											)
							);
	$mensaje="Para agregar una observacion debe de inicar sesion primero";
 echo CHtml::link('Agregar observacion','#',array('onclick'=>(!(Yii::app()->user->isGuest))?"$('#cru-frame').attr('src','$createUrl'); $('#cru-dialog').dialog('open');":"alert('$mensaje')"));
?>