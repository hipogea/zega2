<div class=row">
<?php
$prove=$model->getDataProvider($model->id,$model->documento);
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-imggrilla-grid',
	'dataProvider'=>$prove,
	//'filter'=>$model,
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
   'summaryText'=>' Total de Items : {count}',
	'columns'=>array(
		array(
           'class'=>'CCheckBoxColumn',
		    'selectableRows' => 20,
		    'value'=>'$data->id',
			'checkBoxHtmlOptions' => array(                
				'name' => 'cajitaconsignaciones[]',
		   ),
                ),
		
             
                //array( 'type'=>'raw','header'=>'Solic.','value'=>'$data->solpe->numero','htmlOptions'=>array('width'=>6) ),		
		array('name'=>'titulo', 'type'=>'raw','header'=>'Item','htmlOptions'=>array('width'=>200) ),
		//array('htmlOptions'=>array('width'=>24),'name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].$data->coddocu.$data->estadodetalle.".png")'),
		//array('name'=>'codentro', 'type'=>'raw','header'=>'Centro','htmlOptions'=>array('width'=>20) ),
		//array('name'=>'cant', 'type'=>'raw','value'=>'Chtml::openTag("span", array("style"=>"float:right;font-weight:bold;")).Mifactoria::decimal($data->cant,4).Chtml::closeTag("span")','header'=>'Cant','htmlOptions'=>array('width'=>20) ),
		//array('htmlOptions'=>array('width'=>10),'name'=>'codigoalma','visible'=>(yii::app()->settings->get("materiales","materiales_codigoservicio")==$data->codart)?true:false),
		//array('htmlOptions'=>array('width'=>5),'header'=>'um','value'=>'$data->ums->desum'),
		//array('htmlOptions'=>array('width'=>5), 'type'=>'raw','name'=>'codart','value'=>'$data->codart','visible'=>(!yii::app()->settings->get("materiales","materiales_codigoservicio")==$data->codart)?true:false),
		//array('header'=>'N° Solic','value'=>'$data->solpe->numero', 'htmlOptions'=>array('width'=>4),),
		ARRAY('name'=>'id','type'=>'raw','value'=>'CHtml::link(CHtml::image($data->rutaCorta($data->enlace),"",ARRAY("width"=>70,"height"=>80)),"#", array("onclick"=>\'$("#cru-frame4").attr("src","\'.Yii::app()->createurl(\'/adjuntos/Edita\', array(\'id\'=> $data->id ) ).\'");$("#cru-dialog4").dialog("open"); return false;\' ) ).$data->texto'),
array('name'=>'usuario','type'=>'html','value'=>'CHTml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."user_business_boss.png").strtoupper(yii::app()->user->um->LoadUserById($data->iduser)->username)'),
		
                                                        array('name'=>'subido', 'type'=>'raw','header'=>'Subido','htmlOptions'=>array('width'=>290) ),
		/*array('name'=>'usuario','type'=>'html','value'=>'CHTml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."user_business_boss.png").strtoupper(yii::app()->user->um->LoadUserById($data->iduser)->username)'),
			 array(
            'name'=>'imagen',
            'type'=>'html',
          'value'=>'(is_file($data->enlace))?
              CHtml::link(
              CHtml::image($data->rutaCorta($data->enlace),$data->subido,array("width"=>70,"height"=>80)),
              "#", array("onclick"=>\'$("#cru-frame3").attr("src","\'.Yii::app()->createurl(\'/alinventario/muestrakardex\', array(\'id\'=> $data->id ) ).\'");$("#cru-dialog3").dialog("open"); return false;\' ) )
              :
		"--"'),*/
                                                        //array('header'=>'Atendido','type'=>'raw','value'=>'($data->otconsignacion->cantatendida>0)?CHtml::link(CHtml::openTag("span",array("class"=>"label badge-warning ")).$data->otconsignacion->cantatendida.CHtml::closeTag("span"),"#",array("onclick"=>"$(\'cru-frame3\').attr(\'src\',yii::app()->createUrl(\"ot/muestrakardex\",array(\"idref\"=>$data->id)   )  )")       )    :""', 'htmlOptions'=>array('width'=>4),),
                  /* ARRAY('header'=>'Atendido','type'=>'raw','value'=>'($data->otconsignacion->cantatendida>0)?CHtml::link(CHtml::openTag("span",array("class"=>"label badge-warning ")).$data->otconsignacion->cantatendida.CHtml::closeTag("span"),"#", array("onclick"=>\'$("#cru-frame3").attr("src","\'.Yii::app()->createurl(\'/ot/muestrakardex\', array(\'idref\'=> $data->id ) ).\'");$("#cru-dialog3").dialog("open"); return false;\' ) ):""','htmlOptions'=>array('width'=>4)),
                 array('name'=>'codart','value'=>'$data->codart','htmlOptions'=>array('width'=>30)),
                 array('name'=>'hidetot','header'=>'Recurso','value'=>'$data->descripcion','filter'=>CHtml::listData(Tempdetot::model()->findAll("idusertemp=:vuser and hidorden=:vorden",array(":vorden"=>$model->id,":vuser"=>yii::app()->user->id)),'idaux','textoactividad'), 'htmlOptions'=>array('width'=>400),),
		*/
                                                       // 'txtmaterial',
		
           	
		// array('name'=>'texto', 'type'=>'raw','header'=>'t','value'=>'(!empty($data->detalle))?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."texto.png","hola"):""' ),
		//array('name'=>'punit', 'type'=>'raw','header'=>'Pu','value'=>'Chtml::openTag("span", array("style"=>"float:right;font-weight:bold;")).Mifactoria::decimal($data->punit,3).Chtml::closeTag("span")','htmlOptions'=>array('width'=>20)),
		//array('name'=>'Subt', 'type'=>'raw','header'=>'Subt','value'=>'Chtml::openTag("span", array("style"=>"float:right;font-weight:bold;")).Mifactoria::decimal($data->cant*($data->punit),3).Chtml::closeTag("span")','htmlOptions'=>array('width'=>68)),
		//array('name'=>'punitplan','header'=>'Plan','value'=>'MiFactoria::decimal($data->punitplan)','footer'=>MiFactoria::decimal(Tempdesolpe::getTotal($prove)['plan'],2), 'htmlOptions'=>array('width'=>30)),
		//array('name'=>'punitreal','header'=>'Real','value'=>'MiFactoria::decimal($data->desolpe->alkardex_gastos)','footer'=>MiFactoria::decimal(Tempdesolpe::getTotal($prove)['real'],2), 'htmlOptions'=>array('width'=>30)),
  //array('name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].$data->codocu.$data->est.".png")'),
	     array(
	   'htmlOptions'=>array('width'=>80),
	   'class'=>'CButtonColumn',
		   'template'=>'{otro}{editar}',
	   'buttons'=>array(
	     'editar' =>
                array(
                    'visible' => 'true',
                    'url' => '$this->grid->controller->createUrl("/adjuntos/Edita/",
										    array("id"=>$data->id,
                                                                                         "asDialog"=>1,
											"gridId"=>$this->grid->id
											)
									    )',
                    'click' => ('function(){
							    $("#cru-frame4").attr("src",$(this).attr("href"));
							    $("#cru-dialog4").dialog("open");
							     return false;
							 }'),
                    'imageUrl' => '' . Yii::app()->getTheme()->baseUrl . Yii::app()->params['rutatemagrid'] . 'lapicito.png',
                    'label' => 'Editar',
                ),
             'otro'=>  array(
	   'visible'=>'true',
	   'url'=>'$this->grid->controller->createUrl("adjuntos/borra", array("id"=>$data->id))',
	   'options' => array( 'ajax' => array('type' => 'GET', 'success'=>'js:function() { $.fn.yiiGridView.update("detalle-imggrilla-grid");}' ,'url'=>'js:$(this).attr("href")'),
	   
	   ) ,
	   'imageUrl'=>Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."cerrar.png",
	   'label'=>'Borrar',
	   ),
               
	   ),
	   ),


	),
)); ?>

<div id="zona"></div>



	
</div>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialog4',
	'options'=>array(
		'title'=>'Explorador',
		'autoOpen'=>false,
		'modal'=>true,
		'width'=>800,
		'height'=>600,
	),
));
?>
	<iframe id="cru-frame4" width="100%" height="100%"></iframe>
<?php
$this->endWidget();?>