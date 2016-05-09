
<DIV  STYLE ="
    background-color:#EFFDFF;
    border:1px solid #79B4DC;
    padding: 10px;
    width: 300px;">
	
	
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'maestrosolicitudes-grid',
	'dataProvider'=>$proveedor,
	//'filter'=>$model,
	'columns'=>array(
		'nombreat',
		'nombrevalor',
		
	),
)); ?>


</DIV>

