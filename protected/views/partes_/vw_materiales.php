<DIV>
 <?php  ECHO "Motorista :  ".Yii::app()->getModule('user')->user()->profile->lastname."-".Yii::app()->getModule('user')->user()->profile->amaterno."-".Yii::app()->getModule('user')->user()->profile->firstname."-".Yii::app()->getModule('user')->user()->email; ?>
</DIV>
<div class="row">
	       <?php  
				$codigobarco=Yii::app()->getModule('user')->user()->profile->codep;
		   if(  ($codigobarco=='000' )) {
		
			
		 } else {
		  $nino=Embarcaciones::model()->find('codep=:codigo',array(':codigo'=>$codigobarco));
		  echo "Embarcacion: ". $nino->nomep."\n.";
		 }
              
		 ?>
</div>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'partes-grid',
	'dataProvider'=>$proveedor,
	//'summaryText' => '',
	//'filter'=>$model,
	'columns'=>array(
	    /* array(
            'class'=>'CButtonColumn',
            //--------------------- begin new code --------------------------
            'buttons'=>array(
                        'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("update", array("id"=>$data->primaryKey))',                                    
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
				 ),	*/
	    //array('name'=>'embarcaciones_nomep','header'=>'Embarcacion','value'=>'$data->embarcaciones->nomep'),
		//array('name'=>'c_serie','header'=>'Serie'),		
		array('name'=>'c_numgui','header'=>'Numero guia'),
		array('name'=>'distpartida','header'=>'Desde'),
		array('name'=>'d_fectra','header'=>'Fecha doc','value'=>'date("d/m/Y",strtotime($data->d_fectra))'),
		//array('name'=>'d_fectra', 'value'=>'date("d/m/Y",strtotime($data->d_fectra))'),
		array('name'=>'c_trans','header'=>'Transpor'),
		array('name'=>'c_itguia','header'=>'Item'),		
		array('name'=>'n_cangui','header'=>'Cant'),
		array('name'=>'c_codgui','header'=>'Codigo'),
		array('name'=>'c_um','header'=>'Um'),
		//array('name'=>'distpartida','header'=>'Desde'),
		array('name'=>'c_descri','header'=>'Material'),
		//array('header'=>'Aceptar','type'=>'raw','value'=>'CHtml::checkBox("ok","hola",array("id"=>$data->c_serie.$data->c_numgui,"checked"=>"checked"))'),
		//array('header'=>'Aceptar','type'=>'raw','value'=>'CHtml::checkBox("","")' ),
			
	     array(
            'class'=>'CButtonColumn',
            //--------------------- begin new code --------------------------
            'buttons'=>array(
                        'update'=>
                           
									 array(
                                    'url'=>'$this->grid->controller->createUrl("/partes/Confirmamateriales",
																					array("id"=>$data->n_detgui,																					        
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
				 ),													//checkBox($model,'c_salida', ARRAY('checked'=>'checked'))
		//array('name'=>'c_codactivo','header'=>'Activo '),
		//array('name'=>'nomep','header'=>'Emabrcacion '),
		/*array('name'=>'puerto','visible'=>false ),
		array('name'=>'plantaorigen.desplanta','header'=>'Zarpe'),
		array('name'=>'puertode','visible'=>false ),
		array('name'=>'plantadestino.desplanta','header'=>'Arribo'),
		array('name'=>'horometro','header'=>'Horom. Zarpe'),
		array('name'=>'horometro','header'=>'Horom. arribo'),	
		array('name'=>'numerodecalas','header'=>'Calas'),				
		array('name'=>'consumocombustible','type'=>'Text','header'=>'Consumo D2 (Gl./Hr)', 'value'=>'round(($data->d2_zarpe-$data->d2_arribo)/($data->horometrodes-$data->horometro),3)'),	
		array('name'=>'horasdeaceitemotor', 'type'=>'raw','header'=>'Horas ac-motor', 'value'=>'$data->horometrodes-$data->acylu_horometroultimocambio'),
		array('name'=>'horasdeaceitecaja', 'type'=>'Text','header'=>'Horas ac-caja', 'value'=>'$data->horometrodes-$data->acylu_horometroultimocambiocaja'),
		
		/*'id',
		*/
		
	),
)); ?>

<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog',
    'options'=>array(
        'title'=>'Confirma',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>210,
    ),
    ));
?>
<iframe id="cru-frame" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>