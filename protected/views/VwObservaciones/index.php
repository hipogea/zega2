



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'observaciones-grid',
	'dataProvider'=>$model->search(),	
	'columns'=>array(
		'usuario',
		'fecha',
		'descri',
		'mobs',
		'estado',		
		
	),
)); ?>


