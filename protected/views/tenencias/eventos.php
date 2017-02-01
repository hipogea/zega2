<?php  
//var_dump(Tenenciasproc::model()->search_por_tenencia($model->codte));die();

  $this->widget('ext.groupgridview.GroupGridView', array(
      'id' => 'grid1',      
      'mergeColumns' => array('codocu','documentos'),
	'dataProvider'=> Tenenciasproc::model()->search_por_tenencia($model->codte),
   // 'filter'=>$modeltenenciasproc,
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$model,
	'columns'=>array(
		//'codte',
             array('name'=>'codocu','value'=>'$data->codocu','type'=>'raw',
                // 'filter'=>CHtml::listData(Documentos::model()->findAll(),'coddocu','desdocu'  )
                // 'filter'=>CHTml::listData(Tempdetot::model()->findAll("idusertemp=:vuser and hidorden=:vorden",array(":vorden"=>$model->id,":vuser"=>yii::app()->user->id)),'idaux','textoactividad'),
                 ),
            array('name'=>'documentos','type'=>'raw','value'=>'$data->documentos->desdocu'),
            'final',
            'automatico',
            'esmensaje',
            array('name'=>'hidprevio','header'=>'Previo','value'=>'($data->hidprevio>0)?$data->hidprevio:""'),
            'nhorasverde',
           'nhorasnaranja',
		array('name'=>'hidevento','header'=>'Procedimiento','value'=>'$data->eventos->descripcion'),
		
		array(
			'class'=>'CButtonColumn',
                      'template'=>'{update}{delete}',
                    'buttons'=>array(
                        			 
                        'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl(
                                        "/tenencias/modificaevento",
                                          array(
                                             "id"=>$data->id,"asDialog"=>1,"gridId"=>$this->grid->id
						) )',
                                    'click'=>'function(){ 
							$("#cru-frame31").attr("src",$(this).attr("href")); 
							$("#cru-dialog31").dialog("open");  
							return false;
							 }',
								//'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'mas.png', 
								'label'=>'Modificar', 
                                ),
                        
                        'delete' => array
                (
                    'label'=>' Eliminar',
                   // 'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'22060.png',
                    'click'=>"function(){
                                    $.fn.yiiGridView.update('tenencias-grid', {
                                        type:'GET',
                                        url:$(this).attr('href'),
                                        success:function(data) {
                                              $.growlUI('Growl Notification', data); 
                                              $.fn.yiiGridView.update('tenencias-grid');
                                        }
                                    })
                                    return false;
                              }
                     ",
                    'url'=>'$this->grid->controller->createUrl("/tenencias/borraevento",array("id"=>$data->id))',

                ),
                        
                        
                        
                    ),
		),
	),
));   


?>


<?php
 $createUrl = $this->createUrl($this->id.'/creaevento',
		array(	id=>$model->codte,
			"asDialog"=>1,
			"gridId"=>'procesos-grid',
                       // "codpro"=>$model->codpro,
		)

	    );

 echo CHtml::link('Agregar Proceso','#',array('onclick'=>"$('#cru-frame').attr('src','$createUrl '); $('#cru-dialog').dialog('open');"));

?>



<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog31',
    'options'=>array(
        'title'=>'Explorador',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>500,
    ),
    ));
?>
<iframe id="cru-frame31" width="100%" height="100%"></iframe>
<?php $this->endWidget(); ?>