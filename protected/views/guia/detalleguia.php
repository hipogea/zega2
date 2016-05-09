<?php
?>

<h1>Detalle de Guia</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'coti-grid',
	'dataProvider'=>$model->search_detalle($id),
	'summaryText'=>'',
	//'filter'=>$model,
	'columns'=>array(		
		'c_itguia',
		'n_cangui',
		'c_um',
		'c_descri',
		'c_codactivo',
		'nomep',
		'motivo',

		//ARRAY('name'=>'simbolo','header'=>'.','value'=>'$data->simbolo'),
		//'punit',

		//'subto',	
		
	),
)); ?>
