


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'detalle-grid',
	'dataProvider'=>$proveedor,
	//'filter'=>$model,
	'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'grid_mediano.css',  // your version of css file

	'summaryText'=>'',
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
	
		'codigocreado',
		'descripcioncorta',
		'marca',
		'modelo',
		'numeroparte',
		'descripcion',
		'clasesita.nomclase',
		'grupito.descri1',
		/*
		'um',
		'codclase',
		'codgrupo',
		'codsector',
		'textolargo',
		'codigoestado',
		'codigodoc',
		'codigocreado',
		'descripcionfinal',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

	
<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialogdetalle',
    'options'=>array(
        'title'=>'Crear item',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>500,
        'height'=>500,
		'show'=>'Transform',
    ),
    ));
?>
<iframe id="cru-detalle" frameborder="0"  width="100%" height="100%" ></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>

<?php

 $createUrl = $this->createUrl('/Maestrosolicitudescabecera/creadetalle',
										array(
										       "idcabeza"=>$model->id,
											   //"id"=>$model->n_direc,
												"asDialog"=>1,
												"gridId"=>'detalle-grid',
												//"idcabecera"=>Numeromaximo::numero_aleatorio(20,100000),
												
											)
							);
 $UrlDefault = $this->createUrl('/guia/defaulte');
echo CHtml::button("      +      ",array('title'=>"Agregar Item",'onclick'=>" $('#cru-detalle').attr('src','$createUrl ');$('#cru-dialogdetalle').dialog('open');")); 
ECHO CHtml::ajaxSubmitButton('Confirmar',
array('loginventario/actualiza'),
 array('success'=>'reloadGrid')); 
echo CHtml::button("      -      ",array('title'=>" Borrar Items seleccionados",'onclick'=>" $('#cru-detalle').attr('src','$createUrl ');$('#cru-dialogdetalle').dialog('open');")); 
echo CHtml::button("     [ : ]     ",array('title'=>" Editar Item(s)     ",'onclick'=>" $('#cru-detalle').attr('src','$createUrl ');$('#cru-dialogdetalle').dialog('open');")); 
echo CHtml::button("     [D]     ",array('title'=>" Editar Item(s)     ",'onclick'=>" $('#cru-detalle').attr('src',' $UrlDefault ');$('#cru-dialogdetalle').dialog('open');")); 

?>
	


