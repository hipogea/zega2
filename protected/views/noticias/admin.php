


<h1> <?php echo "Visualizar : ".$titulo;?> </h1>

<?PHP
$this->menu=array(
	array('label'=>'Tablon', 'url'=>array('admin')),
	array('label'=>'Publicar', 'url'=>array('solicita')),
	array('label'=>'Mis avisos Pendientes', 'url'=>array('adminusuariopendientes')),
	array('label'=>'Mis avisos y otros', 'url'=>array('useryaprobados')),
	array('label'=>'Todos del tablon', 'url'=>array('todosdeltablon')),
);
?>
<div class="division">
	<div class="wide form">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'noticias-grid',
	'dataProvider'=>$proveedor,
	'summaryText'=>'',
	'hideHeader'=>true,
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		 array('name'=>'st.','header'=>'st', 'type'=>'html','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."noti".$data->tiponoticia.".png","",array("width"=>20))'),
		array('name'=>'hh','header'=>'st', 'type'=>'html','value'=>'CHtml::link("Visualizar ",Yii::app()->createUrl("/noticias/view",array("id"=>$data->id)))'),
		array('name'=>'hhx','header'=>'s.t', 'type'=>'html','value'=>'CHtml::link("Tratar ",Yii::app()->createUrl("/noticias/tratarnoticia",array("id"=>$data->id)))'),
		array('name'=>'hhf','header'=>'st', 'type'=>'html','value'=>'CHtml::link("Editar ",Yii::app()->createUrl("/noticias/update",array("id"=>$data->id)))'),



		'txtnoticia',
		'fecha',
		'fexpira',
		array('name'=>'fec','value'=>'MiFactoria::tiempopasado($data->fecha)','htmlOptions'=>array('width'=>100)),

		array('name'=>'dst.','header'=>'dst', 'type'=>'html','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."user.png")'),
	
		'autor',
		 	//'expira',
		//'tiponoticia',

	
	),
)); ?>
</div>
</div>



