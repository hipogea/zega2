




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'control-activos-grid',
	'dataProvider'=>Controlactivos::model()->search_poractivo($canica),
	'cssFile' => '/motoristas/css/grid/grilla_naranja.css', 
	//'filter'=>$model,
	'columns'=>array(
	   //'idactivo' ,
	        'numformato' ,
			'centro.nomcen',
				'solicitante.ap',
			//'tipo' ,
			'fecha',
			//'codigoaf',
			//'descripcion',
			//'marca' ,
			//'modelo',
			//'serie',
			'barcoanterior.nomep',
			'barcoactual.nomep' ,
			//'codobraencurso' ,			
			'comentario' ,			
			'estado.estado' ,
			//'codigosap' ,
			
		array(
			'class'=>'CButtonColumn',
			 'buttons'=>array(
			 
			  'view'=>
                            array(
                                   
								'visible'=>'false',
                                ),
						 
                        'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("/controlactivos/update",
																					array("id"=>$data->idformato,																					      
																							)
																				)',
                                   
								'label'=>'Actualizar', 
                                ),
								
								 'delete'=>
                            array(
                                   
								'visible'=>'false',
                                ),
								
                            ),
							
		),
	),
)); ?>
