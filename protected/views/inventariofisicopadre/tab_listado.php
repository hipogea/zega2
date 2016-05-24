
<?PHP
IF(!$model->IsNewRecord){

    //$proveedor=Inventariofisico::model()->search_por_padre($model->id);
    $gridWidget= $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'detalle-gridx',
        'dataProvider'=>$modelhijo->search_por_padre($model->id),
        'filter'=>$modelhijo,
        //'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid.css',  // your version of css file
        'itemsCssClass'=>'table table-striped table-bordered table-hover',
        //'summaryText'=>'->',
        'columns'=>array(


            array(
                'class'=>'CCheckBoxColumn',
                'selectableRows' => 20,
                'value'=>'$data->id',
                'checkBoxHtmlOptions' => array(
                    'name' => 'cajita[]',
                    //'enabled'=>'(($data->coddocu=="001") and ($data->codpro <> "R00001"))?"false":"true"',
                    //'disabled'=>'true',

                ),
                // 'id'=>'cajita' // the columnID for getChecked
            ),
  // 'id',array(
            array('name'=>'hidinventario','visible'=>false),
            array('type'=>'raw','value'=>'CHTml::link($data->inventario->codart,yii::app()->createUrl("alinventario/update",array("id"=>$data->hidinventario)),array("target"=>"_blank"))', 'htmlOptions'=>array('width'=>5)),
            array('value'=>'$data->inventario->maestro->descripcion', 'htmlOptions'=>array('width'=>225)),
            array('value'=>'$data->inventario->maestro->maestro_ums->desum', 'htmlOptions'=>array('width'=>3)),
            array('header'=>'Ubic Inv','value'=>'$data->inventario->ubicacion', 'htmlOptions'=>array('width'=>75)),
            array('name'=>'cantstock','visible'=>($model->esciego=="1")?false:true,'header'=>'Stock Inv','value'=>'$data->cantstock', 'htmlOptions'=>array('width'=>4)),

            array('name'=>'ubicacion','header'=>'Ubic Cont','value'=>'$data->ubicacion', 'htmlOptions'=>array('width'=>75)),
            array('name'=>'cant','header'=>'Cant Cont','value'=>'$data->cant', 'htmlOptions'=>array('width'=>4)),

            //array('name'=>'diferencia','value'=>'$data->diferencia', 'htmlOptions'=>array('width'=>4)),
            array('name'=>'diferencia','type'=>'raw','value'=>'($data->diferencia <>0)?CHtml::openTag("span",array("class"=>"badge badge-".(($data->codestado=="10")?"error":"success"  ))    ).$data->diferencia.CHtml::closeTag("span"):""', 'htmlOptions'=>array('width'=>50),'filter'=>array('<>0'=>'Con diferencia')),
   array('name'=>'codestado','filter'=>array('10'=>'Pendientes','20'=>'Ajustados'), 'htmlOptions'=>array('width'=>50),),
            array(
                'htmlOptions'=>array('width'=>120),
                'class'=>'CButtonColumn',
                'buttons'=>array(


                    'update'=>
                        array(
                            'visible'=>'($data->codestado=="10" and ABS($data->diferencia)> 0)?true:false',
                            'url'=>'$this->grid->controller->createUrl("/alinventario/ajuste/",
										    array("id"=>$data->id,
                                                                                         "asDialog"=>1,
											"gridId"=>$this->grid->id,
											"ed"=>"si",

											)
									    )',
                            'click'=>('function(){

							    $("#cru-dialogdetalle").dialog("open");
										$("#cru-detalle").attr("src",$(this).attr("href"));
							     return false;
							 }'),
                            'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'lapicito.png',
                            'label'=>'Actualizar Item',
                        ),


                    'delete'=>


            array(
                'visible'=>'($data->codestado=="20")?true:false',
                'label'=>' Revertir ajuste',
                'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'undomin.png',
                'click'=>"function(){
                                    $.fn.yiiGridView.update('detalle-gridx', {
                                        type:'POST',
                                        url:$(this).attr('href'),
                                        success:function(data) {
                                              $('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');

                                              $.fn.yiiGridView.update('detalle-gridx');
                                        }
                                    })
                                    return false;
                              }
                     ",
                'url'=>'$this->grid->controller->createUrl("/alinventario/revertirajuste",array("id"=>$data->id))',

            ),








                    'view'=>
                        array(
                            'visible'=>'false',

                        ),

                ),
            ),


        )));

//Capture your CGridView widget on a variable
//$gridWidget=$this->widget('bootstrap.widgets.TbGridView', array( . . .
    $this->renderExportGridButton($gridWidget,'Exportar resultados',array('class'=>'btn btn-info pull-right'));

}



?>


