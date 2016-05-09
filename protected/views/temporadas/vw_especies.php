 <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
	 //	'id',
		'destemporada',
		'inicio',
		'termino',
		//'cuota_anchoveta',
		//'cuota_global_anchoveta',
		//'eficienciabodega',
	       ),
        )); ?>	




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'espceies-grid',
	//'cssFile' => '/motoristas/css/grid/estilogrid.css',  // your version of css file
	'dataProvider'=>$especies,	
	//'filter'=>$model,
	'summaryText'=>'',
	'columns'=>array(
	   ARRAY('name'=>'nomespecie','type'=>'raw'  ,'header'=>'Especie a capturar','value'=>'CHtml::link("".$data->nomespecie."",  " ".Yii::app()->createurl(\'/temporadas/vertempo\', array(\'idespecie\'=> $data->idespecie, \'idtemporada\'=> $data->idtemporada) ).""   )'),
		array('name'=>'sum','header'=>'Capturado a la fecha  (TN) ','value'=>'$data->sum'),
		//'estadodetalle',
		
		//'usuario',
		//array('name'=>'inventario_codigoaf','header'=>'Plaquita','value'=>'$data->inventario->codigoaf'),
		//array('name'=>'inventario_codigoaf','header'=>'C. Sap','type'=>'raw','value'=>'CHtml::link($data->inventario->codigoaf,array("inventario/detalle","id"=>$data->inventario->idinventario))'),
		//array('name'=>'inventario_codigosap','header'=>'C. Sap','type'=>'raw','value'=>'CHtml::link($data->inventario->codigosap,array("inventario/detalle","id"=>$data->inventario->idinventario))'),		
		//'inventario.descripcion',
		//array('name'=>'inventario_descripcion','header'=>'Descripcion','value'=>'$data->inventario->descripcion'),
		//'inventario.barcoactual.nomep',
		//'inventario.documento.desdocu',
		//'fecha',
		//'descri',
		//'mobs',		
		//'id',
		//'hidinventario',
		//array('name'=>'estado_estado','header'=>'Estado','value'=>'$data->estado->estado'),
		
	),
)); ?>


<?php
 if ( $especies->totalItemCount==0)  {
   echo "Esta temporada aun no tiene ningun parte de pesca.  Desea ".CHtml::link("Agregar "," ".Yii::app()->createurl("/reportepesca/crearparte", array('idtemporada'=>$model->id)))." Uno? ";
 }

 
 ?>