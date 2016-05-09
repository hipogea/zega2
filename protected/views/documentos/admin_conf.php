<?php


$this->menu=array(
	//array('label'=>'List Documentos', 'url'=>array('index')),
	//array('label'=>'Crear Documento', 'url'=>array('create')),
);

?>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'documentos-grid',
	'dataProvider'=>$model->search_por_tipo(),
	'cssFile' => Yii::app()->getTheme()->baseUrl.'/css/grilla_naranja.css',
	'filter'=>$model,
	'columns'=>array(
		'coddocu',
		
		'desdocu',

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
                                         'url'=>'$this->grid->controller->createUrl("/documentos/configuraop", array("codocupadre"=>$data->coddocu))',
                                       
                                ),
                        ),
		),
	),
)); ?>