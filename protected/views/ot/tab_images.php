<div>

   <?php 
   
   
   
   /*
		$criteria = new CDbCriteria();
		$criteria->addCondition("idusertemp=:vuser and hidorden=:vorden");
		$criteria->params = array(":vorden"=>$modelopadre->id,":vuser"=>yii::app()->user->id);
		?>
		<?php  $datos1t1 = CHtml::listData(Tempdetot::model()->findAll($criteria),'idtemp','textoactividad');
  echo CHtml::DropDownList('nicanor',$modelopadre->tempdetot[0]->idtemp,$datos1t1, array('empty'=>'--Seleccione una labor--','disabled'=>'')  )  ;
echo Chtml::ajaxLink(
			Chtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."filter.png"),
			CController::createUrl($this->id.'/cargagaleria'), array(
				'type' => 'GET',
				'url' => CController::createUrl($this->id.'/cargagaleria'), //  la acci?n que va a cargar el segundo div
				'update' => '#ZONA_GALERIA', // el div que se va a actualizar
				'data'=>array('id'=>'js:nicanor.value'),
			)
		);
    * 
    * 
    */
?>
</div>
<div id="ZONA_GALERIA">
    
</div>

<?php

//var_dump($modelopadre->tempdetot[0]->fotosparagaleria());
    $this->widget('ext.galeriafirme.GaleriaFirme',
					array(
                                            'titulo'=>$modelopadre->textocorto,
                                            'mensajegeneral'=>$modelopadre->tempdetot[0]->textoactividad,
                                             'fotos'=>$modelopadre->tempdetot[0]->fotosparagaleria(),	

					)
				);
    
?>