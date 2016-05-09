<H1>Pesca propia y de terceros </h1>

<?php
$this->menu=array(
	//array('label'=>'List Plantas', 'url'=>array('index')),
	array('label'=>'Administrar plantas', 'url'=>array('/plantas/admin')),
	array('label'=>'Ver parte de pesca', 'url'=>array('/reportepesca/gestionaparte&fecha='.$fecha.'&idt='.$idtemporada)),
);
?>

						<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
										'name'=>$idtemporada,
										'model'=>null,
										'attribute'=>null,
										'value'=>(isset($_GET['fecha']))?$_GET['fecha']:date("Y/m/d"),
										'language'=>Yii::app()->language=='es' ? 'es' : null,
											'options'=>array(
													'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
													'showOn'=>'button', // 'focus', 'button', 'both'
																					     	'onSelect'=>'js:function(selected) {																		
																								location.href="index.php?r=reportepesca/plantas&fecha="+this.value+"&idt="+this.name;
																	}',
													'dateFormat'=>'yy-mm-dd',		
														),
												'htmlOptions'=>array(
															'style'=>'width:90px;vertical-align:top',
															'readonly'=>'readonly',
															),
															));
						?>	
							
				
							
						<?php 
							
								//$this->renderpartial('vw_terceros_pie',array('tpescapropia'=>$modelo->tpescapropia,'tpescaterceros'=>($modelo->tpescatotal-$modelo->tpescapropia),true));
						  //echo "termino";
						  ?>
	
						<?php	
								/*$this->Widget('ext.highcharts.HighchartsWidget', array(
   'options'=>array(
     
	'chart'=>array(
                'plotBackgroundColor'=> null,
                'plotBorderWidth'=> true,
                'plotShadow'=> false
             ),
	//'title'=>array('text'=>'',),
	    'plotOptions'=>array(
                'pie'=>array(
                    'allowPointSelect'=> true,
                    'cursor'=> 'pointer',
                    'dataLabels'=>array(
                        'enabled'=> true,
                        'color'=>'#000000',
                        'connectorColor'=> '#000000',
                        'formatter'=> 'function() {
                            return "<b>"+ this.point.name +"</b>: "+ this.percentage +" %";
                        }' 
						),
                    ),
                ),
            

			 'series'=> array( 
			     array( 
						'type'=> 'pie',
						'name'=> 'Browser share',
						'data'=> array( 
								array('Pesca propia',   23.5),
								array('Pesca terceros', 76.5),								
								
									)
						),
						),

	
     )
  ));	
								
								*/?>
				


<?php

	$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'novedades-grid',
			'dataProvider'=>VwPescatotalPlantas::model()->search_dia($fecha,$idtemporada),
			'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'grid_pequeno.css',
	
			'summaryText'=>'',
			'columns'=>array(
						//'id',
						array(
							'name'=>'imagenp',
							'header'=>'',
							'type'=>'html',
							'value'=>'CHtml::image("'.Yii::app()->getTheme()->baseUrl.'/assets/imagenes/factory.gif")'
						,),
						'desplanta',
								
						//'codplantadestino',
							array('name'=>'pescapropia','value'=>'($data->pescapropia==0)?"--":$data->pescapropia'),
							array('name'=>'barcospropios','value'=>'($data->barcospropios==0)?"--":$data->barcospropios'),
							array('name'=>'promediopropia','value'=>'($data->promediopropia==0)?"--":$data->promediopropia'),
							//'promediopropia',
							array(
							'name'=>'imagesepara1',
							'header'=>'',
							'type'=>'html',
							'value'=>'CHtml::image("'.Yii::app()->getTheme()->baseUrl.'/assets/imagenes/degra.jpg")'
						,),
							'pesca',
							'numeroep',
							array(
							'name'=>'imagesepara1',
							'header'=>'',
							'type'=>'html',
							'value'=>'CHtml::image("'.Yii::app()->getTheme()->baseUrl.'/assets/imagenes/degra.jpg")'
						,),
							//'pescatotal',							
							'barcostotales',
							array('name'=>'pescatotal', 'type'=>'raw','value'=>'CHtml::link($data->pescatotal,"#" , array(\'onclick\'=>\'$("#cru-frame").attr("src","\'.Yii::app()->createurl(\'/reportepesca/plantasedita\', array(\'fecha\'=> $data->fecha, \'codplanta\'=> $data->codplantadestino,  \'desplanta\'=> $data->desplanta,  \'idtemporada\'=> $data->idtemporada, \'asDialog\'=>1,\'gridId\'=> $this->grid->id ,\'gridId2\'=> \'novedades-grid3\'  ) ).\'"); $("#cru-dialog").dialog("open"); return false;\',))'    ),
							
							'factor',
							array('name'=>'falta','value'=>'($data->falta<0)?"LLENA":$data->falta'),
							array('name'=>'saturacion','type'=>'raw','value'=>'$data->saturacion."%"'), 
								
		),
		
	))
; 

$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'novedades-grid3',
			'dataProvider'=>VwsPescatotalPlantas::model()->search_dia($fecha,$idtemporada),
			'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'grid_pequeno.css',
	
			'summaryText'=>'',
			'columns'=>array(
						
																'fecha',																
															'tbarcospropios',															
															'tbarcostotales',															
															'tcapacidad',
															'tfalta',
															'tpescapropia',
															'tpescaterceros',
															'tpescatotal',
						)
						)
						);


?>

<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog',
    'options'=>array(
        'title'=>'Pesca terceros',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>600,
        'height'=>450,
    ),
    ));
?>
<iframe id="cru-frame" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------

?>


<?php //$this->beginWidget('Galleria');?>
  <!--
    <img src="/recurso/borrar/25628.jpg" alt="Description of image" title="Title of image" />
    <img src="/recurso/borrar/25628_1.jpg" />
    <img src="/recurso/borrar/25628_2.jpg" />
    <img src="/recurso/borrar/25628_3.jpg" />
	--!>
<?php// $this->endWidget();?>







