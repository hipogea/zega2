<?php
/* @var $this InventarioController */
/* @var $model Inventario */

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'inventario-grid',
	'dataProvider'=>$model1->search(),
	'filter'=>$model1,
	'columns'=>array(
	    array('name'=>'barcos.nomep','header'=>'Embarcacion'),
		'codigosap',
		'codigoaf',
		'descripcion',
		'marca',
		'modelo',
		'serie',
		/*
		'coddocu',
		'creadopor',
		'creadoel',
		'modificadopor',
		'modificadoel',
		'codlugar',
		'codigosap',
		'codigoaf',
		'descripcion',
		'marca',
		'modelo',
		'serie',
		'clasefoto',
		'codigopadre',
		'numerodocumento',
		'adicional',
		'codigoafant',
		'posicion',
		'codcentro',
		'codcentrooriginal',
		'codeporiginal',
		'rocoto',
		'codepanterior',
		'codcentroanterior',
		'clase',
		'baja',
		'n_direc',
		*/
	
	),
)); ?>
