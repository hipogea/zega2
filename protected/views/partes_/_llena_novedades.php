
<?php
//ECHO "aqui esta lainvestigacion ".$model->numeroauxiliar;
 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'novedades-grid',
	'dataProvider'=>$proveedornovedades,
	//'filter'=>$modelonovedades,
	'columns'=>array(
		//'idnovedad',
		array('name'=>'sistemas_sistema','header'=>'Sistema','value'=>'$data->sistemas->sistema'),
		//array('name'=>'embarcaciones_nomep','header'=>'Embarcacion','value'=>'$data->embarcaciones->nomep'),
		//'hidparte',
		//'codsistema',
		//'codigosap',
		//'codigoaf',
		//'descri',		
		'descridetalle',
		'criticidad',
		//array('name'=>'numeroauxiliar','header'=>'holas','value'=>'',),
		///'socio',
		//'creadopor',
		//'creadoel',
		//'modificadopor',
		//'modificadoel',
		array(
			'class'=>'CButtonColumn',
			 'buttons'=>array(
                        'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("/novedades/update",
																					array("id"=>$data->idnovedad,
																					        "idparte"=>$data->hidparte,
																							"asDialog"=>1,
																								"gridId"=>$this->grid->id
																							)
																				)',
                                    'click'=>'function(){ 
									                     $("#cru-frame").attr("src",$(this).attr("href")); 
									                     $("#cru-dialog").dialog("open");  
														 return false;
														 }',
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
		
	),	
	
))



; ?>


<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog',
    'options'=>array(
        'title'=>'Novedades',
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
 $createUrl = $this->createUrl('/novedades/create',
										array(
										        //"id"=>$model->n_direc,
												"asDialog"=>1,
												"gridId"=>'novedades-grid',
												"idparte"=>$model->numeroauxiliar,
											)
							);
 echo CHtml::link('Crear novedad','#',array('onclick'=>"$('#cru-frame').attr('src','$createUrl '); $('#cru-dialog').dialog('open');"));
?>
