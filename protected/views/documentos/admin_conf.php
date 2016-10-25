<?php


$this->menu=array(
	//array('label'=>'List Documentos', 'url'=>array('index')),
	//array('label'=>'Crear Documento', 'url'=>array('create')),
);

?>




<?php $this->widget('ext.groupgridview.GroupGridView', array(
      	'id'=>'documentos-grid',
	'dataProvider'=> Opcionescamposdocu::model()->search(),
	 'mergeColumns' => array('codocu'),
	 'itemsCssClass'=>'table table-striped table-bordered table-hover','filter'=>$model,
	'columns'=>array(
		'codocu',
            array('name'=>'codocu','value'=>'$data->documentos->desdocu'),
		//'campo',
                'nombrecampo',
            'cuantasopcioneshay',
             array('name'=>'codocu','value'=>'$data->documentos->nconfiguser'),
	
            
                // 'nombrecampo',
                 // 'documentos.desdocu',
		/*
		'modificadopor',
		'modificadoel',
		'coddocupadre',
		'tabla',
		'anuladesde',
		'cactivo',
		'abreviatura',
		*/
		array(
			'class'=>'CButtonColumn',
			 'template'=>'{update}',
                        'buttons'=>array
                        (
                                'update' => array
                                (
                                       // 'url'=>'yii::app()->createUrl("configuraop/",array("codocupadre"=>$data->coddocu))',
                                         'url'=>'$this->grid->controller->createUrl("/documentos/configuraop", array("codocupadre"=>$data->codocu))',
                                       
                                ),
                        ),
		),
	),
)); ?>