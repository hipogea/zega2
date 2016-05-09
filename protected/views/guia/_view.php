<?php
/* @var $this GuiaController */
/* @var $data Guia */
?>

<h1>Se ha procesado la GUia</h1>
<div class="view">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'c_numgui',
		'c_serie',// => 'Numero',		
		'd_fecgui' ,//=> 'Fecha',		
		'c_trans',// => 'Conductor',
		'direccionesllegada.c_direc',// => array(self::BELONGS_TO, 'Direcciones', 'n_direc'),
		'transportistas.despro',// => array(self::BELONGS_TO, 'Clipro', 'c_codtra'),
		'direccionestransportista.c_direc',// => array(self::BELONGS_TO, 'Direcciones', 'n_directran'),
		'destinatario.despro',//=>array(self::BELONGS_TO, 'Clipro', 'c_coclig'),
			/*'dirsoc' => array(self::BELONGS_TO, 'Direcciones', 'n_dirsoc'),
			'testado' => array(self::BELONGS_TO, 'Estado', 'c_estgui'),
			'choferes' => array(self::BELONGS_TO, 'Choferes', 'c_licon'),*/
			
	),
)); ?>
</div>