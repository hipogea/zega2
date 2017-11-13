<?php
/* @var $this OperaPlanesController */
/* @var $model OperaPlanes */

$this->breadcrumbs=array(
	'Opera Planes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List OperaPlanes', 'url'=>array('index')),
	array('label'=>'Create OperaPlanes', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#opera-planes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Lista de Pendientes</h3>

<p>Indique que tareas se han realizado, presionando el botón
    y colocando la fecha y hora de la misma
</p> 



<?php  
 $gridColumns=array(
		
                array('name'=>'porc',
                    'type'=>'html',
                    'value'=>'Yii::app()->controller->widget(
                                "booster.widgets.TbProgress",
                                    array(
                                        "context" => $data->color($data->porc), 
                                         "percent" => $data->porc,
                                        )
                                        )->run()'
                    ),
		 array('name'=>'tiempofalta','header'=>'Vence'),
                array('name'=>'porc'),
      array(
                'class' => 'application.components.booster.widgets.TbEditableColumn',
                'name' => 'fechaejec','type'=>'raw', 
               // 'header'=>'$data->getAttributeLabel("hpp")',
                //  'value' => '$data->hpp',
                'sortable' => false,
                'editable' => array( //estas son propiedades del control TEDITABLE FIELD
                   'type'=>'date',
                    'url' => $this->createUrl('dailywork/updatedailyevent'),
                    'placement' => 'left',
                   'inputclass' => 'input-medium',
                   // 'mode'=>'inline'
                )
            ),
                array('name'=>'labor'),
     
     array(
		'htmlOptions' => array('nowrap'=>'nowrap'),
		'class'=>'booster.widgets.TbButtonColumn',
		 'template' => "{edit}",
		'updateButtonUrl'=>null,
         'buttons'=>array(
          'edit'=>
                            array(
                            	   'visible'=>'true',
                                    'url'=>'$this->grid->controller->createUrl("operaPlanes/editaTemp/",
										    array("id"=>$data->id,
                                                                                         "asDialog"=>1,
											"gridId"=>$this->grid->id,
											"ed"=>"si",

											)
									    )',
                                    'click'=>('function(){ 

							    $("#cru-dialogdetalle").dialog("open");
										$("#cru-detalle").attr("src",$(this).attr("href"));
							     return false;
							 }'),
						'imageUrl'=>''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemaimagenes'].'task.png',
					'options'=>array('title'=>'Presiona'),			
                                'label'=>'Efectuar', 
                                ),
		// 'template' => "{edit}",
	))
     );
 
$this->widget(
    'booster.widgets.TbGridView',
    array(
        'id'=>'opera-planes-grid',
        'filter'=>$model,
      // 'responsiveTable'=>true,
         'type' => 'striped bordered',
        'dataProvider' => $proveedor,
       
        'columns' => $gridColumns,
    )       
);


?>


<?php
//--------------------- begin new code --------------------------
// add the (closed) dialog for the iframe
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'cru-dialogdetalle',
	'options'=>array(
           'position'=>'center',
		'title'=>'',
               // 'buttons' => array("Ok"=>'function(){alert("xxx")}'),
               'buttons' => array(
                    'Ok'=>'js:function(){alert("ok")}',
                    'Cancel'=>'js:function(){alert("cancel")}',),
 'autoOpen'=>false,
		'modal'=>true,	
		'border'=>0,
            'width'=>'auto',
            'height'=>'auto',
	),
));
?>
	<iframe id="cru-detalle" style="border:0px; width:100%; height:100%;" ></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>
