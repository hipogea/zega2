

<?php
$this->menu=array(
	
	array('label'=>'Crear Temporada', 'url'=>array('create')),
	array('label'=>'Modificar', 'url'=>array('update', 'id'=>$model->idtemporada)),
	//array('label'=>'Modificar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Crear Parte', 'url'=>array('/reportepesca/crearparte','idtemporada'=>$model->idtemporada)),
	array('label'=>'Ver parte de hoy', 'url'=>array('/reportepesca/gestionaparte','fecha'=>''.date("Y/m/d"),'idt'=>$model->idtemporada)),
	
	// echo CHtml::link("Ver parte de Hoy",array("reportepesca/gestionaparte",'fecha'=>''.date("Y/m/d")));
	array('label'=>'Ver reporte por barcos', 'url'=>array('/temporadas/verbarcos','id'=>$model->idtemporada,'idespecie'=>$model->idespecie)),	
	array('label'=>'Ver eficiencia de bodegas', 'url'=>array('/reportepesca/eficiencia','idtemporada'=>$model->idtemporada)),
	array('label'=>'Ver temporadas', 'url'=>array('admin')),
);
?>

		<div  style="float: left; width:800px;"> 
						<div style="float: left;  width:300px;">	
							<?php $this->renderpartial('view_resumen',array('model'=>$model)); ?>	
											
						</div>
						<div style="float: left; clear:right; width:500px;">	
							
							<div style="float: left;clear:right; width:245px;">	
							<?php $this->renderpartial('gauge',array('texto'=>'Cumplimiento (%)','dato'=>$model->cumplimiento,'minimo'=>-210,'maximo'=>-30));?>
							</div>
							<div style="float: left; clear:right; width:245px;">	
							<?php $this->renderpartial('gauge2',array('texto'=>'Eficiencia bodega (%)','dato'=>$model->eficienciabodega,'minimo'=>-210,'maximo'=>-70));?>
							</div>
						</div>
		</div>
		<div style="float: left; width:700px;">	
                  <?php $this->renderpartial('view_acumulado',array('abodega'=>$abodega,'ahoras'=>$ahoras,'pescas'=>$pescas,'acumulado'=>$acumulado,'fechas'=>$fechas,'meta'=>$meta)); ?>	
              
		</div> 
			
		<div style="float: left; width:700px;">	
				<?php // $this->renderPartial('vw_resumentemporadatotal', array('model'=>$model));
			   $this->renderPartial('vw_resumentemporada', array('model'=>$model,));
				?>
				<?php // $this->renderPartial('vw_resumentemporadatotal', array('model'=>$model));
			         echo CHtml::link("Ver parte de Hoy",array("reportepesca/gestionaparte",'fecha'=>''.date("Y/m/d"),'idt'=> $model->idtemporada));
				?>
		</div> 
		