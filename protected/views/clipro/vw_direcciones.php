
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'direcciones-grid',
	'dataProvider'=>$proveedor,
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$modelodirecciones,
	'columns'=>array(
		'c_hcod',
		'c_direc',
		//'l_vale',
		'c_nomlug',
		//'n_valor',
		'ubigeos.distrito',
		'ubigeos.provincia',
		'ubigeos.departamento',
		'n_direc',
		///'socio',
		//'creadopor',
		//'creadoel',
		//'modificadopor',
		//'modificadoel',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
			 'buttons'=>array(
                        'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("/clipro/actualizadirecciones",
																					array("id"=>$data->n_direc,
																					        "codpro"=>$data->c_hcod,
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
        'title'=>'Direcciones',
        'autoOpen'=>false,
        'modal'=>false,
        'width'=>500,
        'height'=>400,
    ),
    ));
?>
<iframe id="cru-frame" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>
<?php
 $createUrl = $this->createUrl('/clipro/creadireccion',
										array(
										        //"id"=>$model->n_direc,
												"asDialog"=>1,
												"gridId"=>'direcciones-grid',
												"codpro"=>$model->codpro,
											)
							);
 echo CHtml::link('Agregar direccion','#',array('onclick'=>"$('#cru-frame').attr('src','$createUrl '); $('#cru-dialog').dialog('open');"));
?>
