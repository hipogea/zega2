<div class="form">
<div class="panelizquierdo">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'c_serie',
		'c_numgui',
            array('name'=>'Emisor','value'=>$model->destinatario->despro),
              
		//'destinatario.despro',
		'd_fectra',
		'd_fecgui',
		array('name'=>'Pto partida','value'=>$model->direccionespartida->c_direc),
               array('name'=>'Pto Llegada','value'=>$model->direccionesllegada->c_direc),
           
	),
)); ?>
</div>
<div class="panelderecho">
  <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'c_desgui',
		'cod_cen',
                'estado.estado',
		 array('name'=>'Transportista','value'=>$model->transportistas->despro),
                'c_texto',
		 '.',
             '.',
           
		
	),
)); ?>  
    
</div>
