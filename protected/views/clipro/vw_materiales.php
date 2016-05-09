
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'materiales-grid',
	'dataProvider'=>Maestroclipro::model()->search_codigo($codpro),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'codart',
		'maestroclipro_maestrocompo.descripcion',
		'codpro',
		'codmon',
		'precio',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
			 'buttons'=>array(
                        'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("/Clipro/Actualizamateriales",
																					array("id"=>$data->id,
																					        "codpro"=>$data->codpro,
																							"asDialog"=>1,
																								"gridId"=>$this->grid->id
																							)
																				)',
                                    'click'=>'function(){ 
									                     $("#cru-frame4").attr("src",$(this).attr("href")); 
									                     $("#cru-dialog4").dialog("open");  
														 return false;
														 }',
                                ),
                            ),
		),
	),
)); ?>






<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog4',
    'options'=>array(
       // 'title'=>'Materiales',
        'autoOpen'=>false,
        'modal'=>false,
        'width'=>500,
        'height'=>400,
    ),
    ));
?>
<iframe id="cru-frame4" width="100%" height="100%" BORDER="0"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>
<?php
 $createUrl = $this->createUrl('/clipro/creamaterial',
										array(
										        //"id"=>$model->n_direc,
												"asDialog"=>1,
												"gridId"=>'materiales-grid',
												"codpro"=>$model->codpro,
											)
							);
 echo CHtml::link('Agregar material','#',array('onclick'=>"$('#cru-frame4').attr('src','$createUrl '); $('#cru-dialog4').dialog('open');"));
?>
