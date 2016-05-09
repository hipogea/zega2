<br>
<h1>Horometro de motor y  Lubricantes  </h1>



<?php $this->beginWidget('zii.widgets.CPortlet'); 
      echo "<tr>";
	  echo "<td  class='empty'>";
			 echo "Vida util de Aceite :          (0% - 70%)   ";
			echo "</td>";
			echo "<td  class='empty'>"; 
			echo "<td  class='empty'>"; 
			  echo "  ------>  "; 
			echo "</td>";
			echo   CHtml::image(Yii::app()->params['rutaimagenes'].Vwaceites::colocaicono(15),"r",array("id"=>"gatito","border"=>0,"width"=>25,"height"=>25)) ; 
			echo "</td>";
			echo "<td>";
			echo   ".           .               ."; ; 
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
	     echo "<td  class='empty'>";
			 echo "                              (70% - 90%)   ";
			echo "</td>";
			echo "<td  class='empty'>"; 
			echo "<td  class='empty'>"; 
			  echo "  ------>  "; 
			echo "</td>";
			echo   CHtml::image(Yii::app()->params['rutaimagenes'].Vwaceites::colocaicono(80),"r",array("id"=>"gatito","border"=>0,"width"=>25,"height"=>25)) ; 
			echo "</td>";
			echo "<td>";
			echo   ".       .               ."; 
			echo "</td>";
			echo "</tr>";
			echo "<td  class='empty'>";
			 echo "                              (90% -> mas)     ";
			echo "</td>";
			echo "<td  class='empty'>"; 
			echo "<td  class='empty'>"; 
			  echo "  ------>  "; 
			echo "</td>";
			echo   CHtml::image(Yii::app()->params['rutaimagenes'].Vwaceites::colocaicono(100),"r",array("id"=>"gatito","border"=>0,"width"=>25,"height"=>25)) ; 
			echo "</td>";
			echo "</tr>";
 $this->endWidget(); ?>



	  
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'inventario-grid',
	//'filter'=>$model,
	'summaryText'=>'',
	'dataProvider'=>$proveedorcarteres,	
	//'cssFile' => '/motoristas/css/grid/estilogrid.css',  // your version of css file
	'columns'=>array(
	
		//'descripcion',
		array('name'=>'nomep','header'=>'Embarcacion'),
		array('name'=>'descripcion','header'=>'Equipo'),
		//'material',
		array('name'=>'material','header'=>'Tipo Lub.'),
		array('name'=>'horascambio','header'=>'Horas Cambio'),
		//'fucambio',
		array('name'=>'fucambio','header'=>'Fu cambio','value'=>'date("d/m/Y",strtotime($data->fucambio))'),
		'hucambio',
		//'horasaceite',
		array('name'=>'horasaceite','header'=>'Vida del aceite (Hr)'),
		array('name'=>'porcentaje','header'=>'porcentaje'),
		//'fulectura',
		array('name'=>'fulectura','header'=>'Fu lectura','value'=>'date("d/m/Y",strtotime($data->fulectura))'),
		  //CHtml::image($ruta.$fotos[0],'yu',array('id'=>'gatito','border'=>0,'width'=>400,'height'=>300));
		array('name'=>'','header'=>'.', 'type'=>'raw','value'=>' CHtml::image(Yii::app()->params["rutaimagenes"].Vwaceites::colocaicono($data->porcentaje),"r",array("id"=>"gatito","border"=>0,"width"=>15,"height"=>15))       '),
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