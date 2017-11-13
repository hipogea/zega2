
<?php
/*var_dump($modelopadre->tempdetot[0]->recuperaarchivos(true));
echo "<br><br><br>";
var_dump($modelopadre->tempdetot[0]->fotosparagaleria());*/
   /* $this->widget('ext.galeriafirme.GaleriaFirme',
					array(
                                            'titulo'=>$modelopadre->textocorto,
                                            'mensajegeneral'=>$modelopadre->tempdetot[0]->textoactividad,
                                             'fotos'=>$modelopadre->tempdetot[0]->fotosparagaleria(),	

					)
				);
    */
?>




<div>
   <?php 
		$criteria = new CDbCriteria();
		$criteria->addCondition("idusertemp=:vuser and hidorden=:vorden");
		$criteria->params = array(":vorden"=>$modelopadre->id,":vuser"=>yii::app()->user->id);
    ?>
    <?php  
    $identificadorwidget= uniqid();
    $datos1t1 = CHtml::listData(Tempdetot::model()->findAll($criteria),'idtemp','textoactividad');
            echo CHtml::DropDownList('nicanor',$modelopadre->tempdetot[0]->idtemp,$datos1t1, array('empty'=>'--Seleccione una labor--','disabled'=>'')  )  ;
                echo Chtml::ajaxLink(
			Chtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."filter.png"),
			CController::createUrl($this->id.'/cargagaleria'), array(
				'type' => 'GET',
				'url' => CController::createUrl($this->id.'/cargagaleria'), //  la acci?n que va a cargar el segundo div
				'update' => '#'.$identificadorwidget, // el div que se va a actualizar
				'data'=>array('id'=>'js:nicanor.value'),
			)
		);
    
        ?>
</div>
<div id="<?php echo $identificadorwidget;   ?>"></div>

<?php

  /* $this->widget('ext.galeriafirme.GaleriaFirme',
					array(
                                            'titulo'=>'',
                                            'id'=>$identificadorwidget,
                                            'modo'=>2,
                                            'ext'=>'jpg',
                                            'zonaAjax'=>'ZONA_GALERIA',
                                            'mensajegeneral'=>'',
                                             'fotos'=>array(),	

					)
				);
   */
  /* $this->widget('ext.galeriafirme.GaleriaFirme',
					array(
                                            'titulo'=>'',
                                            //'id'=>$identificadorwidget,
                                            'modo'=>1,
                                            //'zonaAjax'=>'ZONA_GALERIA',
                                            'mensajegeneral'=>'',
                                             'fotos'=>$modelopadre->tempdetot[0]->fotosparagaleria(),	

					)
				);*/
   
   
    
?>