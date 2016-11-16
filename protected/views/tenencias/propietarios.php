
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'propietarios-grid',
	'dataProvider'=>  Tenenciastraba::model()->search_por_tenencia($model->codte),
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$model,
	'columns'=>array(
		'codte',
		array('name'=>'Nombre','value'=>'$data->trabajadores->ap'),
		array('name'=>'Nombre','value'=>'$data->trabajadores->am'),
            array('name'=>'Nombre','value'=>'$data->trabajadores->nombres'),
             array('name'=>'activo','type'=>'raw','value'=>'CHTml::checkbox("hdjs",($data->activo=="1")?true:false,array("disabled"=>"disabled"))'),
       
		array(
			'class'=>'CButtonColumn',
                    
                      'template'=>'{delete}{update}',
                    'buttons'=>array( 
                        'delete' => array(
                             'visible'=>'($data->activo=="1")?true:false',
                    'label'=>' Eliminar',
                   // 'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'22060.png',
                    'click'=>"function(){
                                    $.fn.yiiGridView.update('propietarios-grid', {
                                        type:'GET',
                                        url:$(this).attr('href'),
                                        success:function(data) {
                                              $.growlUI('Growl Notification', data); 
                                              $.fn.yiiGridView.update('propietarios-grid');
                                        }
                                    })
                                    return false;
                              }
                     ",
                    'url'=>'$this->grid->controller->createUrl("/tenencias/borrapropietario",array("id"=>$data->id))',

                ),
                        		 
                  'update' => array(
                      'visible'=>'($data->activo=="0")?true:false',
                    'label'=>' Restablecer',
                   // 'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'22060.png',
                    'click'=>"function(){
                                    $.fn.yiiGridView.update('propietarios-grid', {
                                        type:'GET',
                                        url:$(this).attr('href'),
                                        success:function(data) {
                                              $.growlUI('Growl Notification', data); 
                                              $.fn.yiiGridView.update('propietarios-grid');
                                        }
                                    })
                                    return false;
                              }
                     ",
                    'url'=>'$this->grid->controller->createUrl("/tenencias/activapropietario",array("id"=>$data->id))',

                ),      
                        
                        
                    ),
		
		),
	),
)); ?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog',
    'options'=>array(
        'title'=>'Direcciones',
        'autoOpen'=>false,
        'modal'=>false,
        'width'=>500,
        'height'=>400,
    ),
    ));
?>

<iframe id="cru-frame" width="100%" height="100%"></iframe>

<?php
$this->endWidget();
?>

<?php
 $createUrl = $this->createUrl($this->id.'/creapropietario',
		array(	id=>$model->codte,
			"asDialog"=>1,
			"gridId"=>'propietarios-grid',
                       // "codpro"=>$model->codpro,
		)

	    );

 echo CHtml::link('Agregar Propietario','#',array('onclick'=>"$('#cru-frame').attr('src','$createUrl '); $('#cru-dialog').dialog('open');"));

?>
