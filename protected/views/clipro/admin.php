<div class="division">

<?php
/* @var $this CliproController */
/* @var $model Clipro */

$this->breadcrumbs=array(
	'Proveedores'=>array('index'),
	'Listadp',
);

$this->menu=array(
	
	array('label'=>'Crear', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('clipro-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php echo CHtml::link('Buscar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'clipro-grid',
	'dataProvider'=>$model->search(),
	  'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$model,
	'columns'=>array(
		'codpro',
		'despro',
		'rucpro',
		'telpro',
		'emailpro',
		'tipo',
		array(
            'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
            //--------------------- begin new code --------------------------
            'buttons'=>array(
								 'template'=>'{up}',
                        /*'update'=>
                            array(
                                    'url'=>'$this->grid->controller->createUrl("update", array("id"=>$data->primaryKey,"asDialog"=>1,"gridId"=>$this->grid->id))',
                                    'click'=>'function(){$("#cru-frame").attr("src",$(this).attr("href")); $("#cru-dialog").dialog("open");  return false;}',
                                ),*/
                            ),
				 ),			
	
		
		/*
		'creadopor',
		'modificadopor',
		'creadoel',
		'modificadoel',
		*/
		/*array(
			'class'=>'CButtonColumn',
		),*/
	),
)); ?>

<?php echo CHTml::link("Exportar",Yii::app()->createUrl('/clipro/admin',array('espe'=>1)));

 
 ?>

<?php
//--------------------- begin new code --------------------------
   // add the (closed) dialog for the iframe
    $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog',
    'options'=>array(
        'title'=>'Detail view',
        'autoOpen'=>false,
        'modal'=>false,
        'width'=>750,
        'height'=>800,
    ),
    ));
?>
<iframe id="cru-frame" width="100%" height="100%"></iframe>
<?php
 
$this->endWidget();
//--------------------- end new code --------------------------
?>
</div>
