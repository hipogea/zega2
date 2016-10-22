
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tenencias-grid',
	'dataProvider'=>  Tenenciasproc::model()->search_por_tenencia($model->codte),
    'itemsCssClass'=>'table table-striped table-bordered table-hover',
	//'filter'=>$model,
	'columns'=>array(
		'codte',
		array('name'=>'hidevento','header'=>'Procedimiento','value'=>'$data->eventos->descripcion'),
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>


<?php
 $createUrl = $this->createUrl($this->id.'/creaevento',
		array(	id=>$model->codte,
			"asDialog"=>1,
			"gridId"=>'procesos-grid',
                       // "codpro"=>$model->codpro,
		)

	    );

 echo CHtml::link('Agregar Proceso','#',array('onclick'=>"$('#cru-frame').attr('src','$createUrl '); $('#cru-dialog').dialog('open');"));

?>
