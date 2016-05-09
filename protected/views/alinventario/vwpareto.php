<?php

?>

<h1>Pareto</h1>



<?php // echo CHtml::link('Filtrar','#',array('class'=>'search-button')); ?>
<div class="search-form" style="">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


 <?php
	  	$proveedor=	$model->searchpareto();
	  
	  ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'alinventario-grid',
	        'itemsCssClass'=>'table table-striped table-bordered table-hover',
	'dataProvider'=>$proveedor,
	//'filter'=>$model,
	'columns'=>array(
		//'codart',
		array('name'=>'codart','type'=>'raw','value'=>'CHtml::link($data->codart,Yii::app()->createurl(\'/alinventario/update\', array(\'id\'=> $data->id ) ) )'),
		'um',
		array('name'=>'codart','type'=>'raw','value'=>'CHtml::image("/recurso/materiales/".$data->codart.".JPG","HOLA",array("height"=>40,"width"=>"40"))'),
		'cantlibre',
		'cantres',
        'ubicacion',
		array(
                'name'=>'cantlibre',
                'header'=>'libre',
                
                ),
		'descripcion',
		//'punit',
		array('name'=>'punit','value'=>'round($data->punit,2)'),
			array('name'=>'pttotal','value'=>'round($data->pttotal,2)','footer'=>round($model->getTotal($model->search()),2)),
															
		
		'codmon',
		'codalm',
		'codcen',
		
                
		//'creadopor',
		
		
		
	),
)); ?>



