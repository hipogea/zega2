


<?php

$this->breadcrumbs=array(
	'Partes',
);
mt_srand (time());	
$numero=mt_rand(1000000,2000000);
$this->menu=array(
	array('label'=>'Crear Parte', 'url'=>array('partes/create&aleatorio='.$numero.'&codep='.$codigobarco)),
	array('label'=>'Ver los partes', 'url'=>array('admin')),
	array('label'=>'Mis activos', 'url'=>array( 'inventario/misactivos&codigobarco='.$codigobarco)),
	array('label'=>'Mis materiales', 'url'=>array('mismateriales&codigobarco='.$codigobarco)),
	//http://srvflota/motoristas/index.php?r=carteres/crearcarter&codep=003
	array('label'=>'Agregar Carter', 'url'=>array("carteres/crearcarter&codep=".$codigobarco)),
	//array('label'=>'Actualizar horometro', 'url'=>array("partes/crearcarter&codep=".$codigobarco)),
	array('label'=>'Ver los carteres', 'url'=>array("partes/muestracarteres")),

);
?>

<DIV class="row">
 <?php ECHO "UsuarioETGTETETET :  ".Yii::app()->getModule('user')->user()->profile->lastname."-".Yii::app()->getModule('user')->user()->profile->amaterno."-".Yii::app()->getModule('user')->user()->profile->firstname."-".Yii::app()->getModule('user')->user()->email; ?>
</DIV>
<div class="row">
	       <?php  
				//$codigobarco=Yii::app()->getModule('user')->user()->profile->codep;
		 //  if(  ($codigobarco=='000' )) {
		    
		       
			
		// } else {
		  $nino=Embarcaciones::model()->find('codep=:codigo',array(':codigo'=>$codigobarco));
		  echo "Embarcacion: ". $nino->nomep."\n.";
		// }
              
		 ?>

</div>
	
<div  style="float: left; width:700px; border :1px;"> 
   <div style="float: left; width:450px;">
      <?php echo CHtml::image("\motoristas\images\lubricantes.jpg","",array('border'=>0,'width'=>400,'height'=>75)); ?> 
	<?php $this->renderpartial('vw_aceites',array('proveedoraceites'=>$proveedoraceites)); ?>
	
	 
</div>
<div style="float: left; clear:right; width:250px;">
  <?php 	 $this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
      // 'chart'=>array('type'=>'bar'),
		'title' => array('text' => 'Presiones de Aceite'),
		'xAxis' => array(
		                // 'type'=>'datetime',
						'Labels' => array('10','20','30','40')
						),
		'yAxis' => array(
							'title' => array('text' => 'PSI (Lib/Pulg2)')
						),
      'series' => array(
							//array('name' => 'Motor', 'data' => array(1,0,3,5,6,7,3,2,8,5, 2,3,24)),
							array('name' => 'Motor', 'data' =>$presionesmotor),
							
							array('name' => 'Caja', 'data' => $presionescaja)
						)
					)
));
 ?>
</div>
</div>


