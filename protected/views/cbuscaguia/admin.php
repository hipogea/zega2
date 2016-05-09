




 
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'inventario-grid',
	//'filter'=>$model,
	'dataProvider'=>$proveedor,	
	'cssFile' => '/motoristas/css/grid/estilogrid.css',  // your version of css file
	'columns'=>array(
	   'c_serie',
	   'c_numgui',
	   'razondestinatario',
	   'c_descri',
	   // array('name'=>'idinventario','visible'=>false),
	      //array('name'=>'barcooriginal','header'=>'Origen',
		//array('name'=>'barcoactual.nomep','header'=>'Actual'),
		//array('name'=>'codigosap','header'=>'C. Sap','type'=>'raw','value'=>'CHtml::link($data->codigosap,array("inventario/detalle","id"=>$data->idinventario))'), 
		 //array(
          //  'name'=>'imagen',
           // 'type'=>'raw',
            //'value'=>'(file_exists("D:/web/motoristas/assets/FOTOS/".trim($data->codigosap).".JPG"))?
						//CHtml::image("D:/web/motoristas/assets/fotos/".trim($data->codigosap).".jpg",$data->codigosap):
						//"--"'),
			
						//'value'=>'(file_exists(Yii::app()->request->baseUrl."/assets/fotos/nodisponible.JPG")))'),		
			//array('name'=>'codigoaf','header'=>'Plaquita','type'=>'raw','value'=>'CHtml::link($data->codigoaf,array("inventario/update","id"=>$data->idinventario))'), 
		
		//array('name'=>'descripcion','header'=>'Descripcion del activo      '),
		//'marca',
		//'modelo',
		//'serie',
		//array('name'=>'barcooriginal.nomep','header'=>'Origen'),
		//array('name'=>'codlugar','visible'=>false),
		//'lugares.deslugar',
		//array('name'=>'lugares_lugar','header'=>'Lugar','value'=>'$data->lugares->deslugar'),
		//'posicion',
		//'documento.desdocu',
		//'fecha',
		//'numerodocumento',
		// motoristas\assets\FOTOS
		//'coddocu',
		///'creadopor',
		///'creadoel',
		//'modificadopor',
		//'modificadoel',
		//'codlugar',		
		//'descripcion',
		//'marca',
		//'modelo',
		//'serie',
		//'clasefoto',
		//'codigopadre',
		//'numerodocumento',
		//'adicional',
		//'codigoafant',
		//'posicion',
		//'codcentro',
		//'codcentrooriginal',
		//'codeporiginal',
		//'rocoto',
		//'codepanterior',
		//'codcentroanterior',
		//'clase',
		//'baja',
		//'n_direc',
			
		
		
	),
)); 
?>


