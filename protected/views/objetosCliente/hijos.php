<?php
//VAR_DUMP($proveedor);die();
$gridWidget= $this->widget('ext.groupgridview.GroupGridView', array(
	'id'=>'solpe-hijos',
  'summaryText'=>'',
	'dataProvider'=>$proveedor,
	//'mergeColumns' => array('numsolpe','centro','codal','imputacion'),
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
'columns'=>array(
		/*array('name'=>'numsolpe','type'=>'raw','value'=>'CHtml::link($data->numsolpe,Yii::app()->createurl(\'/solpe/update\', array(\'id\'=> $data->identidad ) ) )'),
		'tipsolpe',
		array('name'=>'.','type'=>'raw','value'=>'($data->tipsolpe=="S")?CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."hammer.png"):""'),
'item',
		'cant',
		'desum',
		array('name'=>'codart','type'=>'raw','value'=>'($data->tipsolpe=="M")?CHtml::link($data->codart,Yii::app()->createurl(\'/maestrocompo/ver\', array(\'id\'=> $data->codart ) ),array("target"=>"_blank") ):""'),
			'imputacion',
		array('name'=>'txtmaterial','type'=>'raw','value'=>'$data->txtmaterial','htmlOptions'=>array('width'=>'300')),
			array(
			'name'=>'fechacrea',
			'value'=>'date("d/m/y", strtotime($data->fechacrea))','htmlOptions'=>array('width'=>'50')
		),
		array(
			'name'=>'fechaent',
			'value'=>'date("d/m/y", strtotime($data->fechaent))','htmlOptions'=>array('width'=>'50')
		),
		array('name'=>'codal','type'=>'raw','value'=>'($data->est <>"30")?CHtml::link($data->codal,"#" , array(\'onclick\'=>\'$("#cru-detalle").attr("src","\'.Yii::app()->createurl(\'/solpe/reservaitem\', array(\'id\'=> $data->id, \'asDialog\'=>1,\'gridId\'=> $this->grid->id   ) ).\'"); $("#cru-dialogdetalle").dialog("open"); return false;\',)):$data->codal'),
		*/
    //'id',
		'cant',
		//'hidhijo',
               // 'hidpadre',
                'hijo.codigo',
                'hijo.descripcion',
                 'hijo.marca',
                 'hijo.modelo',

	),
)); ?>


