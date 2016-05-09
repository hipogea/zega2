

<?PHP
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


<?php echo CHtml::link('Busqueda ','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->



<h1>Materiales enviados a talleres externos</h1>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'clipro-grid',
	'dataProvider'=>$model->search(),
	'cssFile' => ''.Yii::app()->getTheme()->baseUrl.Yii::app()->params['rutatemagrid'].'grid_pequeno.css',  // your version of css file
	
	'filter'=>$model,
	'columns'=>array(
		'razondestinatario',
		//'ptopartida',
		array('name'=>'d_fectra','header'=>'Fecha','value'=>'date("d/m/Y",strtotime($data->d_fectra))'),
		'c_trans',
		'c_serie',
		array('name'=>'c_numgui','type'=>'raw','value'=>'CHtml::link($data->c_numgui, Yii::app()->createurl(\'/guia/update\', array(\'id\'=> $data->id ) ))'),
		
		'c_itguia',
		'n_cangui',
		'c_um',
		'c_codgui',
		'c_descri',
		'nomep',
		'devuelto', 
		'pendiente',
		'diaspasados',
		array('type'=>'raw','value'=>'($data->diaspasados>30)?CHtml::image(Yii::app()->request->baseUrl."/css/grid/alerta.jpg"):""'),
	),
)); ?>

