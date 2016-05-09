
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'contactos-grid',
	'dataProvider'=>$proveedor2,
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$modelodirecciones,
	'columns'=>array(
		//'c_hcod',
		'c_nombre',
		//'l_vale',
		'c_cargo',
		//'n_valor',
		'c_tel',		
		//'c_prov',
		//'c_departam',
		'c_mail',
		//'fecnacimiento',
		array('name'=>'fecnacimiento','value'=>'date("d/m",strtotime($data->fecnacimiento))'),
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
                                    'url'=>'$this->grid->controller->createUrl("/contactos/update",
																					array("id"=>$data->id,
																					        "codpro"=>$data->c_hcod,
																							"asDialog"=>1,
																								"gridId"=>$this->grid->id
																							)
																				)',
                                    'click'=>'function(){ 
									                     $("#cru-frame2").attr("src",$(this).attr("href")); 
									                     $("#cru-dialog2").dialog("open");  
														 return false;
														 }',
                                ),
                            ),
		),
		
	),	
	
))



; ?>

<?php

    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog2',
    'options'=>array(
        'title'=>'Contactos',
        'autoOpen'=>false,
        'modal'=>false,
        'width'=>400,
        'height'=>400,
    ),
    ));
?>
<iframe id="cru-frame2" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>
<?php
 $createUrl = $this->createUrl('/clipro/creacontacto',
										array(
										        //"id"=>$model->n_direc,
												"asDialog"=>1,
												"gridId"=>'contactos-grid',
												"codpro"=>$model->codpro,
											)
							);


 
 echo CHtml::link('Agregar contacto','#',array('onclick'=>"$('#cru-frame2').attr('src','$createUrl '); $('#cru-dialog2').dialog('open');"));
?>

