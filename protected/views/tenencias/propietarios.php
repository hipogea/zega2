
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'propietarios-grid',
	'dataProvider'=>  Tenenciastraba::model()->search_por_tenencia($model->codte),
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$model,
	'columns'=>array(
		'codte',
		array('name'=>'Nombre','value'=>'$data->trabajadores->ap'),
		array('name'=>'Nombre','value'=>'$data->trabajadores->am'),
            array('name'=>'Nombre','value'=>'$data->trabajadores->nombres'),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'cru-dialog',
    'options'=>array(
        'title'=>'Direcciones',
        'autoOpen'=>false,
        'modal'=>false,
        'width'=>500,
        'height'=>400,
    ),
    ));
?>

<iframe id="cru-frame" width="100%" height="100%"></iframe>

<?php
$this->endWidget();
?>

<?php
 $createUrl = $this->createUrl($this->id.'/creapropietario',
		array(	id=>$model->codte,
			"asDialog"=>1,
			"gridId"=>'propietarios-grid',
                       // "codpro"=>$model->codpro,
		)

	    );

 echo CHtml::link('Agregar Propietario','#',array('onclick'=>"$('#cru-frame').attr('src','$createUrl '); $('#cru-dialog').dialog('open');"));

?>
