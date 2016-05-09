

<div  style="float: left; font-size:0.85em;clear:right; width:720px;
 "> 
 
 
<div style="float: left;  width:200px; clear:right; background-color:#FBF0BC;">
			<div style="float: left;  width:200px; clear:right; border-width:0px;border-style:solid;border-color:#ccc;">
				
				
			</div>
			<div style="float: left;  width:200px; border-width:1px;border-style:solid;border-color:#ccc;">
   
			<div style="float: left; font-size:1em; font-weight:bolder; width:200px; margin:3px 3px 3px 3px;  ">
				
					Navegar por las fechas: 		
			</div>
   
   
             <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										'name'=>'my_date',
										'model'=>null,
										'attribute'=>null,
										'value'=>(isset($_GET['fecha']))?$_GET['fecha']:date("Y/m/d"),
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
													//'buttonText'=>Yii::t('ui','...'),
													//'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.png',
													//'buttonImageOnly'=>true,
												     	'onSelect'=>'js:function(selected) {
																		
																								location.href="index.php?r=reportepesca/gestionaparte&fecha="+this.value;
																						
																								
																	//	setTimeout ("redireccionar()", 20000);

																
														
																	}',
													'dateFormat'=>'yy-mm-dd',		
														),
												'htmlOptions'=>array(
															'style'=>'width:90px;vertical-align:top',
															'readonly'=>'readonly',
															//'visible'=>'false',
															),
															));
				?>
	
			<div style="float: left; font-size:1em; font-weight:bolder; width:170px; margin:3px 3px 3px 3px;  ">
				
					Leyenda: 		
			</div>
			
			
			
			<div style="float: left; width:180px;border-bottom-width :1px; border-bottom-style:dashed; border-bottom-color :#ccc;margin:2px 2px 2px 3px;  ">
				<div style="float: left; width:30px;"> 
				   <?php echo CHtml::image('/motoristas/images/verde_.jpg','hola'); ?>
				</div>				
				<div style="float: left; width:150px;"> 
				   <?php echo "En pesca sin novedades"; ?>
				</div>
							
			</div>
			
		<div style="float: left; width180px;border-bottom-width :1px; border-bottom-style:dashed; border-bottom-color :#ccc;margin:2px 2px 2px 2px;  ">
			<div style="float: left; width:30px;"> 
				   <?php echo CHtml::image('/motoristas/images/evento.jpg','hola'); ?>
				</div>
			
				<div style="float: left; width:150px;"> 
				   <?php echo "Hay novedades"; ?>
				</div>
				
			</div>

			<div style="float: left; width180px;border-bottom-width :1px; border-bottom-style:dashed; border-bottom-color :#ccc;margin:2px 2px 2px 2px;  ">
			<div style="float: left; width:30px; font-size:0.9em; font-weight:bolder;"> 
				   <?php echo "D2"; ?>
				</div>
			
				<div style="float: left; width:150px;"> 
				   <?php echo "Diesel en Galones (Gl)"; ?>
				</div>
				
			</div>
			
			
			<div style="float: left; width180px;border-bottom-width :1px; border-bottom-style:dashed; border-bottom-color :#ccc;margin:2px 2px 2px 2px;  ">
			<div style="float: left; width:30px; font-size:0.9em; font-weight:bolder;"> 
				   <?php echo "Arrib."; ?>
				</div>
			
				<div style="float: left; width:150px;"> 
				   <?php echo "Hora de arribo embarcacion"; ?>
				</div>
				
			</div>
			
			<div style="float: left; width180px;border-bottom-width :1px; border-bottom-style:dashed; border-bottom-color :#ccc;margin:2px 2px 2px 2px;  ">
			<div style="float: left; width:30px; font-size:0.9em; font-weight:bolder;"> 
				   <?php echo "Decl."; ?>
				</div>
			
				<div style="float: left; width:150px;"> 
				   <?php echo "Pesca declarada(TN)"; ?>
				</div>
				
			</div>

			
			<div style="float: left; width180px;border-bottom-width :1px; border-bottom-style:dashed; border-bottom-color :#ccc;margin:2px 2px 2px 2px;  ">
			<div style="float: left; width:30px; font-size:0.9em; font-weight:bolder;"> 
				   <?php echo "Desc."; ?>
				</div>
			
				<div style="float: left; width:150px;"> 
				   <?php echo "Pesca Descargada(TN)"; ?>
				</div>
				
			</div>
			
			<div style="float: left; width180px;border-bottom-width :1px; border-bottom-style:dashed; border-bottom-color :#ccc;margin:2px 2px 2px 2px;  ">
			<div style="float: left; width:30px; font-size:0.9em; font-weight:bolder;"> 
				   <?php echo "Fac."; ?>
				</div>
			
				<div style="float: left; width:150px;"> 
				   <?php echo "Factor de descarga :(Descargada/Declarada) "; ?>
				</div>
				
			</div>
			
			<div style="float: left; width180px;border-bottom-width :1px; border-bottom-style:dashed; border-bottom-color :#ccc;margin:2px 2px 2px 2px;  ">
			<div style="float: left; width:30px; font-size:0.9em; font-weight:bolder;"> 
				   <?php echo "Hrs"; ?>
				</div>
			
				<div style="float: left; width:150px;"> 
				   <?php echo "Horas de jornada "; ?>
				</div>
				
			</div>
			
			<div style="float: left; width180px;border-bottom-width :1px; border-bottom-style:dashed; border-bottom-color :#ccc;margin:2px 2px 2px 2px;  ">
			<div style="float: left; width:30px; font-size:0.9em; font-weight:bolder;"> 
				   <?php echo "C/T"; ?>
				</div>
			
				<div style="float: left; width:150px;"> 
				   <?php echo "Consumo Diesel por tonelada (Gl/Tn) "; ?>
				</div>
				
			</div>
			
   </div>
   
  </div> 
  
   
	<div style="float: left;  width:280px;">
		
		
					<div style="float: left;  width:280px; clear:right; ">
				
				
					</div>
					<div style="float: left;  width:280px; ">
   
						<div style="float: left; font-size:1em; font-weight:bolder; width:280px; margin:3px 3px 3px 3px;  ">
				
							Eventos y ocurrencias importantes  del dia 		
						</div>
						<div style="float: left; font-size:1em; font-weight:bolder; width:280px; clear:right; margin:3px 3px 3px 3px;  ">
							<div>
							 <?php echo CHtml::image('/recurso/images/notas.jpg','hi',array('width'=>30,'height'=>40)); ?>
							</div>
							<div>
							
							</div>
							 		
						</div>
		
		
	
											<?php $this->renderpartial("vw_novedades",array('modeloreportes'=>$modeloreportes,'fecha'=>$fecha)); ?>


  
					</div>
  
  
   </div>   
   
   
   
   
   
   
	<div style="float: left; clear:right; width:240px;">
	
	
	
				



   </div>
   
   
   
   
   
   
   
   
   
</div>


<div  style="float: left; font-size:0.75em;clear:right; width:420px;
 "> 

<?php


	

 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reportepesca-grid',
	'dataProvider'=>$proveedorreportes,
//'cssFile' => '/recurso/css/estilogrid_reportepesca_.css',  // your version of css file
'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'grid_mediano.css',  // your version of css file

	//'filter'=>$modeloreportes,
	//'Summary'=>'',
	'summaryText'=>'',
	'columns'=>array(
	    array('name'=>'id','visible'=>false),
		array('name'=>'embarcacion.cbodega','header'=>'.'    ),
		array('name'=>'embarcacion.nomep','header'=>'EP','type'=>'raw', 'value'=>'CHtml::link("".$data->embarcacion->nomep."","#",array(\'onclick\'=>\'$("#cru-frame2").attr("src","\'.Yii::app()->createurl(\'/reportepesca/update\', array(\'id\'=> $data->id,\'asDialog\'=>1,\'gridId\'=> $this->grid->id,\'gridId2\'=> \'jurel-grid\' , \'gridId3\'=> \'anchoveta-grid\' ) ).\'"); $("#cru-dialog2").dialog("open"); return false;\',))'),
		//array('name'=>'Reclamo','header'=>'Reclamo','type'=>'raw',		'value'=>'CHtml::link("No estoy de acuerdo","#",array(\'onclick\'=>\'$("#cru-frame").attr("src","\'          .Yii::app()->createurl(\'/observaciones/create\', array(\'idinventario\'=>$data->idinventario ,\'asDialog\'=>1  )).\'"); $("#cru-dialog").dialog("open"); return false;\',))'),
		array('name'=>'evento', 'type'=>'raw','header'=>'E...','value'=>'($data->evento=="1")?
						CHtml::image("/motoristas/images/evento.jpg","hola"):	
						CHtml::link(CHtml::image("/motoristas/images/verde_.jpg","hola"),"#" , array(\'onclick\'=>\'$("#cru-frame3").attr("src","\'.Yii::app()->createurl(\'/reportepesca/creanovedad\', array(\'novel\'=> $data->id, \'id\'=> $data->id,\'asDialog\'=>1,\'gridId\'=> $this->grid->id   ) ).\'"); $("#cru-dialog3").dialog("open"); return false;\',))' ),
		//'embarcacion.nomep',	
        'especie.nomespecie',	
		//array('name'=>'tipozarpe.motivozarpe','type'=>'raw', 'value'=>'CHtml::link("".$data->tipozarpe->motivozarpe."","#" , array(\'onclick\'=>\'$("#cru-frame2").attr("src","\'.Yii::app()->createurl(\'/reportepesca/update\', array(\'id\'=> $data->id,\'asDialog\'=>1,\'gridId\'=> $this->grid->id   ) ).\'"); $("#cru-dialog2").dialog("open"); return false;\',))  )'),
		//array('name'=>'tipozarpe.motivozarpe','header'=>'EP','type'=>'raw', 'value'=>'CHtml::link("".$data->tipozarpe->motivozarpe."","#",array(\'onclick\'=>\'$("#cru-frame2").attr("src","\'.Yii::app()->createurl(\'/reportepesca/update\', array(\'id\'=> $data->id,\'asDialog\'=>1,\'gridId\'=> $this->grid->id   ) ).\'"); $("#cru-dialog2").dialog("open"); return false;\',))'),
		
		 'tipozarpe.motivozarpe',
		//'id',
		//'semana',
		//'fecha',		
		'plantazarpe.desplanta',
		ARRAY('name'=>'Zarpe','value'=>'$data->colocafechazarpe()'),		
//ARRAY('name'=>'Zarpe','value'=>'(  !is_null($data->fechazarpe) or (strtotime($data->fecha)==strtotime(date("Y/d/m H:i",strtotime($data->fechaarribo))))    )?date("d/m H:i",strtotime($data->fechazarpe)):""'),		
		
		//'r1',
		//'r2',
		//'r3',
		'r4',
		'r5',
		'r6',
		'r7',
		'r8',
		'r9',
		'r10',
		'r11',
		///'r12',
		'plantadestino.desplanta',
		ARRAY('name'=>'Arrib','value'=>'$data->colocafechaarribo()'),		
		
		//array('name'=>'declarada','header'=>'Decl.','value'=>'($data->declarada==0)?"S/P":$data->declarada',),
		array('name'=>'declarada','header'=>'Declarada','type'=>'raw', 'value'=>'CHtml::link("( ".$data->refrescadeclarada()." )","#",array(\'onclick\'=>\'$("#cru-frame").attr("src","\'.Yii::app()->createurl(\'/reportepesca/updatehoras\', array(\'id\'=> $data->id,\'asDialog\'=>1,\'gridId\'=> $this->grid->id   ) ).\'"); $("#cru-dialog").dialog("open"); return false;\',))'),
		
		array('name'=>'descargada','header'=>'Desc.','value'=>'($data->descargada==0)?"--":$data->descargada',),	
		'd2',
		array('name'=>'consumoportonelada','header'=>'C/T','value'=>'$data->petroleoportonelada()'),
	    array('name'=>'factordescarga','header'=>'Fac','value'=>'$data->factordescarga()'),
		 array('name'=>'horas_trabajadas','header'=>'Hrs','value'=>'$data->horastrabajadas()'),	     
				 array('name'=>'C','header'=>'Gl/h','value'=>'$data->d2porhora()'),	     
		

		
		
		/*
		'codplantadestino',
		'codplantazarpe',
		'declarada',
		'descargada',
		'd2',
		'codzarpe',
		*/
	
	),
)); 


?>

</div>


<?php

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'anchoveta-grid',
	'dataProvider'=>VwRppescaAnchoveta::model()->search_por_dia((isset($_GET['fecha']))?$_GET['fecha']:date("Y/m/d")),
	//'cssFile' => '/motoristas/css/grid/estilogrid.css',  // your version of css file
	//'filter'=>$modeloreportes,
	//'Summary'=>'',
	'summaryText'=>'',
	'columns'=>array(
	  // 'fecha',
	   //'nomespecie',
	   'sdescargada',
	   'sdeclarada',
	   array('name'=>'sfd','value'=>'$data->sfd." %"'),
	   'sct',
	   'sd2',
	   'bodega',
	   array('name'=>'eficienciabodega','value'=>'$data->eficienciabodega." %"'),
	   'horasta',
	   'd2porhora',
	   
	   
	),
)); 
$cadeg=null;	

$cadeg=VwRppescaJurel::model()->search_por_dia((isset($_GET['fecha']))?$_GET['fecha']:date("Y/m/d"))->getdata();
 if (!empty($cadeg)) {	
				echo "<h><b> Resumen Jurel y Caballa </b></h>";
  $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'jurel-grid',
	'dataProvider'=>VwRppescaJurel::model()->search_por_dia((isset($_GET['fecha']))?$_GET['fecha']:date("Y/m/d")),
	//'cssFile' => '/motoristas/css/grid/estilogrid.css',  // your version of css file
	//'filter'=>$modeloreportes,
	//'Summary'=>'',
	'summaryText'=>'',
	'columns'=>array(
	   //'fecha',
	   //'nomespecie',
	   'sdescargada',
	   'sdeclarada',
	   'sfd',
	   'sct',
	   'sd2',
	   'bodega',
	   'eficienciabodega',
	   'horasta',
	   'd2porhora',
	   
	   
	),
)); 

}








?>





<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog',
    'options'=>array(
        'title'=>'Reporte',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>800,
        'height'=>150,
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
        'title'=>'Reporte de pesca',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>600,
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
    'id'=>'cru-dialog3',
    'options'=>array(
        'title'=>'Reporte de pesca',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>600,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>



<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog5',
    'options'=>array(
        'title'=>'Reporte de pesca',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>600,
    ),
    ));
?>
<iframe id="cru-frame5" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>


<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog6',
    'options'=>array(
        'title'=>'Reporte de pesca',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>350,
        'height'=>300,
    ),
    ));
?>
<iframe id="cru-frame6" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>