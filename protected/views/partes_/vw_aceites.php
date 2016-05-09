 
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'inventario-grid',
	//'filter'=>$model,
	'summaryText'=>'',
	'dataProvider'=>$proveedoraceites,	
	'cssFile' => '/motoristas/css/grid/estilogrid.css',  // your version of css file
	'columns'=>array(
	
		//'descripcion',
		array('name'=>'descripcion','header'=>'Equipo'),
		//'material',
		array('name'=>'material','header'=>'Tipo Lub.'),
		array('name'=>'horascambio','header'=>'Horas Cambio'),
		//'fucambio',
		array('name'=>'fucambio','header'=>'Fu cambio','value'=>'date("d/m/Y",strtotime($data->fucambio))'),
		'hucambio',
		//'horasaceite',
		array('name'=>'horasaceite','header'=>'Vida del aceite (Hr)'),
		//'fulectura',
		array('name'=>'fulectura','header'=>'Fu lectura','value'=>'date("d/m/Y",strtotime($data->fulectura))'),
		
		//'horometro',
		//array('name'=>'Horometro','header'=>'Horomerrrtro','type'=>'raw','value'=>'CHtml::link("$data->horometro","#",array(\'onclick\'=>\'$("#cru-frame").attr("src","\'.Yii::app()->createurl(\'/cartereshorometro/update\', array(\'id\'=>$data->idequipo ,\'asDialog\'=>1  )).\'"); $("#cru-dialog").dialog("open"); return false;\',))'),
		array('name'=>'Horometro','header'=>'Horomerrrtro','type'=>'raw','value'=>'CHtml::link("($data->horometro)"," ".Yii::app()->createurl(\'/cartereshorometro/update\', array(\'id\'=> $data->id))."")'),
		
		 array(
            'class'=>'CButtonColumn',
            //--------------------- begin new code --------------------------
            'buttons'=>array(
                        'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("carteres/update", array("id"=>$data->id))',                                    
                                ),
							'view'=>
                            array(
                                   
									'url'=>'$this->grid->controller->createUrl("carterescambio/update", array("id"=>$data->id))', 	
                                ),
								'delete'=>
                            array(
                                   'visible'=>'false',                                    
                                ),
                            ),
				 ),	
		
		
		
		
		
	),
)); 
?>

	<?php
	  $matriz=$proveedoraceites->getdata();
	  //echo $valores['descripcion'];
	  $i=0;
	  foreach ($matriz as $clave => $valor) {
	            if ( $matriz[$i]['porcentaje'] >=0 and $matriz[$i]['porcentaje'] < 70)
				   $imagen="verde.jpg";
				  if ( $matriz[$i]['porcentaje'] >=70 and $matriz[$i]['porcentaje'] < 90) 
				   $imagen="ambar.jpg"; 
				    if ( $matriz[$i]['porcentaje'] >=90 ) 
				   $imagen="rojo.jpg"; 
				  if (!isset($imagen))
				    $imagen="rojo.jpg"; 
				   $ruta=Yii::app()->params['rutaimagenes'].$imagen;
					//$presionesmotor[$i]=$matriz[$i]['m_presionaceite']	;
					//$presionescaja[$i]=$matriz[$i]['caja_paceite']	;
			
			echo CHtml::image($ruta,"",array('border'=>0,'width'=>20,'height'=>20));
			echo CHtml::label($matriz[$i]['descripcion'],false,array('as'=>12));
			$this->widget('zii.widgets.jui.CJuiProgressBar',array(
					'value'=>$matriz[$i]['porcentaje'],	
					// additional javascript options for the progress bar plugin
					'options'=>array(
					'change'=>new CJavaScriptExpression('function(event, ui) {}'),
					'label'=>'holagdg',
					),
					'htmlOptions'=>array(
						'style'=>'height:10px;',
						),
							)	
							 );		///fn dekl widget
					
					
					
					$i=$i+1;
			}
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