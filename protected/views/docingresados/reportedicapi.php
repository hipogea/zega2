<?php 
$this->menu=array(
	//array('label'=>'List Docingresados', 'url'=>array('index')),
	array('label'=>'Ingresar certificado', 'url'=>array('create','cert'=>'yes')),
);

?>


<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('dicapi-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

?>


 
<?php MiFactoria::titulo('Certificados y Vencimiento','attach');
  ?>

<div class="search-form" >
<?php

$this->renderPartial('_searchdicapi',array(
	'model'=>$model,
)); 

?>
</div>

<?php 

 $this->widget('ext.groupgridview.GroupGridView', array(
      'id' => 'dicapi-grid',      
     'mergeColumns' => array('nomep','tipodoc'),
	'dataProvider'=>$model->search_por_dicapi('400'),
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'cssFile' => ''.Yii::app()->getTheme()->baseUrl.'grid_pyy.css',  // your version of css file
	
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		   array(
            'class'=>'CCheckBoxColumn',
           'selectableRows' => 120,
            'value'=>'$data->id',
            'checkBoxHtmlOptions' => array(
                'name' => 'cajita[]'),
            // 'id'=>'cajita' // the columnID for getChecked
                      ),
		
		//'desdocu', 
           
             array('name'=>'nomep','header'=>'Embarcac','type'=>'raw','value'=>'$data->barcos->nomep'),
           array('name'=>'tipodoc','header'=>'Doc','type'=>'raw','value'=>'CHTml::openTag("span",array("style"=>"background-color:".$data->getcolor().";  font-weight:bold;font-size:16px; color:white;border-radius:13px;padding:4px;")).$data->tipodoc.CHTml::closeTag("span")'),
	
	array('name'=>'documento','type'=>'raw','value'=>'CHTml::link($data->docus->desdocu,yii::app()->createUrl("docingresados/update",array("id"=>$data->id)),array("target"=>"_blank"))','htmlOptions'=>array('width'=>70)),
		
          //  'id',
            'numero',
		//'moneda',
		//'monto',
         	// array('name'=>'color','type'=>'raw','value'=>'$data->getcolor()'),
		//'codprov',
		//'despro',
             //array('name'=>'Desdocu','type'=>'raw','value'=>'$data->docus->desdocu'),
             array('name'=>'proactivo','type'=>'raw','value'=>'$data->procesoactivo[0]->tenenciasproc->eventos->descripcion'),
	
		array(
			'name'=>'fechanominal','header'=>'F. Proc',
			'value'=>'date("d.m.y", strtotime($data->procesoactivo[0]->fechanominal))','htmlOptions'=>array('width'=>'30')
		),
		array(
			'name'=>'fechavencimiento',
			'value'=>'date("d.m.y", strtotime($data->fechavencimiento))','htmlOptions'=>array('width'=>'30')
		),	
		//'numdocref',
           /* array(
			'name'=>'cuantoshay','type'=>'raw',
			'value'=>'Chtml::image(Yii::app()->getTheme()->baseUrl.DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."attach_2.png").CHtml::openTag("span",array("class"=>"label badge-warning"),true).$data->cuantosfileshay()','htmlOptions'=>array('width'=>'30')
		),*/
             array(
			'name'=>'files','type'=>'raw',
			'value'=>'$data->enlacesarchivos(Yii::app()->getTheme()->baseUrl.DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."pdf.png")','htmlOptions'=>array('width'=>'30')
		),
             array(
			'name'=>'tiempopasado','type'=>'raw', 
			'value'=>'(is_null($data->procesoactivo[0]))?" ":$data->procesoactivo[0]->tiempopasado()','htmlOptions'=>array('width'=>'30')
		),
            array(
			'name'=>'avance','type'=>'raw', 
			'value'=>'(is_null($data->procesoactivo[0]))?" ":$data->procesoactivo[0]->porcavance()." % "','htmlOptions'=>array('width'=>50)
		),
          
            array(
			'name'=>'progreso','type'=>'raw', 
			'value'=>' Yii::app()->controller->widget("zii.widgets.jui.CJuiProgressBar", array(
    "id"=>"progress".$data->id,
    "value"=>(is_null($data->procesoactivo[0]))?0:$data->procesoactivo[0]->porcavance(),
    "htmlOptions"=>array(
        "style"=>"width:200px; height:20px; float:left;"
    ),
))->run()','htmlOptions'=>array('width'=>'30')
		),
            
            
            
           
           //		'ap',
            //'descripcion',
            
           // array('name'=>'ad','type'=>'raw','value'=>'$data->procesoactivo[0]->tenenciasproc->eventos->descripcion'),
		//'apoderado',
		//'estado',
	
		/*
		'moneda',
		'descorta',
		'codepv',
		'monto',
		'codgrupo',
		'codresponsable',
		'creadopor',
		'creadoel',
		'texv',
		'docref',
		*/
		
))); ?>


		


<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog3',
    'options'=>array(
        'title'=>'Actualizar Ingreso',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>750,
        'height'=>510,
    ),
    ));
?>
<iframe id="cru-frame3" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();


?>

