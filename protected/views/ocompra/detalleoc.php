<?php
?>

<h1>Detalle de Oc</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'coti-grid',
	'dataProvider'=>$model->search_detalle($id),
	'summaryText'=>'',
	//'filter'=>$model,
	'columns'=>array(		
		'codart',
		'cant',
		'um',
		'descri',
		ARRAY('name'=>'simbolo','header'=>'.','value'=>'$data->simbolo'),
		'punit',

		'subto',	
		
	),
)); ?>
