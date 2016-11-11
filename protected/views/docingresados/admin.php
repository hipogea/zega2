<?php 

$this->menu=array(
	//array('label'=>'List Docingresados', 'url'=>array('index')),
	array('label'=>'Nuevo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('docingresados-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

?>
  
 
<?php MiFactoria::titulo('Ingreso de Documentos','attach');
  ?>



<div class="search-form" >
<?php

$this->renderPartial('_search',array(
	'model'=>$model,
)); 

?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'docingresados-grid',
	'dataProvider'=>$model->search(),
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
		array('name'=>'correlativo','type'=>'raw','value'=>'CHTml::openTag("span",array("style"=>"border-radius:3px;padding:4px;background-color:$data->color"))."     ".CHTml::closeTag("span")." .".$data->correlativo'),
		'numero',
		'moneda',
		'monto',
		//'codprov',
		'despro',			
		//'barcos.nomep',
		
		
		'fecha',
		'fechain',	
		'numdocref',		
		'ap',
            'descripcion',
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
		array(
			'class'=>'CButtonColumn',
			
			 'buttons'=>array(
			 
			  'view'=>
                            array(
                                   
								'visible'=>'false',
                                ),
						 
                        'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl(
                                        "/Docingresados/update",
                                          array(
                                             "id"=>$data->id,"asDialog"=>1,"gridId"=>$this->grid->id
						),
                                            array("target"=>"_blank")
                                            )',
                                    
								'label'=>'Modificar', 
                                ),
								'delete'=>
                            array(
                                   
								'visible'=>'false',
                            ),
			
				),
			),
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
