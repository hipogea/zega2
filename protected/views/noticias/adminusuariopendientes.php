<?PHP
$this->menu=array(
	array('label'=>'Ver Tablon', 'url'=>array('todosdeltablon')),
	array('label'=>'Publicar', 'url'=>array('solicita')),
	array('label'=>'Mis avisos Pendientes', 'url'=>array('adminusuariopendientes')),
	array('label'=>'Mis avisos y otros', 'url'=>array('useryaprobados')),
	array('label'=>'Todos del tablon', 'url'=>array('todosdeltablon')),
);
?>
<h1> Tablon publico </h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'noticias-grid',
	'dataProvider'=>$model->search_usuario_pendientes(),
	'summaryText'=>'',
	'hideHeader'=>true,
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		 array('name'=>'st.','header'=>'st', 'type'=>'html','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."noti".$data->tiponoticia.".png"),htmlOptions'=>array('width'=>'200')),
		
		'txtnoticia',
		'fecha',
		 array('name'=>'dst.','header'=>'dst', 'type'=>'html','value'=>'CHtml::image(Yii::app()->getTheme()->baseUrl.Yii::app()->params["rutatemaimagenes"]."user.png")'),
	
		'autor',
		 	//'expira',
		//'tiponoticia',
        array(
            'class'=>'CButtonColumn',
        ),
	
	),
)); ?>
