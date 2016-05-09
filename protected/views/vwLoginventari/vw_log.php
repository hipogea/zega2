<div class="division">
	<h1><?php
		ECHO CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."camion.png",'',ARRAY('width'=>25,'height'=>25));?> <span class="label badge-warning">Confirmar movimientos de activos</span></h1>


	<?php
	Yii::app()->clientScript->registerScript('grabPageNo', "
    $('.bolsita').on('change', function(event){
      $.ajax({
      url: '/recurso/index.php?r=loginventario/update',
		type: 'POST',
	  data: {   vlugar : event.target.value,
				vidinventario :event.target.vidinventario,
				vidlog:event.target.vidlog
				} ,
       datatype: 'json',
        success: function(datos){
								alert( 'Se ha actualizado el registro del inventario  '+datos);
									//$.fn.yiiGridView.update('inventario-grid');
								}

								});

    });
", CClientScript::POS_READY );


	?>
	<div id="papito"> </div>




	<?php $form=$this->beginWidget('CActiveForm', array(
		'enableAjaxValidation'=>true,
	)); ?>


	<?PHP
	echo CHtml::DropDownList("lugarcitos",
		"",
		CHtml::listData(
			Lugares::model()->findAll(array("condition"=>" codpro='R00001'","order"=>"deslugar ASC")),
			"codlugar",
			"deslugar"
		),
		array("empty"=>"--Escoja un lugar--",
			"class"=>"bolsitas",


		)
	) ;

	?>
	<?php echo CHtml::ajaxSubmitButton('Confirmar',
		array('loginventario/actualiza'),
		array('success'=>'reloadGrid'));
	?>


	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'inventario-grid',
		'dataProvider'=>$proveedor,
		//'cssFile' => '/motoristas/css/grid/estilogrid.css',  // your version of css file
		//'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'style_gridpartes.css',  // your version of css file
		'itemsCssClass'=>'table table-striped table-bordered table-hover',

		//'filter'=>$model,
		'columns'=>array(
			//'idlog',
			//'desdocu',
			array('name'=>'cod_cen','type'=>'raw','value'=>'CHTml::OpenTag("span",array("class"=>"label label-".$data->cod_cen)).$data->cod_cen.CHTml::CloseTag("span")'),
			array('name'=>'coddocu','header'=>'.', 'type'=>'raw','value'=>'($data->coddocu=="001")?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."arriba.png","",array("width"=>10, "height"=>10)):CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."abajo.png","",array("width"=>10, "height"=>10))'),
			array('name'=>'despro','type'=>'raw','value'=>'CHTml::OpenTag("span",array("style"=>"color:#6B1A80;font-weight:bold;")).$data->despro.CHTml::CloseTag("span")'),
			array('name'=>'c_direc','header'=>'Punto de Transporte','type'=>'raw', 'value'=>'$data->c_direc'),
			array('name'=>'numerodocumento','header'=>'N° Documento','type'=>'raw','value'=>'CHTml::link($data->numerodocumento,yii::app()->createUrl("/guia/update",array("id"=>$data->iddocu)))'),
			//'iddocu',

			array(
				'class'=>'CCheckBoxColumn',
				'selectableRows' => 20,
				'value'=>'$data->idlog',
				'checkBoxHtmlOptions' => array(
					'name' => 'cajita[]',
					//'enabled'=>'(($data->coddocu=="001") and ($data->codpro <> "R00001"))?"false":"true"',
					//'disabled'=>'true',
				),
				// 'id'=>'cajita' // the columnID for getChecked
			),
			array(
				'name'=>'imagen',
				'type'=>'raw',
				'value'=>'(file_exists(Yii::app()->params["rutafotosinventario"].trim($data->codigosap).".JPG"))?
						CHtml::image(Yii::app()->params["rutafotosinventario_"].trim($data->codigosap).".JPG",$data->codigosap,array(\'width\'=>50,\'height\'=>35)):
						"--"'),

			array('name'=>'fecha','header'=>'Fecha','value'=>'date("d/m/Y",strtotime($data->fecha))'),
			//'codigosap',
			array('name'=>'codigoaf','header'=>'Plaquita','type'=>'raw','value'=>'CHTml::link($data->codigoaf,yii::app()->createUrl("/inventario/detalle",array("id"=>$data->hidinventario)))'),

			'descripcion',
			//'marca',
			//'modelo',
			//'barcoanterior',
			'barcoactual',

			/*array('name'=>'ej','type'=>'raw','value'=>'CHtml::ajaxLink(
                                ">>",
                                "/motoristas/index.php?r=loginventario/update",
                                            array(
                                                "type" => "POST",
                                                "beforeSend" => "function( request )
                                                            {

                                                                }",
                                                "success" => "function( data )
                                                                {
                                                                        alert( data );
                                                                }",
                                                "data" => array("calculo"=>"2"),
                                                ),
                                array( "id"=>"cumple_$data->idlog"


                                )
    )								'), */
			array('name'=>'cE','header'=>'','type'=>'raw','value'=>'CHtml::link("+",Yii::app()->createUrl("/Lugares/create",array("codpro"=>$data->codpro)),array("id"=>"cumple_$data->idlog", "vidinventario"=>"$data->hidinventario","vidlog"=>"$data->idlog", "class"=>"periquito"))'),
			array('name'=>'codlugar', 'type'=>'raw', 'value'=> '(($data->codpro <> "R00001") and ($data->coddocu=="001") ) ?
																				CHtml::ajaxSubmitButton("Ok",
																				array("loginventario/actualizaprov"),
																				array("type"=>"POST",
																					"data"=>array("codpro"=>$data->codpro,"idlog"=>$data->idlog,"hidinventario"=>$data->hidinventario),
																					"success"=>"reloadGrid"
																					)
																										):""'
			),



			//'idlog',
			//'codpro',
			//'hidinventario',
			/*  motoristas\assets\FOTOS
            'coddocu',
            'creadopor',
            'creadoel',
            'modificadopor',
            'modificadoel',
            'codlugar',
            'descripcion',
            'marca',
            'modelo',
            'serie',
            'clasefoto',
            'codigopadre',
            'numerodocumento',
            'adicional',
            'codigoafant',
            'posicion',
            'codcentro',
            'codcentrooriginal',
            'codeporiginal',
            'rocoto',
            'codepanterior',
            'codcentroanterior',
            'clase',
            'baja',
            'n_direc',
            */

		),
	));



	?>


	<?php $this->endWidget(); ?>


</div>
<script>
	function reloadGrid(data) {
		$.fn.yiiGridView.update('inventario-grid');
		alert('ok todo bien '+data+ 'eoreroer');
	}
</script>



