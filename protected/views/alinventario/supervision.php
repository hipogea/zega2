<?php
$this->menu=array(
	array('label'=>'Ver docs', 'url'=>array('admin')),
);
?>
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
$('#supervision-grid').yiiGridView('update', {
data: $(this).serialize()
});
return false;
});
");
?>

<?php MiFactoria::titulo('Supervisar el stock','gauge')  ?>


<?php // echo CHtml::link('Filtrar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="">
	<?php $this->renderPartial('_searchsupervision',array(
		'model'=>$model,
	)); ?>
</div><!-- search-form -->




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'supervision-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'columns'=>array(
		//'codart',
		array('name'=>'codart','type'=>'raw','value'=>'CHtml::link($data->codart,Yii::app()->CreateUrl("/alinventario/update",array("id"=>$data->idinventario)))'),
		ARRAY('name'=>'codcentro', 'header'=>'Cent','value'=>'$data->codcentro','htmlOptions'=>array('width'=>20)),
            ARRAY('name'=>'codal','header'=>'Alm', 'value'=>'$data->codal','htmlOptions'=>array('width'=>20)),
		'desum',
		array('name'=>'color','type'=>'raw','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl."/img/reloj".$data->colorstatus().".png","")'),

		array('name'=>'cantlibre','type'=>'raw','value'=>'($data->cantlibre>0)?CHtml::openTag("span",array("class"=>"badge badge-success")).$data->cantlibre.CHtml::closeTag("span"):""'),

		'cantreposic',
		'cantreorden',
		'canteconomica',
		 ARRAY('name'=>'descripcion','header'=>'Descripcion', 'value'=>'$data->descripcion','htmlOptions'=>array('width'=>500)),
	
                  'color',
		 ARRAY('name'=>'punit','header'=>'P. Unit', 'value'=>'round($data->punit,2)','htmlOptions'=>array('width'=>10)),
		//array('name'=>'color','value'=>'$data->colorstatus()'),
			),
)); ?>
