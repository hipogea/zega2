<?php
  // echo " El ID DE LA CABECERA ".$idcabecera."<BR>";
$prove=Tempdpeticion::model()->search_por_peticion($idcabecera);
//$prove=Tempdpeticion::model()->search();
//echo " l ACANTIODAD DE REGSITROS  ".count($prove->getdata())."<BR>";








$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-grid',
	'dataProvider'=>$prove,
	//'filter'=>$model,
	//'cssFile'=>Yii::app()->getTheme()->baseUrl.'/css/style-grid.css',  // your version of css file
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'summaryText'=>'->',
	'columns'=>array(
			

			array(
           'class'=>'CCheckBoxColumn',
		    'selectableRows' => 20,
		    'value'=>'$data->idtemp',
			'checkBoxHtmlOptions' => array(                
				'name' => 'cajita[]',
			  ),
           // 'id'=>'cajita' // the columnID for getChecked
       ),

		array('name'=>'item', 'htmlOptions'=>array('width'=>1)),
			//array('name'=>'tipimputacion','header'=>'I','htmlOptions'=>array('width'=>5)),
			//array('name'=>'tipsolpe','header'=>'T','htmlOptions'=>array('width'=>5)),
			//'tipsolpe',
	       //array('name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"].$data->codocu.$data->est.".png")'),
	   
	      //array('name'=>'st.','header'=>'st', 'type'=>'raw','value'=>'($data->est=="02")?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."tacho.jpg"):""'),
		//'n_hguia',
		//'c_itguia',
		array('name'=>'cant','header'=>'Cant'),
		array('name'=>'tempdpeticion_ums.desum','header'=>'Um','htmlOptions'=>array('width'=>5)),
		array('name'=>'codart','header'=>'Cod.','htmlOptions'=>array('width'=>5)),
		array('name'=>'descripcion','header'=>'descripcion','htmlOptions'=>array('width'=>200)),

		//'c_edgui',	
	//	array('name'=>'txtmaterial','header'=>'Descripcion','htmlOptions'=>array('width'=>600)),
		//array('name'=>'texto', 'type'=>'raw','header'=>'t','value'=>'(!empty($data->m_obs))?"x":""' ),
                // array('name'=>'textodetalle', 'type'=>'raw','header'=>'t','value'=>'(!empty($data->textodetalle))?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."texto.png","hola"):""' ),

		array('name'=>'codcen','header'=>'Cent','htmlOptions'=>array('width'=>5)),
		array('name'=>'codal','header'=>'Alm','htmlOptions'=>array('width'=>5)),
		array('name'=>'punit','header'=>'P u.','htmlOptions'=>array('width'=>50)),
		array('name'=>'plista','header'=>'P lista.','htmlOptions'=>array('width'=>50)),
		array('name'=>'imputacion','header'=>'Cebe','htmlOptions'=>array('width'=>50)),
		array('name'=>'codestado','header'=>'Estado','value'=>'$data->tempdpeticion_estado->estado','htmlOptions'=>array('width'=>10)),
		/*array(
			'name'=>'fechacrea',
			'value'=>'date("d/m/Y", strtotime($data->fechacrea))',
		  ),*/
		/*array(
			'name'=>'fechaent',
			//array('name'=>'fechaent','header'=>'Para'),
			'header'=>'Para',
			'value'=>'date("d/m/Y", strtotime($data->fechaent))',
			'htmlOptions'=>array('width'=>50),
		),*/
			'usuario',	
			//'desolpe_estado.estado',	//'estado',

		//array('name'=>'punitplan','header'=>'Plan','value'=>'round($data->punitplan,2)','footer'=>round(Desolpe::getTotal($prove)['plan'],2)),
		//array('name'=>'punitreal','header'=>'Real','value'=>'round($data->alkardex_gastos,2)','footer'=>round(Desolpe::getTotal($prove)['real'],2)),


		array(
			'htmlOptions'=>array('width'=>400),
			'class'=>'CButtonColumn',
			 'buttons'=>array(
			 
			 
                        'update'=>
                            array(
                            	   'visible'=>'true',
                                    'url'=>'$this->grid->controller->createUrl("/peticion/Modificadetalle/",
										    array("id"=>$data->idtemp,
                                                                                         "asDialog"=>1,
											"gridId"=>$this->grid->id,
											"ed"=>"si",

											)
									    )',
                                    'click'=>('function(){ 
							    $("#cru-detalle").attr("src",$(this).attr("href")); 
							    $("#cru-dialogdetalle").dialog("open");  
							     return false;
							 }'),
								'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'lapicito.png',
								'label'=>'Actualizar Item', 
                                ),








				 'view'=>
                            array(
                            	   'visible'=>'($data->tipo=="S")?true:false',
                                    'url'=>'$this->grid->controller->createUrl("/peticion/generaot/",
										    array("id"=>$data->id)
									    )',
								'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'work.png',
								'label'=>'Genera OT',
                                ),

                            ),
		),
	),
)); ?>

<?php
$createUrl = $this->createUrl('/peticion/creadetalle',
array(
"idcabeza"=>$idcabecera,
"cest"=>'01',
//"id"=>$model->n_direc,
"asDialog"=>1,
"gridId"=>'detalle-grid',
//"idcabecera"=>Numeromaximo::numero_aleatorio(20,100000),

)
);





?>
<div class="botones">

	<?php echo CHtml::link(CHtml::image(Yii::app()->getTheme()->baseUrl.'/img/mas.png','', array('height'=>25,'width'=>25)), '#',array('onclick'=>" $('#cru-detalle').attr('src','$createUrl ');$('#cru-dialogdetalle').dialog('open');")); ?>
</div>


<div class="row">
	<?php

	$botones=array(

		'minus'=>array(
			'type'=>'D',
			'ruta'=>array($this->id.'/borraitems',array()),
			'opajax'=>array(
				'type'=>'POST',
				'url'=>Yii::app()->createUrl($this->id.'/borraitems',array()),
				'success'=>"function(data) {
										$('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');

                                              $.fn.yiiGridView.update('detalle-grid'); return false;
                                        }",
				'beforeSend' => 'js:function(){
                                  				 var r = confirm("Esta seguro de Eliminar estos Items?");
                          						 if(!r){return false;}
                               							 }
                               					',
			),
			'visiblex'=>array(ESTADO_CREADO),

		),



		'config'=>array(
			'type'=>'C',
			'ruta'=>array($this->id.'/creadetalleserv',array(
				'idcabeza'=>$idcabecera,"cest"=>'01',
				//"id"=>$model->n_direc,
				"asDialog"=>1,
				"gridId"=>'detalle-grid',
			)
			),
			'dialog'=>'cru-dialogdetalle',
			'frame'=>'cru-detalle',
			'visiblex'=>array(ESTADO_CREADO),

		),

		'add'=>array(
			'type'=>'C',
			'ruta'=>array($this->id.'/creadetalle',array(
				'idcabeza'=>$idcabecera,"cest"=>'01',
				//"id"=>$model->n_direc,
				"asDialog"=>1,
				"gridId"=>'detalle-grid',
			)
			),
			'dialog'=>'cru-dialogdetalle',
			'frame'=>'cru-detalle',
			'visiblex'=>array(ESTADO_CREADO),

		),
		'out'=>array(
			'type'=>'B',
			'ruta'=>array($this->id.'/salir',array('id'=>$model->id)),
			'visiblex'=>array(ESTADO_PREVIO,ESTADO_CREADO,ESTADO_APROBADO,ESTADO_ANULADO,ESTADO_PROCESO_COMPRA),
		),

	);





	$this->widget('ext.toolbar.Barra',
		array(
			//'botones'=>MiFactoria::opcionestoolbar($model->id,$this->documento,$model->codestado),
			'botones'=>$botones,
			'size'=>24,
			'extension'=>'png',
			'status'=>$model->codestado,

		)
	);?>

</div>



