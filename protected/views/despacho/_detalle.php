

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'despacho-grid',
	'dataProvider'=>VwDespacho::model()->search_por_vale($idvale),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		//'codcentro',
		//'codalmacen',
		'fechacreac',
		'fechaprog',
		'descripmaterial',
		'codart',
		'desum',
		'cant',
		//'numvale',
		//'movimiento',
		'responsable',
		'iduser',
		'vigente',

	  ),
));
  ?>
