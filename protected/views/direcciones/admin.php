<?php
/* @var $this DireccionesController */
/* @var $model Direcciones */


$this->menu=array(
	//array('label'=>'List Direcciones', 'url'=>array('index')),
	array('label'=>'Crear Direccion', 'url'=>array('create')),
);

?>
<h1> Direcciones</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'direcciones-grid',
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'c_hcod',
		'prove.despro',
		'centrito.nomcen',
		'c_direc',
		'l_vale',
		'c_nomlug',
		//'n_valor',
		'c_distrito',		
		'c_prov',
		'c_departam',/*
		'n_direc',
		'socio',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		*/
		array(
			'class'=>'CButtonColumn',
			 'buttons'=>array(
                        'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("update", 
																				  array("id"=>$data->primaryKey,
																							"asDialog"=>1,
																							"gridId"=>$this->grid->id
																						)
																				)',
                                    'click'=>'function(){$("#cru-frame").attr("src",$(this).attr("href")); $("#cru-dialog").dialog("open");  return false;}',
                                ),
                            ),
		),
	),
)); ?>

<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog',
    'options'=>array(
        'title'=>'Actualizar direcciones',
        'autoOpen'=>false,
        'modal'=>false,
        'width'=>700,
        'height'=>500,
    ),
    ));
?>
<iframe id="cru-frame" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>
